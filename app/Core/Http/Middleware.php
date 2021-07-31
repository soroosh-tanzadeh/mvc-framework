<?php

namespace App\Core\Http;

use App\Core\Request;

abstract class Middleware
{
    public abstract function handle(Request $request): bool;
}
