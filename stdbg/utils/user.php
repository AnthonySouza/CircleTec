<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

if(isset($_POST['get']) || $_POST['get'] != null) {
	switch ($_POST['get'])
	{
		case 'get_logged_user_id':
			echo $_POST['get'];
			break;
	}
 
}