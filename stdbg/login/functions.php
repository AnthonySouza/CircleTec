<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';
require_once _CORE_ROOT_ . 'database.php';
require_once _CORE_ROOT_ . 'login.php';


function verify_inputs($mail, $pass) {
	clean_inputs_css_atk($mail, true);
	clean_inputs_css_atk($pass, false);

	if(isset($pass) || $pass != null || strlen($pass) >= PASS_DEFAULT_LENGTH) {
		
		if(recover_mail($mail)) {
		
			if(!verify_mail_is_blocked($mail)) {
			
				return login_trigger($mail, $pass);

			
			} else {
				return USER_ACCOUNT_IS_BLOCKED;
			}
		
		}

	} else {
		return USER_PASSWORD_UNKNOWN_FATAL_ERROR;
	}
}

function verify_cps_mail($mail) {

	if(isset($mail) || null != $mail) {
        $user_account = "^[a-zA-Z0-9\._-]+@etec.sp.gov.br^";

        $pattern = $user_account;

        if(preg_match($pattern, $mail)) {
            return true;
        } else {
            return false;
        }

    }
    return false;

}

function clean_inputs_css_atk($input, $is_mail = false) {

	if(isset($input) || $input != null) {
		switch ($is_mail)
		{
			case true:
				return preg_replace("/[^a-zA-Z0-9_\-@.]+/", "", $input);

			case false:
				return preg_replace("/[^a-zA-Z0-9_\-]+/", "", $input);
		}
	}

	return false;

}

function recover_mail($mail) {

	if(!verify_cps_mail($mail)) {
		return $mail . CPS_MAIL_FORMAT;
	}

	return $mail;

}

function verify_mail_is_registered($mail) {
	global $socialtecdatabase;
	
	if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `usuario` WHERE `mail`='" . $mail . "'")) {
	
		if($conn->execute()) {
		
			$mrow = $conn->fetchAll(PDO::FETCH_ASSOC);
			if(sizeof($mrow) > 0) {
				return true;
			}
		
		}

	}
	return false;
}

function verify_mail_is_blocked($mail) {
	global $socialtecdatabase;

	if(verify_mail_is_registered($mail)) {
		if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `ban` WHERE `user_mail`='" . $mail . "'")) {
			
			if($conn->execute()) {
				
				$brow = $conn->fetchAll(PDO::FETCH_ASSOC);
				if(sizeof($brow) > 0) {
					return true;
				}
			}
		}
	}
	return false;
}