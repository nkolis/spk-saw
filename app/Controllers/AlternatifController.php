<?php

namespace SPK\App\Controllers;

use SPK\App\Cores\Router;
use SPK\App\Cores\View;
use SPK\App\Repository\Repository;
use SPK\App\Services\AlternatifService;

class AlternatifController
{

    private Repository $repository;
    private AlternatifService $service;

    public function __construct()
    {
        $this->repository = new Repository('alternatif');
        $this->service = new AlternatifService($this->repository);
    }

    function index()
    {
        $model = [
            "title" => "Alternatif",
            "alternatif" => $this->service->findAll()
        ];
        View::render('alternatif', $model);
    }

    function detail()
    {

        $model = [
            "title" => "Detail Alternatif",
            "alternatif" => $this->service->getAlternatifByIdDynamic(Router::getParamaterValue()[0])
        ];
        echo json_encode($model);
        exit;
    }
}
