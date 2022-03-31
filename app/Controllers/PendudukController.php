<?php

namespace SPK\App\Controllers;

use SPK\App\Cores\View;
use SPK\App\Repository\Repository;
use SPK\App\Services\PendudukService;

class PendudukController
{

    private Repository $repository;
    private PendudukService $service;

    public function __construct()
    {
        $this->repository = new Repository('penduduk');
        $this->service = new PendudukService($this->repository);
    }

    function index()
    {
        $model = [
            "title" => "Penduduk",
            "penduduk" => $this->service->findAll()
        ];
        View::render('penduduk', $model);
    }

    function tambah()
    {
        $model = [
            "title" => "Tambah Kriteria"
        ];
        View::render('kriteria/tambah', $model);
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
