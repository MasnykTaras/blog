<?php

	use app\models\User;
	
	class UserController
	{
		public function actionLogin(){
			$name = '';
			$password = '';
			$result = false;

			if(isset($_POST['submit'])){
				$name = $_POST['name'];
				$password = $_POST['password'];
				$errors = false;				

				$userId = User::checkUserData($name, $password);

				if( $userId == false){
					$errors[] = 'Incorect data';
				}else{
					User::auth($userId);
					header('Location: /');
				}

			}
		require_once(ROOT . '/view/user/login.php');
		return true;
		} 		
		public static function actionLogout()
		{
			unset($_SESSION['user']);
			header('Location: /');
		}
		
	}
?>