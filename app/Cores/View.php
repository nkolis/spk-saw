<?php

namespace SPK\App\Cores;
class View
{
    static function render(string $path, array $models = []){
        require __DIR__ . "/../Views/" . $path . "/" . "index.php";
    }
}