<?php 
class Task 
{
	public function viewAll()
	{	
		
		$db = Db::getConnection();
		$taskList =[];
		$result = $db->query('SELECT * FROM task ORDER BY id ASC');
		$i = 0;
		while($row = $result->fetch()){
			$user = User::getUserById($row['user_id']);
			$taskList[$i]['id'] = $row['id'];
			$taskList[$i]['subject'] = $row['subject'];
			$taskList[$i]['content'] = $row['content'];
			$taskList[$i]['user_id'] = $row['user_id'];
			$taskList[$i]['name'] = $user['name'];
			$taskList[$i]['image'] = $row['photo'];
			$i++;
		}
		
		return $taskList;
	} 
	public function viewOne($id)
	{
		if($id){
			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM task WHERE id=' . $id);
			$result->setFetchMode(PDO::FETCH_ASSOC);            
            return $result->fetch();
		}
	}
	public static function checkSubject($subject)
	{
		if(strlen($subject) > 8){
			return true;
		}
		return false;
	}
	public static function addTask($subject, $content, $photo, $id)
	{


		$db = Db::getConnection();
		$sql = 'INSERT INTO task (subject, content, user_id, photo) '
				. 'VALUES (:subject, :content, :id, :photo)';

		$result = $db->prepare($sql);

		$result->bindParam(':subject', $subject, PDO::PARAM_STR);
		$result->bindParam(':content', $content, PDO::PARAM_STR);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->bindParam(':photo', $file, PDO::PARAM_STR);

		return $result->execute();
	}
	public static function viewUserAll($id)
	{

		$db = Db::getConnection();
		$result = $db->query('SELECT * FROM task WHERE user_id = '.$id);	
		$tasks =[];
		$i = 0;
		while($row = $result->fetch()){
			$tasks[$i]['id'] = $row['id'];
			$tasks[$i]['subject'] = $row['subject'];
			$tasks[$i]['content'] = $row['content'];
			$tasks[$i]['usesr_id'] = $row['user_id'];
			$tasks[$i]['image'] = $row['photo'];
			$i++;
		}		

		return $tasks;
	}
	public static function editOne($id)
	{
		$db = Db::getConnection();
		$result = $db->query('SELECT * FROM task WHERE id = '.$id);
		$result->setFetchMode(PDO::FETCH_ASSOC); 
		return $result->fetch();
	}
	public static function editTask($subject, $content, $photo, $id)
	{


		$db = Db::getConnection();
		$sql = 'UPDATE task SET subject = :subject, content = :content, photo = :photo WHERE id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':subject', $subject, PDO::PARAM_STR);
		$result->bindParam(':content', $content, PDO::PARAM_STR);
		$result->bindParam(':photo', $photo, PDO::PARAM_STR);
		$result->bindParam(':id', $id, PDO::PARAM_INT);

		return $result->execute();	
	}
	public static function addComment($comment, $userId, $taskId)
	{
		$db = Db::getConnection();
		$sql = 'INSERT INTO comment (comment, user_id, task_id) '
				. 'VALUES (:comment, :userId, :taskId)';
		$result = $db->prepare($sql);

		$result->bindParam(':comment', $comment, PDO::PARAM_STR);
		$result->bindParam(':userId', $userId, PDO::PARAM_STR);
		$result->bindParam(':taskId', $taskId, PDO::PARAM_INT);

		return $result->execute();
	}
}