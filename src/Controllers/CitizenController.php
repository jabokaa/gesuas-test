<?php

namespace Gesuas\Test\Controllers;

use Gesuas\Test\Exceptions\CustomException;
use Gesuas\Test\Helper\Nis;
use Gesuas\Test\Models\Citizen;
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

    /**
     * Lista os cidadãos
     * @param Request $request
     * @return array
     */
    public function index(Request $request): array
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

    /**
     * Mostra um cidadão
     * @param Request $request
     * @return array
     */
    public function show(Request $request): array
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

    /**
     * Leva para a view de criação de cidadão
     * @param Request $request
     * @return array
     */
    public function create(Request $request): array
    {
        return $this->render('citizens/create');
    }

    /**
     * Armazena um cidadão
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        try{
            $name = $request->get('name');
            $nis = $this->nis->generateNisCrc32Name($name);
            $data = $this->citizen->create($name, $nis);
            return $this->render('citizens/show', [
                'citizen' => $data
            ]);
        } catch (\Exception $e) {
            throw new CustomException($e->getMessage(), $e->getCode());
        }
    }
}
