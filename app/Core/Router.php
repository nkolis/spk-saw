<?php

namespace SPK\App\Core;

class Router
{
    private static array $routes = [];
    private static array $parameterValue;

    static function add(string $method, string $path, string $controller, string $function): void
    {
        self::$routes[] = [
            "method" => $method,
            "path" => $path,
            "controller" => $controller,
            "function" => $function
        ];
    }

    static function run(): void
    {
        $path = "/";

        if (isset($_SERVER['PATH_INFO'])) $path = $_SERVER['PATH_INFO'];
        $method = $_SERVER['REQUEST_METHOD'];


        foreach (self::$routes as $route) {
            $pattern = '#^' . $route['path'] . '$#';
            if (preg_match($pattern, $path, $values) && $method == $route['method']) {

                $controller = new $route['controller'];
                $function = $route['function'];
                array_shift($values);
                self::$parameterValue = $values;
                call_user_func_array([$controller, $function], $values);
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }

    static function getParamaterValue()
    {
        return self::$parameterValue;
    }
}
