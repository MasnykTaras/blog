<?php
//All erorrs chacke 
ini_set('display_erorrs', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
session_start();

// connect autoloader

include_once (ROOT . '/app/components/Autoload.php');

// include_once (ROOT . '/components/Db.php');
// include_once (ROOT . '/components/Router.php');




// Connect to db
use app\components\Router;

$router = new Router;

$router->run();

?>