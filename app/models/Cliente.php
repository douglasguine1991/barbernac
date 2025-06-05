<?php

class Cliente extends Model
{


    public function buscarCliente($email)
    {

        $sql = "SELECT * FROM clientes WHERE email = :email AND status_cliente = 'Ativo'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        return null;
    }

    // Contar a quantidade de clientes 
    public function getContarCliente()
    {

        $sql = "SELECT COUNT(*) AS total_clientes FROM clientes";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function getidCliente()
    {
        $sql = "SELECT * FROM clientes ORDER BY id ASC";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getListarCliente()
    {
        $sql = "SELECT * FROM clientes WHERE status_cliente = 'Ativo'";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCliente($dados)
    {
        $sql = "INSERT INTO clientes (
    nome,
    telefone,
    foto_cliente,
    email,
    estado_id,
    senha
) VALUES (
    :nome,
    :telefone,
    :foto_cliente,
    :email,
    :estado_id,
    :senha
    
)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome', $dados['nome']);
        $stmt->bindValue(':telefone', $dados['telefone']);
        $stmt->bindValue(':foto_cliente', $dados['foto_cliente']);
        $stmt->bindValue(':email', $dados['email']);
        $stmt->bindValue(':estado_id', $dados['estado_id']);
        $stmt->bindValue(':senha', $dados['senha']);

        $stmt->execute();
    }


    public function atualizarCliente($id, $dados)
    {
        $sql = "UPDATE clientes SET
        nome = :nome,
        telefone = :telefone,
        foto_cliente = :foto_cliente,
        email = :email,
        id_uf = :id_uf,
        senha = :senha
        WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome', $dados['nome']);
        $stmt->bindValue(':telefone', $dados['telefone']);
        $stmt->bindValue(':foto_cliente', $dados['foto_cliente']);
        $stmt->bindValue(':email', $dados['email']);
        $stmt->bindValue(':id_uf', $dados['id_uf']);
        $stmt->bindValue(':senha', $dados['senha']);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }


    // Método para buscar os dados de Cliente de acordo com o ID
    public function getClienteById($id)
    {
        $sql = "SELECT *
        FROM clientes 
        WHERE id = :id
        LIMIT 1;";


        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function desativarCliente($id)
    {
        $sql = "UPDATE clientes SET status_cliente = 'Inativo' WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
