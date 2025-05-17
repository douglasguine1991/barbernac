<?php

class DashboardController extends Controller
{


    public function index()
    {

    
        $dados = array();

        $func = new Funcionario();
        $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);

        $dados['titulo']        = 'Dashboard - BarberNac';
        $dados['func'] = $dadosFunc;

        if ($_SESSION['id_tipo_usuario'] == '2') {
            $cliente = new Cliente();
            $dadosCliente = $cliente->buscarCliente($_SESSION['userEmail']);
            $dados['titulo']        = 'Perfil';
            $dados['cliente'] = $dadosCliente;

            $this->carregarViews('dash/dashboard-cliente', $dados);
        } else if ($_SESSION['id_tipo_usuario'] == '1') {
            $func = new Funcionario();
            $dadosFunc = $func->buscarFunc($_SESSION['userEmail']);
            $dados['titulo']        = 'Dashboard - Funcionário';
            $dados['func'] = $dadosFunc;
            $this->carregarViews('dash/dashboard', $dados);
        }
    }
}
