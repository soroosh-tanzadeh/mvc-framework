<?php

namespace App\Middlewares;

use Closure;
use App\Core\Http\Request;
use App\Core\Http\Middleware;

class SecondMiddleware extends Middleware
{
    public function handle(Request $request): bool
    {
        return true;
    }
}
