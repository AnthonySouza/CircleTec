<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'user.php';

require_once __ROOT__ . '/page.php';

if(isset($_POST['get']) || isset($_POST['uid'])) {

	if($_POST['get'] != 'undefined' || $_POST['uid'] != 'undefined') {
		global $_USER;
		
		switch ($_POST['get'])
		{
			case 'GET_USER_ALL_CONTENT_DATA':

				echo reflesh_aj_page_user_view_interface_content_html(new User($_POST['uid']), $_USER);
					
				break;

			case 'GET_USER_POSTS':

				echo draw_create_new_post_content_html($_USER);

				break;

			case 'GET_ALL_POST':

				echo write_all_posts_html($_USER->get_id());
				
				break;
			case 'GET_EMPTY_LOADING_POST': 

				echo draw_empty_post_content_html();

				break;
		}

	}

}

?>