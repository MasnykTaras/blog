<?php 
	namespace app\models;
	
	use app\components\Db;
	use PDO;

	class User
	{

		public static function checkUserData($name, $password)
		{
			$db = Db::getConnection();
			$sql = 'SELECT * FROM user WHERE name = :name AND password = :password';
			$result = $db->prepare($sql);
			$result->bindParam(':name', $name, PDO::PARAM_INT);
			$result->bindParam(':password', $password, PDO::PARAM_INT);
			$result->execute();
			$user = $result->fetch();

			if($user){
				return $user['id'];
			}
			return false;
		}
		
		public static function checkLogged()
		{
			if(isset($_SESSION['user'])){
				return $_SESSION['user'];
			}
			return false;
		}
		public static function auth($userId)
		{
			$_SESSION['user'] = $userId;
		}
		public static function isLogin()
		{
			if(isset($_SESSION['user'])){
				return true;
			}
			return false;
		}		
		
	}
?>