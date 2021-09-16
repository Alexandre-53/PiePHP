<?php
spl_autoload_register(function ($className) {

if(strpos($className, "Core") !== false){
    require_once(str_replace("\\","/",$className).".php");
}
else if(strpos($className, "Controller") !== false){
require_once("src/".str_replace("\\","/",$className).".php");
}
else if(strpos($className, "Model") !== false){
    require_once("src/".str_replace("\\","/",$className).".php");
    }
    else {
        require_once(str_replace("\\","/",$className).".php");
    }
// echo $className;
});
?>