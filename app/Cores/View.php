<?php

namespace SPK\App\Cores;

class View
{
    static function render(string $path, array $model = [])
    {
        require __DIR__ . "/../Views/templates/header.php";
        require __DIR__ . "/../Views/" . $path . "/" . "index.php";
        require __DIR__ . "/../Views/templates/footer.php";
    }
}
