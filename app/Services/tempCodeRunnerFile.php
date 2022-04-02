<?php
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