<?php
	class UserController
	{
		public function actionLogin(){
			$email = '';
			$password = '';
			$result = false;

			if(isset($_POST['submit'])){
				$email = $_POST['email'];
				$password = $_POST['password'];
				$errors = false;
				if(User::checkEmail($email)){
					$errors[] = 'User does not registered';
				}
				if(!User::checkPassword($password)){
					$errors[] = 'Incorect password';
				}	

				$userId = User::checkUserData($email, $password);
				

				if( $userId == false){
					$errors[] = 'Incorect data';
				}else{
					$user = getUserById($userId);
					User::auth($userId, $user['name']);

					header('Location: /cabinet');
				}

			}
		require_once(ROOT . '/view/user/login.php');
		return true;
		} 
		public function actionRegister()
		{

			$name = '';
			$email = '';
			$password = '';
			$result = false;
			if(isset($_POST['submit'])){
				$name = $_POST['name'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$errors = false;
				if(!User::checkRegisterName($name)){
					$errors[] = 'Name must be longer';
				}
				if(!User::checkRegisterPassword($password)){
					$errors[] = 'Password must be longer';
				}
				if(!User::checkRegisterEmail($email)){
					$errors[] = 'Email not valide';
				}
				if(User::checkRegisterEmailExists($email)){
					$errors[] = 'User alredy register';
				}
				if($errors == false){
					$result = User::register($name, $email, $password);
				}
			}
			require_once(ROOT . '/view/user/register.php');
			return true;
		}
		public static function actionLogout()
		{
			unset($_SESSION['user']);
			header('Location: /');
		}
		
	}
?>