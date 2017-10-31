<?php 
	return [
		'sign' => 'user/login',

		'logout' => 'user/logout',

		'edit/([0-9]+)' => 'task/edit/$1',

		'preview' => 'task/preview',
		
		'add' => 'task/add',
		
		'task/([0-9]+)' => 'task/view/$1',

		'page-([0-9]+)' => 'site/index/$1',

		'' =>'site/index/1',
	];
?>