<?php

class SobreController extends Controller{


        public function index(){

            $dados = array();
            $dados['titulo'] = 'Sobre Nós - BarberNac';

            $this->carregarViews('sobre',$dados);

        }


}