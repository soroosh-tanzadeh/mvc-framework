<?php

namespace App\Controllers;

use App\Core\Http\Controller;
use App\Core\Http\Request;
use App\Middlewares\SampleMiddleware;
use App\Middlewares\SecondMiddleware;

class IndexController extends Controller
{

    public function __construct()
    {
        $this->middlewares()->add(new SampleMiddleware())->add(new SecondMiddleware());
    }

    public function index(Request $request)
    {
        $id = $request->get("id");
        return view("index", ['app' => env("APP_NAME"), "id" => $id]);
    }
}
