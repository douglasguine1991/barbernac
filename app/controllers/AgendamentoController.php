<?php

class AgendamentoController extends Controller
{
    private $agendamentoModel;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->agendamentoModel = new Agendamento();
    }

    public function listar()
    {
        $this->verificaAcesso('funcionario');

        $dados = [];

        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);

        $servico = new Servico();
        $dados['servicos'] = $servico->getTodosServicos();
        $dados['agendamentos'] = $this->agendamentoModel->getTodosAgendamentos();
        $dados['func'] = $dadosFunc;
        $dados['conteudo'] = 'dash/agendamento/listar';

        $this->carregarViews('dash/dashboard', $dados);
    }

    public function adicionar()
    {
        $this->verificaAcesso('cliente');

        $dados = ['conteudo' => 'dash/agendamento/adicionar'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente_id     = $_SESSION['userId'];
            $funcionario_id = filter_input(INPUT_POST, 'funcionario_id', FILTER_SANITIZE_NUMBER_INT);
            $servico_id     = filter_input(INPUT_POST, 'servico_id', FILTER_SANITIZE_NUMBER_INT);
            $horario_id     = filter_input(INPUT_POST, 'horario_id', FILTER_SANITIZE_NUMBER_INT);
            $status         = 'Agendado'; // padrão

            if ($cliente_id && $funcionario_id && $servico_id && $horario_id) {
                $dadosAgendamento = [
                    'cliente_id'     => $cliente_id,
                    'funcionario_id' => $funcionario_id,
                    'servico_id'     => $servico_id,
                    'horario_id'     => $horario_id,
                    'status'         => $status,
                ];

                $idAgendamento = $this->agendamentoModel->addAgendamento($dadosAgendamento);

                if ($idAgendamento) {
                    $_SESSION['mensagem'] = "Agendamento realizado com sucesso!";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location:' . BASE_URL . 'agendamento/adicionar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao realizar o agendamento.";
                    $dados['tipo-msg'] = "erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios.";
                $dados['tipo-msg'] = "erro";
            }
        }

        $dados['servicos'] = (new Servico())->getTodosServicos();
        //$dados['horarios'] = (new Horario())->getTodosHorarios(); // Certifique-se de ter esse método
        $dados['funcionarios'] = (new Funcionario())->getListarFuncionarios();

        $cliente = new Cliente();
        $dados['cliente'] = $cliente->buscarCliente($_SESSION['userEmail']);

        $this->carregarViews('dash/dashboard-cliente', $dados);
    }

    public function desativar($id = null)
    {
        $this->verificaAcesso('funcionario');

        if (!$id) {
            $this->respostaJson(false, "ID inválido.");
        }

        $resultado = $this->agendamentoModel->desativarAgendamento($id);

        if ($resultado) {
            $_SESSION['mensagem'] = "Agendamento cancelado com sucesso.";
            $_SESSION['tipo-msg'] = "sucesso";
            $this->respostaJson(true);
        } else {
            $_SESSION['mensagem'] = "Erro ao cancelar o agendamento.";
            $_SESSION['tipo-msg'] = "erro";
            $this->respostaJson(false, "Falha ao cancelar o agendamento.");
        }
    }

    public function filtrarAgendamentoPorServico($id = null)
    {
        $this->verificaAcesso('funcionario');

        $agendamentos = ($id == null || $id == 'todos')
            ? $this->agendamentoModel->getTodosAgendamentos()
            : $this->agendamentoModel->getAgendamentosPorServico($id);

        if (!empty($agendamentos)) {
            $this->respostaJson(true, null, ['agendamentos' => $agendamentos]);
        } else {
            $this->respostaJson(false, "Nenhum agendamento encontrado.");
        }
    }

    private function verificaAcesso($tipo)
    {
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== $tipo) {
            header('Location:' . BASE_URL);
            exit;
        }
    }

    private function respostaJson($sucesso, $mensagem = null, $dadosExtras = [])
    {
        header('Content-Type: application/json');
        $resposta = ['sucesso' => $sucesso];
        if ($mensagem !== null) {
            $resposta['mensagem'] = $mensagem;
        }
        echo json_encode(array_merge($resposta, $dadosExtras));
        exit;
    }
}
