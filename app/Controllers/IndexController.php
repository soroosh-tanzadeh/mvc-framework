<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Controller;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        $id = $request->get("id");
        return view("index", ['app' => env("APP_NAME"), "id" => $id]);
    }
}
