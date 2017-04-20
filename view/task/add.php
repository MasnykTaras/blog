<?php include ROOT . '/view/layouts/header.php';?>
<form action="#" method="post">
	<input type="text" name="mail" required placeholder="Email"><br>
	<input type="text" name="name" required placeholder="Name"><br>
	<textarea name="content" placeholder="Content"></textarea><br>
	<input type="file" name="file"><br>
	<input type="submit" name="submit">
</form>