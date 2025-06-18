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


    /**
     * 
     * AGENDAMENTO
     */
    public function getAgendamentosPorCliente($id_cliente)
    {
        $sql = "SELECT 
                a.data_agendamento,
                a.status_agendamento,
                v.ano_veiculo,
                v.combustivel_veiculo,
                v.chassi_veiculo,
                v.cor_veiculo,
                v.km_veiculo,
                f.nome_funcionario
            FROM tbl_agendamento a
            JOIN tbl_servico v ON a.id_servico = v.id_servico
            LEFT JOIN funcionarios f ON a.id = f.id
            WHERE v.id = :id
            ORDER BY a.data_agendamento DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id_cliente, PDO::PARAM_INT);
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


   
    /** Atualizar cliente */
    public function atualizarCliente($id, $dados)
    {
        // Constrói a query dinamicamente para atualizar apenas os campos enviados
        $sql = "UPDATE clientes SET ";
        $valores = []; // Guardará os campos a serem atualizados
        $parametros = []; // Guardará os valores a serem inseridos na query preparada.

        foreach ($dados as $campo => $valor) {
            // Garante que apenas colunas válidas sejam atualizadas
            if (!empty($valor) && in_array($campo, [
                'nome',
                'tipo_cliente',
                'cpf_cnpj_cliente',
                'data_nasc_cliente',
                'email',
                'senha',
                'foto_cliente',
                'telefone',
                'id_uf',
                'status_cliente'
            ])) {
                $valores[] = "$campo = :$campo";
                $parametros[":$campo"] = $valor;
            }
        }

        // Se não houver nada para atualizar, retorna falso
        if (empty($valores)) {
            return false;
        }

        $sql .= implode(', ', $valores);
        $sql .= " WHERE id = :id";
        $parametros[":id"] = $id;

        /*
        Exemplo do resultado final da query gerada dinamicament
        UPDATE tbl_cliente SET nome_cliente = :nome_cliente, telefone_cliente = :telefone_cliente WHERE id_cliente = :id_cliente
        */

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($parametros);
    }


    public function atualizarFotoCliente($id, $foto)
    {
        $sql = "UPDATE clientes SET foto_cliente = :foto_cliente WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':foto_cliente', $foto);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }


    public function servicoExecutadoPorIdCliente($id_cliente)
    {
        $sql = "SELECT 
                    c.id,
                    c.nome,
                    a.data_agendamento,
                    a.status_agendamento,
                    s.nome_servico,
                    s.descricao_servico,
                    s.preco_base_servico,
                    f.nome_funcionario,
                    f.cargo
                FROM clientes c
                INNER JOIN tbl_agendamento a ON c.id = a.id_cliente
                INNER JOIN tbl_servico s ON a.id_servico = s.id_servico
                LEFT JOIN funcionarios f ON a.id_funcionario = f.id
                WHERE c.id = :id_cliente
                ORDER BY a.data_agendamento DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cliente', (int)$id_cliente, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        $sql = "INSERT INTO tbl_agendamento (id_servico, id_funcionario, data_agendamento, status_agendamento) 
            VALUES (:id_servico, :id_funcionario, :data_agendamento, :status_agendamento)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($dados);
        return $this->db->lastInsertId();
    }

    public function buscarAgendamentoDoCliente($idAgendamento, $idCliente)
    {
        $sql = "
            SELECT a.*
            FROM tbl_agendamento a
            WHERE a.id_agendamento = :id_agendamento
              AND a.id_cliente = :id_cliente
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id_agendamento' => $idAgendamento,
            ':id_cliente' => $idCliente
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
