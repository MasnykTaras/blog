<?php include ROOT . '/view/layouts/header.php';?>
<section>
		<div class="conteiner">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4 padding-right">
					
						<?php if(isset($errors) && is_array($errors)): ?>
							<ul>
								<?php foreach($errors as $error): ?>
									<li> - <?php echo $error; ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

					<div class="signup-form">
						<h2>Site registration</h2>
						<form action="#" method="post">							
							<input type="email" name="email" placeholder="E-Mail" value="<?php echo $email; ?>">
							<input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
							<input type="submit" name="submit" class=" btn btn-default">
						</form>
					</div>
					
				</div>
			</div>			
		</div>
	</section>