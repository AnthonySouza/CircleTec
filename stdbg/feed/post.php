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
class Post
{
    
	public function __construct($post_id) {
		global $socialtecdatabase;

		if($conn = $socialtecdatabase->prepare("SELECT * FROM `post` WHERE `id`='" . $post_id ."'")) {
		
			if($conn->execute()) {
			
				$post = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($post) > 0) {
				
					$post = $post[0];

					self::set_id($post['id']);
					self::set_user_id($post['user_id']);
					self::set_posted_datetime($post['posted']);
					self::set_aprovado($post['aprov']);
					self::set_mode($post['mode']);
					self::set_data($post['post_data']);
				
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

	private static $posted;
	public function get_posted_datetime() {
		return self::$posted;
	}
	
	private function set_posted_datetime($value) {
		self::$posted = $value;
	}

	private static $aprov;
	public function get_aprov() {
		return self::$aprov;
	}
	
	private function set_aprovado($value) {
		self::$aprov = $value;
	}

	private static $mode;
	public function get_mode() {
		return self::$mode;
	}
	
	private function set_mode($value) {
		self::$mode = $value;
	}

	private static $post_data;
	public function get_data() {
		return self::$post_data;
	}
	
	private function set_data($value) {
		self::$post_data = $value;
	}

}
