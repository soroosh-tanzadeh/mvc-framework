<?php

use App\Core\Application;

/** 
 * 
 * @return App\Core\Application
 */
function app(): Application
{
    return Application::$app;
}

function env(string $option): string
{
    return $_ENV[$option];
}
