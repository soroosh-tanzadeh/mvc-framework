<?php

namespace App\Core\Http;

use App\Core\Http\Request;


abstract class Middleware
{
    public abstract function handle(Request $request): bool;
}
