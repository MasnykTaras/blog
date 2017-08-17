<?php include ROOT . '/view/layouts/header.php';?>
	<div class="container">
		<?php foreach ($tasksList as $taskList): ?>
			<div>
				<h2><?php echo $taskList['subject']; ?></h2>
				<h4>Post by - <a href="/archive/<?php echo $taskList['user_id']?>"><?php echo $taskList['name']?></a></h4>
				<p><?php echo Task::getShortContent($taskList['content']); ?></p>
				<a href="task/<?php echo $taskList['id']; ?>">Know more >></a>
				<hr>
			</div>
		<?php endforeach; ?>
		<div class="col-xs-12">
			<?php echo $pagination->get(); ?>
		</div>
	</div>
<?php include ROOT . '/view/layouts/footer.php';?>