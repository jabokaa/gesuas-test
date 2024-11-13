<?php

namespace Gesuas\Test;

use Dotenv\Dotenv;
use Gesuas\Test\Exceptions\CustomException;
use PDO;
use PDOException;

class Database
{

    private $pdo;

    public function __construct()
    {
        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUser = $_ENV['DB_USER'];
        $dbPass = $_ENV['DB_PASS'];
        $dbPort = $_ENV['DB_PORT'];

        if(defined('PHPUNIT_RUNNING')){
            $dbHost = $_ENV['DB_HOST_TEST'];
            $dbName = $_ENV['DB_NAME_TEST'];
            $dbUser = $_ENV['DB_USER_TEST'];
            $dbPass = $_ENV['DB_PASS_TEST'];
            $dbPort = $_ENV['DB_PORT_TEST'];
        }

        try {
            $this->pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort", $dbUser, $dbPass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new CustomException("Erro de conexão: ".$e->getMessage(), $e->getCode());
        }
    }

    /**
     * Retorna a conexão com o banco de dados
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}
