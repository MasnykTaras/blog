<?php 

	namespace app\models;

	use app\components\Db;
	use PDO;
	
	class Task
	{
		const SHOW_BY_DEFAULT = 3;
		const MAX_WIDTH = 320;
    	const MAX_HEIGHT = 240;

		public static function viewAll($page = 1, $filter = 'id')
		{


			$limit = self::SHOW_BY_DEFAULT;
	        
	        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;	


	        $db = Db::getConnection();
	        
				
	        $sql = 'SELECT * FROM task '
	                . 'ORDER BY '.$filter.' ASC LIMIT :limit OFFSET :offset';
	      
	        $result = $db->prepare($sql);
	        
	        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
	        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
	        
	        $result->execute();
	        
	        $i = 0;
	        $tasksList = array();
	        while ($row = $result->fetch()) {
	            $tasksList[$i]['id'] = $row['id'];
	            $tasksList[$i]['user_name'] = $row['user_name'];
	            $tasksList[$i]['email'] = $row['email'];
	            $tasksList[$i]['content'] = $row['content'];
	            $tasksList[$i]['image'] = $row['image'];
	            $tasksList[$i]['status'] =$row['status'];
	            $i++;
	        }

	        return $tasksList;
		}
		public static function viewOne($id)
		{
			if($id){
				$db = Db::getConnection();
				$result = $db->query("SELECT * FROM task WHERE id=". $id);

				$result->setFetchMode(PDO::FETCH_ASSOC);            
	            return $result->fetch();
			}
		}
		public static function editTask($content, $status, $id)
		{
			$db = Db::getConnection();
			$sql = 'UPDATE task SET content = :content, status = :status WHERE id = :id';
			$result = $db->prepare($sql);			
			$result->bindParam(':content', $content, PDO::PARAM_STR);
			$result->bindParam(':status', $status, PDO::PARAM_STR);
			$result->bindParam(':id', $id, PDO::PARAM_INT);

			return $result->execute();	
		}
		public static function getShortContent($content)
		{
			if(strlen($content)> 200){
				 $content = substr($content,0,200) .  ' ...';
			}
			return $content;
		}
		public static function addTask($user_name, $email, $content, $image)
		{
			$db = Db::getConnection();
			$sql = 'INSERT INTO task (user_name, email, content, image) '
					. 'VALUES (:user_name, :email, :content, :image)';

			$result = $db->prepare($sql);

			$result->bindParam(':user_name', $user_name, PDO::PARAM_STR);
			$result->bindParam(':email', $email, PDO::PARAM_INT);
			$result->bindParam(':content', $content, PDO::PARAM_STR);			
			$result->bindParam(':image', $image, PDO::PARAM_STR);

			return $result->execute();
		}
		public static function uploadFile()
		{

			if (is_uploaded_file($_FILES["image"]["tmp_name"])){ 
				
				self::resize($_FILES["image"]["tmp_name"],$_FILES["image"]['name']);	
                  move_uploaded_file($_FILES["image"]["tmp_name"], ROOT.'/uploaded/'.$_FILES["image"]['name']);
            }
             return $_FILES["image"]['name'];
		}
		private static function resize($imageFile, $imageName)
		{
			list($originWidth, $originHeight) = getimagesize($imageFile);

			if($originWidth > self::MAX_WIDTH || $originHeight > self::MAX_HEIGHT){

				$extended = explode('.',strtolower($imageName));

		    	$ratio = $originWidth/$originHeight;

				$height = self::MAX_WIDTH;
				$width = self::MAX_HEIGHT;

		    	if((self::MAX_WIDTH / self::MAX_HEIGHT) > $ratio){

		    		$width = self::MAX_HEIGHT * $ratio;

		    	}else{

		    		$height = self::MAX_WIDTH / $ratio;
		    	}
		    	
				$image = '';
		    	if($extended[1] == 'git'){

		    		$image = imagecreatefromgif($imageFile);

		    	}else if($extended[1] == 'png'){

		    		$image = imagecreatefrompng($imageFile);

		    	}else{

		    		$image = imagecreatefromjpeg($imageFile);
		    	}

		    	$newImage = imagecreatetruecolor($width, $height);

	    		imagecopyresampled($newImage, $image ,0,0,0,0, $width, $height, $originWidth, $originHeight);

	    		if($extended[1] == 'git'){

		    		imagegif($newImage, $imageFile, 8);

		    	}else if($extended[1] == 'png'){

		    		imagepng($newImage, $imageFile, 8);

		    	}else{

		    		imagejpeg($newImage, $imageFile, 8);
		    		
		    	}
		    }else{
		    	return false;
		    }		
			
		}		
		
		public static function allTask()
		{
			$db = Db::getConnection();
			   $sql = "SELECT count(id) AS count FROM task";
	      
	        $result = $db->prepare($sql);
						
			$result->execute();
            return $result->fetch();
		}
		public static function status($status)
		{
			$view ='<h4 class="status">';
			if($status == 1){ 
				$view .= '<span>';				
				$view .= 'Completed';
				$view .= "</span>";
			}else{ 				
				$view .= 'In progress';
			}
			$view .= '</h4>';
			return $view; 
		}

	}

?>