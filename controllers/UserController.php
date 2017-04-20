<?php
	class UserController
	{
		public function actionIndex(){
			$login = '';
			$password = '';

			if(isset($_POST['submit'])){
				$login = $_POST['email'];
				$password = $_POST['password'];
				$errors = false;
				if(!User::checkName($name)){
				$errors[] = 'Name must be longer';
				}
				if(!User::checkEmail($email)){
					$errors[] = 'Email nit valide';
				}			
			}
		require_once(ROOT . '/view/user/login.php');
		return true;
		} 
	}
?>