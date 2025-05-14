<?php

class Estado extends Model{

    public function getListarEstados(){
        $sql = "SELECT * FROM estado ORDER BY nome ASC";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}