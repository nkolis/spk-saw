<?php

namespace SPK\App\Controllers;

use SPK\App\Core\Router;
use SPK\App\Core\Controller;

class SubkriteriaController extends Controller
{

    function index()
    {
        $idkriteria = Router::getParamaterValue()[0];
        $model = [
            "title" => "Kriteria",
            "kriteria" => $this->model('Kriteria_Model')->findById($idkriteria),
            "subkriteria" => $this->model('Subkriteria_Model')->findByIdKriteria($idkriteria)
        ];
        $this->view('kriteria/subkriteria', $model);
    }

    function getById()
    {
        echo json_encode([
            "subkriteria" => $this->model('Subkriteria_Model')->findById(Router::getParamaterValue()[0])
        ]);
        exit;
    }

    function tambahSubkriteria()
    {
        if (isset($_POST['submit'])) {

            $values = [
                htmlspecialchars($_POST['id_kriteria']),
                htmlspecialchars($_POST['nama_subkriteria']),
                htmlspecialchars($_POST['bobot_subkriteria'])
            ];



            if ($this->model('Subkriteria_Model')->add($values)) {
                header("Location: {$_SERVER['HTTP_REFERER']} ");
                exit;
            } else {
                echo "<script>Toast.fire({
                    icon: 'error',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                  });window.location.href = '/subkriteria'</script>";
                exit;
            }
        }
    }

    function editSubkriteria()
    {
        if (isset($_POST['submit'])) {

            $values = [
                htmlspecialchars($_POST['nama_subkriteria']),
                htmlspecialchars($_POST['bobot_subkriteria']),
                htmlspecialchars($_POST['id_subkriteria'])
            ];


            if ($this->model('Subkriteria_Model')->update($values)) {
                header("Location: {$_SERVER['HTTP_REFERER']} ");
                exit;
            } else {
                echo "<script>Toast.fire({
                    icon: 'error',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                  });window.location.href = '/subkriteria'</script>";
                exit;
            }
        }
    }

    function hapusSubkriteria()
    {
        $this->model('Subkriteria_Model')->remove(Router::getParamaterValue()[0]);

        header("Location: {$_SERVER['HTTP_REFERER']} ");
    }
}
