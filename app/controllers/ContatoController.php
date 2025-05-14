<?php

class ContatoController extends Controller
{
    private $contatos_emails;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->contatos_emails = new Contato();
    }

    public function index()
    {
        $dados = array();

        $dados['nome'] = 'cheguei aqui';

        $this->carregarViews('contato', $dados);
    }

    public function enviarEmail()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
            $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_SPECIAL_CHARS);
            $msg = filter_input(INPUT_POST, 'ajudar', FILTER_SANITIZE_SPECIAL_CHARS);
            
            $msg = str_replace(["\r", "\n"], ' ', $msg);
            $msg = str_replace('&#13;&#10;', "\n", $msg);

            if ($nome && $email && $tel && $msg) {

                $contatoModel = new Contato();
                $salvar = $contatoModel->salvarEmail($assunto, $nome, $email, $tel, $msg);

                if ($salvar) {
                    require_once("vendors/phpmailer/PHPMailer.php");
                    require_once("vendors/phpmailer/SMTP.php");
                    require_once("vendors/phpmailer/Exception.php");

                    try {
                        $phpmail = new PHPMailer\PHPMailer\PHPMailer();

                        $phpmail->isSMTP();
                        $phpmail->SMTPDebug = 0;
                        $phpmail->Host = HOTS_EMAIL;
                        $phpmail->Port = PORT_EMAIL;
                        $phpmail->SMTPSecure = 'ssl';
                        $phpmail->SMTPAuth = true;
                        $phpmail->Username = USER_EMAIL;
                        $phpmail->Password = PASS_EMAIL;
                        $phpmail->IsHTML(true);
                        $phpmail->setFrom(USER_EMAIL, 'Contato do site');
                        $phpmail->addAddress(USER_EMAIL, 'Atendimento');

                        $phpmail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );

                        $phpmail->CharSet = 'UTF-8';
                        $phpmail->Encoding = 'base64';

                        $phpmail->Subject = '📩 Novo Contato Recebido - Guloseimas do Olimpo';
                        $phpmail->msgHTML("
                            <h2 style='color:#E44D26;'>📩 Novo Contato Recebido!</h2>
                            <p>Olá, equipe! Vocês acabaram de receber uma nova mensagem pelo site.</p>
                            <h3>🔹 Detalhes do contato:</h3>
                            <ul>
                                <li><strong>📛 Nome:</strong> $nome</li>
                                <li><strong>✉️ E-mail:</strong> $email</li>
                                <li><strong>📞 Telefone:</strong> $tel</li>
                                <li><strong>📝 Mensagem:</strong> $msg</li>
                            </ul>
                            <p>🚀 Entre em contato o mais rápido possível para garantir um ótimo atendimento!</p>
                            <p>Atenciosamente,<br><strong>Equipe Guloseimas do Olimpo</strong></p>
                        ");
                        $phpmail->AltBody = "📩 Novo Contato Recebido!\n\nNome: $nome\nE-mail: $email\nTelefone: $tel\nMensagem: $msg";

                        $phpmail->send();

                        $phpmail->clearAddresses();
                        $phpmail->addAddress($email, $nome);

                        $phpmail->Subject = '🎉 Sua mensagem foi recebida! - Guloseimas do Olimpo';
                        $phpmail->msgHTML("
                            <h2 style='color:#E44D26;'>🎉 Olá, $nome!</h2>
                            <p>Recebemos sua mensagem e nossa equipe está ansiosa para atendê-lo!</p>
                            <h3>📌 Resumo da sua mensagem:</h3>
                            <ul>
                                <li><strong>📛 Nome:</strong> $nome</li>
                                <li><strong>✉️ E-mail:</strong> $email</li>
                                <li><strong>📞 Telefone:</strong> $tel</li>
                                <li><strong>📝 Sua mensagem:</strong> $msg</li>
                            </ul>
                            <p>⏳ Responderemos o mais rápido possível! Enquanto isso, fique à vontade para explorar nosso site e conferir as novidades.</p>
                            <p>💌 Caso precise de algo urgente, entre em contato conosco diretamente.</p>
                            <p>Atenciosamente,<br><strong>Equipe Guloseimas do Olimpo</strong></p>
                        ");
                        $phpmail->AltBody = "🎉 Olá, $nome!\n\nRecebemos sua mensagem e nossa equipe está ansiosa para atendê-lo!\n\nResumo da sua mensagem:\nNome: $nome\nE-mail: $email\nTelefone: $tel\nMensagem: $msg\n\nResponderemos o mais rápido possível!\n\nAtenciosamente,\nEquipe Guloseimas do Olimpo";

                        $phpmail->send();

                        header('Location: ' . BASE_URL);
                        exit;

                    } catch (Exception $e) {
                        error_log('Erro ao enviar o email: ' . $phpmail->ErrorInfo);
                        header('Location: ' . BASE_URL);
                        exit;
                    }
                }
            }
        }

        header('Location: ' . BASE_URL);
        exit;
    }

    public function contato()
    {
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'Funcionario') {
            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();
        $dados['listarEmails'] = $this->contatos_emails->emails_contatos();
        $dados['conteudo'] = 'dash/contato/contato';

        $this->carregarViews('dash/dashboard', $dados);
    }
}
