<?php
// include_once ROOT . '/models/Task.php';
class TaskController
{
    public function actionView($id) 
    {
    	if($id){
    		$taskOne = Task::viewOne($id);
	    	include_once(ROOT . '/view/task/view.php');	 
			return true;
    	}
    	  
    }
    
    public function actionIndex() 
    {
    	$tasksList =[];
    	$tasksList = Task::viewAll();
    	include_once ROOT . '/view/task/index.php';	 
        return true;
    }
    public function actionAddTask()
    {
        include_once ROOT . '/view/task/add.php';
        return true;
    }
}
