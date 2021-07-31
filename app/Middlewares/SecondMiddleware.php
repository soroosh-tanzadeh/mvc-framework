<?php

namespace App\Middlewares;

use App\Core\Http\Middleware;
use App\Core\Request;
use Closure;

class SecondMiddleware extends Middleware
{
    public function handle(Request $request): bool
    {
        return true;
    }
}
