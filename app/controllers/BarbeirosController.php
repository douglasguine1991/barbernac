<?php

class BarbeirosController extends Controller
{


    public function index()
    {

        $dados = array();

        $dados['mensagem'] = 'Bem-vindo a BarberNac';


        $this->carregarViews('barbeiros', $dados);
    }
}
