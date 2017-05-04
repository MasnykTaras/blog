<?php include ROOT . '/view/layouts/header.php';?>
	<div class="container">
		<h1>Cabinet</h1>
		<h2>Hello, <?php echo $user['name']; ?>!</h2>
		<hr>
		<h3><a href="/add">Add task</a></h3>
		<h3><a href="/tasks">My task</a></h3>
	</div>
<?php include ROOT . '/view/layouts/footer.php';?>