<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'database.php';

/**
 * post short summary.
 *
 * post description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class Friend
{
    
	public function __construct($friend_id) {
		global $socialtecdatabase;

		if($conn = $socialtecdatabase->prepare("SELECT * FROM `friend` WHERE `id`='" . $friend_id ."'")) {
			
			if($conn->execute()) {
				
				$friend = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($friend) > 0) {
					
					$friend = $friend[0];

					self::set_id($friend['id']);
					self::set_user_id($friend['user_id']);
					self::set_friend_id($friend['friend_id']);
					self::set_is_bestfriend($friend['bf']);
					
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

	private static $user_id;
	public function get_user_id() {
		return self::$user_id;
	}
	
	private function set_user_id($value) {
		self::$user_id = $value;
	}

	private static $friend_id;
	public function get_friend_id() {
		return self::$friend_id;
	}
	
	private function set_friend_id($value) {
		self::$friend_id = $value;
	}

	private static $bf;
	public function get_is_bestfriend() {
		return self::$bf;
	}
	
	private function set_is_bestfriend($value) {
		self::$bf = $value;
	}

}
