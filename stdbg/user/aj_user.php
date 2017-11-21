<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'user.php';

if(isset($_POST['get'])) {

	if($_POST['get'] != 'undefined') {
		$usr = new User($_SESSION['user_id']);
		
		switch ($_POST['get'])
		{
			case 'GET_USER_BACKGROUND_PICTURE':

				echo $usr->get_cover_picture();
					
				break;
			case 'GET_USER_ID':

				echo $usr->get_id();

				break;
			case 'GET_USER_NAME':

				echo '<span>' . $usr->get_long_username() . '</span><div class="change-name-button-content"><a href="#"><i class="icon-pencil-neg"></i></a></div>';

				break;
		}

	}

}

?>