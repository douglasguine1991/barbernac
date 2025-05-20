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

    // Método para buscar os dados de Cliente de acordo com o ID
    public function getClienteById($id)
    {
        $sql = "SELECT c.*, e.nome, e.sigla 
                FROM clientes c
                INNER JOIN estado e ON c.estado_id = e.id
                WHERE c.id = :id
                LIMIT 1;";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    // Aqui e para adicionar a foto 
    public function atualizarCliente($id_cliente, $foto)
    {
        $sql = "UPDATE clientes SET foto_cliente = :foto_cliente WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':foto_cliente', $foto);
        $stmt->bindValue(':id', $id_cliente);
        $stmt->execute();
    }

    public function desativarCliente($id)
{
    $sql = "UPDATE clientes SET status_cliente = 'Inativo' WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}
}
