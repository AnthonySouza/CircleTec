<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'database.php';

/**
 * comparecerao short summary.
 *
 * comparecerao description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class Comparecera
{
    
	public function __construct($event_id) {
		global $socialtecdatabase;

		if($conn = $socialtecdatabase->prepare("SELECT * FROM `evento_comparecerao` WHERE `event_id`='" . $event_id . "'")) {
			
			if($conn->execute()) {
				
				$row = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($row) > 0) {

					$row = $row[0];

					self::set_id($row['id']);

					self::set_event_id($row['event_id']);

					self::set_user(new User($row['user_id']));

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

	private static $user;
	public function get_user() {
		return self::$user;
	}

	private function set_user($value) {
		self::$user = $value;
	}

	private static $event_id;
	public function get_event_id() {
		return self::$event_id;
	}
	
	private function set_event_id($value) {
		self::$event_id = $value;
	}

}