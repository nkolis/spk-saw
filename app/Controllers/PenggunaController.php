<?php

namespace SPK\App\Controllers;

use SPK\App\Core\Controller;
use SPK\App\Core\View;

class PenggunaController extends Controller
{
    function index()
    {
        $model = [
            "title" => "Pengguna"
        ];
        $this->view('pengguna', $model);
    }
}
