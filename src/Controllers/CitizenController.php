<?php

namespace Gesuas\Test\Controllers;

use Gesuas\Test\Exceptions\CustomException;
use Gesuas\Test\Helper\Nis;
use Gesuas\Test\Models\citizen;
use Gesuas\Test\Requests\Request;

class CitizenController extends Controller
{
    public function __construct(public ?Citizen $citizen = null, public ?Nis $nis = null)
    {
        if (!$this->citizen) {
            $this->citizen = new Citizen();
        }
        if (!$this->nis) {
            $this->nis = new Nis($this->citizen);
        }
    }

    public function index(Request $request)
    {
        try{
            $data = $this->citizen->getPaginate(
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
            $data = $this->citizen->getByNis($request->get('nis'));
            if (!$data) {
                throw new CustomException('Citizen not found', 404);
            }
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
            $nis = $this->nis->generetNisCrc32Name($name);
            $data = $this->citizen->create($name, $nis);
            return $this->render('citizens/show', [
                'citizen' => $data
            ]);
        } catch (\Exception $e) {
            throw new CustomException($e->getMessage(), $e->getCode());
        }
    }
}
