<?php

use App\Controllers\IndexController;
use App\Core\Request;
use App\Core\Application;

define("BASEPATH", __DIR__ . "/../");

require_once __DIR__ . "/../vendor/autoload.php";

$app = new Application();

include(__DIR__ . "/../app/Core/boot/boot.php");

$app->run();
