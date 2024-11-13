<?php

namespace Gesuas\Test\Controllers;

use Gesuas\Test\Models\citizen;
use PDO;

class CitizenController extends Controller
{
    public function index()
    {
        $citizen = new citizen();
        $data = $citizen->getPaginate(
            nis: $_GET['nis'] ?? null,
            name: $_GET['name'] ?? null,
            date: $_GET['date'] ?? null,
            page: $_GET['page'] ?? 1
        );
        return $this->render('citizens/index', $data);
    }

    public function show()
    {
        $citizen = new citizen();
        $data = $citizen->getByNis($_GET['nis']);
        return $this->render('citizens/show', [
            'citizen' => $data
        ]);
    }
}
