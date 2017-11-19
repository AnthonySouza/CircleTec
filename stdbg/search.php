<?php

require_once 'init.php';
require_once 'page.php';

if(isset($_GET['q'])) {
	
	if($_GET['q'] != null) {
	
		create_search_page(urldecode($_GET['q']));
	
	}

}

?>