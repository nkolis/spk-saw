<?php

namespace SPK\App\Models;

use SPK\App\Repository\Repository;


class Subkriteria_Model
{
    private Repository $repository;
    public function __construct()
    {
        $this->repository = new Repository('subkriteria');
    }

    function findById($param, $id)
    {
        //$result = $this->repository->findById($param, $id);
        $query = "SELECT s.id_subkriteria, k.id_kriteria, k.nama_kriteria, s.nama_subkriteria, s.bobot FROM subkriteria s join kriteria k ON k.id_kriteria = s.id_kriteria WHERE s.$param = ?";
        $result = $this->repository->otherQuery($query, [$id]);
        if (is_array($result)) return $result;
        return [];
    }


    function add(string $params, array $values)
    {
        return $this->repository->add($params, $values);
    }

    function remove(string $id)
    {
        return $this->repository->delete('id', $id);
    }
}
