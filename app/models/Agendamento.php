<?php
class Agendamento extends Model
{
    public function getTodosAgendamentos()
    {
        $sql = "SELECT 
                    a.id_agendamento AS id,
                    c.nome AS nome_cliente,
                    f.nome_funcionario,
                    s.nome_servico,
                    a.status_agendamento AS status,
                    a.data_agendamento
                FROM 
                    tbl_agendamento a
                JOIN 
                    clientes c ON a.id_cliente = c.id
                JOIN 
                    funcionarios f ON a.id_funcionario = f.id
                JOIN 
                    tbl_servico s ON a.id_servico = s.id_servico
                WHERE 
                    a.status_agendamento = 'Agendado'
                ORDER BY a.data_agendamento ASC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addAgendamento($dados)
    {
        $sql = "INSERT INTO tbl_agendamento (
                    id_cliente,
                    id_funcionario,
                    id_servico,
                    data_agendamento,
                    status_agendamento
                ) VALUES (
                    :id_cliente,
                    :id_funcionario,
                    :id_servico,
                    :data_agendamento,
                    :status_agendamento
                )";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cliente', $dados['id_cliente'], PDO::PARAM_INT);
        $stmt->bindValue(':id_funcionario', $dados['id_funcionario'], PDO::PARAM_INT);
        $stmt->bindValue(':id_servico', $dados['id_servico'], PDO::PARAM_INT);
        $stmt->bindValue(':data_agendamento', $dados['data_agendamento'], PDO::PARAM_STR); // datetime no formato 'YYYY-MM-DD HH:MM:SS'
        $stmt->bindValue(':status_agendamento', $dados['status_agendamento'], PDO::PARAM_STR);
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function desativarAgendamento($id)
    {
        $sql = "UPDATE tbl_agendamento SET status_agendamento = 'Cancelado' WHERE id_agendamento = :id";
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
                    a.id_agendamento AS id,
                    c.nome AS nome_cliente,
                    f.nome_funcionario,
                    s.nome_servico,
                    a.data_agendamento,
                    a.status_agendamento AS status
                FROM 
                    tbl_agendamento a
                JOIN 
                    clientes c ON a.id_cliente = c.id
                JOIN 
                    funcionarios f ON a.id_funcionario = f.id
                JOIN 
                    tbl_servico s ON a.id_servico = s.id_servico
                WHERE 
                    a.id_servico = :servico_id
                    AND a.status_agendamento IN ('Agendado', 'Cancelado')
                ORDER BY a.data_agendamento ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':servico_id', $servico_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
