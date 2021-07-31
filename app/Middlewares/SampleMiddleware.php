<?php

namespace App\Middlewares;

use App\Core\Http\Middleware;
use App\Core\Request;
use Closure;

class SampleMiddleware extends Middleware
{
    public function handle(Request $request): bool
    {
        return $request->has("id");
    }
}
