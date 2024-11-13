<?php

use Gesuas\Test\Controllers\CitizenController;
use Gesuas\Test\Exceptions\CustomException;
use Gesuas\Test\Models\Citizen;
use Gesuas\Test\Requests\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{

    // Configuração inicial para os testes
    protected function setUp(): void
    {
        if (!defined('PHPUNIT_RUNNING')) {
            define('PHPUNIT_RUNNING', true);
        }
    }

    // Teste de adição
    public function testSqlInjection()
    {
        // Crie o mock do Citizen
        $citizen = $this->createMock(Citizen::class);
      
        $_GET['nis'] = '12345678901';
        $_GET['name'] = 'DROP TABLE';
        $_GET['date'] = '2021-10-10';
        $_GET['page'] = 1;
        $this->expectException(CustomException::class);
        $request = new Request();
    }
    
    // Teste de adição
    public function testGets()
    {
        // Crie o mock do Citizen
        $citizen = $this->createMock(Citizen::class);
      
        $_GET['nis'] = '12345678901';
        $_GET['name'] = 'Test';
        $_GET['date'] = '2021-10-10';
        $_GET['page'] = 1;
        $request = new Request();

        $this->assertEquals('12345678901', $request->get('nis'));
        $this->assertEquals('Test', $request->get('name'));
        $this->assertEquals('2021-10-10', $request->get('date'));
        $this->assertEquals(1, $request->get('page'));

    }

}