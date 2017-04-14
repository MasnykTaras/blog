

<?php

include_once 'mvc/component/Db.php';

// "Front controller";

// 1. Configuration
$config = include 'mvc/config/param.php';

// 2. Connect to db

$connection = Db::getConnection($config);

// 3. Analyze query

// $uri = $_SERVER['REQUEST_URI'];

// $parts = explode('/', trim($uri, '/'));

// $controllerName = ucfirst($parts[0]).'Controller';

// $actionName = 'action'.ucfirst($parts[1]);

include "mvc/controller/TaskController.php";

//echo $controllerName;
//echo '<hr>';
//echo $actionName;

 $controller = new TaskController;

 echo $controller->actionList();

//echo '<pre>';
//print_r($controller);
//echo '</pre>';




// 4. Delegate control








