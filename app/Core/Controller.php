<?php

namespace App\Core;

use App\Core\Http\Middleware;
use App\Core\Utilities\MiddlewareIterator;
use App\Core\Utilities\ObjectArray;

class Controller
{
    private ObjectArray $middlewaresArray;

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
