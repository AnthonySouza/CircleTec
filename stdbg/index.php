<?php

require_once 'init.php';
require_once 'page.php';

if(!isset($_SESSION['user_id'])) {
	header("Location: //" . _URL_LOGIN_ROOT_);
}

create_init_page_data($_SESSION['user_id']);

?>