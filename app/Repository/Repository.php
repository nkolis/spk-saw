<?php

namespace SPK\App\Repository;
use SPK\App\Cores\Helper;

class Repository {
    public function __construct(private string $table)
    {
        $this->table = $table;
    }
    public function add(string $params, array $values){
        
        return Helper::query("INSERT INTO $this->table ($params)VALUES(?, ?, ?, ?)", $values);
    }

    public function getAll(){
        return Helper::query("SELECT * FROM $this->table");
    }

    public function findById(string $param, string|int $id){
        return Helper::query("SELECT * FROM $this->table WHERE $param = ?", [$id]);
    }

    public function findLastInsertId(string $query){
        return Helper::query($query);
    }

    public function delete(string $param, string|int $id){
        return Helper::query("DELETE FROM $this->table WHERE $param = ?", [$id]);       
    }

    public function update(string $params, string $param, array $values){
        return Helper::query("UPDATE $this->table SET $params WHERE $param = ?", $values);
    }

    public function alter(string $table, string $name_column, string $nextquery){
        $query = "ALTER TABLE $table ADD COLUMN $name_column $nextquery";
        
        return Helper::query($query);
    }
}