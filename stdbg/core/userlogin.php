<?php

/**
 * user_login short summary.
 *
 * user_login description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class UserLogin
{
    public function __construct($login_id) {
		global $logindatabase;

		if($conn = $logindatabase->prepare("SELECT `id`, `login_id`, `token`, `login_attempt_list_id`, `user_id` FROM `usuario` WHERE `user_id`='" . $login_id . "'")) {
			if($conn->execute()) {
				$login = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($login) > 0) {
					$login = $login[0];
				
					self::set_id($login['id']);
					self::set_login_id($login['login_id']);
					self::set_token($login['token']);
					self::set_attempt_list($login['login_attempt_list_id']);
					self::set_user_id($login['user_id']);

				}
			}
		}
	}

	private static $id;
	public function get_id() {
		return self::$id;
	}

	private function set_id($value) {
		self::$id = $value;
	}

	private static $login_id;
	public function get_login_id() {
		return self::$login_id;
	}

	private function set_login_id($value) {
		self::$login_id = $value;
	}

	private static $token;
	public function get_token() {
		return self::$token;
	}

	private function set_token($value) {
		self::$token = $value;
	}

	private static $att_list;
	public function get_attempt_list() {
		return self::$att_list;
	}

	private function set_attempt_list($value) {
		self::$att_list = $value;
	}

	private static $user_id;
	public function get_user_id() {
		return self::$user_id;
	}

	private function set_user_id($value) {
		self::$user_id = $value;
	}

}