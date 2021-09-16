<?php
namespace Core;

class Router
{
    public static $routes = [];
    public static $global;
    public static $scope = [];

    public static function get($url, $route)
    {
        array_push(self::$routes, ["url" => $url, "method" => "GET", "data" => $route]);
    }

    public static function post($url, $route)
    {
        array_push(self::$routes, ["url" => $url, "method" => "POST", "data" => $route]);
    }

    public static function global($route)
    {
        self::$global = $route;
    }
        
    public static function getRoute($url, $method)
    {
        foreach (self::$routes as $route) {
            if ($route["method"] === $method && $route["url"]=== $url) {
                return $route;
            }
        }
    }
}
