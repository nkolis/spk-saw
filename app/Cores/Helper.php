<?php

namespace SPK\App\Cores;

use PDO;
use PDOException;
use PhpParser\Node\Stmt\TryCatch;
use SPK\App\Cores\Database;

class Helper 
{
    private static $conn;

    public static function query(string $query, array $values = []){
        try {
        self::$conn = (new Database)->getConnection();


        

        $statement = self::$conn->prepare($query);

        
        if(count($values)==0){
            $statement->execute();
        } else {
            $statement->execute($values);
        }
        
        if($statement->rowCount() == 0){
            return false;
        };
        return $statement->fetchAll();
    }catch(\PDOException $e){
        var_dump($query);
        var_dump($e->getMessage());
        return false;
    }
}
}