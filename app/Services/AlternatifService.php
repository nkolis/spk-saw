<?php

namespace SPK\App\Services;

use SPK\App\Repository\Repository;


class AlternatifService
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

    function getAlternatifByIdDynamic(string|int $id)
    {

        $query = "
            select a.id_alternatif, k.id_kriteria, s.id_subkriteria, a.nama_alternatif, 
            k.nama_kriteria,
            s.nama_subkriteria
            from data_alternatif da join 
            alternatif a on a.id_alternatif = da.id_alternatif join
            kriteria k on k.id_kriteria = da.id_kriteria join
            subkriteria s on s.id_subkriteria = da.id_subkriteria
            where da.id_alternatif = ?;
        ";
        $result = $this->repository->findByIdDynamic($query, [$id]);
        $map = [];

        foreach ($result as $row) {

            $map[$row['id_alternatif']]["nama_alternatif"] = $row['nama_alternatif'];
            $map[$row['id_alternatif']][$row["nama_kriteria"]] = $row['nama_subkriteria'];
        }

        $result = [];
        foreach ($map as $index => $row) {
            $result[] = $row;
        }

        return $result;
    }
}
