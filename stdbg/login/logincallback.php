<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';
require_once _CORE_ROOT_ . 'token.php';
require_once _CORE_ROOT_ . 'tokenauth.php';
require_once _CORE_ROOT_ . 'method.php';
require_once _CORE_ROOT_ . 'page.php';
require_once _CORE_ROOT_ . 'session.php';
require_once _CORE_ROOT_ . 'errors.php';

require_once 'functions.php';

if(isset($_SESSION['login_security_token'])) {

	$token = $_SESSION['login_security_token'];
	unset($_SESSION['login_security_token']);

} else {

	header("Location: ../login/?event=" . ERR_PAGE_AUTHENTICATION_ERROR);

}

if($ref_token = get_method_value(GET, 'token')) {

	if(isset($ref_token) || $ref_token != null) {
	
		if(TokenAuth::auth_token($token)) {
		
			if(TokenAuth::auth_token($ref_token)) {
			
				if($ref_token === $token) {
				
					$state = verify_inputs(
						get_method_value(POST, 'login__input__mail'),
						get_method_value(POST, 'security_pass')
						);

					$_SESSION['user_email'] = get_method_value(POST, 'login__input__mail');				

					switch ($state)
					{
						case LOGGED_SUCCEFULL:
							
							unset($_SESSION['user_email']);

							header("Location: ../");
							break;
						case USER_ACCOUNT_IS_BLOCKED:
							header("Location: ../login/?event=" . ERR_LOGIN_ACCOUNT_BLOCKED);
							break;
						case USER_PASSWORD_UNKNOWN_FATAL_ERROR:
							header("Location: ../login/?event=" . ERR_LOGIN_ACCOUNT_PASS_INCORRECT);
							break;
						case USER_PASSWORD_INCORRECT:
							header("Location: ../login/?event=" . ERR_LOGIN_ACCOUNT_PASS_INCORRECT);
							break;
					}
	 

				} else {
					
					header("Location: ../login/?event=" . ERR_PAGE_AUTHENTICATION_ERROR);

				}
			
			} else {
				
				header("Location: ../login/?event=" . ERR_PAGE_AUTHENTICATION_ERROR);

			}
		
		} else {
		
			header("Location: ../login/?event=" . ERR_PAGE_AUTHENTICATION_ERROR);

		}
	} else {
	
		header("Location: ../login/?event=" . ERR_PAGE_AUTHENTICATION_ERROR_INVALID_PUBLIC_TOKEN);

	}

}