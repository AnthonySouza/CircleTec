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
class Colaboradores
{
    
	public function __construct($event_id) {
		global $socialtecdatabase;

		if($conn = $socialtecdatabase->prepare("SELECT * FROM `evento_colaboradores` WHERE `event_id`='" . $event_id . "'")) {
			
			if($conn->execute()) {
				$row = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($row) > 0) {
				
					for ($i = 0; $i < sizeof($row); $i++)
					{
						$colab[$row[$i]['id']] = array ( 
							array_keys($row[$i])[0] => $row[$i]['id'],
							array_keys($row[$i])[1] => $row[$i]['user_id'],
							array_keys($row[$i])[2] => $row[$i]['event_id'],
							);
					}
					
					self::set_colab_arr($colab);

				}
				
			}
			
		}

	}

	private static $colaborador;

	public function get_colab($id) {
		return self::$colaborador[$id];
	}

	private function set_colab_arr($value) {
		self::$colaborador = $value;
	}

	public function get_colab_array() {
		return self::$colaborador;
	}

}
