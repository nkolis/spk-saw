<?php

namespace SPK\App\Controllers;

use SPK\App\Core\Router;
use SPK\App\Core\Controller;

class KriteriaController extends Controller
{

    function index()
    {
        $model = [
            "title" => "Kriteria",
            "kriteria" => $this->model('Kriteria_Model')->findAll()
        ];
        $this->view('kriteria', $model);
    }

    function tambah()
    {
        $model = [
            "title" => "Tambah Kriteria"
        ];
        $this->view('kriteria/tambah', $model);
    }

    // function subkriteria()
    // {

    //     $subkriteriaRepo = new Repository('subkriteria');
    //     $subkriteriaServ = new Subkriteria_Model($subkriteriaRepo);
    //     $model = [
    //         "title" => "Subkriteria",
    //         "subkriteria" => $subkriteriaServ->findById('id_kriteria',  Router::getParamaterValue()[0]),
    //         "kriteria" => $this->service->findById('id_kriteria', Router::getParamaterValue()[0])
    //     ];
    //     View::render('kriteria/subkriteria', $model);
    // }

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


            if (is_array($this->model('Kriteria_Model')->add($parameter, $values))) {


                header('Location: /kriteria');
                exit;
            } else {
                echo "<script>alert('Kriteria gagal ditambah');window.location.href = '/kriteria'</script>";
                exit;
            }
        }
    }
}
