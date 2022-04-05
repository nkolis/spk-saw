<?php

namespace SPK\App\Core;

use SPK\App\Core\Database;

class Helper
{
    private static $conn;

    public static function query(string $query, array $values = [])
    {
        try {
            self::$conn = (new Database)->getConnection();




            $statement = self::$conn->prepare($query);


            if (count($values) == 0) {
                $statement->execute();
            } else {
                $statement->execute($values);
            }

            if ($statement->rowCount() == 0) {
                return false;
            };
            return $statement->fetchAll();
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
            exit;
            return false;
        }
    }
}
