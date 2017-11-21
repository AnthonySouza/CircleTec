<?php

require_once 'init.php';
require_once 'page.php';

require_once _CORE_ROOT_ . 'user.php';
require_once _CORE_ROOT_ . 'functions.php';

require_once _FEED_ROOT_ . 'post.php';
require_once _FEED_ROOT_ . 'feed.php';

require_once _COURSE_ROOT_ . 'course.php';

if(isset($_GET['id'])) {

	create_user_page($_GET['id']);

} else {

	create_user_page($_SESSION['user_id']);

}

?>