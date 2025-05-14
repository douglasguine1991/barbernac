<?php


class Depoimento extends Model
{
    public function getTodosDepoimentos()
    {

        $sql = "SELECT 
            c.nome AS nome_cliente, 
            c.telefone AS telefone_cliente, 
            e.nome AS nome_estado,
            e.sigla AS sigla_uf, 
            d.comentario AS descricao_depoimento, 
            d.data_depoimento, 
            d.nota, 
            c.foto_cliente, 
            c.nome AS alt_foto_cliente
        FROM depoimento d
        INNER JOIN clientes c ON d.cliente_id = c.id
        INNER JOIN estado e ON c.estado_id = e.id
        ORDER BY d.nota DESC, c.nome ASC";

$stmt = $this->db->query($sql);
return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


    public function getDepoimentoPositivo()
    {
        $sql = "SELECT COUNT(id) AS qtde_depoimento FROM depoimento WHERE nota >= 4";
$stmt = $this->db->prepare($sql);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


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
        $stmt->bindValue(':cliente_id', $dados['cliente_id']);
        $stmt->bindValue(':comentario', $dados['comentario']);
        $stmt->bindValue(':nota', $dados['nota']);
        $stmt->bindValue(':data_depoimento', $dados['data_depoimento']); // pode ser gerado com date('Y-m-d H:i:s')
        
        $stmt->execute();
        
        
    }
    
}

       