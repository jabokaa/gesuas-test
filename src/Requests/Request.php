<?php
namespace Gesuas\Test\Requests;

use Gesuas\Test\Exceptions\CustomException;

class Request
{
    public $body;
    public function __construct()
    {
        $this->setBody();
    }

    /**
     * Seta o corpo da requisição
     * @return void
     */
    private function setBody()
    {
        $body = array_merge($_POST, $_GET);
        $this->body = (object)[];
        foreach ($body as $key => $value) {
            $this->body->$key = $this->validateInjections($value);
        }
    }

    /**
     * Valida injeções de SQL
     * @param string $value
     * @return string
     */
    private function validateInjections($value): string
    {
        if (preg_match('/(select|drop|delete|create|update|insert|script)/i', $value)) {
            throw new CustomException('Invalid value', 400);
        }
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Retorna um valor do corpo da requisição
     * @param string $name
     * @return mixed
     */
    public function get($name): mixed
    {
        return $this->body->$name ?? null;
    }

    /**
     * Seta um valor no corpo da requisição
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function set($name, $value): void
    {
        $this->body->$name = $this->validateInjections($value);
    }
}
