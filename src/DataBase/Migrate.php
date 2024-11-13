<?php

namespace Gesuas\Test\DataBase;

use Dotenv\Dotenv;
use Gesuas\Test\Exceptions\CustomException;
use PDO;
use PDOException;

class Migrate
{

    private $pdo;

    public function conection($useDbName = true)
    {
        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUser = $_ENV['DB_USER'];
        $dbPass = $_ENV['DB_PASS'];
        $dbPort = $_ENV['DB_PORT'];

        try {
            if ($useDbName) {
                $this->pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort", $dbUser, $dbPass);
            } else {
                $this->pdo = new PDO("mysql:host=$dbHost;port=$dbPort", $dbUser, $dbPass);
            }
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new CustomException($e->getMessage(), $e->getCode());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function up()
    {
        $dbName = $_ENV['DB_NAME'];
        $this->conection(false);
        $this->pdo->exec("CREATE DATABASE IF NOT EXISTS $dbName");
        $this->conection();
        // Criar a tabela migration se nao existir
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        // pega os artivos .sql da pasta database migrations
        $files = glob(__DIR__ . "".DIRECTORY_SEPARATOR ."Migrations".DIRECTORY_SEPARATOR ."*.sql");
        foreach ($files as $file) {
            $fineName = pathinfo($file, PATHINFO_FILENAME);
            $migration = $this->pdo->query("SELECT migration FROM migrations WHERE migration = '$fineName'")->fetch();
            if ($migration) {
                continue;
            }
            $sql = file_get_contents($file);
            $this->pdo->exec($sql);
            $this->pdo->exec("INSERT INTO migrations (migration) VALUES ('$fineName')");
        }
    }
}
