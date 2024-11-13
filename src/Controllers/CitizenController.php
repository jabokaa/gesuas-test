<?php

namespace Gesuas\Test\Controllers;

use Gesuas\Test\Exceptions\CustomException;
use Gesuas\Test\Helper\Nis;
use Gesuas\Test\Models\citizen;
use Gesuas\Test\Requests\Request;

class CitizenController extends Controller
{
    public function index(Request $request)
    {
        try{
            $citizen = new Citizen();
            $data = $citizen->getPaginate(
                nis: $request->get('nis') ?? null,
                name: $request->get('name') ?? null,
                date: $request->get('date') ?? null,
                page: $request->get('page') ?? 1
            );
            return $this->render('citizens/index', $data);
        } catch (\Exception $e) {
            throw new CustomException($e->getMessage(), $e->getCode());
        }
    }

    public function show(Request $request)
    {
        try{
            $citizen = new Citizen();
            $data = $citizen->getByNis($request->get('nis'));
            return $this->render('citizens/show', [
                'citizen' => $data
            ]);
        } catch (\Exception $e) {
            throw new CustomException($e->getMessage(), $e->getCode());
        }
    }

    public function create(Request $request)
    {
        return $this->render('citizens/create');
    }

    public function store(Request $request)
    {
        try{
            $name = $request->get('name');
            $nis = Nis::generetNisCrc32Name($name);
            $citizen = new Citizen();
            $data = $citizen->create($name, $nis);
            return $this->render('citizens/show', [
                'citizen' => $data
            ]);
        } catch (\Exception $e) {
            throw new CustomException($e->getMessage(), $e->getCode());
        }
    }
}
