<?php

define("USER_UNREGISTERED_SUCCEFULL", 1, TRUE);
define("USER_UNREGISTERED_ERROR", 0, TRUE);

if(isset($_POST['uid']) || isset($_POST['eid'])) {

	require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

	require_once _CORE_ROOT_ . 'database.php';
	   
	require_once _EVENTS_ROOT_ . 'events.php';

	if(user_is_registered_on_event($_POST['eid'], $_POST['uid'])) {
	
		if(del_register_user_on_event($_POST['eid'], $_POST['uid'])) {
			
			return USER_UNREGISTERED_SUCCEFULL;
			
		}

		return USER_UNREGISTERED_ERROR;
	
	}

	return USER_UNREGISTERED_ERROR;

}