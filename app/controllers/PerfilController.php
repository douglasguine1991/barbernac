<?php
 
class PerfilController extends Controller
{
    private $perfilModel;
 
    public function __construct()
    {
 
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
 
        // Instaciar o modelo Servico
        $this->perfilModel = new Perfil();
    }
 
    public function exibir($id = null)
    {
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'cliente') {
            header('Location:' . BASE_URL);
            exit;
        }
 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Captura e sanitiza os dados do formulário
            $nome       = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email      = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha      = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone   = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_nasc_cliente  = filter_input(INPUT_POST, 'data_nasc_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $cpf_cnpj_cliente   = filter_input(INPUT_POST, 'cpf_cnpj_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $foto_cliente = filter_input(INPUT_POST, 'foto_cliente', FILTER_SANITIZE_NUMBER_INT);
            $id_uf                  = filter_input(INPUT_POST, 'id_uf', FILTER_SANITIZE_NUMBER_INT);
            $status_cliente     = filter_input(INPUT_POST, 'status_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
       
            if ($nome && $email && $senha && $telefone) {
                $dadoscliente = array(
                    'nome'      => $nome,
                    'email'     => $email,
                    'senha'     => $senha,
                    'telefone'  => $telefone,
                    'data_nasc_cliente' => $data_nasc_cliente,
                    'cpf_cnpj_cliente'  => $cpf_cnpj_cliente,
                    'foto_cliente'      => $foto_cliente    ,
                    'id_uf'             => $id_uf,
                    'status_cliente'    => $status_cliente,
                );
       
                $id_cliente = $this->perfilModel->atualizarCliente($id, $dadoscliente);
       
                if ($id_cliente) {
                    if (isset($_FILES['foto_cliente']) && $_FILES['foto_cliente']['error'] == 0) {
                        $arquivo = $this->uploadFoto($_FILES['foto_cliente']);
                        if ($arquivo) {
                            // Inserir na galeria
                            // $this->clienteModel->uploadFoto($id_cliente, $arquivo, $nome_cliente);
                        } else {
                            // Definir uma mensagem informando que não pode ser salva
                        }
                    }
       
                    // Mensagem de SUCESSO
                    $_SESSION['mensagem'] = "Funcionário Atualizado com Sucesso";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location:<?= BASE_URL ?>cliente/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao atualizar funcionário";
                    $dados['tipo-msg'] = "erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
                $dados['tipo-msg'] = "erro";
            }
        }
 
       
 
 
        // $perfil = $this->perfilModel->getPerfilById($id);
        // $dados['perfil'] = $perfil;
       
 
        $dados = array();
 
 
 
        $cliente = new Cliente();
        $dadoscliente = $cliente->buscarCliente($_SESSION['userEmail']);
        $dados['cliente'] = $dadoscliente;
 
        $perfil = new Perfil();
        $dados['perfil'] = $perfil->getPerfil();
 
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();

        $dados['conteudo'] = 'dash/perfil/exibir';
 
        if($_SESSION['userTipo'] == 'cliente'){
            $cliente = new Cliente();
            $dadoscliente = $cliente->buscarcliente($_SESSION['userEmail']);
            $dados['cliente'] = $dadoscliente;
            $this->carregarViews('dash/dashboard-cliente', $dados);
 
        }else if($_SESSION['userTipo'] == 'funcionario'){
            $func = new Funcionario();
            $dadosfunc = $func->buscarFunc($_SESSION['userEmail']);
            $dados['titulo']        = 'Dashboard - Barbernac';
            $dados['func'] = $dadosfunc;
 
 
            $dados['conteudo'] = 'dash/perfil/exibir';
           
            $this->carregarViews('dash/dashboard', $dados);
 
 
        }
 
 
 
 
       
       
    }
   
    private function uploadFoto($file)
    {
        $dir = '../public/uploads/cliente/';
 
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }
 
 
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nome_arquivo = '.' . $ext;
 
 
        if (move_uploaded_file($file['tmp_name'], $dir . $nome_arquivo)) {
            return 'cliente/' . $nome_arquivo;
        }
        return false;
    }
   
}