<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'database.php';
require_once _CORE_ROOT_ . 'user.php';

function get_user_publications_count($user) {
	global $socialtecdatabase;

	if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `post` WHERE `user_id`='" . $user->get_id() . "'")) {
	
		if($conn->execute()) {
		
			$row = $conn->fetchAll(PDO::FETCH_ASSOC);

			return sizeof($row);
		
		}
	
	}

	return 0;

}