<?php include_once 'main.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../assets/js/main.js"></script>


<title>Blog</title>

</head>

<body>
<nav>
	<ul>
		<li><a href="#">Home</a></li>
		<li><a href="add">Add</a></li>
		<li><a href="log">Log In</a></li>
	</ul>
</nav>
<?php 
$controller = new TaskController;
echo $controller->addTaskView();
?>

</body>
</html>









