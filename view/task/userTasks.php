<?php include ROOT . '/view/layouts/header.php';?>
	<div class="container">
		<?php if(empty($tasks)): ?>
			<h2>You don't have any task</h2>
		<?php endif; ?>
		<?php foreach ($tasks as $task): ?>
			<div>
				<h2><?php echo $task['subject']; ?></h2>
				<p><?php echo $task['content']; ?></p>
				<a href="task/<?php echo $task['id']; ?>">Know more >> |</a>	
				<a href="/edit/<?php echo $task['id']; ?>">Edit</a>
				<hr>
			</div>
		<?php endforeach; ?>
	</div>
<?php include ROOT . '/view/layouts/footer.php';?>