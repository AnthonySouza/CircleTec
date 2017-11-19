<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once 'feed.php';
require_once 'post.php';

if(isset($_POST['Action']) || isset($_POST['post_id']) || isset($_POST['data'])) {

	if($_POST['Action'] != 'undefined' || $_POST['post_id'] != 'undefined' || $_POST['data'] != 'undefined') {
		
		switch ($_POST['Action'])
		{
			case 'SEND_COMMENT_POST_ACTION':

				if(comment_post($_POST['post_id'], $_SESSION['user_id'], $_POST['data'])) {

					echo 'SUCCEFULL';

				} else {
				
					echo 'ERROR';
				
				}

				break;
			case 'REFLESH_COMMENT_POST_ACTION':

				echo get_post_comments_html(new Post($_POST['post_id']), POST_COMMENTS_VIEW_REVELANTS);

				break;

		}
  
	}

}

?>