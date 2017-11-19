<?php

function reflesh_page($pagename, $args = null) {
	header('Location: ../' . $pagename . '/' . $args);
}

function set_args($arr_args) {
	if(isset($arr_args) || $arr_args != null || is_array($arr_args)) {
		
		$args = '';
		$arr_keys = array_keys($arr_args);
		$arr_vals = array_values($arr_args);

		for ($i = 0; $i < sizeof($arr_keys); $i++)
		{
			$args .= $arr_keys[$i] . '=' . $arr_vals[$i] . '&';
		}
		
		return '?' . $args;
		
	}
	return null;
}

?>