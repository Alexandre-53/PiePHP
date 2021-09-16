<!-- <pre> -->
<?php 
// var_dump($_POST);
// var_dump($_GET);
// var_dump($_SERVER); 
?>
<!-- </pre> -->
<?php
// define('BASE_URI', str_replace('\\', '/', substr(__DIR__, 
// strlen($_SERVER['DOCUMENT_ROOT']))));
session_start();
define("BASE_URI", "/PiePHP");
define("URI", substr($_SERVER["REQUEST_URI"], strlen(BASE_URI)));
require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));
$app = new Core\Core();
$app->run();