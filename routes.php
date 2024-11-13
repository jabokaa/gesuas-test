<?php

namespace Gesuas\Test;

use Gesuas\Test\Controllers\CitizenController;
use Gesuas\Test\Controllers\HomeController;
use Gesuas\Test\Routes\Routes;

$routes = new Routes();
$routes->addRoute('/test', CitizenController::class, 'test', 'GET');

$routes->addRoute('/citizen/show', CitizenController::class, 'show', 'GET');
$routes->addRoute('/citizen', CitizenController::class, 'index', 'GET');
$routes->addRoute('/citizen/create', CitizenController::class, 'create', 'GET');
$routes->addRoute('/citizen/edit', CitizenController::class, 'edit', 'GET');
$routes->addRoute('/citizen/store', CitizenController::class, 'store', 'POST');
$routes->addRoute('/', HomeController::class, 'home', 'GET');

$routes->goToRoute();