<?php

use App\Controllers\IndexController;
use App\Core\Request;
use App\Core\Application;

require_once __DIR__ . "/../vendor/autoload.php";

$app = new Application();

include(__DIR__ . "/../app/Core/boot/boot.php");

$app->router->get("/", function (Request $request) {
    return "hi";
});

$app->router->get("/contact", [IndexController::class, "index"]);

$app->run();
