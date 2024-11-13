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

    private function setBody()
    {
        $body = array_merge($_POST, $_GET);
        $this->body = (object)[];
        foreach ($body as $key => $value) {
            $this->body->$key = $this->validateInjections($value);
        }
    }

    private function validateInjections($value)
    {
        if (preg_match('/(select|drop|delete|create|update|insert|script)/i', $value)) {
            throw new CustomException('Invalid value', 400);
        }
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    public function get($name)
    {
        return $this->body->$name ?? null;
    }

    public function set($name, $value)
    {
        $this->body->$name = $this->validateInjections($value);
    }
}
