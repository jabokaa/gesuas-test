<?php

namespace Gesuas\Test\Controllers;

use Gesuas\Test\Helper\Nis;
use Gesuas\Test\Models\citizen;
use Gesuas\Test\Requests\Request;

class CitizenController extends Controller
{
    public function index(Request $request)
    {
        $citizen = new Citizen();
        $data = $citizen->getPaginate(
            nis: $request->get('nis') ?? null,
            name: $request->get('name') ?? null,
            date: $request->get('date') ?? null,
            page: $request->get('page') ?? 1
        );
        return $this->render('citizens/index', $data);
    }

    public function show(Request $request)
    {
        $citizen = new Citizen();
        $data = $citizen->getByNis($request->get('nis'));
        return $this->render('citizens/show', [
            'citizen' => $data
        ]);
    }

    public function create(Request $request)
    {
        return $this->render('citizens/create');
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        // gera um numero unico aleatorio de 11 digitos
        $nis = Nis::generetNisCrc32Name($name);
        $citizen = new Citizen();
        $data = $citizen->create($name, $nis);
        return $this->render('citizens/show', [
            'citizen' => $data
        ]); 
    }
}
