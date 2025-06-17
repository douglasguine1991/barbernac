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

    public function buscarPorId($id)
    {
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


    // Agendamentos Por Cliente
    public function getAgendamentosPorCliente($cliente_id)
    {
        $sql = "SELECT 
                a.id AS id_agendamento,
                a.status_agendamento,
                f.nome_funcionario,
                s.nome_servico
            FROM 
                tbl_agendamento a
            JOIN 
                funcionarios f ON a.id = f.id
            JOIN 
                tbl_servico s ON a.id_servico = s.id_servico
            WHERE 
                a.id = :id
            ORDER BY a.id ASC";  // 

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $cliente_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    :id_uf,
    :senha
    
)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome', $dados['nome']);
        $stmt->bindValue(':telefone', $dados['telefone']);
        $stmt->bindValue(':foto_cliente', $dados['foto_cliente']);
        $stmt->bindValue(':email', $dados['email']);
        $stmt->bindValue(':id_uf', $dados['id_uf']);
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


    public function salvarTokenRecuperacao($id, $token, $expira)
    {
        $sql = "UPDATE clientes SET token_recuperacao = :token, token_expira = :expira WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':token', $token);
        $stmt->bindValue(':expira', $expira);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function getClientePorToken($token)
    {
        $sql = "SELECT * FROM clientes WHERE token_recuperacao = :token";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':token', $token);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarSenha($id, $novaSenha)
    {
        $sql = "UPDATE clientes SET senha = :novaSenha WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':novaSenha', $novaSenha);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function limparTokenRecuperacao($id)
    {
        $sql = "UPDATE clientes SET token_recuperacao = NULL, token_expira = NULL WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function criarAgendamento($dados)
    {
        $sql = "INSERT INTO agendamentos (cliente_id, funcionario_id, servico_id, horario_id, status)
            VALUES (:cliente_id, :funcionario_id, :servico_id, :horario_id, :status)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':cliente_id', $dados['cliente_id'], PDO::PARAM_INT);
        $stmt->bindValue(':funcionario_id', $dados['funcionario_id'], PDO::PARAM_INT);
        $stmt->bindValue(':servico_id', $dados['servico_id'], PDO::PARAM_INT);
        $stmt->bindValue(':horario_id', $dados['horario_id'], PDO::PARAM_INT);
        $stmt->bindValue(':status', $dados['status'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $this->db->lastInsertId(); // retorna o ID do agendamento criado
        }

        return false; // falha na inserção
    }
}
