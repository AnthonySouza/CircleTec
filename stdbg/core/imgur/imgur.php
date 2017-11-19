<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'database.php';
require_once _CORE_ROOT_ . 'user.php';

require_once _UTILS_ROOT_ . 'generator.php';

require_once 'uploaded_image.php';

function register_image($image, $user) {

	if(isset($image) || $image != null || isset($user)  || $user != null) {
	
		if($uploaded_picture = upload_image_to_imgur(file_get_contents($image))) {
		
			if($uploaded_picture != null) {
			
				if(register_image_on_database($uploaded_picture, $user)) {
				
					return $uploaded_picture->get_link();

				}

			}
		
		}
	
	}

	return false;

}

function upload_image_to_imgur($image_data) {

	if(isset($image_data) || $image_data != null) {
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . IMGUR_OAUTH_CLIENT_ID));
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode($image_data)));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$reply = curl_exec($ch);
		curl_close($ch);

		$ui = new UploadedImage(json_decode($reply));

		return $ui;
	
	}

	return false;

}

function register_image_on_database($data, $user_uploaded) {
	global $socialtecdatabase;

	if(isset($data) || $data != null) {
	
		$iid = GenerateString(18, _ID_);
		$now = new DateTime();
		$now = $now->format('Y-m-d H:i:s.000000');

		if($conn = $socialtecdatabase->prepare("INSERT INTO `imagem`(`id`, `link`, `user_uploaded`, `image_id`, `datetime`, `type`, `width`, `height`) VALUES ('" . $iid . "', '" . $data->get_link() . "', '" . $user_uploaded->get_id() . "', '" . $data->get_id() . "', '" . $now . "', '" . $data->get_type() . "', '" . $data->get_width() . "', '" . $data->get_height() . "')")) {
		
			if($conn->execute()) {
			
				return $iid;
			
			}

		}

	}

	return false;

}
