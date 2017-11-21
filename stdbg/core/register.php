<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';
require_once 'database.php';
require_once 'user.php';
require_once 'token.php';
require_once 'sha.php';
require_once 'device.php';
require_once 'login.php';
require_once _UTILS_ROOT_ . 'generator.php';
require_once _LOGIN_ROOT_ . 'user_login.php';


$is_logged = false;

function register_trigger($name,$lastname, $gender, $age, $mail, $pass ,$cpass) {
	global $socialtecdatabase;
	global $logindatabase;
	global $is_logged;

	if(isset($mail) and $mail != null and isset($pass) and $pass != null) {
		if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `usuario` WHERE (`mail`='" . $mail . "') AND (`senha`='" . $pass . "')")) {
			if($conn->execute()) {
				$data = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(count($data) < 1) {

					if($uid = write_on_db($name, $lastname, $gender, $age, $mail, $pass)) {
					
						$login = GenerateString(128, _LOGIN_);
						$token = Token::LoginToken($login . $pass);

						if(set_user_logged($uid, $token, $login)) {

							switch (login_trigger($mail, $pass)) {
								case LOGGED_SUCCEFULL:
									
									header("Location: /user.php/?action=register&view_completion_modal_req=true&ref_token=" . GenerateString(_LOGIN_, 128));

									break;
								
								case ERR_LOGIN_ACCOUNT_PASS_INCORRECT:
									
									break;
							}

						}
					
					}


				} else {
					return ERR_LOGIN_ACCOUNT_PASS_INCORRECT;
				}
			}
		}
	}
}

function write_on_db($name,$lastname, $gender, $age, $mail, $pass) {
	global $socialtecdatabase;

	$id = GenerateString(19, _ID_);

	if($conn = $socialtecdatabase->prepare("INSERT INTO `usuario`(`id`, `nome`, `sobre_nome`, `data_nasc`, `aniversario`, `foto`, `foto_capa`, `meta`, `id_curso`, `mail`, `senha`, `salt`, `ativado`, `gender`) VALUES ('" . $id . "','" . $name . "','" . $lastname . "','','" . $age . "','" . '' . "', '', '', '', '" . $mail . "', '" . $pass . "', '', '0', '" . $gender . "')")) {
	
		if($conn->execute()) {
		
			return $id;
		
		}
	
	}

	return false;

}

?>