<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

if(isset($_POST['get'])) {

	if($_POST['get'] != 'undefined') {
		global $_USER;
		
		switch ($_POST['get'])
		{
			case 'GET_USER_BACKGROUND_PICTURE':

				echo $_USER->get_cover_picture();
					
				break;
			case 'GET_USER_ID':

				echo $_USER->get_id();

				break;
		}

	}

}

?>