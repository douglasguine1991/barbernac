<?php



class Servico extends Model
{

    //Método para Pegar somente 3 servicos de forma aleatória
    public function getServicoAleatorio($limite = 3)
    {
        $sql = "SELECT s.*,g.foto_galeria,g.alt_galeria FROM tbl_servico s INNER JOIN tbl_galeria g ON s.id_servico = g.id_servico WHERE s.status_servico = 'Ativo' GROUP BY s.id_servico ORDER BY RAND() LIMIT :limite";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Método Listar todos os Serviços ativos por ordem alfabetica
    public function getTodosServicos()
    {

        $sql = "SELECT * FROM tbl_servico WHERE status_servico = 'Ativo' ORDER BY nome_servico ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Método Listar Todos os Serviços ativos Com Foto
    public function getTodosServicosComFoto()
    {
        $sql = "SELECT 
    s.*, 
    g.foto_galeria
FROM 
    tbl_servico AS s
INNER JOIN 
    tbl_galeria AS g 
    ON s.id_servico = g.id_servico;";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Método para carregar o serviço pelo link
    public function getServicoPorLink($link)
    {

        $sql = "SELECT tbl_servico.*, tbl_galeria.* FROM tbl_servico 
                INNER JOIN tbl_galeria ON tbl_servico .id_servico = tbl_galeria.id_galeria
                WHERE status_servico = 'Ativo' AND link_servico = :link";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':link', $link);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Método para Pegar 4 Especialidade de servicos de forma aleatória
    public function getEspecialidadeAleatorio($limite = 4)
    {

        $sql = "SELECT * FROM tbl_especialidade ORDER BY RAND() LIMIT :limite";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Método para o DASHBOARD - Listar todos os serviços com galeria
    public function getListarServicos()
    {
        // Método para listar todos os serviços ativos por ordem alfabética
        $sql = "SELECT s.*, g.foto_galeria FROM tbl_servico s
            INNER JOIN tbl_galeria g
            ON s.id_servico = g.id_servico
            WHERE s.status_servico = 'Ativo' AND g.status_galeria = 'Ativo'
            ORDER BY s.nome_servico";

        $stmt = $this->db->query($sql); // Prepara e executa
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // 5 METODO DASHBOARD ADICIONAR SERVICO 
    public function addServico($dados)
    {
        $sql = "INSERT INTO tbl_servico (  
        nome_servico,
        descricao_servico,
        preco_base_servico,
        tempo_estimado_servico,
        status_servico,
        link_servico
    ) 
    VALUES(
        :nome_servico,
        :descricao_servico,
        :preco_base_servico,
        :tempo_estimado_servico,
        :status_servico,
        :link_servico
    )";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome_servico', $dados['nome_servico']);
        $stmt->bindValue(':descricao_servico', $dados['descricao_servico']);
        $stmt->bindValue(':preco_base_servico', $dados['preco_base_servico']);
        $stmt->bindValue(':tempo_estimado_servico', $dados['tempo_estimado_servico']);
        $stmt->bindValue(':status_servico', $dados['status_servico']);
        $stmt->bindValue(':link_servico', $dados['link_servico']);

        $stmt->execute();

        return $this->db->lastInsertId();
    }



    //** Atualizar Serviço */
    public function atualizarServico($id, $dados)
    {
        $sql = "UPDATE tbl_servico SET
        nome_servico = :nome_servico,
        descricao_servico = :descricao_servico,
        preco_base_servico = :preco_base_servico,
        tempo_estimado_servico = :tempo_estimado_servico,
        alt_foto_servico = :alt_foto_servico,
        status_servico = :status_servico,
        link_servico = :link_servico
    WHERE id_servico = :id_servico";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome_servico', $dados['nome_servico']);
        $stmt->bindValue(':descricao_servico', $dados['descricao_servico']);
        $stmt->bindValue(':preco_base_servico', $dados['preco_base_servico']);
        $stmt->bindValue(':tempo_estimado_servico', $dados['tempo_estimado_servico']);
        $stmt->bindValue(':alt_foto_servico', $dados['alt_foto_servico']);
        $stmt->bindValue(':status_servico', $dados['status_servico']);
        $stmt->bindValue(':link_servico', $dados['link_servico']);
        $stmt->bindValue(':id_servico', $id, PDO::PARAM_INT);

        $resultado = $stmt->execute();

        return $resultado;
    }




    //** Método para buscar os dados do Serviço de acordo com o ID */
    public function getServicoById($id)
    {
        $sql = "SELECT s.*, g.foto_galeria
            FROM tbl_servico s 
            LEFT JOIN tbl_galeria g ON s.id_servico = g.id_servico
            WHERE s.id_servico = :id_servico
            LIMIT 1;";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_servico', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Add foto galeria 
    public function addFotoGaleria($id_servico, $arquivo, $nome_servico)
    {
        $sql = "INSERT INTO tbl_galeria (foto_galeria,
                                         alt_galeria,
                                         status_galeria,
                                         id_servico)
                                         
                                         VALUES (:foto_galeria,
                                                 :alt_galeria,
                                                 :status_galeria,
                                                 :id_servico)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':foto_galeria', $arquivo);
        $stmt->bindValue(':alt_galeria', $nome_servico);
        $stmt->bindValue('status_galeria', 'Ativo');
        $stmt->bindValue(':id_servico', $id_servico);

        return $stmt->execute();
    }

    //**Atualizar foto galeria */
    public function atualizarFotoGaleria($id, $arquivo, $alt_servico)
    {

        //**Verificar se existe */
        $sqlVerificar = "SELECT id_galeria FROM tbl_galeria WHERE id_servico = :id ";
        $stmtVerificar = $this->db->prepare($sqlVerificar);
        $stmtVerificar->bindValue(':id', $id, PDO::PARAM_INT);
        $stmtVerificar->execute();
        $galeria = $stmtVerificar->fetch(PDO::FETCH_ASSOC);

        if ($galeria) {
            // Já existe a foto... faça um UPDATE
            $sql = "UPDATE tbl_galeria SET foto_galeria = :foto_galeria,
                                            alt_galeria = :alt_galeria,
                                            status_galeria = :status_galeria
                    WHERE id_galeria = :id_galeria";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue('foto_galeria', $arquivo);
            $stmt->bindValue('alt_galeria', $alt_servico);
            $stmt->bindValue('status_galeria', 'Ativo');
            $stmt->bindValue('id_galeria', $galeria['id_galeria']);
            return $stmt->execute();
        } else {
            $sql = "INSERT INTO tbl_galeria (foto_galeria,
                                             alt_galeria,
                                             status_galeria,
                                             id_servico)
                    VALUES (:foto_galeria, :alt_galeria, :status_galeria, :id_servico)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':foto_galeria', $arquivo);
            $stmt->bindValue(':alt_galeria', $alt_servico);
            $stmt->bindValue(':status_galeria', 'Ativo');
            $stmt->bindValue(':id_servico', $id);
            return $stmt->execute();
        }
    }



    // Verificar se o link existe
    public function existeEsseServico($link)
    {
        $sql = "SELECT COUNT(*) AS total FROM tbl_servico WHERE link_servico = :link";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('link', $link);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['total'] > 0;
    }



    // Criar ou Obter especialidade
    public function obterOuCriarEspecialidade($nome)
    {
        $sql = "INSERT INTO tbl_especialidade (nome) VALUES (:nome)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $nome);

        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        }
        return false;
    }
}
