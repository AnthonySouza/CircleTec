<?php

require_once 'database.php';

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

		if($conn = $socialtecdatabase->prepare("SELECT * FROM `post` WHERE id='" . $post_id . "'")) {
			if($conn->execute()) {
				$post = $conn->fetchAll(PDO::FETCH_ASSOC)[0];

				self::set_id($post['id']);

				self::set_user_id($post['id_usuario_post']);

				self::set_posted_timestamp($post['postado_datetime']);

				self::set_approved($post['aprovado']);

				self::set_mode($post['modo']);

				self::set_post_data($post['post_dados']);

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

	private static $posted_timestamp;
	public function get_posted_timestamp() {
		return self::$posted_timestamp;
	}

	private function set_posted_timestamp($value) {
		self::$posted_timestamp = $value;
	}

	private static $approved;
	public function get_approved() {
		return self::$approved;
	}

	private function set_approved($value) {
		self::$approved = $value;
	}

	private static $mode;
	public function get_mode() {
		return self::$mode;
	}

	private function set_mode($value) {
		self::$mode = $value;
	}

	private static $post_data;
	public function get_post_data() {
		return self::$post_data;
	}

	private function set_post_data($value) {
		self::$post_data = $value;
	}


	public function post_data_arr() {
		return json_decode(self::get_post_data(), TRUE);
	}

}