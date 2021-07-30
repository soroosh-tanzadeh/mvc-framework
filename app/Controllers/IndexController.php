<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Controller;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        $request_body = $request->getBody();
        return view("index", ['app' => env("APP_NAME"), "id" => $request_body['id']]);
    }
}
