<?php

namespace App\Core;

use function PHPSTORM_META\type;

use Closure;

class Router
{

    protected array $routes = [];
    private Request $request;


    public function __construct($request)
    {
        $this->request = $request;
    }

    public function get($path, $action)
    {
        $this->routes['get'][$path] = $action;
    }

    public function post($path, Closure $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            http_response_code(404);
            echo "Not Found";
            exit;
        }

        if (gettype($callback) === 'string') {
            echo call_user_func([new $callback, "__invoke"], $this->request);
        } elseif (gettype($callback) === 'array') {
            $controller = new $callback[0];
            echo call_user_func([$controller, $callback[1]], $this->request);
        } else {
            echo call_user_func($callback, $this->request);
        }
    }
}
