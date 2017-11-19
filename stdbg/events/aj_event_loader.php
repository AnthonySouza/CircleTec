<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';
require_once 'events.php';

if(isset($_POST['GET_EVENTS_DATE'])) {

	if($_POST['GET_EVENTS_DATE'] != 'undefined') {
		
		if($events = draw_events_html(new DateTime($_POST['GET_EVENTS_DATE']))) {
		
			echo $events;
		
		}

	}

}

?>