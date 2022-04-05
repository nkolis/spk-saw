<?php

namespace SPK\App\Controllers;

use SPK\App\Core\Controller;

class LaporanController extends Controller
{
    function index()
    {
        $model = [
            "title" => "Laporan"
        ];
        $this->view('laporan', $model);
    }
}
