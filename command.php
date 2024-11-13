<?php

use Dotenv\Dotenv;
use Gesuas\Test\DataBase\Migrate;

require realpath("vendor".DIRECTORY_SEPARATOR ."autoload.php");

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
//pega parametros do terminal

if (isset($argv[1]) && $argv[1] == 'migrate') {
    $migration = new Migrate();
    $migration->up();
}