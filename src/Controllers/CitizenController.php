<?php

namespace Gesuas\Test\Controllers;

use Gesuas\Test\Helper\Nis;
use Gesuas\Test\Models\citizen;

class CitizenController extends Controller
{
    public function index()
    {
        $citizen = new Citizen();
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
        $citizen = new Citizen();
        $data = $citizen->getByNis($_GET['nis']);
        return $this->render('citizens/show', [
            'citizen' => $data
        ]);
    }

    public function create()
    {
        return $this->render('citizens/create');
    }

    public function store()
    {
        $name = $_POST['name'];
        // gera um numero unico aleatorio de 11 digitos
        $nis = Nis::generetNisCrc32Name($name);
        $citizen = new Citizen();
        $data = $citizen->create($name, $nis);
        return $this->render('citizens/show', [
            'citizen' => $data
        ]); 
    }
}
