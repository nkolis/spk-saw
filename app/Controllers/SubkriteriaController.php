<?php

namespace SPK\App\Controllers;

use SPK\App\Core\Router;
use SPK\App\Core\Controller;

class SubkriteriaController extends Controller
{

    function index()
    {
        $model = [
            "title" => "Kriteria",
            "subkriteria" => $this->model('Subkriteria_Model')->findById('id_kriteria', Router::getParamaterValue()[0])
        ];
        $this->view('kriteria/subkriteria', $model);
    }

    function tambah()
    {
        $model = [
            "title" => "Tambah Kriteria"
        ];
        $this->view('kriteria/tambah', $model);
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
