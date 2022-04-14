<?php

$value = [
    'id_alternatif' => 3,
    'c1' => 28,
    'c2' => 29,
    'c3' => 40
];



foreach ($value as $key => $row) {
    $data = [
        'id_subkriteria' => $value[$key],
        'id_alternatif' => $value['id_alternatif'],
        'id_kriteria' => $key
    ];
    var_dump($data);
}
