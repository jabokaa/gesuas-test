<?php
namespace Gesuas\Test\Exceptions;

use Exception;
use Gesuas\Test\Controllers\Controller;

class CustomException extends Exception
{
    // A exceção personalizada pode ter comportamento extra
    public function __construct($message, $code = 0, Exception $previous = null) {
        $controller = new Controller();
        $controller->render('error', [
            'errorMessage' => $message,
            'errorCode' => $code
        ]);
    }

    // Método para exibir um erro detalhado
    public function errorMessage() {
    }
}