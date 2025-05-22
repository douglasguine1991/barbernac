<?php

class FuncionarioController extends Controller
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
            $salario = filter_input(INPUT_POST, 'salario_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);

            $foto = $this->uploadFoto($_FILES['foto_funcionario']);

            if ($nome && $telefone && $cargo) {
                $dadosFuncionario = array(
                    'nome_funcionario' => $nome,
                    'telefone'         => $telefone,
                    'cargo'            => $cargo,
                    'foto_funcionario'             => $foto,
                    'salario_funcionario'             => $salario
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
            $_SESSION['mensagem'] = "ID do funcionário não informado!";
            $_SESSION['tipo-msg'] = "Erro";
            header('Location: ' . BASE_URL . 'funcionarios/listar');
            exit;
        }
    
        $dados = array();
    
        // Buscar funcionário existente
        $funcionario = $this->funcionarioModel->getFuncionarioById($id);
    
        if (!$funcionario) {
            $_SESSION['mensagem'] = "Funcionário não encontrado!";
            $_SESSION['tipo-msg'] = "Erro";
            header('Location: ' . BASE_URL . 'funcionarios/listar');
            exit;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Captura e sanitiza os dados
            $nome_funcionario       = filter_input(INPUT_POST, 'nome_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone               = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
            $cargo                  = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_SPECIAL_CHARS);
            $salario_funcionario    = filter_input(INPUT_POST, 'salario_funcionario', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $id_uf                  = filter_input(INPUT_POST, 'id_uf', FILTER_SANITIZE_NUMBER_INT);
            $email                  = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha                  = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo_funcionario       = filter_input(INPUT_POST, 'tipo_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $cpf_cnpj_funcionario   = filter_input(INPUT_POST, 'cpf_cnpj_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $status_funcionario     = filter_input(INPUT_POST, 'status_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
    
            // Verifica e faz upload da foto
            if (isset($_FILES['foto_funcionario']) && $_FILES['foto_funcionario']['error'] == 0) {
                $foto_funcionario = $this->uploadFoto($_FILES['foto_funcionario']);
            } else {
                $foto_funcionario = null;
            }
    
            // Verifica se os campos obrigatórios estão preenchidos
            if ($nome_funcionario && $telefone && $cargo && $email && $tipo_funcionario && $cpf_cnpj_funcionario) {
                $dadosFuncionario = array(
                    'nome_funcionario'      => $nome_funcionario,
                    'telefone'              => $telefone,
                    'cargo'                 => $cargo,
                    'salario_funcionario'   => $salario_funcionario,
                    'id_uf'                 => $id_uf,
                    'email'                 => $email,
                    'senha'                 => $senha ?: $funcionario['senha'], // Mantém senha antiga se não informada
                    'tipo_funcionario'      => $tipo_funcionario,
                    'cpf_cnpj_funcionario'  => $cpf_cnpj_funcionario,
                    'status_funcionario'    => $status_funcionario
                );
    
                // Atualiza a foto apenas se uma nova foi enviada
                if ($foto_funcionario) {
                    $dadosFuncionario['foto_funcionario'] = $foto_funcionario;
                }
    
                // Atualiza os dados no banco
                $atualizado = $this->funcionarioModel->atualizarFuncionario($id, $dadosFuncionario);
    
                if ($atualizado) {
                    $_SESSION['mensagem'] = "Funcionário atualizado com sucesso!";
                    $_SESSION['tipo-msg'] = "Sucesso";
                    header('Location: ' . BASE_URL . 'funcionarios/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao atualizar o funcionário.";
                    $dados['tipo-msg'] = "Erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios!";
                $dados['tipo-msg'] = "Erro";
            }
        }
    
        $dados['funcionario'] = $funcionario;
    
        // Buscar Funcionário logado
        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);
        $dados['func'] = $dadosFunc;
    
        // Buscar Estados
        $estado = new Estado();
        $dados['estados'] = $estado->getListarEstados();
    
        $dados['conteudo'] = 'dash/funcionario/editar';
    
        $this->carregarViews('dash/dashboard', $dados);
    }
    

    // 4- Método para desativar funcionário
    public function desativar($id = null)
    {
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
            header('Location:' . BASE_URL);
            exit;
        }

        if ($id === null) {
            header('Location: ' . BASE_URL . 'funcionario/listar');
            exit;
        }

        // Instancia o model se ainda não tiver
        if (!isset($this->funcionarioModel)) {
            $this->funcionarioModel = new Funcionario();
        }

        $resultado = $this->funcionarioModel->desativarFuncionario($id);

        if ($resultado) {
            $_SESSION['mensagem'] = "Funcionário desativado com sucesso!";
            $_SESSION['tipo-msg'] = "Sucesso";
        } else {
            $_SESSION['mensagem'] = "Erro ao desativar funcionário.";
            $_SESSION['tipo-msg'] = "Erro";
        }

        header('Location: ' . BASE_URL . 'funcionario/listar');
        exit;
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
