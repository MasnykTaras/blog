<?php

use models\Task;
use models\User;

class TaskController
{
    public function actionView($id) 
    {
    	if($id){
    		$taskOne = Task::viewOne($id);
	    	include_once(ROOT . '/view/task/view.php');
    	} 
      return true;   	  
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
        $user_name = "";
        $email ="";
        $content = "";
        $image = "";
        if(isset($_POST['submit'])){
         
          $user_name = $_POST['user_name'];
          $email = $_POST['email'];
          $content = $_POST['content'];
          $image = Task::uploadFile();
          $result = Task::addTask($user_name, $email, $content, $image);
        }
        require_once(ROOT . '/view/task/add.php');
        return true;
    }
   

    public function actionEdit($id)
    {
        
        $status = "";
        $content = "";
        $photo = "";
        if(isset($_POST['submit'])){
           $status = $_POST['status'];

           $content = $_POST['content'];
           $errors = false;

           $userId = User::checkLogged();    
           if($errors == false){                    
                $result = Task::editTask($content, $status, $id);
            }
        }
        if($id){
            $taskOne = Task::viewOne($id);
        }
        include_once(ROOT . '/view/task/edit.php');  
        return true;
    }  
    public function actionPreview()
    {
      $data = $_POST['data'];
      
      include_once(ROOT .  '/view/task/preview.php');
      return true;
    }
}
