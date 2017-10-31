<?php 

use app\models\Task;
use app\components\Pagination;

class SiteController
{
	public function actionIndex($page){


		
		if(isset($_POST['submit'])){			
			$_SESSION['filter'] = $_POST['filter'];
		}
		if(isset($_SESSION['filter'])){
			$filter = $_SESSION['filter'];
		}else{
			$filter = 'id';
		}		

		$tasksList = Task::viewAll($page, $filter);

		

		$total = Task::allTask()['count'];
		
		
		$pagination = new Pagination($total, $page, Task::SHOW_BY_DEFAULT, 'page-');

		include_once(ROOT . '/view/site/index.php');
	}
	
}
?>