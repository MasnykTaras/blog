<?php include ROOT . '/view/layouts/header.php';?>
	<div class="container">
		<?php if(isset($result)):?>
			<p>You add task</p>
		<?php else: ?>

			<form class="form" action="#" method="post" enctype="multipart/form-data">
			<?php if(isset($errors)):?>
				<ul>
					<?php foreach($errors as $error): ?>
						<li><?php echo $error; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
				<input type="text" name='subject' placeholder="Subject" value="<?php if(!empty($_POST['subject'])){echo $_POST['subject'];}?>"><br>
				<textarea name="content" placeholder="Content"><?php if(!empty($_POST['content'])){echo $_POST['content'];}?></textarea><br>
				<input type="file" name="image" value="<?php if(!empty($_POST['image'])){echo $_POST['image'];}?>"><br>
				<input type="submit" name="submit">
			</form>
		<?php endif; ?>
	</div>
<?php include ROOT . '/view/layouts/footer.php';?>