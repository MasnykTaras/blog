<?php 
class Task 
{
	const TASK_PER_PAGE = 1;
	public static function viewAll($currentPage = 1)
	{	
		$limit = self::TASK_PER_PAGE;
		$offset = ($currentPage - 1) * self::TASK_PER_PAGE;
		$db = Db::getConnection();

		
		$sql = 'SELECT * FROM task ORDER BY id ASC LIMIT '.$limit.' OFFSET '.$offset;
		$result = $db->prepare($sql);
		$result->execute();
		$i = 0;
		$taskList =[];
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
	public static function viewOne($id)
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
			$tasks[$i]['user_id'] = $row['user_id'];
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
	public static function addComment($comment, $userId = 0, $taskId)
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
	public static function getComments($task_id)
	{
		$db = Db::getConnection();
		$result = $db->query('SELECT * FROM comment WHERE task_id = '.$task_id);	
		$comments =[];
		$i = 0;
		while($row = $result->fetch()){
			$comments[$i]['id'] = $row['id'];
			$comments[$i]['task_id'] = $row['task_id'];
			$comments[$i]['user_id'] = $row['user_id'];
			$comments[$i]['comment'] = $row['comment'];			
			$i++;
		}		

		return $comments;
	}
	public static function getShortContent($content)
	{
		return substr($content,0,200) .  ' ...';
	}
	public static function totalTask()
	{
		$db = Db::getConnection();
		$result = $db->query('SELECT count(id) AS count FROM task');
		$result->setFetchMode(PDO::FETCH_ASSOC);            
        return $result->fetch();
	}
}