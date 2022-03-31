<?php

namespace SPK\App\Controllers;

use SPK\App\Cores\Router;
use SPK\App\Cores\View;
use SPK\App\Repository\Repository;
use SPK\App\Services\KriteriaService;
use SPK\App\Services\SubkriteriaService;

class KriteriaController
{

    private Repository $repository;
    private KriteriaService $service;

    public function __construct()
    {
        $this->repository = new Repository('kriteria');
        $this->service = new KriteriaService($this->repository);
    }

    function index()
    {
        $model = [
            "title" => "Kriteria",
            "kriteria" => $this->service->findAll()
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

    function subkriteria()
    {

        $subkriteriaRepo = new Repository('subkriteria');
        $subkriteriaServ = new SubkriteriaService($subkriteriaRepo);
        $model = [
            "title" => "Subkriteria",
            "subkriteria" => $subkriteriaServ->findById('id_kriteria',  Router::getParamaterValue()[0]),
            "kriteria" => $this->service->findById('id_kriteria', Router::getParamaterValue()[0])
        ];
        View::render('kriteria/subkriteria', $model);
    }

    function tambahKriteria()
    {

        if (isset($_POST['submit'])) {
            $parameter = 'id_kriteria, nama_kriteria, bobot, tipe';
            $values = [
                $_POST['id_kriteria'],
                $_POST['nama_kriteria'],
                $_POST['bobot_kriteria'],
                $_POST['tipe_kriteria']
            ];


            if (is_array($this->service->add($parameter, $values))) {


                header('Location: /kriteria');
                exit;
            } else {
                echo "<script>alert('Kriteria gagal ditambah');window.location.href = '/kriteria'</script>";
                exit;
            }
        }
    }
}
