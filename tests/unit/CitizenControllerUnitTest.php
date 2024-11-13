<?php

use Gesuas\Test\Controllers\CitizenController;
use Gesuas\Test\Exceptions\CustomException;
use Gesuas\Test\Models\Citizen;
use Gesuas\Test\Requests\Request;
use PHPUnit\Framework\TestCase;

class CitizenControllerUnitTest extends TestCase
{

    // Configuração inicial para os testes
    protected function setUp(): void
    {
        if (!defined('PHPUNIT_RUNNING')) {
            define('PHPUNIT_RUNNING', true);
        }
    }

    // Teste de adição
    public function testIndex()
    {
        // Crie o mock do Citizen
        $citizen = $this->createMock(Citizen::class);

        // Defina o comportamento do mock
        $citizen->method('getPaginate')->willReturn([
            'citizen' => [
                'nis' => '12345678901',
                'name' => 'Teste',
                'date' => '2021-10-10',
            ],
            'totalPages' => 10,
            'page' => 1,
            'isPaginate' => true
        ]);
      
        // Crie a instância do controller com o mock
        $citizenController = new CitizenController($citizen);

        $request = new Request();
        $request->set('nis', '12345678901');
        $request->set('name', 'Teste');
        $request->set('date', '2021-10-10');
        $request->set('page', 1);
        $resul = $citizenController->index($request);
        $this->assertEquals([
            'citizen' => [
                'nis' => '12345678901',
                'name' => 'Teste',
                'date' => '2021-10-10'
            ],
            'totalPages' => 10,
            'page' => 1,
            'isPaginate' => true
        ], $resul);
    }
    
    // Teste de adição
    public function testShow()
    {
        // Crie o mock do Citizen
        $citizen = $this->createMock(Citizen::class);

        // Defina o comportamento do mock
        $citizen->method('getByNis')->willReturn([
            'nis' => '12345678901',
            'name' => 'Teste',
            'date' => '2021-10-10',
        ]);
      
        // Crie a instância do controller com o mock
        $citizenController = new CitizenController($citizen);

        $request = new Request();
        $request->set('nis', '12345678901');
        $resul = $citizenController->show($request);
        $this->assertEquals(
            [
                'citizen' => [
                    'nis' => '12345678901',
                    'name' => 'Teste',
                    'date' => '2021-10-10'
                ]
            ]
            , $resul
        );
    }

    // Teste de adição
    public function testStore()
    {
        // Crie o mock do Citizen
        $citizen = $this->createMock(Citizen::class);

        $citizen->method('create')->willReturn([
            'nis' => '12345678901',
            'name' => 'Teste',
            'date' => '2021-10-10',
        ]);
        
        // Defina o comportamento do método 'getByNis'
        $citizen->method('getByNis')->willReturn(null);
      
        // Crie a instância do controller com o mock
        $citizenController = new CitizenController($citizen);

        $request = new Request();
        $request->set('name', 'Teste');
        $resul = $citizenController->store($request);
        $this->assertEquals(
            [
                'citizen' => [
                    'nis' => '12345678901',
                    'name' => 'Teste',
                    'date' => '2021-10-10'
                ]
            ]
            , $resul
        );
    }

     // Teste de adição
     public function testStoreNisExists()
     {
         // Crie o mock do Citizen
         $citizen = $this->createMock(Citizen::class);
 
         $citizen->method('create')->willReturn([
             'nis' => '12345678901',
             'name' => 'Teste',
             'date' => '2021-10-10',
         ]);
         
         $citizen->method('getByNis')
            ->willReturnOnConsecutiveCalls(
                [     // Retorno na segunda chamada
                    'nis' => '12345678910',
                    'name' => 'Teste',
                    'date' => '2021-10-10',
                ],
                [     // Retorno na segunda chamada
                    'nis' => '12345678911',
                    'name' => 'Teste',
                    'date' => '2021-10-10',
                ],
                null, // Retorno na primeira chamada
            );
       
         // Crie a instância do controller com o mock
         $citizenController = new CitizenController($citizen);
 
         $request = new Request();
         $request->set('name', 'Teste');
         $resul = $citizenController->store($request);
         $this->assertEquals(
             [
                 'citizen' => [
                     'nis' => '12345678901',
                     'name' => 'Teste',
                     'date' => '2021-10-10'
                 ]
             ]
             , $resul
         );
     }

}