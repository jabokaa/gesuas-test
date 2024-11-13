<?php
namespace Gesuas\Test\Routes;

use Gesuas\Test\Exceptions\CustomException;
use Gesuas\Test\Requests\Request;

class Routes
{

    public $uri;
    public $method;
    public $routes = [];

    public function __construct()
    {
        $this->uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Verifica se a rota existe
     * @return void
     */
    public function goToRoute(): void
    {
        foreach ($this->routes as $route) {
            if ($route['route'] == $this->uri && $this->method == $route['type']) {
                $controller = new $route['controller'];
                $request = new Request();
                $controller->{$route['method']}($request);
                return;
            }
        }
        throw new CustomException('Page not found', 404);
    }

    /**
     * Adiciona uma rota
     * @param string $route
     * @param string $controller
     * @param string $method
     * @param string $type
     * @return void
     */
    public function addRoute($route, $controller, $method, $type): void
    {
        $this->routes[] = [
            'route' => $route,
            'controller' => $controller,
            'method' => $method,
            'type' => $type
        ];
    }
}
