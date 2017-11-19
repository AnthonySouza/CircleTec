<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';
require_once _CORE_ROOT_ . 'token.php';
require_once _CORE_ROOT_ . 'tokenauth.php';
require_once _CORE_ROOT_ . 'method.php';
require_once _CORE_ROOT_ . 'page.php';
require_once _CORE_ROOT_ . 'session.php';
require_once _CORE_ROOT_ . 'errors.php';
require_once _CORE_ROOT_ . 'functions.php';

if($ref_token = get_method_value(GET, 'token')) {

	if(isset($ref_token) || $ref_token != null) {
		
		if(TokenAuth::auth_token($ref_token)) {
			
			verify_reg_inputs(
				get_method_value(POST, 'first_name'),
				get_method_value(POST, 'last_name'),
				get_method_value(POST, 'gender'),
				get_method_value(POST, 'age'),
				get_method_value(POST, 'email'),
				get_method_value(POST, 'password'),
				get_method_value(POST, 'confmPassword')
				);
			
		} else {
			
			header("Location: ../login/?event=" . ERR_PAGE_AUTHENTICATION_ERROR);

		}
		
	} else {
		
		header("Location: ../login/?event=" . ERR_PAGE_AUTHENTICATION_ERROR_INVALID_PUBLIC_TOKEN);

	}

}