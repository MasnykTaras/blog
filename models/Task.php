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
}