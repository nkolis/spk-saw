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

    function getById()
    {
        echo json_encode([
            "kriteria" => $this->model('Kriteria_Model')->findById(Router::getParamaterValue()[0])
        ]);
        exit;
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

            $values = [
                htmlspecialchars($_POST['id_kriteria']),
                htmlspecialchars($_POST['nama_kriteria']),
                htmlspecialchars($_POST['bobot_kriteria']),
                htmlspecialchars($_POST['tipe_kriteria'])
            ];

            if ($this->model('Kriteria_Model')->add($values)) {
                header("Location: {$_SERVER['HTTP_REFERER']} ");
                exit;
            } else {
                echo "<script>Toast.fire({
                    icon: 'error',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                  });window.location.href = '/kriteria'</script>";
                exit;
            }
        }
    }

    function editKriteria()
    {
        if (isset($_POST['submit'])) {


            $values = [
                htmlspecialchars($_POST['nama_kriteria']),
                htmlspecialchars($_POST['bobot_kriteria']),
                htmlspecialchars($_POST['tipe_kriteria']),
                htmlspecialchars($_POST['id_kriteria'])
            ];

            if ($this->model('Kriteria_Model')->update($values)) {
                header('Location: /kriteria');
                exit;
            } else {
                echo "<script>alert('Kriteria gagal ditambah');window.location.href = '/kriteria'</script>";
                exit;
            }
        }
    }

    function hapusKriteria()
    {
        $this->model('Kriteria_Model')->remove(Router::getParamaterValue()[0]);
        header('Location: /kriteria');
    }
}
