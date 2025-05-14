<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}


define("BASE_URL","https://agenciatipi02.smpsistema.com.br/visiontech/barbernac/public/");


// Configuração do Data Base
define("DB_HOST", "smpsistema.com.br");
define("DB_NAME", "u283879542_barbernac");
define("DB_USER", "u283879542_barbernac");
define("DB_PASS", "Senac@barbernac01");

// Configuração do Email
define('HOTS_EMAIL', 'smtp.hostinger.com');
define('PORT_EMAIL', '465');
define('USER_EMAIL', 'innovaclicktipi02@smpsistema.com.br');
define('PASS_EMAIL', 'Senac@tipi02');


// Sistema de autoload das class
spl_autoload_register(function ($classe){

    if(file_exists('../app/controllers/' . $classe .'.php')){
                  //../app/controllers/HomeController.php
        require_once '../app/controllers/'. $classe .'.php';
    }

    if(file_exists('../app/models/'. $classe .'.php')){
        require_once '../app/models/'. $classe .'.php';
    }

    if(file_exists('../core/'. $classe .'.php')){
        require_once '../core/'. $classe .'.php';
        //var_dump($classe);
    }

});


