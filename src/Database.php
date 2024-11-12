<?php

namespace Gesuas\Test;

use Dotenv\Dotenv;
use PDO;
use PDOException;

class Database
{

    private $pdo;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUser = $_ENV['DB_USER'];
        $dbPass = $_ENV['DB_PASS'];
        $dbPort = $_ENV['DB_PORT'];
        try {
            $this->pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort", $dbUser, $dbPass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage(); exit;
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
