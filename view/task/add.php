<?php include ROOT . '/view/layouts/header.php';?>
	<div class="container">
		<?php if($result):?>
			<p>You add task</p>
		<?php else: ?>

			<form class="form" action="#" method="post">
			<?php if($errors):?>
				<ul>
					<?php foreach($errors as $error): ?>
						<li><?php echo $error; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
				<input type="text" name='subject' placeholder="Subject"><br>
				<textarea name="content" placeholder="Content"></textarea><br>
				<input type="file" name="file"><br>
				<input type="submit" name="submit">
			</form>
		<?php endif; ?>
	</div>
<?php include ROOT . '/view/layouts/footer.php';?>