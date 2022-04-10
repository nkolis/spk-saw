<?php

namespace SPK\App\Models;

use SPK\App\Core\Database;

class Subkriteria_Model
{
    private Database $conn;
    private string $table;
    public function __construct()
    {
        $this->conn = new Database;
        $this->table = "subkriteria";
    }

    function findAll()
    {
        return $this->conn->query("SELECT * FROM {$this->table}");
    }

    function findByIdKriteria($id)
    {
        //$result = $this->repository->findById($param, $id);
        $query = "SELECT s.id_subkriteria, k.id_kriteria, k.nama_kriteria, s.nama_subkriteria, s.bobot FROM {$this->table} s join kriteria k ON k.id_kriteria = s.id_kriteria WHERE s.id_kriteria = ?";
        return
            $this->conn->query($query, [$id]);
    }

    function findById($id)
    {

        $result = $this->conn->query("SELECT * FROM {$this->table} WHERE id_subkriteria = ?", [$id]);
        return $result;
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

    function update($values)
    {
        $query = "UPDATE {$this->table} SET nama_subkriteria = ?, bobot = ? WHERE id_subkriteria = ?";
        $this->conn->query($query, $values);
        if ($this->conn->rowCount() > 0) {
            return true;
        }
        return false;
    }

    function remove(string $id)
    {
        $this->conn->query("DELETE FROM {$this->table} WHERE id_subkriteria = $id");

        if ($this->conn->rowCount() > 0) {
            return true;
        }
        return false;
    }
}
