<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';
require_once _CORE_ROOT_ . 'database.php';
require_once _CORE_ROOT_ . 'token.php';
require_once _UTILS_ROOT_ . 'generator.php';

/**
 * token short summary.
 *
 * token description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class TokenAuth {

	public static function set_token($token, $type) {
		global $socialtecdatabase;

		$id = GenerateString(19, _ID_);
		if($conn = $socialtecdatabase->prepare("INSERT INTO `auth_token`(`id`, `token`, `time_stamp`, `type`) VALUES ('" . $id . "','" . $token . "','" . time() . "','" . $type . "')")) {
			if($conn->execute()) {
				return true;
			}
		}
		return false;
	}

	public static function auth_token($token) {
		global $socialtecdatabase;

		if($conn = $socialtecdatabase->prepare("SELECT `type`, `time_stamp`, `token` FROM `auth_token` WHERE `token`='" . $token . "' LIMIT 1")) {
			if($conn->execute()) {
				$data = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(count($data) > 0) {
					$data = $data[0];
					$now = time();
					$authorization_token_timestamp = '';
					switch ($data['type'])
					{
						case PAGE_TOKEN:
							$authorization_token_timestamp = $now - PAGE_TOKEN_EXPIRATION_TIME;
							break;
						case LOGIN_TOKEN:
							$authorization_token_timestamp = $now - LOGIN_TOKEN_EXPIRATION_TIME;
							break;
						case POST_TOKEN:
							$authorization_token_timestamp = $now - POST_TOKEN_EXPIRATION_TIME;
							break;
						case COMMENT_TOKEN:
							$authorization_token_timestamp = $now - COMMENT_TOKEN_EXPIRATION_TIME;
							break;
						case LIKE_TOKEN:
							$authorization_token_timestamp = $now - LIKE_TOKEN_EXPIRATION_TIME;
							break;
					}

					unset($conn);
					if($conn = $socialtecdatabase->prepare("SELECT `type`, `time_stamp`, `token` FROM `auth_token` WHERE `token`='" . $token . "' AND `time_stamp` > '" . $authorization_token_timestamp . "' LIMIT 1")) {
						if($conn->execute()) {
							$rowd = $conn->fetchAll(PDO::FETCH_ASSOC);

							if(count($rowd) > 0) {
								return true;
							} else {
								return false;
							}

						}
					}
					return true;
				} else {
					return false;
				}

			}
		}
		return false;
	}

	public static function use_token($token) {
		global $socialtecdatabase;
		if($conn = $socialtecdatabase->prepare("SELECT `id`, `token`, `inuse` FROM `auth_token` WHERE `token`='" . $token . "' LIMIT 1")) {
			if($conn->execute()) {
				$crow = $conn->fetchAll(PDO::FETCH_ASSOC);
				if(sizeof($crow) > 0) {
					$crow = $crow[0];
					if($crow['inuse'] == TOKEN_NOT_USED) {
						unset($conn);
						if($conn = $socialtecdatabase->prepare("UPDATE `auth_token` SET `inuse`='" . TOKEN_IN_USE . "' WHERE `token` = '" . $token . "' AND `id` = '" . $crow['id'] . "'")) {
							if($conn->execute()) {
								return true;
							}
						}
					} else {
						return false;
					}
				}
			}
		}
		return false;
	}

	public static function rel_token_date($timestamp) {
		if(isset($timestamp) || $timestamp != null) {
			$now = time();
			return $now - $timestamp;
		}
		return null;
	}

}