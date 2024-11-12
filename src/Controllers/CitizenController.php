<?php

namespace Gesuas\Test\Controllers;

use Gesuas\Test\Models\citizen;
use PDO;

class CitizenController
{
    public function index()
    {
        echo 'Index';
        $citizen = new citizen();
        $citizens = $citizen->getAll();
    }
}
