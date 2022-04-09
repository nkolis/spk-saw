<?php

namespace SPK\App\Core;

use SPK\App\Core\Database;

class Helper
{
    private static $conn;
    private static $rowCount;

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

            self::$rowCount = $statement->rowCount();

            return $statement->fetchAll();
        } catch (\PDOException $e) {
            self::$rowCount = $statement->rowCount();
            var_dump($e->getMessage());
        }
    }

    public static function rowCount()
    {
        $row_c = self::$rowCount;
        return (is_null($row_c)) ? 0 : $row_c;
    }
}
