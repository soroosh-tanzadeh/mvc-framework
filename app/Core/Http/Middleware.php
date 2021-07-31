<?php

namespace App\Core\Http;

abstract class Middleware
{
    public abstract function handle(Request $request, $next);
}
