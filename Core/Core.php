<?php
namespace Core;

use \Controller\AppController;
use \Core\Router;

class Core
{
    private static $config;
        
    public function run()
    {
        require_once("src/routes.php");
        $jsonText = file_get_contents("config.json");
        self::$config = json_decode($jsonText, true);
        $route = Router::getRoute(URI, $_SERVER["REQUEST_METHOD"]);//On va chercher le router::connect
        if (isset(Router::$global)) {
            $className = "Controller\\".Router::$global["controller"];
            $controller = new $className;
            $controller->{Router::$global["action"]}();
        }
        if ($route !== null) {
            $className = "Controller\\".$route["data"]["controller"];//va chercher le controller correspondant à l'URI
            $controller = new $className; //new controller\AppController  
            $controller->{$route["data"]["action"]}();// ici on appel la methode du controller
            echo($controller::$_render);
        } else {
            $controller = new AppController;
            $controller->error();
            echo($controller::$_render);
        }
    }

    public static function getConfig(){
        return self::$config;
    }
}
