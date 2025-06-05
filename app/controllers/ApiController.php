<?php
require_once __DIR__ . '../../../core/TokenHelper.php';
class ApiController extends Controller
{
    private $servicoModel;
    private $clienteModel;
    private $agendamentoModel;
 
    public function __construct()
    {
        $this->servicoModel     = new Servico();
        $this->clienteModel     = new Cliente();
        $this->agendamentoModel = new Agendamento();
    }
 
    public function index()
    {
        $dados = array();
        $dados['titulo'] = 'Área de Atuação - Barbernac';
 
 
        $this->carregarViews('api',$dados);
    }
 
    /**
     * Obtém o cabeçalho Authorization de forma segura
     */
    private function getAuthorizationHeader()
    {
        if (!empty($_SERVER['HTTP_AUTHORIZATION'])) {
            return trim($_SERVER['HTTP_AUTHORIZATION']);
        }
 
        if (!empty($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
            return trim($_SERVER['REDIRECT_HTTP_AUTHORIZATION']);
        }
 
        if (function_exists('getallheaders')) {
            $headers = getallheaders();
            foreach ($headers as $key => $value) {
                if (strtolower($key) === 'authorization') {
                    return trim($value);
                }
            }
        }
 
        return null;
    }
 
    /**
     * Valida e decodifica o token
     */
    private function autenticarToken()
    {
       
        try {
            $authHeader = $this->getAuthorizationHeader();
           
            if (!$authHeader || !preg_match('/Bearer\s+(.+)/', $authHeader, $matches)) {
                http_response_code(401);
                echo json_encode(['erro' => 'Token não fornecido ou malformado.']);
                exit;
            }
           
            $token = trim($matches[1]);
 
            if (!$token || strpos($token, '.') === false) {
                http_response_code(401);
                echo json_encode(['erro' => 'Token inválido ou incompleto.']);
                exit;
            }
           
            $TokenHelper = new TokenHelper();
           
            $dados = $TokenHelper::validar($token);
 
            if (!$dados || !isset($dados['id'], $dados['email'])) {
                http_response_code(401);
                echo json_encode(['erro' => 'Token inválido ou expirado.']);
                exit;
            }
 
            $cliente = $this->clienteModel->buscarCliente($dados['email']);
 
            if (!$cliente || $cliente['id'] != $dados['id']) {
                http_response_code(403);
                echo json_encode(['erro' => 'Acesso negado.']);
                exit;
            }
 
            return $cliente;
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro interno: ' . $e->getMessage()]);
            exit;
        }
    }
 
    /**
     * Endpoint de login que gera token
     */
    public function login()
    {
        $email = $_GET['email'] ?? null;
        $senha = $_GET['senha'] ?? null;
 
        if (!$email || !$senha) {
            http_response_code(400);
            echo json_encode(['erro' => 'E-mail ou senha são obrigatórios'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
 
        $cliente = $this->clienteModel->buscarCliente($email);
 
        if (!$cliente || $senha !== $cliente['senha']) {
            http_response_code(401);
            echo json_encode(['erro' => 'E-mail ou senha inválidos'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
 
        $dadosToken = [
            'id'    => $cliente['id'],
            'email' => $cliente['email'],
            'exp'   => time() + 3600 // 1 hora de validade
        ];
 
        $token = TokenHelper::gerar($dadosToken);
        //var_dump($token);
        //var_dump(TokenHelper::validar($token));
 
        if (!class_exists('TokenHelper')) {
            die('TokenHelper não foi carregado!');
        }
 
        echo json_encode([
            'mensagem' => 'Login realizado com sucesso',
            'token'    => $token
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
 
    /**
     * Lista todos os serviços
     */
    public function listarServico()
    {
 
        if (empty($servicos)) {
            http_response_code(403);
            echo json_encode(['mensagem' => 'Nenhum serviço encontrado.']);
            return;
        }

        // Busca os dados completos do cliente no banco
        $dados = $this->servicoModel->getTodosServicos();
 
        echo json_encode($servicos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

 
    /**
     * Retorna dados do cliente autenticado
     */
    public function buscarCliente($id)
    {
        try {
 
 
            $cliente = $this->autenticarToken(); 
           
 
            // Verifica se o token está válido e pertence ao cliente requisitado
            if (!$cliente || !isset($cliente['id']) || $cliente['id'] != $id) {
                http_response_code(403);
                echo json_encode(['erro' => 'Acesso negado.']);
                return;
            }
 
            // Busca os dados completos do cliente no banco
            $dados = $this->clienteModel->getClienteById($id);
             

            if (!$dados) {
                http_response_code(404);
                echo json_encode(['erro' => 'Cliente nao encontrado']);
                return;
            }
            // echo $dados['nome'];
            // exit;
 
            echo json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'erro' => 'Erro interno no servidor',
                'detalhe' => $e->getMessage()
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }
 
 
    /**
     * Atualiza os dados do cliente autenticado
     */
    public function atualizarCliente($id)
    {
        $cliente = $this->autenticarToken();
        if (!$cliente || $cliente['id'] != $id) {
            http_response_code(403);
            echo json_encode(['erro' => 'Acesso negado.']);
            return;
        }
 
        if ($_SERVER['REQUEST_METHOD'] !== 'PATCH') {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido.']);
            return;
        }
 
        $dados = json_decode(file_get_contents('php://input'), true) ?? $_POST;
 
        if (!is_array($dados) || empty($dados)) {
            http_response_code(400);
            echo json_encode(['erro' => 'Nenhum dado enviado.']);
            return;
        }
 
        $dadosAtualizados = array_merge($cliente, $dados);
 
        if (!empty($_FILES['foto_cliente']['name'])) {
            $foto = $this->uploadFoto($_FILES['foto_cliente'], $cliente['nome'], $id);
            if ($foto) {
                $dadosAtualizados['foto_cliente'] = $foto;
                $dadosAtualizados['foto_cliente'] = $cliente['nome'];
            }
        }
 
        if ($this->clienteModel->atualizarCliente($id, $dadosAtualizados)) {
            echo json_encode(['mensagem' => 'Dados atualizados com sucesso.']);
        } else {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao atualizar os dados.']);
        }
    }
 
    /**
     * Upload da foto do cliente
     */
    private function uploadFoto($file, $nome, $id)
    {
        $dir = '../public/uploads/cliente/';
        $nomeLimpo = strtolower(trim(preg_replace('/[^a-zA-Z0-9]/', '-', iconv('UTF-8', 'ASCII//TRANSLIT', $nome))));
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $arquivo = "{$nomeLimpo}-{$id}.{$ext}";
 
        if (!file_exists($dir)) mkdir($dir, 0755, true);
 
        return move_uploaded_file($file['tmp_name'], $dir . $arquivo) ? "cliente/{$arquivo}" : false;
    }

    public function agendamentosPorCliente($id)
    {
        $cliente = $this->autenticarToken();
        if (!$cliente || $cliente['id_cliente'] != $id) {
            http_response_code(403);
            echo json_encode(['erro' => 'Acesso negado.']);
            return;
        }
    
}

public function listarAgendamento()
{
    $agendamento = $this->agendamentoModel->getTodosAgendamentos();

    if (empty($agendamento)) {
        http_response_code(404);
        echo json_encode(['mensagem' => 'Nenhum serviço encontrado.']);
        return;
    }

    echo json_encode($agendamento, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

}