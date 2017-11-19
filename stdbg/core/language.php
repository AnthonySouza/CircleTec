<?php

require_once 'database.php';

/**
 * language short summary.
 *
 * language description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class Language
{
    public function __construct() {
		global $socialtecdatabase;

		if($conn = $socialtecdatabase->prepare("SELECT * FROM `language`")) {
		
			if($conn->execute()) {
			
				$rows = $conn->fetchAll(PDO::FETCH_ASSOC);
				if($rows > 0) {
				
					$output = '';

					for ($i = 0; $i < sizeof($rows); $i++)
					{
						
						$arr[$rows[$i]['key']] = base64_decode($rows[$i]['value']);
						
					}
					
					if(self::set_values($arr)) {
						
					}
				
				}
			
			}
		
		}
	
	}

	private static $values;

	private function set_values($array) {
	
		if(isset($array) || $array != null || is_array($array)) {
			self::$values = $array;
		}
		return false;
	}

	public function get_value($key) {
	
		return self::$values[$key];
	
	}

	public function get_array_value() {
	
		return self::$values;

	}

	public function get_w_value($key) {
		echo self::$values[$key];
	}

}
