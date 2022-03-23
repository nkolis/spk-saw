<?php

namespace SPK\App\Controllers;

use SPK\App\Cores\View;

class PenilaianController
{
    function index()
    {
        $model = [
            "title" => "Penilaian"
        ];
        View::render('penilaian', $model);
    }
}
