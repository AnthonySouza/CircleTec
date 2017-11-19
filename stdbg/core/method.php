<?php

define("GET", "GET", TRUE);
define("POST", "POST", TRUE);

function get_method_value($method, $name) {
	if(isset($method) || $method != null) {
		switch ($method)
		{
			case GET:
				return $_GET[$name];
			case POST:
				return $_POST[$name];
			default:
		}
	}
	return false;
}