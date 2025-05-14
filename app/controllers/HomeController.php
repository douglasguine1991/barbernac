<?php

class HomeController extends Controller
{


    public function index()
    {

        $dados = array();

        $dados['mensagem'] = 'Bem-vindo a BarberNac';

         // Instaciar o modelo Servico
         $servicoModel = new Servico();
         // Obter os 3 servicos
         $servicoAleatorio = $servicoModel->getServicoAleatorio(3);
         $dados['servicos'] = $servicoAleatorio; 


         // Instaciar o modelo Servico
         $funcionarioModel = new Funcionario();
         // Obter os 3 servicos
         $funcionario = $funcionarioModel->getListarFuncionarios();
         $dados['funcionarios'] = $funcionario; 
      
        //var_dump($dados['contarClientes']);

        $this->carregarViews('home', $dados);
    }


}
