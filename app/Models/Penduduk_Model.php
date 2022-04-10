<?php

namespace SPK\App\Models;

use SPK\App\Core\Database;

class Penduduk_Model
{
    private Database $conn;
    private string $table;
    public function __construct()
    {
        $this->conn = new Database;
        $this->table = "penduduk";
    }

    function findAll()
    {
        return $this->conn->query("SELECT * FROM {$this->table}");
    }


    function findById($id)
    {
        $result = $this->conn->query("SELECT * FROM {$this->table} WHERE id = ?", [$id]);
        return $result;
    }

    function findByNik($id)
    {
        $result = $this->conn->query("SELECT * FROM {$this->table} WHERE nik = ?", [$id]);
        return $result;
    }

    function add(array $values)
    {
        $query = "INSERT INTO {$this->table} (nik, nama, jenkel, alamat)VALUES(?, ?, ?, ?)";
        $this->conn->query($query, $values);
        if ($this->conn->rowCount() > 0) {
            return true;
        }
        return false;
    }

    function update($values)
    {
        $query = "UPDATE {$this->table} SET nik = ?, nama = ?, jenkel = ?, alamat = ? WHERE id = ?";
        $this->conn->query($query, $values);
        if ($this->conn->rowCount() > 0) {
            return true;
        }
        return false;
    }

    function remove(string $id)
    {
        $nik = $this->conn->query("SELECT nik FROM penduduk WHERE id = ?", [$id])[0]['nik'];
        $idalternatif = $this->conn->query("SELECT id_alternatif FROM alternatif WHERE nik = ?", [$nik])[0]['id_alternatif'];
        $this->conn->query("DELETE FROM data_alternatif WHERE id_alternatif = ?", [$idalternatif]);
        $this->conn->query("DELETE FROM alternatif WHERE nik = ?", [$nik]);
        $this->conn->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
        if ($this->conn->rowCount() > 0) {
            return true;
        }
        return false;
    }
}
