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
        $photo = "";
        if(isset($_POST['submit'])){
           $subject = $_POST['subject'];
           $content = $_POST['content'];
           $photo = $_POST['file'];

           $errors = false;
           if(!Task::checkSubject($subject)){
                $errors[] = 'Subject must be longer';
           }

           $userId = User::checkLogged();    
           if($errors == false){      
                $result = Task::addTask($subject, $content, $photo, $userId);

            }
        }
        require_once(ROOT . '/view/task/add.php');
        return true;
    }

    public function actionUserTasks()
    {   
        $userId = User::checkLogged();

        $tasks = [];
        $tasks = Task::viewUserAll($userId);   

        include_once(ROOT . '/view/task/userTasks.php');
        return true;
    }

    public function actionEditTask($id)
    {
        
        $subject = "";
        $content = "";
        $photo = "";
        if(isset($_POST['submit'])){
           $subject = $_POST['subject'];
           $content = $_POST['content'];
           $photo = $_POST['file'];

           $errors = false;
           if(!Task::checkSubject($subject)){
                $errors[] = 'Subject must be longer';
           }

           $userId = User::checkLogged();    
           if($errors == false){                    
                $result = Task::editTask($subject, $content, $photo, $id);
            }
        }
        if($id){
            $taskOne = Task::editOne($id);
        }
        include_once(ROOT . '/view/task/editTask.php');  
        return true;
    }
    public function actionArchive($id)
    {
        $tasks = [];
        $tasks = Task::viewUserAll($id);   

        include_once(ROOT . '/view/task/archiveUserTasks.php');
        return true;
    }
}
