<?php

namespace SPK\App\Controllers;

use SPK\App\Cores\View;
use SPK\App\Repository\Repository;
use SPK\App\Services\KriteriaService;

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

    function tambahKriteria(){

        if(isset($_POST['submit'])){
            $parameter = 'id_kriteria, nama_kriteria, bobot, tipe';
            $values = [
                $_POST['id_kriteria'],
                $_POST['nama_kriteria'],
                $_POST['bobot_kriteria'],
                $_POST['tipe_kriteria']
            ];
        
    
            if(is_array($this->service->add($parameter, $values))){

                $countkriteria = count($this->service->findAll());

                $column_name = strtolower(str_replace(" ", "_", $values[1]));
                $alternatif_last = $this->repository->findLastInsertId("SELECT nama_kriteria FROM kriteria ORDER BY id ASC LIMIT 2");

                if($countkriteria <= 1){
                    $this->service->alter('alternatif', $column_name, "varchar(50) not null after nama_alternatif");
                } else {
                    $this->service->alter('alternatif', $column_name, "varchar(50) not null after {$alternatif_last[0]['nama_kriteria']}");
                }

                header('Location: /kriteria');
                exit;
            } else {
                echo "<script>alert('Kriteria gagal ditambah');window.location.href = '/kriteria'</script>";
                exit;
            }
        }
    }
}
