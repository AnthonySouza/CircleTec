<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once 'feed.php';

if(isset($_POST['Action']) || isset($_POST['post_id'])) {

	if($_POST['Action'] != 'undefined' || $_POST['post_id'] != 'undefined') {
		
		switch ($_POST['Action'])
		{
			case 'LIKE_POST_ACTION':

				if(post_is_liked($_POST['post_id'], $_SESSION['user_id']) === false) {
				
					if(insert_post_like($_POST['post_id'], $_SESSION['user_id'])) {
						
						echo 'SUCCEFULL_ACTION';
						
					} else {
						
						echo 'ACTION_ERROR';
						
					}
				
				} else {
				
					if(remove_post_like($_POST['post_id'], $_SESSION['user_id'])) {
						
						echo 'SUCCEFULL_REMOVE_ACTION';
						
					} else {
						
						echo 'ACTION_ERROR';
						
					}
				
				}

				break;

			case 'GET_POST_ACTIONS_INFO':

				echo set_post_actions_info_html($_POST['post_id'], $_SESSION['user_id']);

				break;

			case 'COMMENT_POST_ACTION':

				echo post_create_new_comment_html(new User($_SESSION['user_id']), new Post($_POST['post_id']));

				break;
		}
  
	}

}

?>