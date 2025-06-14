<?php
declare(strict_types = 1);

namespace App;

define('BASEPATH', __DIR__ . '');

class Router
{
    protected $routes = [];

    private function addRoute(string $route, string $controller, string $action, string $method):void
    {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get(string $route, string $controller, string $action):void
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function dispatch():void
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];

        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            throw new \Exception("No route found for URI: $uri");
        }
    }
}
