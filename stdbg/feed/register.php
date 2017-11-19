<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once 'feed.php';

if(isset($_POST['data'])) {

	if($_POST['data'] != 'undefined') {
	
		if(register_post($_POST['data'])) {
		
			echo 'SUCCEFULL';

		}

	}

}

?>