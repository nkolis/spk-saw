<?php
use PHPUnit\Framework\TestCase;
use SPK\App\Repository\Repository;
use SPK\App\Services\KriteriaService;

class KriteriaTest extends TestCase
{
    function testAdd(){
        $service = new Repository("kriteria");
        $result = $service->add('id_kriteria,nama_kriteria,bobot,tipe', ["C4", "Umur", 7, "benefit"]);
        var_dump($result);

    }

    function testFindById(){
        $service = new Repository("kriteria");
        $result = $service->findById('id_kriteria', 'C4');
        var_dump($result);
    }

    function testGetAll(){
        $repository = new Repository("kriteria");
        $service = new KriteriaService($repository);
        $result = $service->findAll();
        var_dump($result);
    }

    function testUpdate(){
        $service = new Repository("kriteria");
        $result = $service->update('nama_kriteria = ?, bobot = ?, tipe = ?', 'id_kriteria', ['PDKFJDKJF', 2, 'Cost', 'C1']);
        var_dump($result);
    }

    function testDelete(){
        $service = new Repository("kriteria");
        $result = $service->delete('id_kriteria', 'c4');
        var_dump($service->getAll());
    }
}