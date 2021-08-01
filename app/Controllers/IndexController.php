<?php

namespace App\Controllers;

use App\Core\Http\Controller;
use App\Core\Http\Request;
use App\Middlewares\SampleMiddleware;
use App\Middlewares\SecondMiddleware;
use App\Models\User;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        return view("index", ['app' => env("APP_NAME")]);
    }

    public function contact(Request $request)
    {
        return view("contact", ['user' => User::findByKey($request->get("id"))]);
    }
}
