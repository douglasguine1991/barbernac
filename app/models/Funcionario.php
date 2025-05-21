<?php

class Funcionario extends Model
{
    // Buscar funcionário pelo e-mail
    public function buscarFunc($email)
    {
        $sql = "SELECT * FROM funcionarios WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Listar todos os funcionários
    public function getListarFuncionarios()
    {
        $sql = "SELECT * FROM funcionarios WHERE status_funcionario = 'Ativo'";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Adicionar um novo funcionário
    public function addFuncionario($dados)
    {
        $sql = "INSERT INTO funcionarios (nome, telefone, email, senha, cargo) 
                VALUES (:nome, :telefone, :email, :senha, :cargo, :salario)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $dados['nome']);
        $stmt->bindValue(':telefone', $dados['telefone']);
        $stmt->bindValue(':email', $dados['email']);
        $stmt->bindValue(':senha', password_hash($dados['senha'], PASSWORD_DEFAULT)); // Hash da senha
        $stmt->bindValue(':cargo', $dados['cargo']);
        $stmt->bindValue(':salario', $dados['salario']);
        
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    // Atualizar funcionário
    public function atualizarFuncionario($id, $dados)
    {
        $sql = "UPDATE funcionarios SET 
                    nome_funcionario = :nome_funcionario,
                    telefone = :telefone,
                    email = :email,
                    cargo = :cargo,
                    salario_funcionario = :salario_funcionario
                WHERE id = :id";
    
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome_funcionario', $dados['nome_funcionario']);
        $stmt->bindValue(':telefone', $dados['telefone']);
        $stmt->bindValue(':email', $dados['email']);
        $stmt->bindValue(':cargo', $dados['cargo']);
        $stmt->bindValue(':salario_funcionario', $dados['salario_funcionario']);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
        return $stmt->execute();
    }
    

    // Buscar funcionário por ID
    public function getFuncionarioById($id)
    {
        $sql = "SELECT * FROM funcionarios WHERE id = :id LIMIT 1;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function desativarFuncionario($id)
{
    $sql = "UPDATE funcionarios SET status_funcionario = 'Inativo' WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}
}