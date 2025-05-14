<?php


class DepoimentoController extends Controller
{
    private $depoimentoModel;
    public function __construct()
    {
 
       if (session_status() == PHP_SESSION_NONE) {
          session_start();
       }
 
       // Instaciar o modelo Servico
       $this->depoimentoModel = new Depoimento();
    }
    public function listar()
    {
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();
        $dados['conteudo'] = 'dash/depoimento/listar';

        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);
        $dados['func'] = $dadosFunc;

        $depoimento = new Depoimento();
        $dadosdepoimento = $depoimento->getTodosDepoimentos();
        $dados['conteudo'] = 'dash/depoimento/listar';
        $dados['depoimento'] = $dadosdepoimento;

        $this->carregarViews('dash/dashboard', $dados);
    

    }
    public function adicionar(){

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {

            header('Location:' . BASE_URL);
            exit;
        }


        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $cliente_id       = filter_input(INPUT_POST, 'cliente_id',       FILTER_SANITIZE_NUMBER_INT);
$comentario       = filter_input(INPUT_POST, 'comentario',       FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nota             = filter_input(INPUT_POST, 'nota',             FILTER_SANITIZE_NUMBER_INT);
$data_depoimento  = filter_input(INPUT_POST, 'data_depoimento',  FILTER_SANITIZE_FULL_SPECIAL_CHARS); // ou gerar com date()


if ($comentario && $nota && $data_depoimento) {

    $dadosDepoimento = array(
        'cliente_id'      => $cliente_id,
        'comentario'      => $comentario,
        'nota'            => $nota,
        'data_depoimento' => $data_depoimento
            );

            $id_cliente = $this->depoimentoModel->addDepoimento($dadosDepoimento);
        }

       }
       
        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);

        $depoimentoModel = new Cliente();
        $cliente = $depoimentoModel->getListarCliente();
        $dados['clientes'] = $cliente;

        $dados['conteudo'] = 'dash/depoimento/adicionar';
        $dados['func'] = $dadosFunc;

        $this->carregarViews('dash/dashboard', $dados);

    }
    
}