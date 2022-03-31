<?php

namespace SPK\App\Services;

use SPK\App\Repository\Repository;


class SubkriteriaService
{
    public function __construct(private Repository $repository)
    {
    }

    function findAll()
    {
        return $this->repository->getAll();
    }

    function findById($param, $id)
    {
        $result = $this->repository->findById($param, $id);
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
