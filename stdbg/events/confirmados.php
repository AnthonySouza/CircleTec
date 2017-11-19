<?php

/**
 * confirmados short summary.
 *
 * confirmados description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class Confirmados
{
    
	public function __construct($event_id) {
		global $socialtecdatabase;

		if($conn = $socialtecdatabase->prepare("SELECT * FROM `evento_comparecerao` WHERE `event_id`='" . $event_id . "'")) {
			
			if($conn->execute()) {
				$row = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($row) > 0) {
					
					for ($i = 0; $i < sizeof($row); $i++)
					{
						$comp[$row[$i]['id']] = array ( 
							array_keys($row[$i])[0] => $row[$i]['id'],
							array_keys($row[$i])[1] => $row[$i]['user_id'],
							array_keys($row[$i])[2] => $row[$i]['event_id'],
							);
					}
					
					self::set_conf_arr($comp);

				}
				
			}
			
		}
	
	}

	private static $confirmados;

	public function get_conf($id) {
		return self::$confirmados[$id];
	}

	private function set_conf_arr($value) {
		self::$confirmados = $value;
	}

	public function get_confirmados_array() {
		return self::$confirmados;
	}

}
