<?php

class ClienteController extends Controller
{
    
    private $clienteModel;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->clienteModel = new Cliente();
    }

    public function desativar($id)
{
    if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
        header('Location:' . BASE_URL);
        exit;
    }

    if ($id) {
        $resultado = $this->clienteModel->desativarCliente($id);

        if ($resultado) {
            $_SESSION['mensagem'] = "Cliente desativado com sucesso!";
            $_SESSION['tipo-msg'] = "Sucesso";
        } else {
            $_SESSION['mensagem'] = "Erro ao desativar cliente.";
            $_SESSION['tipo-msg'] = "Erro";
        }
    }

    header('Location: ' . BASE_URL . 'cliente/listar');
    exit;
}

    public function listar()
{
    if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
        header('Location:' . BASE_URL);
        exit;
    }

    $dados = array();
    $dados['conteudo'] = 'dash/cliente/listar';

    $func = new Funcionario();
    $dados['func'] = $func->buscarFunc($_SESSION['userEmail']);

    // Mantém a contagem de clientes
    $dados['cliente'] = $this->clienteModel->getContarCliente();

    // 🔧 Aqui está o que estava faltando
    $dados['listaCliente'] = $this->clienteModel->getListarCliente();

    $this->carregarViews('dash/dashboard', $dados);
}

    public function adicionar()
    {
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosCliente = array(
                'nome'           => $_POST['nome'] ?? '',
    'telefone'       => $_POST['telefone'] ?? '',
    'email'          => $_POST['email'] ?? '',
    'estado_id'      => $_POST['estado_id'] ?? '',
    'senha'          => password_hash($_POST['senha'] ?? '', PASSWORD_BCRYPT),
    'foto_cliente'   => null, // ou será preenchido após o upload
            );

            if (!empty($dadosCliente['nome']) && !empty($dadosCliente['telefone']) && !empty($dadosCliente['email'])) {
                if (isset($_FILES['foto_cliente']) && $_FILES['foto_cliente']['error'] === 0) {
                    $foto = $this->uploadFoto($_FILES['foto_cliente']);
                    $dadosCliente['foto_cliente'] = $foto;
                    $dadosCliente['foto_cliente'] = pathinfo($_FILES['foto_cliente']['name'], PATHINFO_FILENAME);
                }

                $this->clienteModel->addCliente($dadosCliente);
            }
        }

        $func = new Funcionario();
        $dados['func'] = $func->buscarFunc($_SESSION['userEmail']);

        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();

        $dados['listaCliente'] = $this->clienteModel->getContarCliente();
        $dados['conteudo'] = 'dash/cliente/adicionar';

        $this->carregarViews('dash/dashboard', $dados);
    }

    public function editar($id = null)
    {
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
            header('Location:' . BASE_URL);
            exit;
        }

        if ($id === null) {
            header('Location: ' . BASE_URL . 'cliente/listar');
            exit;
        }

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosCliente = array(
                'nome'         => $_POST['nome'] ?? '',
                'telefone'     => $_POST['telefone'] ?? '',
                'email'        => $_POST['email'] ?? '',
                'estado_id'    => $_POST['estado_id'] ?? '',
                'senha'        => password_hash($_POST['senha'] ?? '', PASSWORD_BCRYPT),
                'foto_cliente' => null // será preenchido se fizer upload
            );

            if (isset($_FILES['foto_cliente']) && $_FILES['foto_cliente']['error'] === 0) {
                $foto_cliente = $this->uploadFoto($_FILES['foto_cliente']);
                $dadosCliente['foto_cliente'] = $foto_cliente;
                $dadosCliente['foto_cliente'] = pathinfo($_FILES['foto_cliente']['name'], PATHINFO_FILENAME);
            }

             // Atualiza a foto apenas se uma nova foi enviada
             if ($foto_cliente) {
                $dadosCliente['foto_cliente'] = $foto_cliente;
                $dadosCliente['foto_cliente'] = $foto_cliente;
            }

            // Atualiza os dados no banco
            $atualizado = $this->clienteModel->atualizarCliente($id, $dadosCliente);

            if ($atualizado) {
                $_SESSION['mensagem'] = "Cliente atualizado com sucesso!";
                $_SESSION['tipo-msg'] = "Sucesso";
                header('location: https://agenciatipi02.smpsistema.com.br/visiontech/barbernac/public/cliente/listar');
                exit;
            } else {
                $dados['mensagem'] = "Erro ao atualizar o cliente";
                $dados['tipo-msg'] = "Erro";
            }
        } else {
            $dados['mensagem'] = "Preencha todos os campos obrigatórios!";
            $dados['tipo-msg'] = "Erro";
        }

        $dados['cliente'] = $this->clienteModel->getClienteById($id);

        $func = new Funcionario();
        $dados['func'] = $func->buscarFunc($_SESSION['userEmail']);

        $estado = new Estado();
        $dados['estados'] = $estado->getListarEstados();

        $dados['conteudo'] = 'dash/cliente/editar';

        $this->carregarViews('dash/dashboard', $dados);
    }

    private function uploadFoto($file)
    {
        $dir = '../public/uploads/cliente/';

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid() . '.' . $ext;

        if (move_uploaded_file($file['tmp_name'], $dir . $nome_arquivo)) {
            return 'cliente/' . $nome_arquivo;
        }

        return false;
    }
}

