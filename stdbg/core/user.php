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
class User
{

	public function __construct($user_id) {
		global $socialtecdatabase;

		if($conn = $socialtecdatabase->prepare("SELECT * FROM `usuario` WHERE id='" . $user_id . "'")) {
			if($conn->execute()) {

				$_user = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($_user) > 0) {
					$_user = $_user[0];
					
					self::set_id($_user['id']);

					self::set_name($_user['nome']);

					self::set_last_name($_user['sobre_nome']);

					self::set_date_of_birth($_user['data_nasc']);

					self::set_birthday($_user['aniversario']);

					self::set_picture($_user['foto']);

					self::set_cover_picture($_user['foto_capa']);

					self::set_motto($_user['meta']);

					self::set_course($_user['id_curso']);

					self::set_mail($_user['mail']);

					self::set_actived($_user['ativado']);

					self::set_module_id($_user['module']);
				
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

	private static $nome;
	public function get_name() {
		return self::$nome;
	}

	private function set_name($value) {
		self::$nome = base64_decode($value);
	}

	private static $last_name;
	public function get_last_name() {
		return self::$last_name;
	}

	private function set_last_name($value) {
		self::$last_name = base64_decode($value);
	}

	private static $dateofbirty;
	public function get_date_of_birth() {
		return self::$dateofbirty;
	}

	private function set_date_of_birth($value) {
		self::$dateofbirty = $value;
	}

	private static $aniver;
	public function get_birthday() {
		return self::$aniver;
	}

	private function set_birthday($value) {
		self::$aniver = $value;
	}

	private static $picture;
	public function get_picture() {
		return self::$picture;
	}

	private function set_picture($value) {
		self::$picture = $value;
	}

	private static $cover_picture;
	public function get_cover_picture() {
		return self::$cover_picture;
	}

	private function set_cover_picture($value) {
		self::$cover_picture = $value;
	}

	private static $motto;
	public function get_motto() {
		return self::$motto;
	}

	private function set_motto($value) {
		self::$motto = base64_decode($value);
	}

	private static $course;
	public function get_course() {
		return self::$course;
	}

	private function set_course($value) {
		self::$course = $value;
	}

	private static $mail;
	public function get_mail() {
		return self::$mail;
	}

	private function set_mail($value) {
		self::$mail = $value;
	}

	private static $actived;
	public function get_actived() {
		return self::$actived;
	}

	private function set_actived($value) {
		self::$actived = $value;
	}

	private static $module;
	public function get_module_id() {
		return self::$module;
	}

	private function set_module_id($value) {
		self::$module = $value;
	}

	public function get_long_username() {
		return self::get_name() . ' ' . self::get_last_name();
	}

}

?>