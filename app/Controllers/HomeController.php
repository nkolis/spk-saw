<?php

namespace SPK\App\Controllers;
use SPK\App\Cores\View;

class HomeController
{
    function index(){
        View::render('home');
    }
}