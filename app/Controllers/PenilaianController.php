<?php

namespace SPK\App\Controllers;

use SPK\App\Core\Controller;

class PenilaianController extends Controller
{
    function index()
    {
        $penilaian_model = $this->model('Penilaian_Model');
        $model = [
            "title" => "Penilaian",
            "alternatif" => $penilaian_model->getMatrik(),
            "alternatif_normalisasi" => $penilaian_model->getNormalisasiMatrik(),
            "alternatif_prefensi" => $penilaian_model->getPrefrensi()
        ];
        $this->view('penilaian', $model);
    }
}
