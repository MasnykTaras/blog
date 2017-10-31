<?php include_once(ROOT. '/view/layouts/header.php'); ?>
<div class="container">
	<div class="col-xs-12 sing">
		<form action="#" method="post">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Name</label>
		    <input type="text" class="form-control" placeholder="Name" name="name">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
		  </div>
		 
		  <input type="submit" class="btn btn-default" name="submit" value="Sing in">
		</form>
	</div>
</div>
<?php include_once(ROOT. '/view/layouts/footer.php'); ?>