<?php

class Controller {

    public function carregarViews($view, $dados = array()) {
        extract($dados);

        $caminhoView = '../app/views/' . $view . '.php';

        if (file_exists($caminhoView)) {
            require $caminhoView;
        } else {
            require '../app/views/template/erro.php';
        }
    }
}