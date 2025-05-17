<?php

class AuthController extends Controller
{
    public function login()
    {

        $dados = array();


        var_dump($_SERVER['REQUEST_METHOD'] === 'POST');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha');

            if ($email && $senha) {

                $usuarioModel = new Cliente();
                $usuario      = $usuarioModel->buscarCliente($email);

                if ($usuario && $usuario['senha'] === $senha) {
                    $_SESSION['userId']           = $usuario['id'];
                    $_SESSION['userTipo']         = 'cliente';
                    $_SESSION['userNome']         = $usuario['nome'];
                    $_SESSION['userEmail']        = $usuario['email'];
                    $_SESSION['id_tipo_usuario']  = $usuario['id_tipo_usuario'];

                    header('Location: ' . BASE_URL . 'dashboard');
                    exit;
                }

                $usuarioModel = new Funcionario();
                $usuario      = $usuarioModel->buscarFunc($email);

                if ($usuario && $usuario['senha'] === $senha) {
                    $_SESSION['userId']           = $usuario['id'];
                    $_SESSION['userTipo']         = 'funcionario';
                    $_SESSION['userNome']         = $usuario['nome_funcionario'];
                    $_SESSION['userEmail']        = $usuario['email'];
                    $_SESSION['id_tipo_usuario']  = $usuario['id_tipo_usuario'];

                    header('Location: ' . BASE_URL . 'dashboard');
                    exit;
                }
                var_dump($usuario);
                $_SESSION['login-erro'] = 'E-mail ou senha incorretos';
            } else {
                $_SESSION['login-erro'] = 'Preencha todos os dados';
            }


            header('Location: ' . BASE_URL . '?login-erro=1');
            exit;
        }


        header('Location: ' . BASE_URL . '?login-erro=1');
        exit;
    }


    public function sair()
    {
        session_unset();
        session_destroy();
        header('Location:' . BASE_URL);
        exit;
    }
}
