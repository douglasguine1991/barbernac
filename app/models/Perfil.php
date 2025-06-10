<?php

class Perfil extends Model

{
    public function buscarCliente($email)
    {

        $sql = "SELECT * FROM clientes; WHERE email = :email AND status_cliente = 'Ativo'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
     
    public function getPerfil()
    {

        $sql = "SELECT * FROM clientes";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarCliente($id, $dados)
    {
        $sql = "UPDATE clientes SET
            nome = :nome,
            email = :email,
            senha = :senha,
            telefone = :telefone,
            foto_cliente = :foto_cliente,
            id_uf = :id_uf
        WHERE id = :id";
    
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $dados['nome']);
        $stmt->bindValue(':email', $dados['email']);
        $stmt->bindValue(':senha', $dados['senha']);
        $stmt->bindValue(':telefone', $dados['telefone']);
        $stmt->bindValue(':foto_cliente', $dados['foto_cliente']);
        $stmt->bindValue(':id_uf', $dados['id_uf'], PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
        return $stmt->execute();
    }
    
    public function getClienteById($id)
    {

        $sql = "SELECT * FROM clientes
            where id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
