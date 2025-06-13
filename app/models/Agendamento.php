<?php
class Agendamento extends Model
{
    public function getTodosAgendamentos()
    {
        $sql = "SELECT 
                a.id,
                c.nome AS nome_cliente,
                f.nome_funcionario AS nome_funcionario,
                s.nome_servico AS nome_servico,
                a.status
            FROM 
                agendamentos a
            JOIN 
                clientes c ON a.cliente_id = c.id
            JOIN 
                funcionarios f ON a.funcionario_id = f.id
            JOIN 
                tbl_servico s ON a.servico_id = s.id_servico
            WHERE 
                a.status = 'Agendado'";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function addAgendamento($dados)
    {
        $sql = "INSERT INTO agendamentos (
                    cliente_id,
                    funcionario_id,
                    servico_id,
                    horario_id,
                    status
                ) VALUES (
                    :cliente_id,
                    :funcionario_id,
                    :servico_id,
                    :horario_id,
                    :status
                )";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':cliente_id', $dados['cliente_id'], PDO::PARAM_INT);
        $stmt->bindValue(':funcionario_id', $dados['funcionario_id'], PDO::PARAM_INT);
        $stmt->bindValue(':servico_id', $dados['servico_id'], PDO::PARAM_INT);
        $stmt->bindValue(':horario_id', $dados['horario_id'], PDO::PARAM_INT); // Corrigido: estava faltando
        $stmt->bindValue(':status', $dados['status'], PDO::PARAM_STR);
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function desativarAgendamento($id)
    {
        $sql = "UPDATE agendamentos SET status = 'Cancelado' WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getServicos()
    {
        $sql = "SELECT * FROM tbl_servico ORDER BY nome_servico ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAgendamentosPorServico($servico_id)
    {
        $sql = "SELECT 
                    a.id,
                    c.nome AS nome_cliente,
                    f.nome_funcionario AS nome_funcionario,
                    s.nome_servico AS nome_servico,
                    h.horario,
                    a.status
                FROM 
                    agendamentos a
                JOIN 
                    clientes c ON a.cliente_id = c.id
                JOIN 
                    funcionarios f ON a.funcionario_id = f.id
                JOIN 
                    tbl_servico s ON a.servico_id = s.id
                JOIN 
                    horarios h ON a.horario_id = h.id
                WHERE 
                    a.servico_id = :servico_id 
                    AND a.status IN ('Agendado', 'Cancelado')";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':servico_id', $servico_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
