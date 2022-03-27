<?php

namespace SPK\App\Services;
use SPK\App\Repository\Repository;


class KriteriaService {
    public function __construct(private Repository $repository)
    {
        
    }

    function findAll(){
        return $this->repository->getAll();
    }

    function add(string $params, array $values){
        return $this->repository->add($params, $values);
    }
}