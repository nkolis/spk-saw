<?php

namespace SPK\App\Controllers;

use SPK\App\Cores\View;

class LaporanController
{
    function index()
    {
        $model = [
            "title" => "Laporan"
        ];
        View::render('laporan', $model);
    }
}
