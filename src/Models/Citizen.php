<?php

namespace Gesuas\Test\Models;

use PDO;

class citizen extends Model
{
    protected $table = 'citizens';

    public function getPaginate($nis, $name, $date, $page = 1, $perPage = 10)
    {
        $sqlCount = "SELECT COUNT(*) AS total FROM {$this->table} WHERE 1 = 1";
        $sql = "SELECT nis, name, DATE_FORMAT(created_at, '%d/%m/%Y %H:%i:%s') AS created_at FROM {$this->table} WHERE 1 = 1";
        $where = '';
        if($nis) {
            $where .= " AND nis = '$nis'";
        }
        if($name) {
            $where .= " AND name like '%$name%'";
        }
        if ($date) {
            // Filtra pelo dia ignorando as horas
            $where .= " AND DATE(created_at) = '$date'";
        }
        
        $sql .= $where;
        $sql .= " ORDER BY created_at DESC";
        $stmtCount = $this->db->prepare($sqlCount . $where);
        $stmtCount->execute();
        $total = $stmtCount->fetchObject();
        
        $totalPage = ceil($total->total / $perPage);

        $sql = $sql . " LIMIT " . ($page - 1) * $perPage . ", $perPage";
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute();
        return [
            'citizens' => $stmt->fetchAll(PDO::FETCH_ASSOC),
            'totalPages' => $totalPage,
            'page' => $page,
            'isPaginate' => true
        ];
    }

}
