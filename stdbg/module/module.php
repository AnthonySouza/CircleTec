<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'database.php';
require_once _CORE_ROOT_ . 'user.php';

/**
 * module short summary.
 *
 * module description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class Module
{
    
	function __construct(User $user) {
	
		if(isset($user) || $user != null) {
			global $socialtecdatabase;

			if($conn = $socialtecdatabase->prepare("SELECT * FROM `module` WHERE `id`='" . $user->get_module_id() . "'")) {
			
				if($conn->execute()) {
				
					$row = $conn->fetchAll(PDO::FETCH_ASSOC);

					if(sizeof($row) > 0) {
					
						self::set_id($row[0]['id']);

						self::set_module($row[0]['module']);

						self::set_period($row[0]['period']);
					
					}
				
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

	private static $module;
	public function get_module() {
		return self::$module;
	}

	private function set_module($value) {
		self::$module = $value;
	}

	private static $period;
	public function get_period() {
		return self::$period;
	}

	private function set_period($value) {
		self::$period = $value;
	}

}