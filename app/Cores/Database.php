<?php

namespace SPK\App\Cores;

class Database
{
    private ?\PDO $conn;
    public function __construct(){
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

    public function __destruct()
    {
        $this->conn = null;
    }
}