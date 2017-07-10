<?php include ROOT . '/view/layouts/header.php';?>
	<div class="container">
		<div class="task">
			<h2><?php echo $taskOne['subject']; ?></h2>
			<p><?php echo $taskOne['content']; ?></p>
		</div>
		<div class="comment-archive">
		
			<?php foreach($comments as $comment):?>
				<p><?php echo $comment['comment']; ?></p>
			<?php endforeach;?>
		</div>
		<div class="comment">
			<form class="form" method="post" action="#">
				<textarea name="comment" placeholder="Comment"></textarea>
				<input type="submit" name="submit">
			</form>
		</div>
	</div>
<?php include ROOT . '/view/layouts/footer.php';?>