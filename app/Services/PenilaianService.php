<?php

namespace SPK\App\Services;

use SPK\App\Repository\Repository;


class PenilaianService
{
    public function __construct(private Repository $repository)
    {
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

    function getMatrik()
    {
        $query = "
        select a.id_alternatif, k.id_kriteria, s.id_subkriteria, a.nama_alternatif, 
        k.nama_kriteria,
        s.bobot
        from data_alternatif da join 
        alternatif a on a.id_alternatif = da.id_alternatif join
        kriteria k on k.id_kriteria = da.id_kriteria join
        subkriteria s on s.id_subkriteria = da.id_subkriteria;
    ";
        $result = $this->repository->findAllDynamic($query);
        $map = [];

        foreach ($result as $row) {

            $map[$row['id_alternatif']]["nama_alternatif"] = $row['nama_alternatif'];
            $map[$row['id_alternatif']][$row["id_kriteria"]] = $row['bobot'];
        }

        $result = [];
        foreach ($map as $index => $row) {
            $result[] = $row;
        }

        return $result;
    }

    function getNormalisasiMatrik()
    {
        $query = "
        select a.id_alternatif, k.id_kriteria, k.tipe, k.bobot, s.id_subkriteria, a.nama_alternatif, 
        k.nama_kriteria,
        s.bobot
        from data_alternatif da join 
        alternatif a on a.id_alternatif = da.id_alternatif join
        kriteria k on k.id_kriteria = da.id_kriteria join
        subkriteria s on s.id_subkriteria = da.id_subkriteria;
    ";
        $result = $this->repository->findAllDynamic($query);
        $map = [];
        foreach ($result as $row) {

            $map[$row['id_alternatif']]["nama_alternatif"] = $row['nama_alternatif'];
            if ($row['tipe'] == 'benefit') {
                $map[$row['id_alternatif']][$row["id_kriteria"]] = $row['bobot'] / max(array_column($result, 'bobot'));
            } else {
                $map[$row['id_alternatif']][$row["id_kriteria"]] = min(array_column($result, 'bobot')) / $row['bobot'];
            }
        }

        $result = [];
        foreach ($map as $index => $row) {
            $result[] = $row;
        }

        return $result;
    }
}
