<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'database.php';
require_once _CORE_ROOT_ . 'json.php';

define("USER_REGISTERED_SUCCEFULL", 1, TRUE);
define("USER_REGISTERED_ERROR", 2, TRUE);

if(isset($_POST['event']) || isset($_POST['state'])) {
   
    require_once _EVENTS_ROOT_ . 'events.php';

    if(!user_is_registered_on_event($_POST['event'], $_SESSION['user_id'])) {
	
        if($rid = register_user_on_event($_POST['event'], $_SESSION['user_id'])) {
			
            $e_result = array (
            'status' => USER_REGISTERED_SUCCEFULL,
            'register_id' => $rid,
            );

            echo convert_array_to_json($e_result);
			
        } else {
		
			$e_result = array (
            'status' => USER_REGISTERED_ERROR,
            'register_id' => 0,
            );

			echo convert_array_to_json($e_result);
		
		}

    } else {
	
		$e_result = array (
			'status' => USER_REGISTERED_ERROR,
			'register_id' => 0,
			);

		echo convert_array_to_json($e_result);
	
	}

}