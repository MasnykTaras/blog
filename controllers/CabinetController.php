<?php 

	class CabinetController
	{
		public function actionIndex()
		{
			if(!User::checkLogged()){
				header('Location: /sign');
			}
			$userId = User::checkLogged();

			$user = User::getUserById($userId);
			require_once(ROOT . '/view/cabinet/index.php');
			return true;
		}	
	}