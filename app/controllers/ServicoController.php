<?php

class ServicoController extends Controller
{

    private $servicoModel;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instanciar o modelo Servico
        $this->servicoModel = new Servico();
    }

    // FRONT-END: Carregar a lista de serviços
    public function index()
    {
        $dados = array();
        $dados['titulo'] = 'Serviços - BarberNac';

        // Obter todos os serviços com fotos
        $dados['servico'] = $this->servicoModel->getTodosServicosComFoto();
        $this->carregarViews('servico', $dados);
    }

    // FRONT-END: Carregar o detalhe do serviço
    public function detalhe($link)
    {
        $dados = array();

        $detalheServico = $this->servicoModel->getServicoPorLink($link);

        if ($detalheServico) {
            $dados['titulo'] = $detalheServico['nome_servico'];
            $dados['detalhe'] = $detalheServico;
            $this->carregarViews('detalhe-servicos', $dados);
        } else {
            $dados['titulo'] = 'Serviços Barbernac';
            $this->carregarViews('servico', $dados);
        }
    }

    // ###############################################
    // BACK-END - DASHBOARD
    #################################################//

    // 1- Método para listar todos os serviços
    public function listar()
    {
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();
        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);

        $dados['listaServico'] = $this->servicoModel->getListarServicos();
        $dados['conteudo'] = 'dash/servico/listar';
        $dados['func'] = $dadosFunc;
        $this->carregarViews('dash/dashboard', $dados);
    }

    // 2- Método para adicionar serviços
    public function adicionar()
    {
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // TBL SERVICO
            $nome_servico = filter_input(INPUT_POST, 'nome_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao_servico = filter_input(INPUT_POST, 'descricao_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $preco_base_servico = filter_input(INPUT_POST, 'preco_base_servico', FILTER_SANITIZE_NUMBER_FLOAT);
            $tempo_estimado_servico = filter_input(INPUT_POST, 'tempo_estimado_servico');
            $status_servico = filter_input(INPUT_POST, 'status_servico', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($nome_servico && $descricao_servico && $preco_base_servico !== false) {
                // 1 Link do Servico 
                $link_servico = $this->gerarLinkServico($nome_servico);

                // 2 Preparar Dados 
                $dadosServico = array(
                    'nome_servico' => $nome_servico,
                    'descricao_servico' => $descricao_servico,
                    'preco_base_servico' => $preco_base_servico,
                    'tempo_estimado_servico' => $tempo_estimado_servico,
                    'status_servico' => $status_servico,
                    'link_servico' => $link_servico
                );

                // 3 Inserir Servico 
                $id_servico = $this->servicoModel->addServico($dadosServico);


                if ($id_servico) {
                    if (isset($_FILES['foto_galeria']) && $_FILES['foto_galeria']['error'] == 0) {

                        $arquivo = $this->uploadFoto($_FILES['foto_galeria'], $link_servico);


                        if ($arquivo) {
                            //Inserir na galeria

                            $this->servicoModel->addFotoGaleria($id_servico, $arquivo, $nome_servico);
                        } else {
                            //Definir uma mensagem informando que não pode ser salva
                        }
                    }

                    //Mensagem de sucesso
                    $_SESSION['mensagem'] = "Serviço Adicionado Com Sucesso!";
                    $_SESSION['tipo-msg'] = "Sucesso";
                    header('location: https://agenciatipi02.smpsistema.com.br/visiontech/barbernac/public/servico/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao adicionar o Serviço";
                    $dados['tipo-msg'] = "Erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos OBRIGATÓRIOS";
                $dados['tipo-msg'] = "Erro";
            }
        }

        // Buscar Funcionários 
        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);

        $dados['conteudo'] = 'dash/servico/adicionar';
        $dados['func'] = $dadosFunc;

        $this->carregarViews('dash/dashboard', $dados);
    }


    // 3- Método para editar
    public function editar($id = null)
    {
        $dados = array();

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
            header('Location:https://agenciatipi02.smpsistema.com.br/visiontech/barbernac/public/');
            exit;
        }

        if ($id === null) {
            header('Location:https://agenciatipi02.smpsistema.com.br/visiontech/barbernac/public/servico/listar');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome_servico = filter_input(INPUT_POST, 'nome_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao_servico = filter_input(INPUT_POST, 'descricao_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $preco_base_servico = filter_input(INPUT_POST, 'preco_base_servico', FILTER_SANITIZE_NUMBER_FLOAT);
            $tempo_estimado_servico = filter_input(INPUT_POST, 'tempo_estimado_servico');
            $alt_foto_servico = $nome_servico;
            $status_servico = filter_input(INPUT_POST, 'status_servico', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($nome_servico && $descricao_servico && $preco_base_servico !== false) {
                $link_servico = $this->gerarLinkServico($nome_servico);

                $dadosServico = array(
                    'nome_servico' => $nome_servico,
                    'descricao_servico' => $descricao_servico,
                    'preco_base_servico' => $preco_base_servico,
                    'tempo_estimado_servico' => $tempo_estimado_servico,
                    'alt_foto_servico' => $alt_foto_servico,
                    'status_servico' => $status_servico,
                    'link_servico' => $link_servico
                );

                $id_servico = $this->servicoModel->atualizarServico($id, $dadosServico);

                if ($id_servico) {
                    if (isset($_FILES['foto_galeria']) && $_FILES['foto_galeria']['error'] == 0) {
                        $arquivo = $this->uploadFoto($_FILES['foto_galeria'], $link_servico);
                        if ($arquivo) {
                            $this->servicoModel->atualizarFotoGaleria($id, $arquivo, $nome_servico);
                        }
                    }

                    $_SESSION['mensagem'] = "Serviço Atualizado Com Sucesso!";
                    $_SESSION['tipo-msg'] = "Sucesso";
                    header('location: https://agenciatipi02.smpsistema.com.br/visiontech/barbernac/public/servico/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao atualizar o Serviço";
                    $dados['tipo-msg'] = "Erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos OBRIGATÓRIOS";
                $dados['tipo-msg'] = "Erro";
            }
        }

        $servico = $this->servicoModel->getServicoById($id);
        $dados['servico'] = $servico;

        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);

        $dados['conteudo'] = 'dash/servico/editar';
        $dados['func'] = $dadosFunc;

        $this->carregarViews('dash/dashboard', $dados);
    }


    // 4- Método para desativar o serviço
    public function desativar($id)
    {
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'funcionario') {
            header('Location:' . BASE_URL);
            exit;
        }

        if ($id) {
            $resultado = $this->servicoModel->desativarServico($id);

            if ($resultado) {
                $_SESSION['mensagem'] = "Servico desativado com sucesso!";
                $_SESSION['tipo-msg'] = "Sucesso";
            } else {
                $_SESSION['mensagem'] = "Erro ao desativar cliente.";
                $_SESSION['tipo-msg'] = "Erro";
            }
        }

        header('Location: ' . BASE_URL . 'servico/listar');
        exit;
    }



    // 5 metodo upload das fotos
    private function uploadFoto($file, $link_servico)
    {
        $dir = '../public/uploads/servico/';

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid() . '.' . $ext;

        // Caminho completo para salvar o arquivo
        $caminho_arquivo = $dir . $nome_arquivo;

        // Move o arquivo para o diretório
        if (move_uploaded_file($file['tmp_name'], $caminho_arquivo)) {
            return 'servico/' . $nome_arquivo; // Caminho relativo
        }

        // Retorna falso caso o upload falhe
        return false;
    }

    // Método para gerar link serviço 
    public function gerarLinkServico($nome_servico)
    {
        //Remover os acentos
        $semAcento = iconv('UTF-8', 'ASCII//TRANSLIT', $nome_servico);

        // Substituir qualquer caracter que não seja letra ou numero por hifen
        $link = strtolower(trim(preg_replace('/[^a-zA-Z0-9]/', '-', $semAcento)));

        // Verifica se ja existe no banco
        $contador = 1;
        $link_original = $link;
        while ($this->servicoModel->existeEsseServico($link)) {
            $link = $link_original . '-' . $contador;
            $contador++;
        }

        return $link;
    }
} //FIM DA CLASSE