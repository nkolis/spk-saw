<?php

namespace SPK\App\Controllers;

use SPK\App\Core\Controller;

class HomeController extends Controller
{
    function index()
    {
        $model = [
            "title" => "Dashboard"
        ];
        $this->view('home', $model);
    }
}
