<?php

namespace SPK\App\Controllers;

use SPK\App\Core\Router;
use SPK\App\Core\Controller;

class PendudukController extends Controller
{

    function index()
    {
        $model = [
            "title" => "Penduduk",
            "penduduk" => $this->model('Penduduk_Model')->findAll(),
        ];
        $this->view('penduduk', $model);
    }

    function getById()
    {
        echo json_encode([
            "penduduk" => $this->model('Penduduk_Model')->findById(Router::getParamaterValue()[0])
        ]);
        exit;
    }

    function getByNik()
    {
        echo json_encode([
            "penduduk" => $this->model('Penduduk_Model')->findByNik(Router::getParamaterValue()[0])
        ]);
        exit;
    }

    function tambahPenduduk()
    {
        if (isset($_POST['submit'])) {

            $values = [
                htmlspecialchars($_POST['nik']),
                htmlspecialchars($_POST['nama']),
                htmlspecialchars($_POST['jenkel']),
                htmlspecialchars($_POST['alamat'])
            ];



            if ($this->model('Penduduk_Model')->add($values)) {
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

    function editPenduduk()
    {
        if (isset($_POST['submit'])) {

            $values = [
                htmlspecialchars($_POST['nik']),
                htmlspecialchars($_POST['nama']),
                htmlspecialchars($_POST['jenkel']),
                htmlspecialchars($_POST['alamat']),
                htmlspecialchars($_POST['id_penduduk'])
            ];


            if ($this->model('Penduduk_Model')->update($values)) {
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

    function hapusPenduduk()
    {
        $this->model('Penduduk_Model')->remove(Router::getParamaterValue()[0]);

        header("Location: {$_SERVER['HTTP_REFERER']} ");
    }
}
