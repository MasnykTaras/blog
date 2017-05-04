<!DOCTYPE html>
<html>
<head>
	<title>Ask a questions</title>
	<link rel="stylesheet" type="text/css" href="/template/assets/css/main.css">
</head>
<body>
	<div class="nav clear">
		<div class="container">
			<ul>
				<li><a href="/">Home</a></li>
				<?php if(!User::isGuest()): ?>
					<li><a href="/sign">Sign In</a></li>
				<?php else: ?>
					<li><a href="/cabinet">Cabinet</a></li>
					<li><a href="/logout">Logout</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>