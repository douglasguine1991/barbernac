<?php

class Contato extends Model
{

    //Salvar o email na base de dados
    public function salvarEmail($assunto, $nome, $email, $tel, $msg){

        $sql = "INSERT INTO tbl_contato(assunto_contato, nome_contato, email_contato, telefone_contato, mensagem_contato)
                VALUE (:assuntoContato, :nomeContato, :emailContato, :telContato, :mensContato)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':assuntoContato', $assunto);
        $stmt->bindValue(':nomeContato', $nome);
        $stmt->bindValue(':emailContato', $email);
        $stmt->bindValue(':telContato', $tel);
        $stmt->bindValue(':mensContato', $msg);

        return $stmt->execute();
    }


    public function emails_contatos(){

        $sql = "SELECT * FROM tbl_contato";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


  
}
