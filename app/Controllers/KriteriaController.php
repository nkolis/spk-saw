<?php

namespace SPK\App\Controllers;

use SPK\App\Cores\View;

class KriteriaController
{
    function index()
    {
        $model = [
            "title" => "Kriteria"
        ];
        View::render('kriteria', $model);
    }

    function tambah()
    {
        $model = [
            "title" => "Tambah Kriteria"
        ];
        View::render('kriteria/tambah', $model);
    }
}
