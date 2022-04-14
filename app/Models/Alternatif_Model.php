<?php

namespace SPK\App\Models;

use SPK\App\Core\Database;
use SPK\App\Repository\Repository;


class Alternatif_Model
{
    private Repository $repository;
    private Database $conn;
    private string $table;
    public function __construct()
    {
        $this->repository = new Repository('alternatif');
        $this->conn = new Database();
        $this->table = "alternatif";
    }

    function findAll()
    {
        return $this->conn->query("SELECT * FROM {$this->table}");
    }

    function findById($id)
    {

        $query = "
            select a.id_alternatif, k.id_kriteria, s.id_subkriteria, a.nama_alternatif, 
            k.nama_kriteria,
            s.nama_subkriteria
            from data_alternatif da join 
            alternatif a on a.id_alternatif = da.id_alternatif join
            kriteria k on k.id_kriteria = da.id_kriteria left join
            subkriteria s on s.id_subkriteria = da.id_subkriteria
            where da.id_alternatif = ?;
        ";
        $result = $this->repository->otherQuery($query, [$id]);
        $map = [];

        foreach ($result as $row) {

            $map[$row['id_alternatif']]["nama_alternatif"] = $row['nama_alternatif'];
            $map[$row['id_alternatif']][$row["id_kriteria"]] = $row['id_subkriteria'];
        }

        $result = [];
        foreach ($map as $index => $row) {
            $result[] = $row;
        }

        return $result;
    }

    function add(array $values)
    {

        $alternatif = [
            $values['nik'],
            $values['nama_alternatif']
        ];

        $this->conn->query("INSERT INTO {$this->table} (nik, nama_alternatif)VALUES(?, ?)", $alternatif);
        $id_alternatif = $this->conn->lastInsertId();
        unset($values['nik']);
        unset($values['nama_alternatif']);
        foreach ($values as $key => $row) {
            $value = [
                $id_alternatif,
                $key,
                $row
            ];
            $this->conn->query("INSERT INTO data_alternatif (id_alternatif, id_kriteria, id_subkriteria)VALUES(?, ?, ?)", $value);
        }
        if ($this->conn->rowCount() > 0) {
            return true;
        }
        return false;
    }

    function update(array $values)
    {

        foreach ($values as $key => $row) {
            if ($key != 'id_alternatif') {
                $data = [
                    $values[$key],
                    $values['id_alternatif'],
                    $key
                ];
                $query = "UPDATE data_alternatif SET id_subkriteria = ? WHERE id_alternatif = ? AND id_kriteria = ?";
                $this->conn->query($query, $data);
            }
        }
        if ($this->conn->rowCount() > 0) {
            return true;
        }
        return false;
    }



    function remove(string $id)
    {
        $this->conn->query("DELETE FROM data_alternatif WHERE id_alternatif = ?", [$id]);
        $this->conn->query("DELETE FROM alternatif WHERE id_alternatif = ?", [$id]);
        if ($this->conn->rowCount() > 0) {
            return true;
        }
        return false;
    }

    function findByIdDynamic(string|int $id)
    {

        $query = "
            select a.id_alternatif, k.id_kriteria, s.id_subkriteria, a.nama_alternatif, 
            k.nama_kriteria,
            s.nama_subkriteria
            from data_alternatif da join 
            alternatif a on a.id_alternatif = da.id_alternatif join
            kriteria k on k.id_kriteria = da.id_kriteria left join
            subkriteria s on s.id_subkriteria = da.id_subkriteria
            where da.id_alternatif = ?;
        ";
        $result = $this->repository->otherQuery($query, [$id]);
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
