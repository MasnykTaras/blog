<?php 

include_once(ROOT . '/view/layouts/header.php');

use app\models\Task;
use app\models\User;
?>
<div class="container">
		<form method="post" action="#" class="form-group col-xs-12">
			<div class="col-xs-8">	
				<select name="filter" class="form-control">
					<option value="id">Dy id</option>
					<option value="user_name">By name</option>
					<option value="email">By email</option>
					<option value="status">By status</option>
				</select>	
			</div>
			<div class="col-xs-4">
				<input type="submit" name="submit" value="Filter" class="btn btn-default">
			</div>	
		</form>
		<?php foreach ($tasksList as $taskList): ?>
			<div class="col-xs-12 item">
				<div class="col-xs-12 col-sm-3 col-md-3 image-area">			
					<img src="/uploaded/<?php echo $taskList['image']; ?>" class="img-responsive image">	
				</div>
				<div class="col-xs-12 col-sm-9 col-md-9">
					<div class="col-xs-8">
					<h4>Post by - <?php echo $taskList['user_name']?></h4>
					<h3>Email - <?php echo $taskList['email']?></h3>
					</div>
					<div class="col-xs-4">
					<?php 
						echo Task::status($taskList['status']);
					?>
					</div>
					<div class="col-xs-12">
						<p><?php echo Task::getShortContent($taskList['content']); ?></p>
						<div class="col-xs-12">
							<a href="task/<?php echo $taskList['id']; ?>" >Know more >></a>
							<?php if(User::isLogin()):?>
								<a href='edit/<?php echo $taskList['id'];?>' >Edit</a>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<div class="col-xs-12">
			<?php echo $pagination->get(); ?>
		</div>
	</div>
<?php include_once(ROOT . '/view/layouts/footer.php');?>