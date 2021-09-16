<?php
namespace Controller;

use \Core\Controller;
use \Core\Router;
use \Core\ORM;
use \Core\Core;

class AppController extends Controller
{
    public function index()
    {
        $this->render("index"); // appel la methode render de controller
    }
    public function error()
    {
        $this->render("404"); // appel de la page 404.php
    }

    public function global()
    {
        if (array_key_exists("user_id", $_SESSION)===true) {
            $statement = ORM::find("users", ["where" => ["id" => $_SESSION["user_id"]]]);
            Router::$scope["user"] = $statement->fetch();
        }
        Router::$scope["config"] = Core::getConfig();
    }
}
