<?php

namespace SPK\App\Core;

class Config
{
    static private $baseurl = 'http://apk-saw.kholis';
    public static function getBaseUrl()
    {
        return self::$baseurl;
    }
}
