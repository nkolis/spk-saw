<?php

namespace SPK\App\Cores;

class Config
{
    static private $baseurl = 'http://localhost:5000';
    public static function getBaseUrl()
    {
        return self::$baseurl;
    }
}
