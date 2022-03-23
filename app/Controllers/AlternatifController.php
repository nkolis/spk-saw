<?php

namespace SPK\App\Controllers;

use SPK\App\Cores\View;

class AlternatifController
{
    function index()
    {
        $model = [
            "title" => "Alternatif"
        ];
        View::render('alternatif', $model);
    }
}
