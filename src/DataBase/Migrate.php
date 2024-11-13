<?php

namespace Gesuas\Test\DataBase;

use Dotenv\Dotenv;
use Gesuas\Test\Exceptions\CustomException;
use PDO;
use PDOException;

class Migrate
{

    private $pdo;

    private function loadEnv()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
    }
    public function conection($useDbName = true)
    {
        $this->loadEnv();
        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUser = $_ENV['DB_USER'];
        $dbPass = $_ENV['DB_PASS'];
        $dbPort = $_ENV['DB_PORT'];

        if (defined('PHPUNIT_RUNNING')) {
            $dbHost = $_ENV['DB_HOST_TEST'];
            $dbName = $_ENV['DB_NAME_TEST'];
            $dbUser = $_ENV['DB_USER_TEST'];
            $dbPass = $_ENV['DB_PASS_TEST'];
            $dbPort = $_ENV['DB_PORT_TEST'];
        }

        try {
            if ($useDbName) {
                $this->pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort", $dbUser, $dbPass);
            } else {
                $this->pdo = new PDO("mysql:host=$dbHost;port=$dbPort", $dbUser, $dbPass);
            }
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            throw new CustomException($e->getMessage(), $e->getCode());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function up()
    {
        $this->loadEnv();
        $dbName = $_ENV['DB_NAME'];
        if (defined('PHPUNIT_RUNNING')) {
            $dbName = $_ENV['DB_NAME_TEST'];
        }
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
        $files = glob(__DIR__ . DIRECTORY_SEPARATOR ."Migrations".DIRECTORY_SEPARATOR ."*.sql");
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

    public function down()
    {
        $this->loadEnv();
        if(!defined('PHPUNIT_RUNNING')) {
            throw new CustomException("Este método só pode ser executado em ambiente de teste", 400);
        }
        if ($_ENV['DB_NAME_TEST'] == $_ENV['DB_NAME']) {
            throw new CustomException("Altere o nome do banco de dados de teste no arquivo .env", 400);
        }
        
        $this->conection(false);
        try {
            // $this->pdo->exec("DROP DATABASE IF EXISTS ".$_ENV['DB_NAME_TEST']);
            $result = $this->pdo->exec("DROP DATABASE IF EXISTS ".$_ENV['DB_NAME_TEST']);
        } catch (PDOException $e) {
            echo "Erro ao tentar deletar o banco de dados: " . $e->getMessage();
        }
    }

    public function refresh()
    {
        $this->down();
        $this->up();
    }
    
}
