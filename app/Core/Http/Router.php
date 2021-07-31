<?php

namespace App\Core\Http;

use Closure;
use Exception;

class Router
{

    protected array $routes = [
        "get" => [],
        "post" => [],
        "put" => [],
        "delete" => [],
    ];
    private Request $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(string $path, $action)
    {
        $this->routes['get'][$path] = $action;
    }

    public function post($path, $action)
    {
        $this->routes['post'][$path] = $action;
    }

    public function delete($path, $action)
    {
        $this->routes['delete'][$path] = $action;
    }

    public function put($path, $action)
    {
        $this->routes['put'][$path] = $action;
    }

    private function call_controller_callback($callback): string
    {
        $functionToCall = "__invoke";
        $controller = null;

        if (gettype($callback) === 'string') {
            $controller = new $callback();
        } elseif (gettype($callback) === 'array') {
            $functionToCall = $callback[1];
            $controller = new $callback[0]();
        } else {
            throw new Exception("Invalid Router callback");
        }

        if ($controller instanceof Controller) {
            $middlewares = $controller->getMiddlewares();
            foreach ($middlewares as $key => $value) {
                $middleware = $middlewares->current();
                $goNext = $middleware->handle($this->request);
                if (gettype($goNext) != "boolean") {
                    return $goNext;
                } elseif (!$goNext) {
                    return "";
                }
            }

            return call_user_func([$controller, $functionToCall], $this->request);
        }
        return "";
    }

    public function resolve(): void
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            http_response_code(404);
            echo "Not Found";
            exit;
        }

        if (gettype($callback) === 'string' || gettype($callback) === 'array') {
            echo $this->call_controller_callback($callback);
        } else {
            echo call_user_func($callback, $this->request);
        }
    }
}
