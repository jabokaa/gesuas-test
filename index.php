<?php

use Dotenv\Dotenv;

require "vendor".DIRECTORY_SEPARATOR ."autoload.php";
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
require 'routes.php';
