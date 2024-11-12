<?php

namespace Gesuas\Test;

use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';
    private $dbName = 'nome_do_banco';
    private $username = 'usuario';
    private $password = 'senha';
    private $pdo;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbName";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
