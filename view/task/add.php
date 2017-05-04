<?php include ROOT . '/view/layouts/header.php';?>
<?php if($result):

	
?>

	<p>You add task</p>
<?php else: ?>
	<form action="#" method="post">
		<input type="text" name='subject' placeholder="Subject"><br>
		<textarea name="content" placeholder="Content"></textarea><br>
		<input type="file" name="file"><br>
		<input type="submit" name="submit">
	</form>
<?php endif; ?>