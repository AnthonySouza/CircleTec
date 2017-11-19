<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';
require_once _CORE_ROOT_ . 'database.php';
require_once _CORE_ROOT_ . 'user.php';
require_once _CORE_ROOT_ . 'token.php';
require_once _CORE_ROOT_ . 'sha.php';
require_once _CORE_ROOT_ . 'device.php';
require_once _UTILS_ROOT_ . 'generator.php';

require_once 'user_login.php';

/**
 * login short summary.
 *
 * login description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class Login
{

	public function __construct($user, $password) {
		global $socialtecdatabase;
		global $logindatabase;

		if(isset($user) and $user != null and isset($password) and $password != null) {
			if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `usuario` WHERE (`mail`='" . $user . "') AND (`senha`='" . $password . "')")) {
				if($conn->execute()) {
					$data = $conn->fetchAll(PDO::FETCH_ASSOC);

					if(count($data) > 0) {

						$login = GenerateString(128, _LOGIN_);
						$token = Token::LoginToken($login . $password);

						if(self::set_user_logged($data['id'], $token, $login)) {
							self::write_session($login, $data['id'], $token);
						}

					} else {

					}
				}
			}
		}
	}

	private function set_user_logged($user_id, $token, $login) {
		global $logindatabase;

		$id = GenerateString(19, _ID_);

		//if($conn = $logindatabase->prepare("INSERT INTO `login`(`id`, `user_id`, `token`) VALUES ('" . $id . "','" . $user_id . "','" . $token . "')")) {
		//    if($conn->execute()) {
		//        return true;
		//    }
		//}

		if($conn = $logindatabase->prepare("INSERT INTO `usuario`(`id`, `login_id`, `token`, `login_attempt_list_id`, `user_id`) VALUES ('" . $id . "','" . $login . "','" . $token . "','','" . $user_id . "')")) {
		    if($conn->execute()) {
		        return true;
		    }
		}

		return false;
	}

	private function write_session($login, $user_id, $token) {
		$_SESSION['login'] = $login;
		$_SESSION['user_id'] = $user_id;
		$_SESSION['token'] = $token;
		$_SESSION['logged'] = "true";
	}

}