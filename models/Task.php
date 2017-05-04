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
			$taskList[$i]['id'] = $row['id'];
			$taskList[$i]['name'] = $row['name'];
			$taskList[$i]['content'] = $row['content'];
			$taskList[$i]['email'] = $row['email'];
			$taskList[$i]['image'] = $row['image'];
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
	public static function addTask($subject, $content, $image, $email)
	{

		$db = Db::getConnection();
		$sql = 'INSERT INTO task (name, content, email, image) '
				. 'VALUES (:subject, :content, :email, :image)';
		$result = $db->prepare($sql);
		$result->bindParam(':subject', $subject, PDO::PARAM_INT);
		$result->bindParam(':content', $content, PDO::PARAM_INT);
		$result->bindParam(':email', $email, PDO::PARAM_INT);
		$result->bindParam(':image', $file, PDO::PARAM_INT);

		return $result->execute();
	}
}