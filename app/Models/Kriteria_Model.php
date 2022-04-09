<?php

namespace SPK\App\Models;

use SPK\App\Core\Database;
use SPK\App\Repository\Repository;


class Kriteria_Model
{
    private Repository $repository;
    private Database $conn;
    private string $table;
    public function __construct()
    {
        $this->repository = new Repository('kriteria');
        $this->conn = new Database();
        $this->table = "kriteria";
    }

    function findById($id)
    {
        $result = $this->conn->query("SELECT * FROM {$this->table} WHERE id_kriteria = ?", [$id]);
        if (is_array($result)) return $result;
        return [];
    }

    function findAll()
    {
        return $this->conn->query("SELECT * FROM {$this->table}");
    }

    function add(array $values)
    {
        $query = "INSERT INTO {$this->table} (id_kriteria, nama_kriteria, bobot, tipe)VALUES(?, ?, ?, ?)";
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
        $this->repository->otherQuery("DELETE FROM data_alternatif where id_kriteria = ?", [$id]);
        $this->repository->otherQuery("DELETE FROM subkriteria where id_kriteria = ?", [$id]);
        $this->repository->delete('id', $id);
        if ($this->repository->rowCount() > 0) {
            return true;
        }
        return false;
    }
}
