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
            "alternatif" => $this->model('Alternatif_Model')->findAll(),
            "kriteria" => $this->model('Kriteria_Model')->findAll(),
            "subkriteria" => $this->model('Subkriteria_Model')->findAll()
        ];
        $this->view('alternatif', $model);
    }

    function detail()
    {

        $model = [
            "title" => "Detail Alternatif",
            "alternatif" => $this->model('Alternatif_Model')->findByIdDynamic(Router::getParamaterValue()[0])
        ];

        $this->render("alternatif/modal/detail", $model);
    }

    function getById()
    {
        echo json_encode([
            "alternatif" => $this->model('Alternatif_Model')->findById(Router::getParamaterValue()[0])
        ]);
        exit;
    }

    function formAddAlternatif()
    {
        $model = [
            "title" => "Alternatif",
            "alternatif" => $this->model('Alternatif_Model')->findAll(),
            "kriteria" => $this->model('Kriteria_Model')->findAll(),
            "subkriteria" => $this->model('Subkriteria_Model')->findAll()
        ];

        $this->render("alternatif/modal/tambah", $model);
    }

    function formEditAlternatif()
    {
        $alternatifmodel =  $this->model('Alternatif_Model');
        $model = [
            "title" => "Alternatif",
            "alternatif" => $alternatifmodel->findAll(),
            "kriteria" => $this->model('Kriteria_Model')->findAll(),
            "subkriteria" => $this->model('Subkriteria_Model')->findAll(),
        ];

        $this->render("alternatif/modal/edit", $model);
    }

    function tambahAlternatif()
    {

        if ($this->model('Alternatif_Model')->add($_POST)) {
            header("Location: {$_SERVER['HTTP_REFERER']} ");
            exit;
        };
    }

    function editAlternatif()
    {

        if ($this->model('Alternatif_Model')->update($_POST)) {
            header("Location: {$_SERVER['HTTP_REFERER']} ");
            exit;
        };
    }


    function hapusAlternatif()
    {
        $this->model('Alternatif_Model')->remove(Router::getParamaterValue()[0]);
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}
