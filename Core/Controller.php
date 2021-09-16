<?php
namespace Core;

use \Core\Router;

class Controller
{
    public static $_render;
    /**
     * [render description]
     *
     * @param   [type]  $view  Nom de la view
     * @param   [type]  $scope  [$scope description]
     * @return  [type]          [return description]
     */
    protected function render($view, $scope = [])
    {
        $scope = array_merge(Router::$scope, $scope);
        extract($scope);
        $reflection = new \ReflectionClass($this);
        //basename(get_class($this)) = AppController
        $viewPath = ("src/View/".substr(
        $reflection->getShortName(),
        0,-strlen("Controller"))."/$view.php"); // = src/View/App/$view
        if (file_exists($viewPath)) {
            ob_start();
            include($viewPath);
            $view = ob_get_clean();
            ob_start();
            include("src/View/index.php");
            self::$_render = ob_get_clean();
        }
    }
    public function getRender()
    {
        return self::$_render;
    }
}
