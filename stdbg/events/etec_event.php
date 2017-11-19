<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'database.php';

/**
 * event short summary.
 *
 * event description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class EtecEvent
{
    
	public function __construct($event_id) {
		global $socialtecdatabase;

		if($conn = $socialtecdatabase->prepare("SELECT * FROM `evento` WHERE `id`='" . $event_id . "'")) {
		
			if($conn->execute()) {
				
				$row = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($row) > 0) {
					$row = $row[0];

					self::set_id($row['id']);
					self::set_descricao($row['desc_event']);
					self::set_nome($row['nome_event']);
					self::set_data($row['data']);
					self::set_inicio($row['hora_inicio']);
					self::set_fim($row['hora_fim']);
					self::set_imagem($row['p_imagem']);
					self::set_local($row['local']);
					self::set_colaboradores($event_id);
					self::set_responsavel($row['responsavel']);
					self::set_turno($row['turno']);
					self::set_finalizado($row['finalizado']);
					self::set_adiado($row['adiado']);
					self::set_comparecerao($event_id);

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

	private $desc_event;
	public function get_descricao() {
		return self::$desc_event;
	}

	private function set_descricao($value) {
		self::$desc_event = $value;
	}

	private $nome_event;
	public function get_nome() {
		return self::$nome_event;
	}

	private function set_nome($value) {
		self::$nome_event = $value;
	}

	private $data;
	public function get_data() {
		return self::$data;
	}

	private function set_data($value) {
		self::$data = $value;
	}

	private $hora_inic;
	public function get_inicio() {
		return self::$hora_inic;
	}

	private function set_inicio($value) {
		self::$hora_inic = $value;
	}

	private $hora_fim;
	public function get_fim() {
		return self::$hora_fim;
	}

	private function set_fim($value) {
		self::$hora_fim = $value;
	}

	private $p_img;
	public function get_imagem() {
		return self::$p_img;
	}

	private function set_imagem($value) {
		self::$p_img = $value;
	}

	private $local;
	public function get_local() {
		return self::$local;
	}

	private function set_local($value) {
		self::$local = $value;
	}

	private $colabs;
	public function get_colaboradores() {
		return self::$colabs;
	}

	private function set_colaboradores($value) {
		self::$colabs = new Colaboradores($value);
	}

	private $responsavel;
	public function get_responsavel() {
		return self::$responsavel;
	}

	private function set_responsavel($value) {
		self::$responsavel = $value;
	}

	private $turno;
	public function get_turno() {
		return self::$turno;
	}

	private function set_turno($value) {
		self::$turno = $value;
	}

	private $finalizado;
	public function get_finalizado() {
		return self::$finalizado;
	}

	private function set_finalizado($value) {
		self::$finalizado = $value;
	}

	private $adiado;
	public function get_adiado() {
		return self::$adiado;
	}

	private function set_adiado($value) {
		self::$adiado = $value;
	}

	private $comparecerao;
	public function get_comparecerao() {
		return self::$comparecerao;
	}

	private function set_comparecerao($value) {
		self::$comparecerao = new Comparecerao($value);
	}

}