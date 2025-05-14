<?php

class ErroController extends Controller{

    public function index(){


    $dados = array();
    $dados['titulo'] = 'Erro - barbernac';

   
    $this->carregarViews('erro',$dados);

    }
}