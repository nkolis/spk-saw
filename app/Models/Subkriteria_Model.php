<?php

namespace SPK\App\Models;

use SPK\App\Core\Database;
use SPK\App\Repository\Repository;


class Subkriteria_Model
{
    private Database $conn;
    private string $table;
    public function __construct()
    {
        $this->conn = new Database;
        $this->table = "subkriteria";
    }

    function findById($id)
    {
        //$result = $this->repository->findById($param, $id);
        $query = "SELECT s.id_subkriteria, k.id_kriteria, k.nama_kriteria, s.nama_subkriteria, s.bobot FROM {$this->table} s join kriteria k ON k.id_kriteria = s.id_kriteria WHERE s.id_kriteria = ?";
        return $this->conn->query($query, [$id]);
    }


    function add(array $values)
    {
        $query = "INSERT INTO {$this->table} (id_kriteria, nama_subkriteria, bobot)VALUES(?, ?, ?)";
        $this->conn->query($query, $values);
        if ($this->conn->rowCount() > 0) {
            return true;
        }
        return false;
    }

    function update(string $params, string $param, $values)
    {
        $this->repository->update($params, $param, $values);
        if ($this->repository->rowCount() > 0) {
            return true;
        }
        return false;
    }

    function remove(string $id)
    {
        return $this->repository->delete('id', $id);
    }
}
