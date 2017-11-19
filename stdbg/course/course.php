<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';
require_once _CORE_ROOT_ . 'database.php';

/**
 * user_course short summary.
 *
 * user_course description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class Course
{
 
	public function __construct($cid) {
		global $socialtecdatabase;

		if($conn = $socialtecdatabase->prepare("SELECT * FROM `curso` WHERE `id`='" . $cid . "'")) {
		
			if($conn->execute()) {
			
				$row = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($row) > 0) {
				
					$row = $row[0];

					self::set_id($row['id']);
					self::set_nome(base64_decode($row['nome']));
					self::set_desc(base64_decode($row['descricao']));
					self::set_id_periodo($row['id_periodo']);
					self::set_tam_horas($row['tamanho_horas']);
					self::set_id_cor($row['id_cor']);
				
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
	public function get_nome() {
		return self::$nome;
	}

	private function set_nome($value) {
		self::$nome = $value;
	}

	private static $desc;
	public function get_descricao() {
		return self::$desc;
	}

	private function set_desc($value) {
		self::$desc = $value;
	}

	private static $id_per;
	public function get_id_periodo() {
		return self::$id_per;
	}

	private function set_id_periodo($value) {
		self::$id_per = $value;
	}

	private static $t_horas;
	public function get_tamanho_horas() {
		return self::$t_horas;
	}

	private function set_tam_horas($value) {
		self::$t_horas = $value;
	}

	private static $id_cor;
	public function get_id_cor() {
		return self::$id_cor;
	}

	private function set_id_cor($value) {
		self::$id_cor = $value;
	}

}