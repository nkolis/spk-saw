<?php

namespace SPK\App\Cores;
use SPK\App\Cores\Database;

class Helper 
{
    private static $conn;

    public static function query(string $query, array $values = []){
        self::$conn = (new Database)->getConnection();

        $statement = self::$conn->prepare($query);

        
        if(count($values)==0){
            $test = $statement->execute();
        } else {
            $statement->execute($values);
        }
        
        if($statement->rowCount() == 0){
            return false;
        };
        return $statement->fetchAll();
    }
}