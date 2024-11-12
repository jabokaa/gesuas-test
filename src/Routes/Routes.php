<?php
namespace Gesuas\Test\Routes;

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

    public function goToRoute() {
        foreach ($this->routes as $route) {
            if ($route['route'] == $this->uri && $this->method == $route['type']) {
                $controller = new $route['controller'];
                $controller->{$route['method']}();
            }
        }
    }

    public function addRoute($route, $controller, $method, $type) {
        $this->routes[] = [
            'route' => $route,
            'controller' => $controller,
            'method' => $method,
            'type' => $type
        ];
    }
}
