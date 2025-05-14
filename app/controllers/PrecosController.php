<?php

class PrecosController extends Controller{


        public function index(){

            $dados = array();
            $dados['titulo'] = 'Preços - BarberNac';

            $this->carregarViews('precos',$dados);

        }


}