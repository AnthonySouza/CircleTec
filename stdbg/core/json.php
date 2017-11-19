<?php

function convert_json_to_array($json) {

	if(isset($json) || $json != null) {
	
		return json_decode($json, true);
	
	}
	return false;
}

function convert_array_to_json($array) {

	if(isset($array) || $array != null || is_array($array)) {
		
		return json_encode($array);
		
	}
	return false;
}