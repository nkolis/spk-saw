<?php

namespace SPK\App\Controllers;

use SPK\App\Cores\View;

class PenggunaController
{
    function index()
    {
        $model = [
            "title" => "Pengguna"
        ];
        View::render('pengguna', $model);
    }
}
