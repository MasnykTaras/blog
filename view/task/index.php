<?php include ROOT . '/view/layouts/header.php';?>
<?php foreach ($tasksList as $taskList): ?>
	<div>
		<h2><?php echo $taskList['name']; ?></h2>
		<p><?php echo $taskList['content']; ?></p>
		<a href="task/<?php echo $taskList['id']; ?>">Know more >></a>
		<hr>
	</div>
<?php endforeach; ?>