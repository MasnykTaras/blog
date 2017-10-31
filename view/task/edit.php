<?php 

include ROOT . '/view/layouts/header.php';


?>
	<div class="container">
		<?php if(isset($result)): ?>
			<p>You change this task</p> 
		<?php endif; ?>
		<form class="form" action="#" method="post" class="form-group">
			<p>Post by - <?php echo $taskOne['user_name']; ?></p>
			<p>Email - <?php echo $taskOne['email']; ?></p>
			<img src="/uploaded/<?php echo $taskOne['image'];?>">
			<textarea name="content" placeholder="Content"  class="form-control" row='8'><?php echo $taskOne['content']; ?></textarea>	
			<label>Status of task</label>	
			<?php ($taskOne['status']==1) ? $selected = 'selected' : $selected = ''; ?>
			<select class="form-control" name="status">
				<option value="0" <?php echo $selected; ?>>In progress</option>
				<option value="1" <?php echo $selected; ?>>Completed</option>
			</select>
			<input type="submit" name="submit" class="btn btn-default">
		</form>
	</div>
<?php include ROOT . '/view/layouts/footer.php';?>