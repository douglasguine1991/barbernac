<?php

class Model{

    protected $db;

    public function __construct()
    {
        try {
            // Criar a conexão com o banco de dados
                              //'mysql:dbname=test;host=localhost', 'root', ''
            $this->db = new PDO('mysql:dbname='. DB_NAME .';host='. DB_HOST, DB_USER, DB_PASS);

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Falha de conexão: " . $e->getMessage();
        }
        
    }

}