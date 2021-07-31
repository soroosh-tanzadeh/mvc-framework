<?php

namespace App\Middlewares;

use App\Core\Request;
use Closure;

class SampleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $next();
    }
}
