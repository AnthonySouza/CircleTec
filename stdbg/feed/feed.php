<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'database.php';
require_once _CORE_ROOT_ . 'user.php';
require_once _CORE_ROOT_ . 'json.php';
require_once _CORE_ROOT_ . 'sha.php';
require_once _CORE_ROOT_ . 'comment.php';

require_once(_EMOJIONE_ROOT_ . 'RulesetInterface.php');
require_once(_EMOJIONE_ROOT_ . 'ClientInterface.php');
require_once(_EMOJIONE_ROOT_ . 'Client.php');
require_once(_EMOJIONE_ROOT_ . 'Ruleset.php');
require_once(_EMOJIONE_ROOT_ . 'Emojione.php');

require_once _UTILS_ROOT_ . 'generator.php';

require_once 'post.php';
require_once 'data_text.php';
require_once 'data_image.php';

function create_feed_content($user) {

	echo '<div class="news-feed-contend news-feed-user-vw-contend" style="top: 0;">';

	draw_create_new_post_content($user);

	echo '<div class="feed-post-content">';

	write_all_posts($user);

	echo '</div>';
	echo '</div>';

}

function create_feed_content_html($user) {

	$html = '';

	$html .= '<div class="news-feed-contend news-feed-user-vw-contend" style="top: 0;">';

	$html .= draw_create_new_post_content_html($user);

	$html .= '<div class="feed-post-content">';

	$html .= draw_loading_post_html();

	$html .= '</div>';
	$html .= '</div>';

	return $html;

}

function create_feed_global_content($user_id) {

	echo '<div class="news-feed-contend news-feed-user-vw-contend" style="top: 0;">';

	draw_create_new_post_content($user_id);

	echo '<div class="feed-post-content">';

	write_init_global_posts();

	echo '</div>';
	echo '</div>';

}

function draw_create_new_post_content($user_id) {
	global $_STRINGS;

	$usr = new User($user_id);

	echo '<div class="new-post-content">';
	echo '<div class="content">';
	//echo '<div class="new-post-top-content">';
	//echo '<div class="config">';
	//echo '<div class="insert-picture-button"><i class="icon-picture"></i>Inserir Imagem</div>';
	//echo '</div>';
	//echo '</div>';

	echo '<div class="new-post-input-content">';
	echo '<div class="user-picture">';
	echo '<img src="' . $usr->get_picture() . '">';
	echo '</div>';
	echo '<div class="input-content">';
	echo '<textarea id="new-post-input"></textarea>';
	echo '</div>';
	echo '</div>';

	echo '<div class="pictures-uploaded-container">';
	echo '<form id="upload" method="post" action="/feed/picture_receptor.php" enctype="multipart/form-data">';
	echo '<div class="pictures-content">';

	echo '<div class="drag-picture-object">';
	echo '<div class="drag-object-content">';
	echo '<div class="top-icon-view">';
	echo '<span id="close"><i class="icon-picture-3"></i></span>';
	echo '</div>';
	echo '<span>Arraste e solte aqui.</span>';
	echo '<input type="file" class="invisible_input" name="upload-picture-data-input" id="upload-picture-data-input" multiple>';
	echo '</div>';
	echo '</div>';

	echo '</div>';
	echo '</form>';
	echo '</div>';

	echo '<div class="new-post-bottom">';
	echo '<div class="bottom-content">';

	echo '<div class="insert-emojicon-button" >';
	echo '<i class="icon-smile"></i>';
	echo '</div>';

	echo '<div class="upload-picture-button">';
	echo '<i class="icon-picture"></i>';
	echo '</div>';
	echo '<div class="send-post-button">';
	echo '<i class=" icon-paper-plane-1"></i>';
	echo '</div>';

	echo '<div class="visibility-selector-content">';
	echo '<select name="post-visibility" id="post-visibility">';
	echo '<option value="0">' . $_STRINGS->get_value('web.public') . '</option>';
	echo '<option value="1">' . $_STRINGS->get_value('web.room') . '</option>';
	echo '<option value="2">' . $_STRINGS->get_value('web.private') . '</option>';
	echo '</select>';
	echo '</div>';

	echo '</div>';

	echo '</div>';
	echo '</div>';
	echo '</div>';

}

function draw_create_new_post_content_html($user) {
	global $_STRINGS;
	$html = '';

	$html .=  '<div class="new-post-content">';
	$html .=  '<div class="content">';

	$html .=  '<div class="new-post-input-content">';
	$html .=  '<div class="user-picture">';
	$html .=  '<img src="' . $user->get_picture() . '">';
	$html .=  '</div>';
	$html .=  '<div class="input-content">';
	$html .=  '<textarea id="new-post-input"></textarea>';
	$html .=  '</div>';
	$html .=  '</div>';

	$html .=  '<div class="pictures-uploaded-container">';
	$html .=  '<form id="upload" method="post" action="/feed/picture_receptor.php" enctype="multipart/form-data">';
	$html .=  '<div class="pictures-content">';

	$html .=  '<div class="drag-picture-object">';
	$html .=  '<div class="drag-object-content">';
	$html .=  '<div class="top-icon-view">';
	$html .=  '<span id="close"><i class="icon-picture-3"></i></span>';
	$html .=  '</div>';
	$html .=  '<span>Arraste e solte aqui.</span>';
	$html .=  '<input type="file" class="invisible_input" name="upload-picture-data-input" id="upload-picture-data-input" multiple>';
	$html .=  '</div>';
	$html .=  '</div>';

	$html .=  '</div>';
	$html .=  '</form>';
	$html .=  '</div>';

	$html .=  '<div class="new-post-bottom">';
	$html .=  '<div class="bottom-content">';
	$html .=  '<div class="upload-picture-button">';
	$html .=  '<i class="icon-picture"></i>';
	$html .=  '</div>';
	$html .=  '<div class="send-post-button">';
	$html .=  '<i class=" icon-paper-plane-1"></i>';
	$html .=  '</div>';

	$html .=  '<div class="visibility-selector-content">';
	$html .=  '<select name="post-visibility" id="post-visibility">';
	$html .=  '<option value="0">' . $_STRINGS->get_value('web.public') . '</option>';
	$html .=  '<option value="1">' . $_STRINGS->get_value('web.room') . '</option>';
	$html .=  '<option value="2">' . $_STRINGS->get_value('web.private') . '</option>';
	$html .=  '</select>';
	$html .=  '</div>';

	$html .=  '</div>';

	$html .=  '</div>';
	$html .=  '</div>';
	$html .=  '</div>';

	return $html;

}

function draw_post($post) {

	$post = new Post($post);
	$usr = new User($_SESSION['user_id']);
	$__usr = new User($post->get_user_id());

	echo '<div class="post-contend" id="' . $post->get_id() . '">';
	echo '<div class="post-top">';
	echo '<div class="user-contend">';
	echo '<div class="picture">';
	echo '<img src="' . $__usr->get_picture() . '">';
	echo '</div>';
	echo '<div class="name">';
	echo '<a href="user.php?id=' . $__usr->get_id() . '">';
	echo '<span>' . $__usr->get_long_username() . '</span>';
	echo '</a>';
	echo '</div>';
	echo '<div class="post-visibility">';
	echo '<span>';
	echo '<i class="' . get_post_visibility($post) . '"></i>';
	echo'</span>';
	echo '</div>';
	echo '<div class="posted-datetime">';
	echo '<span>' . get_posted_datetime($post) . '</span>';
	echo '</div>';

	echo '</div>';
	echo '</div>';

	echo '<div class="post-center">';

	get_post_content($post);
	get_post_actions_controls($post);

	echo '</div>';

	echo '<div class="post-bottom">';

	set_post_actions_info($post, $usr);

	//post_create_new_comment($usr, $post);

	//get_post_comments($post, POST_COMMENTS_VIEW_REVELANTS);

	echo '</div>';

	echo '</div>';

}

function draw_post_html($post) {
	$html = '';

	$post = new Post($post);
	$usr = new User($_SESSION['user_id']);
	$user = new User($post->get_user_id());

	$html .=  '<div class="post-contend" id="' . $post->get_id() . '">';
	$html .=  '<div class="post-top">';
	$html .=  '<div class="user-contend">';
	$html .=  '<div class="picture">';
	$html .=  '<img src="' . $user->get_picture() . '">';
	$html .=  '</div>';
	$html .=  '<div class="name">';
	$html .=  '<a href="user.php?id=' . $user->get_id() . '">';
	$html .=  '<span>' . $user->get_long_username() . '</span>';
	$html .=  '</a>';
	$html .=  '</div>';
	$html .=  '<div class="post-visibility">';
	$html .=  '<span>';
	$html .=  '<i class="' . get_post_visibility($post) . '"></i>';
	$html .= '</span>';
	$html .=  '</div>';
	$html .=  '<div class="posted-datetime">';
	$html .=  '<span>' . get_posted_datetime($post) . '</span>';
	$html .=  '</div>';

	$html .=  '</div>';
	$html .=  '</div>';

	$html .=  '<div class="post-center">';

	$html .=  get_post_content_html($post);
	$html .=  get_post_actions_controls_html($post);

	$html .=  '</div>';

	$html .=  '<div class="post-bottom">';

	$html .=  set_post_actions_info_html($post, $usr);

	$html .=  post_create_new_comment_html($usr, $post);

	//$html .=  get_post_comments_html($post, POST_COMMENTS_VIEW_ALL);

	$html .=  '</div>';

	$html .=  '</div>';

	return $html;

}

function draw_loading_post_html() {

	$html = '';

	$html .= '<div class="post-contend lpv" style="height: 460px;">';
	
	$html .= '</div>';

	return $html;

}

function get_posted_datetime($post) {

	if(isset($post) || $post != null) {
	
		$datetime = new DateTime($post->get_posted_datetime());
		$now = new DateTime();

		if($datetime->format('d') === $now->format('d')) {
		
			return $datetime->format('H:i');
		
		} else {
		
			return $datetime->format('d/m/Y - H:i');
		
		}
	
	}

	return '';

}

function get_post_visibility($post) {

	if(isset($post) || $post != null) {
		
		$json = $post->get_data();
		$arr = convert_json_to_array($json);

		switch ($arr['post-visibility'])
		{
			case POST_VISIBILITY_GLOBAL:
			
				return 'icon-globe-5';
			
			case POST_VISIBILITY_PRIVATE:

				return 'icon-eye-1';

			case POST_VISIBILITY_ROOM: 

				return 'icon-location';
		}
		

	}

	return '';

}

function get_post_content(Post $post) {

	if(isset($post) || $post != null) {
		
		$json = $post->get_data();

		//$json = preg_replace(">", "&gt;", $json);
		//$json = preg_replace("<", "&lt;", $json);
		$json = preg_replace("/(\\r)?\\n/i", "<br>", $json);

		$arr = convert_json_to_array($json);

		if(isset($arr['post-text-data'])) {
		
			echo '<div class="post-text-contend">';
			echo '<span>';

			Emojione\Emojione::$imagePathPNG = _URL_EMOJIONE_DATA_ROOT_;
			
			echo Emojione\Emojione::shortnameToImage($arr['post-text-data']['content']);

			//echo $arr['post-text-data']['content'];
			echo '</span>';
			echo '</div>';
		
		}

		if(isset($arr['post-picture-content-arr'])) {
			
			for ($i = 0; $i < sizeof($arr['post-picture-content-arr']['data']); $i++)
			{
				echo '<div class="post-picture-contend">';
				echo '<img src="' . $arr['post-picture-content-arr']['data'][$i] . '">';
				echo '</div>';
			}
			
		}
		

	}

	return '';

}

function get_post_content_html(Post $post) {

	if(isset($post) || $post != null) {
		
		$html = '';
		$json = $post->get_data();
		$arr = convert_json_to_array($json);

		if(isset($arr['post-text-data'])) {
			
			$html .= '<div class="post-text-contend">';
			$html .= '<span>';
			$html .= $arr['post-text-data']['content'];
			$html .= '</span>';
			$html .= '</div>';
			
		}

		if(isset($arr['post-picture-data'])) {
			
			$html .= '<div class="post-picture-contend">';
			$html .= '<img src="' . $arr['post-picture-data']['content'] . '">';
			$html .= '</div>';
			
		}
		
		return $html;

	}

	return '';

}

function write_all_posts($user_id) {

	if(isset($user_id) || $user_id != null) {
	
		if($arr = get_all_posts_arr_by_user($user_id)) {
		
			for ($i = 0; $i < sizeof($arr); $i++)
			{
				
				draw_post($arr[$i]);

			}
			
		}
	
	}

}

function write_all_posts_html($user_id) {

	if(isset($user_id) || $user_id != null) {
		
		if($arr = get_all_posts_arr_by_user(new User($user_id))) {

			$html = '';
			
			for ($i = 0; $i < sizeof($arr); $i++)
			{
				
				$html = draw_post_html($arr[$i]);

			}
			
			return $html;

		}
		
	}

	return '';

}

function write_init_global_posts() {

	if($arr = get_all_posts_arr()) {
		
		for ($i = 0; $i < sizeof($arr); $i++)
		{
			
			draw_post($arr[$i]);

		}
		
	}
		
}

function get_all_posts_arr_by_user($user_id) {
	global $socialtecdatabase;

	$user = new User($user_id);

	if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `post` WHERE `user_id`='" . $user->get_id() . "' ORDER BY `posted` DESC")) {
	
		if($conn->execute()) {
		
			$row = $conn->fetchAll(PDO::FETCH_ASSOC);

			if(sizeof($row) > 0) {
			
				$arr[] = null;

				for ($i = 0; $i < sizeof($row); $i++)
				{
					$arr[$i] = $row[$i]['id'];
				}
				
				return $arr;
			
			} else {
			
				return false;

			}
		
		}
	
	}

	return false;

}

function get_all_posts_arr() {
	global $socialtecdatabase;

	if($conn = $socialtecdatabase->prepare("SELECT * FROM `post` ORDER BY `posted` DESC")) {
		
		if($conn->execute()) {
			
			$row = $conn->fetchAll(PDO::FETCH_ASSOC);

			if(sizeof($row) > 0) {
				
				$arr[] = null;

				for ($i = 0; $i < sizeof($row); $i++)
				{
					$arr[$i] = $row[$i]['id'];
				}
				
				return $arr;
				
			} else {
				
				return false;

			}
			
		}
		
	}

	return false;

}

function generate_data_image($type, $link, $title, $gallery) {

	if(isset($type) || isset($link)) {
	
		return new DataImage($type, $link, $title, $gallery);
	
	}

	return '';

}

function generate_data_text($type, $content, $font_size) {

	if(isset($type) || isset($content)) {
		
		return new DataText($type, $content, $font_size);
		
	}

	return '';

}

function write_post_on_database($post_type, $visibility, $data_text, $data_image, $user_id) {
	global $socialtecdatabase;

	$pid = GenerateString(18, _ID_);
	$phash = Sha::sha512($post_type . $pid);
	$post_content_text = array();
	$post_content_image = array();
	
	$post_header = array(
	'json-type' => 'simple-post',
	'post-id' => $pid,
	'post-hash' => $phash, 
	'post-type' => $post_type,
	'post-visibility' => $visibility,
	);

	if(isset($data_text) || $data_text != null) {
	
		$post_content_text = array (
		'type' => $data_text->get_type(),
		'content' => $data_text->get_content(),
		'font-size' => $data_text->get_font_size(),
		);
	
		$post_header = array_merge($post_header, array('post-text-data' => $post_content_text));

	}

	if(isset($data_image) || $data_image != null) {
		
		$post_content_image = array (
		'type' => $data_image->get_type(),
		'content' => $data_image->get_content(),
		'title' => $data_image->get_title(),
		'gallery' => $data_image->get_gallery(),
		);
		
		$post_header = array_merge($post_header, array('post-picture-data' => $post_content_image));

	}

	$posted = new DateTime();
	$posted = $posted->format('Y-m-d H:i:s');
	$json = convert_array_to_json($post_header);

	if($conn = $socialtecdatabase->prepare("INSERT INTO `post`(`id`, `user_id`, `posted`, `aprov`, `mode`, `post_data`) VALUES ('" . $pid . "', '" . $user_id . "', '" . $posted . "', '1', '', '" . $json . "')")) {
	
		if($conn->execute()) {
		
			return $pid;

		}
	
	}

	return false;

}

function get_post_actions_controls($post) {
	global $socialtecdatabase;
	global $_STRINGS;
	
	echo '<div class="post-info">';
	echo '<div class="likes">';
	echo '<div class="likes-contend">';
	echo '<div class="efxs-pointer">';

	if(post_liked_by_user(new User($_SESSION['user_id']), $post)) {
		
		echo '<span id="s-likes" class="s-likes" post-id="' . $post->get_id() . '" style="color: #007bff;"><i class="icon-heart-4"></i></span>';
		
	} else {
	
		echo '<span id="s-likes" class="s-likes" post-id="' . $post->get_id() . '"><i class="icon-heart-5"></i></span>';
	
	}

	
	echo '</div>';
	echo '</div>';
	echo '</div>';

	//echo '<span style="font-size: 30px; color: #828282;">' . $_STRINGS->get_value('web.point-separator') . '</span>';

	echo '<div class="comments">';
    echo '<div class="comments-contend">';
    echo '<div class="efxs-pointer">';

	echo '<span id="s-comments" class="s-comments" post-id="' . $post->get_id() . '"><i class="icon-comment-4"></i></span>';

	echo '</div>';
	echo '</div>';
	echo '</div>';

    echo '</div>';

}

function get_post_actions_controls_html($post) {
	global $socialtecdatabase;
	global $_STRINGS;
	
	$html = '';

	$html .= '<div class="post-info">';
	$html .= '<div class="likes">';
	$html .= '<div class="likes-contend">';
	$html .= '<div class="efxs-pointer">';

	if(post_liked_by_user(new User($_SESSION['user_id']), $post)) {
		
		$html .= '<span id="s-likes" class="s-likes" post-id="' . $post->get_id() . '" style="color: #007bff;"><i class="icon-heart-4"></i></span>';
		
	} else {
		
		$html .= '<span id="s-likes" class="s-likes" post-id="' . $post->get_id() . '"><i class="icon-heart-5"></i></span>';
		
	}

	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';

	//echo '<span style="font-size: 30px; color: #828282;">' . $_STRINGS->get_value('web.point-separator') . '</span>';

	$html .= '<div class="comments">';
    $html .= '<div class="comments-contend">';
    $html .= '<div class="efxs-pointer">';

	$html .= '<span id="s-comments" post-id="' . $post->get_id() . '"><i class="icon-comment-4"></i></span>';

	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';

    $html .= '</div>';

	return $html;

}

function set_post_actions_info(Post $post, User $user) {
	global $socialtecdatabase;
	global $_STRINGS;
	$json = '{';

	if(post_liked_by_user($user, $post)) {
	
		$json .= '"post-liked-logged-user": true,';
		$json .= '"user-id": "' . $user->get_id() . '"';
	
	}

	if($arr = friends_arr_liked_post($user, $post)) {
	
		$json .= ',';
		$json .= '"friend-liked-post": {';

		for ($i = 0; $i < sizeof($arr); $i++)
		{
			
			$json .= '"' . $arr[$i]['id'] . '": {';

			$json .= '"id": "' . $arr[$i]['id'] . '"'; $json .= ',';
			$json .= '"user_id": "' . $arr[$i]['user_id'] . '"'; $json .= ',';
			$json .= '"date_time": "' . $arr[$i]['date_time'] . '"'; $json .= ',';
			$json .= '"post_id": "' . $arr[$i]['post_id'] . '"';

			$json .= '}';

			if($i < sizeof($arr) - 1) {
			
				$json .= ',';
			
			}

		}
		
		$json .= '}';
	
	}



	$json .= '}';
	$array_Out = convert_json_to_array($json);

	if(isset($array_Out['friend-liked-post'])) {
		
		if(array_key_exists('post-liked-logged-user', $array_Out) or array_key_exists('friend-liked-post', $array_Out)) {

			echo '<div class="post-actions-info">';
			echo '<div class="post-actions-info-content">';
			echo '<div class="content-info">';
			echo '<span class="small-icon like active"></span>';
			echo '<span class="view">';
			
			if($array_Out['post-liked-logged-user']) {
				
				if(isset($array_Out['user-id'])) {
					
					echo '&nbsp;<a href="user.php?id=' . $array_Out['user-id'] .'"><span class="user-rel">' . $_STRINGS->get_value('web.you') . '</a>';
					
				}

			}

			if(isset($array_Out['friend-liked-post'])) {
			
				if(sizeof($array_Out['friend-liked-post']) > 0) {
					
					$arr_keys = array_keys($array_Out['friend-liked-post']);

					for ($i = 0; $i < sizeof($array_Out['friend-liked-post']); $i++)
					{

						if($i < 3) {
							
							if($i < sizeof($array_Out['friend-liked-post'])) {
								
								echo '<span class="s">,</span>';
								
							}

							$usr = new User($array_Out['friend-liked-post'][$arr_keys[$i]]['user_id']);
							echo '&nbsp;<a class="ref" href="user.php?id=' . $usr->get_id() . '"><span class="user-rel">' . $usr->get_long_username() . '</span></a>';
							
						}

					}
					
				}
			
			}

			if($count = count_likeds($post, $user)) {
				
				$count = $count - sizeof($array_Out['friend-liked-post']);

				if($count > 0) {
					
					echo '&nbsp;e mais';

					echo '&nbsp;<a href="#"><span class="user-rel">' . $count . ' pessoas</span></a>';
					

					if (sizeof($row) === 1) {
						
						$usr = new User($row[0]['user_id']);
						echo '&nbsp;<a href="user.php?id=' . $usr->get_id() . '"><span class="user-rel">uma pessoa</span></a>';
						
					}
					
					echo '&nbsp;<span class="re-info">curtiram isso.</span>';

				}
				
			} else {
				
				echo '&nbsp;curtiu isso.';
				
			}

			if($count = count_likeds($post, $user)) {

				if($count > 1) {
					
					echo '&nbsp;<span class="re-info">curtiram isso.</span>';

				} else if($count === 1) {
					
					echo '&nbsp;<span class="re-info">curtiu isso.</span>';
					
				}
				
			} 

			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			
		}

	}
    
}

function set_post_actions_info_html(Post $post, User $user) {
	global $socialtecdatabase;
	global $_STRINGS;
	$html = '';
	$json = '{';

	if(post_liked_by_user($user, $post)) {
		
		$json .= '"post-liked-logged-user": true,';
		$json .= '"user-id": "' . $user->get_id() . '"';
		
	}

	if($arr = friends_arr_liked_post($user, $post)) {
		
		$json .= ',';
		$json .= '"friend-liked-post": {';

		for ($i = 0; $i < sizeof($arr); $i++)
		{
			
			$json .= '"' . $arr[$i]['id'] . '": {';

			$json .= '"id": "' . $arr[$i]['id'] . '"'; $json .= ',';
			$json .= '"user_id": "' . $arr[$i]['user_id'] . '"'; $json .= ',';
			$json .= '"date_time": "' . $arr[$i]['date_time'] . '"'; $json .= ',';
			$json .= '"post_id": "' . $arr[$i]['post_id'] . '"';

			$json .= '}';

			if($i < sizeof($arr) - 1) {
				
				$json .= ',';
				
			}

		}
		
		$json .= '}';
		
	}



	$json .= '}';
	$array_Out = convert_json_to_array($json);

	if(isset($array_Out['friend-liked-post'])) {
		
		if(array_key_exists('post-liked-logged-user', $array_Out) or array_key_exists('friend-liked-post', $array_Out)) {

			$html .= '<div class="post-actions-info-content">';
			$html .= '<div class="content-info">';
			$html .= '<span class="small-icon like active"></span>';
			$html .= '<span class="view">';
			
			if($array_Out['post-liked-logged-user']) {
				
				if(isset($array_Out['user-id'])) {
					
					$html .= '&nbsp;<a href="user.php?id=' . $array_Out['user-id'] .'"><span class="user-rel">' . $_STRINGS->get_value('web.you') . '</a>';
					
				}

			}

			if(isset($array_Out['friend-liked-post'])) {
				
				if(sizeof($array_Out['friend-liked-post']) > 0) {
					
					$arr_keys = array_keys($array_Out['friend-liked-post']);

					for ($i = 0; $i < sizeof($array_Out['friend-liked-post']); $i++)
					{

						if($i < 3) {
							
							if($i < sizeof($array_Out['friend-liked-post'])) {
								
								$html .= '<span class="s">,</span>';
								
							}

							$usr = new User($array_Out['friend-liked-post'][$arr_keys[$i]]['user_id']);
							$html .= '&nbsp;<a class="ref" href="user.php?id=' . $usr->get_id() . '"><span class="user-rel">' . $usr->get_long_username() . '</span></a>';
							
						}

					}
					
				}
				
			}

			if($count = count_likeds($post, $user)) {
				
				$count = $count - sizeof($array_Out['friend-liked-post']);

				if($count > 0) {
					
					$html .= '&nbsp;e mais';

					$html .= '&nbsp;<a href="#"><span class="user-rel">' . $count . ' pessoas</span></a>';
					

					if (sizeof($row) === 1) {
						
						$usr = new User($row[0]['user_id']);
						$html .= '&nbsp;<a href="user.php?id=' . $usr->get_id() . '"><span class="user-rel">uma pessoa</span></a>';
						
					}
					
					$html .= '&nbsp;<span class="re-info">curtiram isso.</span>';

				}
				
			} else {
				
				$html .= '&nbsp;curtiu isso.';
				
			}

			if($count = count_likeds($post, $user)) {

				if($count > 1) {
					
					$html .= '&nbsp;<span class="re-info">curtiram isso.</span>';

				} else if($count === 1) {
					
					$html .= '&nbsp;<span class="re-info">curtiu isso.</span>';
					
				}
				
			} 

			$html .= '</span>';
			$html .= '</div>';
			$html .= '</div>';
			
		}

	}

	return $html;
    
}

function count_likeds(Post $post, User $user) {
	global $socialtecdatabase;
	
	if($conn = $socialtecdatabase->prepare("SELECT `id`FROM `likes` WHERE (`post_id`='" . $post->get_id() . "') AND (`user_id` <> '" . $user->get_id() . "')")) {
	
		if($conn->execute()) {
		
			$row = $conn->fetchAll(PDO::FETCH_ASSOC);
			return sizeof($row);

		}	

	}

	return false;

}

function friends_arr_liked_post($user, $post) {
	global $socialtecdatabase;

	if($conn = $socialtecdatabase->prepare("SELECT `likes`.`id`, `likes`.`user_id`, `likes`.`date_time`, `likes`.`post_id` FROM `likes`, `friend` WHERE (`friend`.`friend_id`=`likes`.`user_id`) AND (`likes`.`post_id`='" . $post->get_id() . "') AND (`likes`.`user_id`<>'" . $user->get_id() . "')")) {
	
		if($conn->execute()) {
		
			$row = $conn->fetchAll(PDO::FETCH_ASSOC);

			if(sizeof($row) > 0) {
			
				return $row;
			
			}
		
		}
	
	}

	return false;

}

function post_liked_by_user($user, $post) {
	global $socialtecdatabase;

	if($conn = $socialtecdatabase->prepare("SELECT `id`, `post_id` FROM `likes` WHERE `user_id`='" . $user->get_id() . "' AND `post_id`='" . $post->get_id() . "'")) {
		
		if($conn->execute()) {
			
			$row = $conn->fetchAll(PDO::FETCH_ASSOC);

			if(sizeof($row) > 0) {
				
				return $row[0]['post_id'];
				
			}
			
		}

	}

	return false;

}

function post_create_new_comment($user, $post) {

	echo '<div class="new-post-comment">';

    echo '<div class="user-new-comment-picture">';
    echo '<div class="content">';
    echo '<img src="' . $user->get_picture() . '" alt="">';
    echo '</div>';
    echo '</div>';

    echo '<div class="new-comment-contend">';
    echo '<textarea post-id="' . $post->get_id() . '" class="new-comment-input" placeholder="Comente" name="response-comment" name="" id="" cols="" rows="1"></textarea>';
    echo '</div>';

    echo '</div>';

}

function post_create_new_comment_html($user, $post) {

	$html = '';

	$html .= '<div class="new-post-comment">';

    $html .= '<div class="user-new-comment-picture">';
    $html .= '<div class="content">';
    $html .= '<img src="' . $user->get_picture() . '" alt="">';
    $html .= '</div>';
    $html .= '</div>';

    $html .= '<div class="new-comment-contend">';
    $html .= '<textarea post-id="' . $post->get_id() . '" class="new-comment-input" placeholder="Comente" name="response-comment" name="" id="" cols="" rows="1"></textarea>';

	$html .= '<div class="send-comment-ov-button">';
	$html .= '<button class="scov-button" pid="' . $post->get_id() . '">';
	$html .= '<i class="icon-paper-plane-3"></i>';
	$html .= '</button>';
	$html .= '</div>';

    $html .= '</div>';

    $html .= '</div>';

	return $html;

}

function get_post_comments(Post $post, $mode) {
	global $socialtecdatabase;

	switch ($mode)
	{
		case POST_COMMENTS_VIEW_ALL:
			
			if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `post_comment` WHERE `post_id`='" . $post->get_id() . "'")) {
			
				if($conn->execute()) {
				
					$row = $conn->fetchAll(PDO::FETCH_ASSOC);

					if(sizeof($row) > 0) {

						echo '<div class="post-comments-container">';

						for ($i = 0; $i < sizeof($row); $i++)
						{
							
							draw_comment(new Comment($row[$i]['id']));

						}

						echo '</div>';
					
					}
				
				}
			
			}

			break;
		case POST_COMMENTS_VIEW_LAST_UPLOADEDS:

			break;
		case POST_COMMENTS_VIEW_REVELANTS:

			if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `post_comment` WHERE `post_id`='" . $post->get_id() . "' ORDER BY `date_time` DESC")) {
				
				if($conn->execute()) {
					
					$row = $conn->fetchAll(PDO::FETCH_ASSOC);

					if(sizeof($row) > 0) {

						echo '<div class="post-comments-container">';

						for ($i = 0; $i < sizeof($row); $i++)
						{
							
							draw_comment(new Comment($row[$i]['id']));

						}

						echo '</div>';
						
					}
					
				}
				
			}

			break;
	}
 

}

function draw_comment($comment) {
	global $socialtecdatabase;
	
				$user = new User($comment->get_user_id());
				$datetime = new DateTime($comment->get_datetime());
				$now = new DateTime();

				if($datetime->format('d') === $now->format('d')) {
					
					$dt = $datetime->format('H:i');
					
				} else {
					
					$dt = $datetime->format('d/m/Y H:i');
					
				}

				echo '<div class="comment">';
				echo '<div id="comment">';
				echo '<div class="user">';
				echo '<div class="user-comment-info-contend">';
				echo '<img src="' . $user->get_picture() . '" alt="">';
				echo '<p id="user-name">' . $user->get_long_username() . '</p>';
				echo '<i id="post-info">comentou</i>';
				echo '<i id="post-info-datetime" data-balloon="' . $datetime->format('d/m/Y H:i') . '" data-balloon-pos="down">' . $dt . '</i>';
				echo '</div>';
				echo '</div>';
				echo '<div class="comment-data-contend">';
				echo '<p id="comment-data">';
				echo $comment->get_comment();
				echo '</p>';
				echo '</div>';
				echo '<div class="comment-actions-content">';
				echo '<div class="actions">';
				echo '<div class="like-action">';
				echo '<a><span><i cid="' . $comment->get_id() . '" class="icon-heart-5"></i></span></a>';
				echo '</div>';
				echo '<div class="comment-action">';
				echo '<a><span><i cid="' . $comment->get_id() . '" class="icon-comment-4"></i></span></a>';
				echo '</div>';
				echo '</div>';
				echo '</div>';

				echo '</div>';
				echo'<div class="new-comment-contend" style="display:none;">';
				echo'<input class="new-comment-input" cid="' . $comment->get_id() . '" type="text" placeholder="Comente" name="response-comment" id="2">';
				echo'</div>';
				echo '<!--Comment-->';

				echo '</div>';
				
}

function draw_comment_html($comment) {
	global $socialtecdatabase;
	
	$user = new User($comment->get_user_id());
	$datetime = new DateTime($comment->get_datetime());
	$now = new DateTime();
	$html = '';

	if($datetime->format('d') === $now->format('d')) {
		
		$dt = $datetime->format('H:i');
		
	} else {
		
		$dt = $datetime->format('d/m/Y H:i');
		
	}

	$html .= '<div class="comment">';
	$html .= '<div id="comment">';
	$html .= '<div class="user">';
	$html .= '<div class="user-comment-info-contend">';
	$html .= '<img src="' . $user->get_picture() . '" alt="">';
	$html .= '<p id="user-name">' . $user->get_long_username() . '</p>';
	$html .= '<i id="post-info">comentou</i>';
	$html .= '<i id="post-info-datetime" data-balloon="' . $datetime->format('d/m/Y H:i') . '" data-balloon-pos="down">' . $dt . '</i>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '<div class="comment-data-contend">';
	$html .= '<p id="comment-data">';
	$html .= $comment->get_comment();
	$html .= '</p>';
	$html .= '</div>';
	$html .= '<div class="comment-actions-content">';
	$html .= '<div class="actions">';
	$html .= '<div class="like-action">';
	$html .= '<a><span><i cid="' . $comment->get_id() . '" class="icon-heart-5"></i></span></a>';
	$html .= '</div>';
	$html .= '<div class="comment-action">';
	$html .= '<a><span><i cid="' . $comment->get_id() . '" class="icon-comment-4"></i></span></a>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';

	$html .= '</div>';
	$html .='<div class="new-comment-contend" style="display:none;">';
	$html .='<input class="new-comment-input" cid="' . $comment->get_id() . '" type="text" placeholder="Comente" name="response-comment" id="2">';
	$html .='</div>';
	$html .= '<!--Comment-->';

	$html .= '</div>';
	
	return $html;

}


function get_post_comments_html(Post $post, $mode) {
	global $socialtecdatabase;

	$html = '';

	switch ($mode)
	{
		case POST_COMMENTS_VIEW_ALL:

			if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `post_comment` WHERE `post_id`='" . $post->get_id() . "'")) {
				
				if($conn->execute()) {
					
					$row = $conn->fetchAll(PDO::FETCH_ASSOC);

					if(sizeof($row) > 0) {

						$html .= '<div class="post-comments-container">';

						for ($i = 0; $i < sizeof($row); $i++)
						{
							
							$html .= draw_comment_html(new Comment($row[$i]['id']));

						}

						$html .= '</div>';
						
					}
					
				}
				
			}

			break;
		case POST_COMMENTS_VIEW_LAST_UPLOADEDS:

			break;
		case POST_COMMENTS_VIEW_REVELANTS:

			if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `post_comment` WHERE `post_id`='" . $post->get_id() . "' ORDER BY `date_time` DESC")) {
				
				if($conn->execute()) {
					
					$row = $conn->fetchAll(PDO::FETCH_ASSOC);

					if(sizeof($row) > 0) {

						$html .= '<div class="post-comments-container">';

						for ($i = 0; $i < sizeof($row); $i++)
						{
							
							$html .= draw_comment_html(new Comment($row[$i]['id']));

						}

						$html .= '</div>';
						
					}
					
				}
				
			}

			break;
	}
	
	return $html;

}

function insert_post_like($post_id, $user_id) {
	global $socialtecdatabase;

	if(isset($post_id) || $post_id !== null) {

		$id = GenerateString(18, _ID_);
		$now = new DateTime();
		$now = $now->format('Y-m-d H:i:s.000000');
	
		if($conn = $socialtecdatabase->prepare("INSERT INTO `likes`(`id`, `user_id`, `date_time`, `post_id`) VALUES ('" . $id . "', '" . $user_id . "', '" . $now . "', '" . $post_id . "')")) {
		
			if($conn->execute()) {
			
				return true;
			
			}
		
		}
	
	}

	return false;

}

function remove_post_like($post_id, $user_id) {
	global $socialtecdatabase;

	if(isset($post_id) || $post_id !== null) {
		
		if($conn = $socialtecdatabase->prepare("DELETE FROM `likes` WHERE `user_id`='" . $user_id . "' AND `post_id`='" . $post_id . "'")) {
			
			if($conn->execute()) {
				
				return true;
				
			}
			
		}
		
	}

	return false;

}

function post_is_liked($post_id, $user_id) {
	global $socialtecdatabase;

	if(isset($post_id) || $post_id !== null) {
		
		if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `likes` WHERE `post_id`='" . $post_id . "' AND `user_id`='" . $user_id . "'")) {
			
			if($conn->execute()) {
				
				$row = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($row) > 0) {
				
					return true;
				
				}

			}
			
		}
		
	}

	return false;

}

function comment_post($post_id, $user_id, $comment) {
	global $socialtecdatabase;

	if(isset($post_id) || $post_id !== null || isset($user_id) || $user_id !== null || isset($comment) || $comment !== null) {
		
		$cid = GenerateString(18, _ID_);
		$now = new DateTime();
		$now = $now->format('Y-m-d H:i:s.000000');
		$comment = base64_encode($comment);

		if($conn = $socialtecdatabase->prepare("INSERT INTO `post_comment`(`id`, `post_id`, `user_id`, `comment`, `date_time`) VALUES ('" . $cid . "', '" . $post_id . "', '" . $user_id . "', '" . $comment . "', '" . $now . "')")) {
			
			if($conn->execute()) {
				
				return true;

			}
			
		}
		
	}

	return false;

}

function register_post($post_data) {
	global $socialtecdatabase;

	if(isset($post_data)) {
	
		$pid = GenerateString(18, _ID_);
		$now = new DateTime();
		$now = $now->format('Y-m-d H:i:s.000000');
		$pdataarr = convert_json_to_array($post_data);

		if($conn = $socialtecdatabase->prepare("INSERT INTO `post`(`id`, `user_id`, `posted`, `aprov`, `mode`, `post_data`) VALUES ('" . $pid . "', '" . $_SESSION['user_id'] . "', '" . $now . "', '1', '" . $pdataarr['post-visibility'] . "', '" . $post_data . "')")) {
		
			if($conn->execute()) {
			
				return true;
			
			}
		
		}
	
	}

	return false;

}

function draw_empty_post_content_html() {

	$html = '';

	$html .= '<div class="post-contend" id="000000000000000000" style="height:350px">';

	$html .= '</div>';

	return $html;

}