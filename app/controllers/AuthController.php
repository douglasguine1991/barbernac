<?php

class AuthController extends Controller
{
    public function login()
    {
 
        $dados = array();
 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
            $email          = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha          = filter_input(INPUT_POST, 'senha');
            $tipo_usuario   = filter_input(INPUT_POST, 'tipo_usuario');
 
            if ($email && $senha && $tipo_usuario != "Selecione") {
 
                if ($tipo_usuario === 'cliente') {
                    $usuarioModel   = new Cliente();
                    $usuario        = $usuarioModel->buscarCliente($email);
                    $campoSenha     = 'senha';
                    $campoId        = 'id';
                    $campoNome      = 'nome';
                    $campoEmail     = 'email';
                } elseif ($tipo_usuario === 'funcionario') {
                    $usuarioModel = new Funcionario();
                    $usuario = $usuarioModel->buscarFunc($email);
                    $campoSenha     = 'senha';
                    $campoId        = 'id';
                    $campoNome      = 'nome';
                    $campoEmail     = 'email';
                } else {
                    $usuario = null;
                }
 
                if ($usuario && $usuario[$campoSenha] === $senha) {
 
                   
                    $_SESSION['userId']     = $usuario[$campoId];
                    $_SESSION['userTipo']   = $tipo_usuario;
                    $_SESSION['userNome']   = $usuario[$campoNome];
                    $_SESSION['userEmail']  = $usuario[$campoEmail];
 
 
                    //Redirecionar para a página de Dashboard
                   
 
 
                    header('Location:' . BASE_URL . 'dashboard');
                    exit;
                } else {
                    $_SESSION['login-erro'] = 'E-mail ou Senha incorretos';
                }
            } else {
                //Credenciais inválidas - Dados incompletos
                $_SESSION['login-erro'] = 'Preencha todos os dados';
            }
            header('Location: ' . BASE_URL . '?login-erro=1');
            exit;
        }
 
        // Se o método não for POST
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