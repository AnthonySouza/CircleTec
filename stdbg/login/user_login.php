<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';
require_once _CORE_ROOT_ . 'database.php';

/**
 * user_login short summary.
 *
 * user_login description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class User_Login
{

	public function __construct($user, $session, $device, $token) {
		self::set_user($user);
		self::set_session($session);
		self::set_device($device);
		self::set_token($token);
	}

	private $user;
	public function get_user() {
		return self::$user;
	}

	private function set_user($value) {
		self::$user = $value;
	}

	private $session;
	public function get_session() {
		return self::$session;
	}

	private function set_session($value) {
		self::$session = $value;
	}

	private $device;
	public function get_device() {
		return self::$device;
	}

	private function set_device($value) {
		self::$device = $value;
	}

	private $token;
	public function get_token() {
		return self::$token;
	}

	private function set_token($value) {
		self::$token = $value;
	}
}