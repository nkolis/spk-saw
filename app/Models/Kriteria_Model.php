<?php

namespace SPK\App\Models;

use SPK\App\Repository\Repository;


class Kriteria_Model
{
    private Repository $repository;
    public function __construct()
    {
        $this->repository = new Repository('kriteria');
    }

    function findById($param, $id)
    {
        $result = $this->repository->findById($param, $id);
        if (is_array($result)) return $result;
        return [];
    }

    function findAll()
    {
        return $this->repository->getAll();
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
