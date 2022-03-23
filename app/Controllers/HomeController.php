<?php

namespace SPK\App\Controllers;

use SPK\App\Cores\View;

class HomeController
{
    function index()
    {
        $model = [
            "title" => "Dashboard"
        ];
        View::render('home', $model);
    }
}
