<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';
require_once 'database.php';
require_once 'user.php';
require_once 'token.php';
require_once 'tokenauth.php';
require_once 'sha.php';
require_once 'device.php';
require_once _UTILS_ROOT_ . 'generator.php';
require_once _LOGIN_ROOT_ . 'user_login.php';


$is_logged = false;

function login_trigger($mail, $password) {
	global $socialtecdatabase;
	global $logindatabase;
	global $is_logged;

	if(isset($mail) and $mail != null and isset($password) and $password != null) {
		if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `usuario` WHERE (`mail`='" . $mail . "') AND (`senha`='" . $password . "')")) {
			if($conn->execute()) {
				$data = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(count($data) > 0) {
					$data = $data[0];

					$login = GenerateString(128, _LOGIN_);
					$token = Token::LoginToken($login . $password);
					TokenAuth::set_token($token, LOGIN_TOKEN);

					if(set_user_logged($data['id'], $token, $login)) {

						$_SESSION['login'] = $login;
						$_SESSION['user_id'] = $data['id'];
						$_SESSION['token'] = $token;

						$is_logged= true;
						return true;
					}

				} else {
					return USER_PASSWORD_INCORRECT;
				}
			}
		}
	}
	return false;
}

//function set_user_logged($user_id, $token) {
//    global $logindatabase;

//    $id = GenerateString(19, _ID_);

//    if($conn = $logindatabase->prepare("INSERT INTO `login`(`id`, `user_id`, `token`) VALUES ('" . $id . "','" . $user_id . "','" . $token . "')")) {
//        if($conn->execute()) {
//            return true;
//        }
//    }
//    return false;
//}

function set_user_logged($user_id, $token, $login) {
	global $logindatabase;

	$id = GenerateString(19, _ID_);

	if($conn = $logindatabase->prepare("INSERT INTO `usuario`(`id`, `login_id`, `token`, `login_attempt_list_id`, `user_id`) VALUES ('" . $id . "','" . $login . "','" . $token . "','','" . $user_id . "')")) {
		if($conn->execute()) {
			return true;
		}
	}

	return false;
}

function logged() {

	ob_start();

	if(isset($_SESSION['login'])) {

		if(isset($_SESSION['user_id'])) {
			
			if(isset($_SESSION['token'])) {
				
				    if(get_user_exists_by_id($_SESSION['user_id'])) {
				
				        if($user_login = get_user_login($_SESSION['user_id'])) {
				
				            if($_SESSION['login'] === $user_login->get_login_id()) {
				
				                return true;
				
				            } else {
								header('Location: ' . _LOGIN_ROOT_);
							}
				        } else {
							header('Location: ' . _LOGIN_ROOT_);
						}
				        return false;
				    } else {
						header('Location: ' . _LOGIN_ROOT_);
					}
				return false;
			} else {
				header('Location: ' . _LOGIN_ROOT_);
			}
			return false;
		} else {
			header('Location: ' . _LOGIN_ROOT_);
		}
		return false;
	} else {
		header('Location: ' . _LOGIN_ROOT_);
	}
	return false;
}