<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

class LoginDataBase extends PDO {

	public function __construct() {
		$file = SOCIALTEC_CONFIG_INI;
		if(!$settings = parse_ini_file($file, TRUE)) throw new Exception('Erro ao abrir arquivo de configuração do socialtec. web_settings.ini / ' . $file);

		$doc = $settings['login_database_connection']['driver']
			. ':host=' . $settings['login_database_connection']['host']
			. ';dbname=' . $settings['login_database_connection']['dbname'];

		parent::__construct($doc, $settings['login_database_connection']['username'], $settings['login_database_connection']['password']);

	}

}

$logindatabase = new LoginDataBase();

class SocialTecDataBase extends PDO {

	public function __construct() {
		$file = SOCIALTEC_CONFIG_INI;
		if(!$settings = parse_ini_file($file, TRUE)) throw new Exception('Erro ao abrir arquivo de configuração do socialtec. web_settings.ini / ' . $file);

		$doc = $settings['socialtec_database_connection']['driver']
			. ':host=' . $settings['socialtec_database_connection']['host']
			. ';dbname=' . $settings['socialtec_database_connection']['dbname'];

		parent::__construct($doc, $settings['socialtec_database_connection']['username'], $settings['socialtec_database_connection']['password']);

	}

}

$socialtecdatabase = new SocialTecDataBase();