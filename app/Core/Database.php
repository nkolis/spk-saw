<?php

namespace SPK\App\Core;

class Database
{
    private ?\PDO $conn;
    private $rowCount;
    public function __construct()
    {
        $user = "root";
        $password = "";
        $host = "localhost";
        $dbname = "spk_saw";

        $dsn = "mysql:host=$host;dbname=$dbname";

        $option = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];

        $this->conn = new \PDO($dsn, $user, $password, $option);
    }

    public function getConnection(): \PDO
    {
        return $this->conn;
    }

    public function query(string $query, array $values = [])
    {
        try {

            $statement = $this->conn->prepare($query);

            if (count($values) == 0) {
                $statement->execute();
            } else {
                $statement->execute($values);
            }

            $this->rowCount = $statement->rowCount();

            return $statement->fetchAll();
        } catch (\PDOException $e) {
            $this->rowCount = $statement->rowCount();
            var_dump($e->getMessage());
        }
    }

    public function rowCount()
    {
        $row_c = $this->rowCount;
        return (is_null($row_c)) ? 0 : $row_c;
    }

    public function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}
