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
        $q_kriteria = "INSERT INTO {$this->table} (id_kriteria, nama_kriteria, bobot, tipe)VALUES(?, ?, ?, ?)";
        $this->conn->query($q_kriteria, $values);

        $q_alternatif = "SELECT id_alternatif FROM alternatif";
        $alternatif = $this->conn->query($q_alternatif);

        foreach ($alternatif as $row) {
            $id_kriteria = $values[0];
            $values = [$id_kriteria, $row['id_alternatif']];
            $q_dalternatif = "INSERT INTO data_alternatif (id_kriteria, id_alternatif)VALUES(?, ?)";
            $this->conn->query($q_dalternatif, $values);
        }

        if ($this->conn->rowCount() > 0) {
            return true;
        }
        return false;
    }

    function update($values)
    {
        $query = "UPDATE {$this->table} SET nama_kriteria = ?, bobot = ?, tipe = ? WHERE id_kriteria = ?";
        $this->conn->query($query, $values);
        if ($this->conn->rowCount() > 0) {
            return true;
        }
        return false;
    }

    function remove(string $id)
    {
        $this->conn->query("DELETE FROM data_alternatif where id_kriteria = ?", [$id]);
        $this->conn->query("DELETE FROM subkriteria where id_kriteria = ?", [$id]);
        $this->conn->query("DELETE FROM {$this->table} where id_kriteria = ?", [$id]);
        if ($this->conn->rowCount() > 0) {
            return true;
        }
        return false;
    }
}
