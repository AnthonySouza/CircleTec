<?php

require_once 'database.php';

/**
 * user short summary.
 *
 * user description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class Comment
{

	public function __construct($comment_id) {
		global $socialtecdatabase;

		if($conn = $socialtecdatabase->prepare("SELECT * FROM `post_comment` WHERE `id`='" . $comment_id . "'")) {
			if($conn->execute()) {

				$comment = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($comment) > 0) {
					$comment = $comment[0];
					
					self::set_id($comment['id']);

					self::set_post_id($comment['post_id']);

					self::set_user_id($comment['user_id']);

					$text = str_replace('<', '&lt', base64_decode($comment['comment']));
					$text = str_replace('>', '&gt', $text);

					self::set_comment($text);

					self::set_datetime($comment['date_time']);

				
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

	private static $post_id;
	public function get_post_id() {
		return self::$post_id;
	}

	private function set_post_id($value) {
		self::$post_id = $value;
	}

	private static $user_id;
	public function get_user_id() {
		return self::$user_id;
	}

	private function set_user_id($value) {
		self::$user_id = $value;
	}

	private static $comment;
	public function get_comment() {
		return self::$comment;
	}

	private function set_comment($value) {
		self::$comment = $value;
	}

	private static $datetime;
	public function get_datetime() {
		return self::$datetime;
	}

	private function set_datetime($value) {
		self::$datetime = $value;
	}

}
?>