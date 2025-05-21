<?php

class Depoimento extends Model
{
    // Lista todos os depoimentos com informações do cliente e estado
    public function getTodosDepoimentos()
    {
        $sql = "SELECT 
            c.nome AS nome_cliente, 
            c.telefone AS telefone_cliente, 
            e.nome_uf AS nome_uf,
            e.sigla_uf AS sigla_uf, 
            d.comentario AS descricao_depoimento, 
            d.data_depoimento, 
            d.nota, 
            c.foto_cliente, 
            c.nome AS alt_foto_cliente
        FROM depoimento d
        INNER JOIN clientes c ON d.cliente_id = c.id
        LEFT JOIN estado e ON c.id_uf = e.id_uf
        ORDER BY d.nota DESC, c.nome ASC";
    
        $stmt = $this->db->prepare($sql);
    
        if (!$stmt->execute()) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Erro na query getTodosDepoimentos: " . implode(" | ", $errorInfo));
        }
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    // Conta quantos depoimentos têm nota 4 ou 5
    public function getDepoimentoPositivo()
    {
        $sql = "SELECT COUNT(*) AS qtde_depoimento FROM depoimento WHERE nota >= 4";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Adiciona um novo depoimento
    public function addDepoimento($dados)
    {
        $sql = "INSERT INTO depoimento (
            cliente_id,
            comentario,
            nota,
            data_depoimento
        ) VALUES (
            :cliente_id,
            :comentario,
            :nota,
            :data_depoimento
        )";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':cliente_id', $dados['cliente_id'], PDO::PARAM_INT);
        $stmt->bindValue(':comentario', $dados['comentario'], PDO::PARAM_STR);
        $stmt->bindValue(':nota', $dados['nota'], PDO::PARAM_INT);

        // Se não for passado, insere a data atual
        $data = $dados['data_depoimento'] ?? date('Y-m-d H:i:s');
        $stmt->bindValue(':data_depoimento', $data);

        $stmt->execute();
    }
}


       