<?php 
	use app\models\User;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ask a questions</title>
	<link rel="stylesheet" type="text/css" href="/template/assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="/template/assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="/template/assets/css/bootstrap.min.css">
</head>
<body>
	<div class="nav clear">
		<div class="container">
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href='/add'>Add Task</a></li>				
				<?php if(!User::isLogin()): ?>
					<li><a href="/sign">Sign In</a></li>
				<?php else: ?>
					<li><a href="/logout">Logout</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	