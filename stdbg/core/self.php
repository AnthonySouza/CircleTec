<?php

function self_data($url) {
	
    if ('' == $url) {
        return $url;
    }
	
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
	
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
	
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
	
    $url = str_replace(';//', '://', $url);
	
    $url = htmlentities($url);
	
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
	
    if ($url[0] !== '/') {
        return '';
    } else {
        return $url;
    }
}

function get_value() {



}