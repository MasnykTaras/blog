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
    	include_once (ROOT . '/view/task/index.php');	 
        return true;
    }
    public function actionAdd()
    {   
        $subject = "";
        $content = "";
        $file = "";
        if(isset($_POST['submit'])){
           $subject = $_POST['subject'];
           $content = $_POST['content'];
           $image = $_POST['file'];
           $errors = false;
           if(!Task::checkSubject($subject)){
                $errors[] = 'Subject must be longer';
           }
           $userId = User::checkLogged();
           $user = User::getUserById($userId);     
           if($errors == false){      
                $result = Task::addTask($subject, $content, $image, $user['email']);
            }
        }
        require_once(ROOT . '/view/task/add.php');
        return true;
    }
}
