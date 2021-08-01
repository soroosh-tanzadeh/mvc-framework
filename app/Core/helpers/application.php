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
