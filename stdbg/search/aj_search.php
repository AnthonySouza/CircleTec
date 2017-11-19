<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'json.php';
require_once 'search.php';

if(isset($_POST['data'])) {

	if($_POST['data'] != 'undefined') {
		$data_arr = convert_json_to_array($_POST['data']);

		echo get_aj_query_result($data_arr);

	}

}

?>