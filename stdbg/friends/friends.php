<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'database.php';
require_once _CORE_ROOT_ . 'user.php';

function draw_friends_content($user_id) {
	global $_STRINGS;

	$count = get_friends_count($user_id);

	if($count > 0) {
	
		echo '<div class="user-left-friends-contend">';
		echo '<div class="content">';

		echo '<div class="top-title">';
		echo '<span>Amigos<span style="margin: 0 5px 0 5px">' . $_STRINGS->get_value('web.point-separator') . '</span><span>' . $count . '</span></span>';
		echo '</div>';

		echo '<ul class="friends-content-list">';

		draw_user_friend_button($user_id);

		echo '</ul>';
		echo '</div>';
		echo '</div>';
	
	}

}

function draw_user_friend_button($user_id) {

	if($arr = convert_json_to_array(get_user_friends_list($user_id))) {
	
		for ($i = 0; $i < sizeof($arr); $i++)
		{
			
			$usr = new User($arr[$i]['friend_id']);

			echo '<li class="friend-content">';
			echo '<a href="user.php?id=' . $usr->get_id() . '" data-user-name="' . $usr->get_long_username() . '" title="' . $usr->get_long_username() . '" data-user-id="' . $usr->get_id() . '">';

			echo '<div class="user-picture">';
			echo '<img src="' . $usr->get_picture() . '">';
			echo '</div>';

			echo '</a>';
			echo '</li>';

		}	

		return true;
	
	}

	return false;

}

function get_user_friends_list($user_id, $limit = 8) {
	global $socialtecdatabase;

	if($conn = $socialtecdatabase->prepare("SELECT * FROM `friend` WHERE `user_id`='" . $user_id . "' LIMIT " . $limit . "")) {
	
		if($conn->execute()) {
		
			$row = $conn->fetchAll(PDO::FETCH_ASSOC);

			if(sizeof($row) > 0) {
			
				$json = '';
				$json .= '{';

				for ($i = 0; $i < sizeof($row); $i++)
				{
				
					$json .= '"' . $i . '":';
					$json .= '{';
					$json .= '"id": "' . $row[$i]['id'] . '",';
					$json .= '"user_id": "' . $row[$i]['user_id'] . '",';
					$json .= '"friend_id": "' . $row[$i]['friend_id'] . '",';
					$json .= '"bestfriend": "' . $row[$i]['bf'] . '"';
					$json .= '}';

					if($i < sizeof($row) - 1) {
						
						$json .= ',';
						
					}

				}
			
				$json .= '}';

				return $json;

			}
		
		}
	
	}

	return false;

}

function get_friends_count($user_id) {

	global $socialtecdatabase;

	if($conn = $socialtecdatabase->prepare("SELECT * FROM `friend` WHERE `user_id`='" . $user_id . "'")) {
		
		if($conn->execute()) {
			
			$row = $conn->fetchAll(PDO::FETCH_ASSOC);

			return sizeof($row);
			
		}
		
	}

	return false;

}