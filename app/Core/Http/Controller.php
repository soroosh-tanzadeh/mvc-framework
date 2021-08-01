<?php

namespace App\Core\Http;

use App\Core\Http\Middleware;
use App\Core\Utilities\MiddlewareIterator;
use App\Core\Utilities\ObjectArray;

class Controller
{
    private ObjectArray $middlewaresArray;

    public function __construct()
    {
        $this->middlewares();
    }

    protected function middlewares(): ObjectArray
    {
        $this->middlewaresArray = new ObjectArray(Middleware::class);
        return $this->middlewaresArray;
    }

    public function getMiddlewares(): MiddlewareIterator
    {
        return new MiddlewareIterator($this->middlewaresArray->getIterator());
    }
}
