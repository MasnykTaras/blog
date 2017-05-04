<?php 
return [
	'cabinet' => 'cabinet/index',
	'register' => 'user/register',
	'sign' => 'user/login',
	'logout' => 'user/logout',
	'add' => 'task/add',
	'task/([0-9]+)' => 'task/view/$1',
	
	'' => 'task/index',
	
];