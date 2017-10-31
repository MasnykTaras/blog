<?php 

include_once(ROOT . '/view/layouts/header.php');

use models\User;

?>
<div class="container">
	<div class="col-xs-12">		
		<img src="/uploaded/<?php echo $taskOne['image']; ?>" class="img-responsive">
		<div class="col-xs-8">
			<h4>Post by - <?php echo $taskOne['user_name']?></h4>
			<h4>Email - <?php echo $taskOne['email']?></h4>
		</div>
		<div class="col-xs-4">
			<?php if($taskOne['status'] == 1){ 
				$status = 'Completed'; $color='#00ff59;';
			}else{ 
				$status = 'In progress'; $color='red';
			 }?>
			<h4 style="color:<?php echo $color;?>"><?php echo $status; ?></h4>
		</div>
		<div class="col-xs-12">
		<p><?php echo $taskOne['content']; ?></p>		
		<?php if(User::isLogin()):?>
			<a href='edit/<?php echo $taskOne['id'];?>' >Edit</a>
		<?php endif;?>
		</div>
	</div>
</div>
<?php include_once(ROOT . '/view/layouts/footer.php');?>