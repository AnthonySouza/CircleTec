<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'json.php';

define("EVENT_CREATED_SUCCEFFULL_STATUS", 1, TRUE);
define("EVENT_CREATED_ERROR_STATUS", 2, TRUE);
define("EVENT_CREATED_ADD_COLAB_ERROR", 3, TRUE);

if(isset($_POST['ev_name']) || $_POST['ev_name'] != null || isset($_POST['ev_info']) || $_POST['ev_info'] != null || isset($_POST['ev_date']) || $_POST['ev_date'] != null || isset($_POST['ev_init']) || $_POST['ev_init'] != null || isset($_POST['ev_end']) || $_POST['ev_end'] != null || isset($_POST['ev_shift']) || $_POST['ev_shift'] != null || isset($_POST['ev_local']) || $_POST['ev_local'] != null) {

	require_once 'events.php';

	if($eid = register_new_event($_POST['ev_name'], $_POST['ev_info'], $_POST['ev_date'], $_POST['ev_init'], $_POST['ev_end'], $_POST['ev_shift'], $_POST['ev_local'])) {
	
		if(insert_event_colab($eid, $_SESSION['user_id'])) {
		
			$e_result = array (
			'status' => EVENT_CREATED_SUCCEFFULL_STATUS,
			'event_id' => $eid,
			);

			echo convert_array_to_json($e_result);
		
		} else {
		
			$e_result = array (
			'status' => EVENT_CREATED_ADD_COLAB_ERROR,
			'event_id' => $eid,
			);

			echo convert_array_to_json($e_result);
		
		}

	} else {
	
		$e_result = array (
			'status' => EVENT_CREATED_ERROR_STATUS,
			'event_id' => 0,
			);

		echo convert_array_to_json($e_result);
	
	}

}