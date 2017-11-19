<?php

require_once 'sha.php';
require_once 'device.php';

define("PAGE_TOKEN_EXPIRATION_TIME"		, 60 * 8, TRUE);
define("LOGIN_TOKEN_EXPIRATION_TIME"	, 60 * 60 , TRUE);
define("POST_TOKEN_EXPIRATION_TIME"		, 60 * 1, TRUE);
define("COMMENT_TOKEN_EXPIRATION_TIME"	, 60 * 1, TRUE);
define("LIKE_TOKEN_EXPIRATION_TIME"		, 60 * 1, TRUE);

define("PAGE_TOKEN"		, 1, TRUE);
define("LOGIN_TOKEN"	, 2, TRUE);
define("POST_TOKEN"		, 3, TRUE);
define("COMMENT_TOKEN"	, 4, TRUE);
define("LIKE_TOKEN"		, 5, TRUE);

define("TOKEN_NOT_USED"	, 0, TRUE);
define("TOKEN_IN_USE"	, 1, TRUE);

/**
 * token short summary.
 *
 * token description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class Token
{

	public static function PageToken() {
		return Sha::sha512(Device::GET_IP() . Device::GET_USER_AGENT() . PAGE_TOKEN_EXPIRATION_TIME . time());
	}

	public static function LoginToken($login) {
		if(isset($login) || $login != null) {
			return Sha::sha512(Device::GET_IP() . Device::GET_USER_AGENT() . LOGIN_TOKEN_EXPIRATION_TIME . $login . time());
		}
		return null;
	}

	public static function PostToken($post, $user) {
		if(isset($login) || $post != null) {
			return Sha::sha512(Device::GET_IP() . Device::GET_USER_AGENT() . POST_TOKEN_EXPIRATION_TIME . $post . $user . time());
		}
		return null;
	}

	public static function CommentToken($post, $comment, $user) {
		if(isset($login) || $post != null) {
			return Sha::sha512(Device::GET_IP() . Device::GET_USER_AGENT() . COMMENT_TOKEN_EXPIRATION_TIME . $post . $user . time());
		}
		return null;
	}

	public static function LikeToken($post, $like, $user) {
		if(isset($login) || $post != null) {
			return Sha::sha512(Device::GET_IP() . Device::GET_USER_AGENT() . LIKE_TOKEN_EXPIRATION_TIME . $like . $user . time());
		}
		return null;
	}



}