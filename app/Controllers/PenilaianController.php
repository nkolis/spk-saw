<?php

namespace SPK\App\Controllers;

use SPK\App\Cores\View;
use SPK\App\Repository\Repository;
use SPK\App\Services\PenilaianService;

class PenilaianController
{
    function index()
    {

        $repository = new Repository("data_alternatif");
        $service = new PenilaianService($repository);
        $service->getPrefrensi();
        $model = [
            "title" => "Penilaian",
            "alternatif" => $service->getMatrik(),
            "alternatif_normalisasi" => $service->getNormalisasiMatrik(),
            "alternatif_prefensi" => $service->getPrefrensi()
        ];
        View::render('penilaian', $model);
    }
}
