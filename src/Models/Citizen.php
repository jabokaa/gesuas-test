<?php

namespace Gesuas\Test\Models;

use PDO;

class Citizen extends Model
{
    protected $table = 'citizens';

    /**
     * Retorna os cidadãos paginados
     * @param string|null $nis
     * @param string|null $name
     * @param string|null $date
     * @param int $page
     * @param int $perPage
     * @return array
     */
    public function getPaginate($nis, $name, $date, $page = 1, $perPage = 10): array
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
            'totalPages' => intval($totalPage),
            'page' => intval($page),
            'isPaginate' => true
        ];
    }

    /**
     * Retorna um cidadão pelo NIS
     * @param string $nis
     *
     * @return array|null|bool
     */
    public function getByNis($nis): array|bool|null
    {
        $query = "SELECT nis, name, DATE_FORMAT(created_at, '%d/%m/%Y %H:%i:%s') AS created_at FROM {$this->table} WHERE nis = '$nis'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?? [];
    }

    /**
     * Retorna o maior NIS
     * @return array
     */
    public function findMaxNis(): array
    {
        $query = "SELECT MAX(nis) AS nis FROM {$this->table}";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Cria um cidadão
     * @param string $name
     * @param string $nis
     * @return array
     */
    public function create($name, $nis): array
    {
        $query = "INSERT INTO {$this->table} (name, nis) VALUES ('$name', '$nis')";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $citizen = $this->getByNis($nis);
        return $citizen;
    }

}
