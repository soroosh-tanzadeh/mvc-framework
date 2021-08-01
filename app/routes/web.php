<?php

use App\Controllers\IndexController;
use App\Core\Http\Request;

app()->router->get("/", function (Request $request) {
    return session_id();
});

app()->router->get("/contact", [IndexController::class, "index"]);
