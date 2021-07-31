<?php

use App\Controllers\IndexController;
use App\Core\Request;

app()->router->get("/", function (Request $request) {
    return "hi";
});

app()->router->get("/contact", [IndexController::class, "index"]);
