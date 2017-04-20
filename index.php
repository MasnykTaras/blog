<?php

ini_set('display_erorrs', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

include_once (ROOT . '/components/Autoload.php');

// include_once (ROOT . '/components/Db.php');
// include_once (ROOT . '/components/Router.php');


// 2. Connect to db

$router = new Router;
$router->run();


?>
