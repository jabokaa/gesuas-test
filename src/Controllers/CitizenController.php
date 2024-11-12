<?php

namespace Gesuas\Test\Controllers;

use Gesuas\Test\Models\citizen;
use PDO;

class CitizenController extends Controller
{
    public function index()
    {
        $citizen = new citizen();
        $citizens = $citizen->getAll();
        return $this->render('citizens/index', [
            'citizens' => $citizens
        ]);
    }
}
