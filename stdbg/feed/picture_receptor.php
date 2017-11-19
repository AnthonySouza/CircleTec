<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'imgur/imgur.php';

$allowed = array('png', 'jpg', 'gif');

if(isset($_FILES['upload-picture-data-input']) && $_FILES['upload-picture-data-input']['error'] == 0){

	

	$extension = pathinfo($_FILES['upload-picture-data-input']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	for ($i = 0; $i < sizeof($_FILES); $i++)
	{
		
		if($iid = register_image($_FILES['upload-picture-data-input']['tmp_name'], new User($_SESSION['user_id']))) {
		
			echo '{"status":"success", "image_link": "' . $iid . '"}';
		
		}

	}

}