<?php include ROOT . '/view/layouts/header.php';?>
	<div class="container">
		<?php if(isset($result)): ?>
			<p>You change this task</p> 
		<?php endif; ?>
		<form class="form" action="#" method="post">
			<input type="text" name='subject' placeholder="Subject" value="<?php echo $taskOne['subject']; ?>"><br>
			<textarea name="content" placeholder="Content" ><?php echo $taskOne['content']; ?></textarea><br>
			<input type="file" name="file" value="<?php echo $taskOne['file']; ?>"><br>
			<input type="submit" name="submit">
		</form>
	</div>
<?php include ROOT . '/view/layouts/footer.php';?>