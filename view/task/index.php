<?php include ROOT . '/view/layouts/header.php';?>
	<div class="container">
		<?php foreach ($tasksList as $taskList): ?>
			<div>
				<div class="image-area">
					<img src="/uploaded/<?php echo $taskList['image']; ?>" class="img-responsive image">
				</div>
				<div class="content-area">
					<h2><?php echo $taskList['subject']; ?></h2>
					<h4>Post by - <a href="/archive/<?php echo $taskList['user_id']?>"><?php echo $taskList['name']?></a></h4>
					<p><?php echo Task::getShortContent($taskList['content']); ?></p>
					<a href="task/<?php echo $taskList['id']; ?>">Know more >></a>
					<hr>
				</div>
			</div>
		<?php endforeach; ?>
		<div class="pagination-area">
			<?php echo $pagination->get(); ?>
		</div>
	</div>
<?php include ROOT . '/view/layouts/footer.php';?>