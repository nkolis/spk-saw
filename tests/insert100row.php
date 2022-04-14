<?php
include_once "../app/Core/Database.php";

use SPK\App\Core\Database;

$stmt = new Database();


// $penduduk = $stmt->query("SELECT * FROM penduduk");
// var_dump($penduduk);
for ($i = 1; $i <= 1000; $i++) {
    $value = [
        "0000000$i",
        "john$i",
        'l',
        "alamat$i"
    ];
    $stmt->query("INSERT INTO penduduk (nik,nama,jenkel,alamat)values(?, ?, ?, ?)", $value);
}
