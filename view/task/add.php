<?php include_once(ROOT . '/view/layouts/header.php');?>
<div class="container">
	<h2>Add task</h2>
	<form method="post" action='#' class="form-group" enctype="multipart/form-data">
		<div>
		 	<div class="form-group">
				<input type="text" name="user_name" class="form-control" placeholder="Name">
			</div>
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Email">
			</div>
			<div class="form-group">
				<textarea name="content" class="form-control" rows="3" placeholder="Content"></textarea>
			</div>
			<div class="form-group">
				<input type="file" name="image" accept="image/gif, image/jpg, image/png, ">
			</div>
		</div>

		<div class="preview">
			 <img id="blah" src="#" alt="your image" height="240" width="320">
			 <div class="preview-content">
			 	
			 </div>
		</div>
		<input type="submit" name="submit" class="btn btn-default" value="Submit">
		<p class="btn btn-default view">Preview</p>
	</form>	
</div>
<?php include_once(ROOT . '/view/layouts/footer.php');?>