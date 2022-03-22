<?php

require_once __DIR__ . "/../vendor/autoload.php";

use SPK\App\Cores\Router;
use SPK\App\Controllers\HomeController;

Router::add("GET", "/", HomeController::class, "index");
Router::add("GET", "/product/id/([0-9a-zA-Z]*)", "/ProductController", "index");
Router::run();