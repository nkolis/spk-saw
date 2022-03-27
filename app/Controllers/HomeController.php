<?php

namespace SPK\App\Controllers;

use SPK\App\Cores\View;
use SPK\App\Repository\Repository;
use SPK\App\Services\{KriteriaService};

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
