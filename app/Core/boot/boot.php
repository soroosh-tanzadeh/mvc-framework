<?php

/** 
 * 
 * @return App\Core\Application
 */
function app()
{
    global $app;
    return $app;
}

function env(string $option)
{
    return $_ENV[$option];
}

/** 
 * 
 * @return string
 */
function view(string $view, array $data)
{
    return app()->view($view, $data);
}
