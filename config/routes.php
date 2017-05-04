<?php 
return [
	'cabinet' => 'cabinet/index',

	'register' => 'user/register',
	'sign' => 'user/login',
	'logout' => 'user/logout',

	'edit/([0-9]+)' => 'task/editTask/$1',
	'add' => 'task/add',
	'tasks' => 'task/userTasks',
	'task/([0-9]+)' => 'task/view/$1',

	'archive/([0-9]+)' => 'task/archive/$1',
	
	'' => 'task/index',
	
];