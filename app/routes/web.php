<?php

use App\Controllers\IndexController;
use App\Core\Http\Request;

app()->router->get("/", [IndexController::class, "index"]);

app()->router->get("/contact", [IndexController::class, "contact"]);
