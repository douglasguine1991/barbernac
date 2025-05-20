<?php

class FuncionariosController extends Controller
{
    private $funcionarioModel;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->funcionarioModel = new Funcionario();
        
    }
    

    // 1- Método para listar todos os funcionários
    public function listar()
    {
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();
        $dados['listaFuncionario'] = $this->funcionarioModel->getListarFuncionarios();
        $dados['conteudo'] = 'dash/funcionario/listar';
        $this->carregarViews('dash/dashboard', $dados);
    }

    // 2- Método para adicionar funcionários
    public function adicionar()
    {
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = filter_input(INPUT_POST, 'nome_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
            $cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_SPECIAL_CHARS);

            $foto = $this->uploadFoto($_FILES['foto']);

            if ($nome && $telefone && $cargo) {
                $dadosFuncionario = array(
                    'nome_funcionario' => $nome,
                    'telefone'         => $telefone,
                    'cargo'            => $cargo,
                    'foto'             => $foto
                );

                $id_funcionario = $this->funcionarioModel->addFuncionario($dadosFuncionario);

                if ($id_funcionario) {
                    $_SESSION['mensagem'] = "Funcionário Adicionado com Sucesso!";
                    header('Location: ' . BASE_URL . 'funcionario/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao adicionar o Funcionário";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
            }
        }

        $dados['conteudo'] = 'dash/funcionario/adicionar';
        $this->carregarViews('dash/dashboard', $dados);
    }

    // 3- Método para editar funcionário
    public function editar($id = null)
{
    if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
        header('Location:' . BASE_URL);
        exit;
    }

    if ($id === null) {
        header('Location: ' . BASE_URL . 'funcionario/listar');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = filter_input(INPUT_POST, 'nome_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
        $cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_SPECIAL_CHARS);

        $foto = null;
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $foto = $this->uploadFoto($_FILES['foto']);
        }

        if ($nome && $telefone && $cargo) {
            $dadosFuncionario = array(
                'nome_funcionario' => $nome,
                'telefone'         => $telefone,
                'cargo'            => $cargo,
                'foto'             => $foto
            );

            $atualizado = $this->funcionarioModel->atualizarFuncionario($id, $dadosFuncionario);

            if ($atualizado) {
                $_SESSION['mensagem'] = "Funcionário atualizado com sucesso!";
                header('Location: ' . BASE_URL . 'funcionario/listar');
                exit;
            } else {
                $dados['mensagem'] = "Erro ao atualizar o funcionário";
            }
        } else {
            $dados['mensagem'] = "Preencha todos os campos obrigatórios!";
        }
    }

    // ✅ Aqui está o que estava faltando:
    $funcionario = $this->funcionarioModel->getFuncionarioById($id);
    $dados['funcionario'] = $funcionario;

    $dados['conteudo'] = 'dash/funcionario/editar';
    $this->carregarViews('dash/dashboard', $dados);
}

    // 4- Método para desativar funcionário
    public function desativar()
    {
        $dados = array();
        $dados['conteudo'] = 'dash/funcionario/desativar';
        $this->carregarViews('dash/dashboard', $dados);
    }

    // 5- Método para upload de fotos
    private function uploadFoto($file)
    {
        $dir = '../public/uploads/funcionario/';

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid() . '.' . $ext;
        $caminho_arquivo = $dir . $nome_arquivo;

        if (move_uploaded_file($file['tmp_name'], $caminho_arquivo)) {
            return 'funcionario/' . $nome_arquivo;
        }

        return false;
    }
}
