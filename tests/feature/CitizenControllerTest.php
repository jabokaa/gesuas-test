<?php

use Gesuas\Test\Controllers\CitizenController;
use Gesuas\Test\DataBase\Migrate;
use Gesuas\Test\DataBase\RefreshDatabase;
use Gesuas\Test\Exceptions\CustomException;
use Gesuas\Test\Models\Citizen;
use Gesuas\Test\Requests\Request;
use PHPUnit\Framework\TestCase;

class CitizenControllerTest extends TestCase
{
    // Configuração inicial para os testes
    protected function setUp(): void
    {
        if (!defined('PHPUNIT_RUNNING')) {
            define('PHPUNIT_RUNNING', true);
        }
        $migrate = new Migrate();
        $migrate->down();
        $migrate->up();
    }

    // Teste de adição
    public function testIndexFilterNis()
    {

        //Cria registro no banco de dados
        $citizenController = new CitizenController();
        $citizen = new Citizen();
        $citizen->create(
            nis: '12345678903',
            name: 'Teste 1',
        );
        $_GET['nis'] = 12345678903;
        $request = new Request();
        $resul = $citizenController->index($request);

        $this->assertArrayHasKey('citizens', $resul);
        $this->assertEquals($resul['citizens'][0]['nis'], 12345678903);
        $this->assertEquals($resul['citizens'][0]['name'], 'Teste 1');
        $this->assertEquals($resul['totalPages'], 1);
        $this->assertEquals($resul['page'], 1);
        $this->assertEquals($resul['isPaginate'], true);
    }

    public function testIndexFilterName()
    {

        //Cria registro no banco de dados
        $citizenController = new CitizenController();
        $citizen = new Citizen();
        $citizen->create(
            nis: '12345678903',
            name: 'Teste 1',
        );
        $_GET['name'] = 'Teste 1';
        $request = new Request();
        $resul = $citizenController->index($request);

        $this->assertArrayHasKey('citizens', $resul);
        $this->assertEquals($resul['citizens'][0]['nis'], 12345678903);
        $this->assertEquals($resul['citizens'][0]['name'], 'Teste 1');
        $this->assertEquals($resul['totalPages'], 1);
        $this->assertEquals($resul['page'], 1);
        $this->assertEquals($resul['isPaginate'], true);
    }

    public function testIndexFilterDate()
    {

        //Cria registro no banco de dados
        $citizenController = new CitizenController();
        $citizen = new Citizen();
        $citizen->create(
            nis: '12345678903',
            name: 'Teste 1',
        );
        $_GET['date'] = date('Y-m-d');
        $_GET['nis'] = date(12345678903);

        $request = new Request();
        $resul = $citizenController->index($request);

        $this->assertArrayHasKey('citizens', $resul);
        $this->assertEquals($resul['citizens'][0]['nis'], 12345678903);
        $this->assertEquals($resul['citizens'][0]['name'], 'Teste 1');
        $this->assertEquals($resul['totalPages'], 1);
        $this->assertEquals($resul['page'], 1);
        $this->assertEquals($resul['isPaginate'], true);
    }

    public function testShow()
    {
        //Cria registro no banco de dados
        $citizenController = new CitizenController();
        $citizen = new Citizen();
        $citizen->create(
            nis: '12345678903',
            name: 'Teste 1',
        );
        $_GET['nis'] = 12345678903;

        $request = new Request();
        $resul = $citizenController->show($request);

        $this->assertArrayHasKey('citizen', $resul);
        $this->assertEquals($resul['citizen']['nis'], 12345678903);
        $this->assertEquals($resul['citizen']['name'], 'Teste 1');
    }
    
    public function testStore()
    {
        //Cria registro no banco de dados
        $citizenController = new CitizenController();
        $_GET['name'] = 'Teste 1';
        $request = new Request();
        $resul = $citizenController->store($request);

        $this->assertArrayHasKey('citizen', $resul);
        $this->assertEquals($resul['citizen']['name'], 'Teste 1');
        $this->assertEquals(strlen($resul['citizen']['nis']), 11);
    }

    public function testStore100UserName()
    {
        //Cria registro no banco de dados
        $name = md5(uniqid(rand(), true));
        for ($i = 0; $i < 100; $i++) {
            $citizenController = new CitizenController();
            //string de 100 caracteres aleatórios
            $_GET['name'] = $name;
            $request = new Request();
            $resul = $citizenController->store($request);
            $this->assertArrayHasKey('citizen', $resul);
            $this->assertEquals($resul['citizen']['name'], $_GET['name']);
            $this->assertEquals(strlen($resul['citizen']['nis']), 11);
        }
    }
}