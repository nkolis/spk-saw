<?php

namespace SPK\App\Controllers;

use SPK\App\Core\Controller;
use SPK\App\Core\Router;

class AlternatifController extends Controller
{

    function index()
    {
        $model = [
            "title" => "Alternatif",
            "alternatif" => $this->model('Alternatif_Model')->findAll()
        ];
        $this->view('alternatif', $model);
    }

    function detail()
    {

        $model = [
            "title" => "Detail Alternatif",
            "alternatif" => $this->model('Alternatif_Model')->findByIdDynamic(Router::getParamaterValue()[0])
        ];
        echo json_encode($model);
        exit;
    }
}
