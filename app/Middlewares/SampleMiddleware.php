<?php

namespace App\Middlewares;

use Closure;
use App\Core\Http\Request;
use App\Core\Http\Middleware;

class SampleMiddleware extends Middleware
{
    public function handle(Request $request): bool
    {
        return $request->has("name") && $request->has("username") && $request->has("password") && $request->has("email");
    }
}
