<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';
require_once 'database.php';
require_once 'login.php';
require_once 'register.php';
require_once 'user.php';
require_once 'userlogin.php';

require_once _COURSE_ROOT_ . 'course.php';

function verify_reg_inputs($name,$lastname, $gender, $age, $mail, $pass ,$cpass) {
	$mail = clean_inputs_xss_atk($mail, true);
	$name = clean_inputs_xss_atk($name, false);
	$lastname = clean_inputs_xss_atk($lastname, false);
	$gender = clean_inputs_xss_atk($gender, false);
	$age = clean_inputs_xss_atk($age, false);
	$pass = clean_inputs_xss_atk($pass, false);
	$cpass = clean_inputs_xss_atk($cpass, false);

	if(isset($pass) || $pass != null || strlen($pass) >= PASS_DEFAULT_LENGTH || isset($cpass) || $cpass != null || strlen($cpass) >= PASS_DEFAULT_LENGTH) {
		
		if(recover_mail($mail)) {
			
			if(!verify_mail_is_blocked($mail)) {
				
				register_trigger($name, $lastname, $gender, $age, $mail, $pass, $cpass);
				
			} else {
				return USER_ACCOUNT_IS_BLOCKED;
			}
			
		}

	} else {
		return USER_PASSWORD_UNKNOWN_FATAL_ERROR;
	}
}

//function verify_inputs($mail, $pass) {
//    clean_inputs_xss_atk($mail, true);
//    clean_inputs_xss_atk($pass, false);

//    if(isset($pass) || $pass != null || strlen($pass) >= PASS_DEFAULT_LENGTH) {
		
//        if(recover_mail($mail)) {
			
//            if(!verify_mail_is_blocked($mail)) {
				
//                login_trigger($mail, $pass);
				
//            } else {
//                return USER_ACCOUNT_IS_BLOCKED;
//            }
			
//        }

//    } else {
//        return USER_PASSWORD_UNKNOWN_FATAL_ERROR;
//    }
//}

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

function clean_inputs_xss_atk($input, $is_mail = false) {

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

function get_current_user_id() {

	if(logged()) {
	
		return $_SESSION['user_id'];
	
	}

	return false;

}

function get_logged_user_class() {
	global $socialtecdatabase;

	if($uid = get_current_user_id()) {
	
		$user = new User($uid);
	
		return $user;

	}

	return null;
}

function get_logged_user_course_class($user) {
	if(isset($user)) {
		$curso = new Course($user->get_course());
		return $curso;

	}

	return null;

}

function get_user_exists_by_id($uid) {
	global $socialtecdatabase;

	if(isset($uid) || $uid != null) {
	
		if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `usuario` WHERE `id`='" . $uid . "'")) {
		
			if($conn->execute()) {
			
				$row = $conn->fetchAll(PDO::FETCH_ASSOC);
				if(sizeof($row) > 0) {
				
					return true;
				
				}
				return false;
			}
			return false;
		}
		return false;
	}
	return false;
}

function get_user_login($uid) {
	global $socialtecdatabase;

	if(isset($uid) || $uid != null) {
		
		if($conn = $socialtecdatabase->prepare("SELECT `id` FROM `usuario` WHERE `id`='" . $uid . "'")) {
			
			if($conn->execute()) {
				
				$row = $conn->fetchAll(PDO::FETCH_ASSOC);
				if(sizeof($row) > 0) {
					
					$user_login = new UserLogin($row[0]['id']);

					return $user_login;
					
				}
				return false;
			}
			return false;
		}
		return false;
	}
	return false;
}

?>