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

function isAssoc(array $arr)
{
    if (count($arr) < 1) {
        return false;
    }
    return array_keys($arr) !== range(0, count($arr) - 1);
}
