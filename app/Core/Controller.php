<?php

namespace SPK\App\Core;


class Controller
{
    function view(string $path, array $model = [])
    {
        require __DIR__ . "/../Views/templates/header.php";
        require __DIR__ . "/../Views/" . $path . "/" . "index.php";
        require __DIR__ . "/../Views/templates/footer.php";
    }

    function render(string $path, array $model = [])
    {
        require __DIR__ . "/../Views/" . $path . "/" . "index.php";
    }

    function model(string $name): object
    {
        require __DIR__ . "/../Models/$name.php";
        $model = "\\SPK\\App\\Models\\$name";
        return new $model;
    }
}
