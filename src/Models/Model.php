<?php

namespace Gesuas\Test\Models;

use Gesuas\Test\Database;
use PDO;

class Model
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    /**
     * Retorna todos os registros
     * @return array
     */
    public function getAll(): array
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retorna um registro pelo id
     * @param int $id
     * @return array
     */
    public function find($id): array
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
