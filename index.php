<?php

require 'vendor/autoload.php';

use Gesuas\Test\Database;
use Gesuas\Test\Models\User;

// Configuração do banco de dados
$database = new Database();
$db = $database->getConnection();

// Instanciação do modelo User
$user = new User($db);

// Obtendo todos os usuários
$users = $user->getAll();
foreach ($users as $u) {
    echo "ID: " . $u['id'] . " - Nome: " . $u['name'] . "<br>";
}

// Obtendo um usuário específico
$userData = $user->getById(1);
echo "Usuário ID 1: " . $userData['name'] . "<br>";
