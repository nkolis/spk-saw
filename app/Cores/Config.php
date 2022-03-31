<?php

namespace SPK\App\Cores;

class Config
{
    static private $baseurl = 'http://localhost/apk-saw/public';
    public static function getBaseUrl()
    {
        return self::$baseurl;
    }
}
