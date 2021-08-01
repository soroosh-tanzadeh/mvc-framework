<?php

namespace App\Controllers;

use App\Core\Http\Controller;
use App\Core\Http\Request;
use App\Middlewares\SampleMiddleware;
use App\Middlewares\SecondMiddleware;
use App\Models\User;

class IndexController extends Controller
{

    public function __construct()
    {
        $this->middlewares()->add(new SampleMiddleware());
    }

    public function index(Request $request)
    {

        $user = new User();
        $user->name = $request->get("name");
        $user->username = $request->get("username");
        $user->password = $request->get("password");
        $user->email = $request->get("email");
        $user->insert();

        return view("index", ['app' => env("APP_NAME"), "id" => $id]);
    }
}
