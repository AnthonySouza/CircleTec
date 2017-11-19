<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'database.php';


/**
 * colaboradores short summary.
 *
 * colaboradores description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class Colaborador
{

    public function __construct($id) {
		global $socialtecdatabase;

		if($conn = $socialtecdatabase->prepare("SELECT * FROM `evento_colaboradores` WHERE `id`='" . $id . "'")) {
			
			if($conn->execute()) {
				$row = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($row) > 0) {
					$row = $row[0];

					self::set_id($row['id']);

					self::set_event_id($row['event_id']);

					self::set_user_id($row['user_id']);

				}
				
			}
			
		}

	}

	private $id;
	public function get_id() {
		return self::$id;
	}

	private function set_id($value) {
		self::$id = $value;
	}

	private $user_id;
	public function get_user_id() {
		return self::$user_id;
	}

	private function set_user_id($value) {
		self::$user_id = $value;
	}

	private $event_id;
	public function get_event_id() {
		return self::$event_id;
	}
	
	private function set_event_id($value) {
		self::$event_id = $value;
	}

}
