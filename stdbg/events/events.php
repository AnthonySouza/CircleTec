<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'database.php';
require_once _CORE_ROOT_ . 'user.php';

require_once _UTILS_ROOT_ . 'generator.php';

require_once 'colaborador.php';
require_once 'colaboradores.php';
require_once 'comparecera.php';
require_once 'confirmados.php';

function draw_events_container() {
	global $_STRINGS;

	echo '<div class="events">';
	
	echo '<div class="ev-top">';
	echo '<div class="title">';
	echo '<span>' . $_STRINGS->get_w_value('web.events') . '</span>';
	echo '</div>';
	echo '<div class="new-event-button" id="add-new-event-button" data-toggle="modal" data-target="#add-new-event-modal">';
	echo '<span><i class="icon-plus-4"></i></span>';
	echo '</div>';

	echo '<div class="config-button">';
	echo '<i class="icon-down-circle-1"></i>';
	echo '</div>';
	echo '</div>';

	echo '<div class="ev-day">';
	echo'<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">';
	echo'<div class="carousel-inner">';

	$datas = new DatePeriod(new DateTime(), new DateInterval('P1D'), new DateTime('2017-11-31'));

	foreach ($datas as $data)
	{
		
		if($data->format('Y-m-d') === date('Y-m-d')) {
		
			echo'<div class="carousel-item active" date="' . $data->format('Y-m-d') . '">';
			echo '<div class="center">';
			echo '<span>' . $_STRINGS->get_w_value('web.hoje') . '</span>';
			echo '</div>';
			echo'</div>';

		} else {
		
			echo'<div class="carousel-item" date="' . $data->format('Y-m-d') . '">';
			echo '<div class="center">';
			echo '<span>' . $data->format('d-m-Y') . '</span>';
			echo '</div>';
			echo'</div>';
		
		}

	}
	
    echo'</div>';
	echo'</div>';
	echo'<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">';
    echo '<div class="left">';
	echo '<i class="icon-left-open-4"></i>';
	echo '</div>';
    echo'<span class="sr-only">Previous</span>';
	echo'</a>';
	echo'<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">';
	echo '<div class="right">';
	echo '<i class="icon-right-open-4"></i>';
	echo '</div>';
    echo'<span class="sr-only">Next</span>';
	echo'</a>';
	echo'</div>';
	

	echo '<div class="events-content" style="min-height: 50px;">';

	echo '</div>';
	echo '</div>';
	echo '</div>';

}

function get_all_events() {
	global $socialtecdatabase;

	if($conn = $socialtecdatabase->prepare("SELECT * FROM `evento`")) {
		
		if($conn->execute()) {
			
			$row = $conn->fetchAll(PDO::FETCH_ASSOC);	
			
			if(sizeof($row) > 0) {
				
				for ($i = 0; $i < sizeof($row); $i++)
				{

					$eventos[$row[$i]['id']] = $row[$i];
					
				}
				
				return $eventos;
				
			}

		}
		
	}

	return false;

}

function get_all_events_by_date($date) {

	global $socialtecdatabase;

	if($conn = $socialtecdatabase->prepare("SELECT * FROM `evento` WHERE `data`='" . $date->format('Y-m-d') . "'")) {
		
		if($conn->execute()) {
			
			$row = $conn->fetchAll(PDO::FETCH_ASSOC);	
			
			if(sizeof($row) > 0) {
				
				$eventos = array();

				for ($i = 0; $i < sizeof($row); $i++)
				{
					//$d = new DateTime($row[$i]['data']);
					//$dserver = new DateTime();

					//if($d->format('m.d.y') === $dserver->format('m.d.y')) {
					//    $eventos[$row[$i]['id']] = $row[$i];
					//}

					$eventos[$row[$i]['id']] = $row[$i];
					
				}
				
				return $eventos;
				
			}

		}
		
	}

	return false;

}

function insert_event_html($event_arr) {
	global $_STRINGS;

	if(isset($event_arr) || $event_arr != null || is_array($event_arr)) {
		
		$date = new DateTime($event_arr['data']);
		$date = $date->format('d/m/Y');

		echo '<div class="event" date="' . $date . '">';

		echo '<div class="event-top">';
		echo '<div class="name">';
		echo '<span>' . $event_arr['nome_event'] . '</span>';
		echo '<div class="date">';
		echo '<span>' . $event_arr['data'] . '</span>';
		echo '</div>';
		echo '<div class="ev-settings">';

		$button_id = GenerateString(7, _ELEMENTS_);

		echo '<div class="add" id="' . $button_id . '" event="' . $event_arr['id'] . '" state="1">';
		echo '<i class="icon-plus-5"></i>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';

		echo '<div class="event-bottom">';
		echo '<div class="organizer">';
		echo '<div class="title">';
		echo '<span>';
		
		$colabs = new Colaboradores($event_arr['id']);

		if(sizeof($colabs->get_colab_array()) > 1) {
			
			$_STRINGS->get_w_value('page.events-organizer-title-plural');
			
		} else {
			
			$_STRINGS->get_w_value('page.events-organizer-title');
			
		}
		
		echo '</span>';
		echo '</div>';
		echo '<div class="value">';
		
		for ($i = 0; $i < sizeof($colabs); $i++)
		{
			
			echo '<span>';

			$colab_arr = $colabs->get_colab_array();

			$arr_keys = array_keys($colab_arr);
			$colab_arr = $colab_arr[$arr_keys[$i]]; /*GAMBIARRA KKK*/
			$_user = new User($colab_arr['user_id']);
			echo '<a href="user.php?id=' . $colab_arr['user_id'] . '">' . $_user->get_name() . '</a>';
			
			echo '</span>';

		}
		
		if(isset($arr_keys)) {
			unset($arr_keys);
		}

		if(isset($_user)) {
			unset($_user);
		}

		echo '</div>';
		echo '</div>';

		$comp_arr = new Confirmados($event_arr['id']);

		$edata = $comp_arr->get_confirmados_array();
		
		if(sizeof($edata) > 0) {
			
			$__arr_keys = array_keys($edata);

			for ($i = 0; $i < sizeof($__arr_keys); $i++)
			{
				
				if($edata[$__arr_keys[$i]]['event_id'] === $event_arr['id']) {
					
					echo '<div class="users-conf-event">';
					echo '<div class="content">';

					if(sizeof($comp_arr->get_confirmados_array()) <= 5) {
						
						for ($i = 0; $i < sizeof($comp_arr->get_confirmados_array()); $i++)
						{

							$arr_keys = array_keys($comp_arr->get_confirmados_array());
							$_user = new User($comp_arr->get_confirmados_array()[$arr_keys[$i]]['user_id']);

							echo '<div class="user">';
							echo '<div class="user-picture" data-toggle="dropdown" data-balloon="' . $_user->get_long_username() . '" data-balloon-pos="left">';

							echo '<a href="user.php?id=' . $_user->get_id() . '">';
							echo '<img src="' . $_user->get_picture() . '">';

							echo '</a>';
							echo '</div>';
							echo '</div>';

						}

					}

					if($count = sizeof($comp_arr->get_confirmados_array()) > 5) {
						
						for ($i = 0; $i < sizeof($comp_arr->get_confirmados_array()); $i++)
						{

							if($i < 5) {
								
								$arr_keys = array_keys($comp_arr->get_confirmados_array());
								$_user = new User($comp_arr->get_confirmados_array()[$arr_keys[$i]]['user_id']);

								echo '<div class="user">';
								echo '<div class="user-picture" data-toggle="dropdown" data-balloon="' . $_user->get_long_username() . '" data-balloon-pos="left">';

								echo '<a href="user.php?id=' . $_user->get_id() . '">';
								echo '<img src="' . $_user->get_picture() . '">';

								echo '</a>';
								echo '</div>';
								echo '</div>';

							} else {
								
								$rest = sizeof($comp_arr->get_confirmados_array()) - 5;

								echo'<div class="users-buttom-count">';
								echo'<div class="count">';
								echo'<a href="#">';
								echo'<span>+' . $rest . '</span>';
								echo'</a>';
								echo'</div>';
								echo'</div>';
								
								$i = sizeof($comp_arr->get_confirmados_array()); /*Para a execu��o do loop*/
								
							}

						}

					}

					echo '</div>';
					echo '</div>';
					
				}

			}

			
			
		}
		
		echo '</div>';
		echo '</div>';
		
	}
}

function get_event_html($event_arr) {
	global $_STRINGS;

	if(isset($event_arr) || $event_arr != null || is_array($event_arr)) {
		
		$date = new DateTime($event_arr['data']);
		$date = $date->format('d/m/Y');
		$html = '';

		$html .=  '<div class="event" date="' . $date . '">';

		$html .=  '<div class="event-top">';
		$html .=  '<div class="name">';
		$html .=  '<a href="' . _URL_EVENTS_ROOT_ . '?id=' . $event_arr['id'] . '"><span>' . $event_arr['nome_event'] . '</span></a>';
		$html .=  '<div class="date">';
		$html .=  '<span>' . $event_arr['hora_inicio'] . ' - ' . $event_arr['hora_fim'] . '</span>';
		$html .=  '</div>';
		$html .=  '<div class="ev-settings">';

		$button_id = GenerateString(7, _ELEMENTS_);

		$html .=  '<div class="add" id="' . $button_id . '" event="' . $event_arr['id'] . '" state="1">';
		$html .=  '<i class="icon-plus-5"></i>';
		$html .=  '</div>';
		$html .=  '</div>';
		$html .=  '</div>';
		$html .=  '</div>';

		$html .=  '<div class="event-bottom">';
		$html .=  '<div class="organizer">';
		$html .=  '<div class="title">';
		$html .=  '<span>';
		
		$colabs = new Colaboradores($event_arr['id']);

		if(sizeof($colabs->get_colab_array()) > 1) {
			
			$_STRINGS->get_w_value('page.events-organizer-title-plural');
			
		} else {
			
			$_STRINGS->get_w_value('page.events-organizer-title');
			
		}
		
		$html .=  '</span>';
		$html .=  '</div>';
		$html .=  '<div class="value">';
		
		for ($i = 0; $i < sizeof($colabs); $i++)
		{
			
			$html .=  '<span>';

			$colab_arr = $colabs->get_colab_array();

			$arr_keys = array_keys($colab_arr);
			$colab_arr = $colab_arr[$arr_keys[$i]]; /*GAMBIARRA KKK*/
			$_user = new User($colab_arr['user_id']);
			$html .=  '<a href="user.php?id=' . $colab_arr['user_id'] . '">' . $_user->get_name() . '</a>';
			
			$html .=  '</span>';

		}
		
		if(isset($arr_keys)) {
			unset($arr_keys);
		}

		if(isset($_user)) {
			unset($_user);
		}

		$html .=  '</div>';
		$html .=  '</div>';

		$comp_arr = new Confirmados($event_arr['id']);

		$edata = $comp_arr->get_confirmados_array();
		
		if(sizeof($edata) > 0) {
			
			$__arr_keys = array_keys($edata);

			for ($i = 0; $i < sizeof($__arr_keys); $i++)
			{
				
				if($edata[$__arr_keys[$i]]['event_id'] === $event_arr['id']) {
					
					$html .=  '<div class="users-conf-event">';
					$html .=  '<div class="content">';

					if(sizeof($comp_arr->get_confirmados_array()) <= 5) {
						
						for ($i = 0; $i < sizeof($comp_arr->get_confirmados_array()); $i++)
						{

							$arr_keys = array_keys($comp_arr->get_confirmados_array());
							$_user = new User($comp_arr->get_confirmados_array()[$arr_keys[$i]]['user_id']);

							$html .=  '<div class="user">';
							$html .=  '<div class="user-picture" data-toggle="dropdown" data-balloon="' . $_user->get_long_username() . '" data-balloon-pos="left">';

							$html .=  '<a href="user.php?id=' . $_user->get_id() . '">';
							$html .=  '<img src="' . $_user->get_picture() . '">';

							$html .=  '</a>';
							$html .=  '</div>';
							$html .=  '</div>';

						}

					}

					if($count = sizeof($comp_arr->get_confirmados_array()) > 5) {
						
						for ($i = 0; $i < sizeof($comp_arr->get_confirmados_array()); $i++)
						{

							if($i < 5) {
								
								$arr_keys = array_keys($comp_arr->get_confirmados_array());
								$_user = new User($comp_arr->get_confirmados_array()[$arr_keys[$i]]['user_id']);

								$html .=  '<div class="user">';
								$html .=  '<div class="user-picture" data-toggle="dropdown" data-balloon="' . $_user->get_long_username() . '" data-balloon-pos="left">';

								$html .=  '<a href="user.php?id=' . $_user->get_id() . '">';
								$html .=  '<img src="' . $_user->get_picture() . '">';

								$html .=  '</a>';
								$html .=  '</div>';
								$html .=  '</div>';

							} else {
								
								$rest = sizeof($comp_arr->get_confirmados_array()) - 5;

								$html .= '<div class="users-buttom-count">';
								$html .= '<div class="count">';
								$html .= '<a href="#">';
								$html .= '<span>+' . $rest . '</span>';
								$html .= '</a>';
								$html .= '</div>';
								$html .= '</div>';
								
								$i = sizeof($comp_arr->get_confirmados_array()); /*Para a execu��o do loop*/
								
							}

						}

					}

					$html .=  '</div>';
					$html .=  '</div>';
					
				}

			}

			
			
		}
		
		$html .=  '</div>';
		$html .=  '</div>';

		return $html;
		
	}

	return '';
}

function draw_events($date) {

	if($_e = get_all_events_by_date($date)) {
	
		$events = array_keys($_e);

		for ($i = 0; $i < sizeof($events); $i++)
		{
			
			insert_event_html($_e[$events[$i]]);

			if(sizeof($events) > 1 || $i <= sizeof($events)) {
				
				echo '<div class="separator-content"><div class="separator"></div></div>';
				
			}

		}
	
	}

}

function draw_events_html($date) {

	if($_e = get_all_events_by_date($date)) {
		
		$events = array_keys($_e);
		$ev = '';

		for ($i = 0; $i < sizeof($events); $i++)
		{
			
			$ev .= get_event_html($_e[$events[$i]]);

		}

		return $ev;
		
	}

	return false;

}

function user_is_registered_on_event($event_id, $user_id) {
	global $socialtecdatabase;

	if(isset($event_id) || $event_id != null || isset($user_id) || $user_id != null) {
	
		if($conn = $socialtecdatabase->prepare("SELECT `id`, `user_id`, `event_id` FROM `evento_comparecerao` WHERE `user_id`='" . $user_id . "' AND `event_id`='" . $event_id . "'")) {
		
			if($conn->execute()) {
			
				$row = $conn->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($row) > 0) {
				
					return true;

				}
			
			}
		
		}
	
	}

	return false;

}

function register_user_on_event($event_id, $user_id) {
	global $socialtecdatabase;

	if(isset($event_id) || $event_id != null || isset($user_id) || $user_id != null) {
		
		$register_id = GenerateString(19, _ID_);

		if($conn = $socialtecdatabase->prepare("INSERT INTO `evento_comparecerao`(`id`, `user_id`, `event_id`) VALUES ('" . $register_id . "', '" . $user_id . "', '" . $event_id . "')")) {
			
			if($conn->execute()) {
				
				return $register_id;

			}
			
		}
		
	}

	return false;

}

function del_register_user_on_event($event_id, $user_id) {
	global $socialtecdatabase;

	if(isset($event_id) || $event_id != null || isset($user_id) || $user_id != null) {
		
		if($conn = $socialtecdatabase->prepare("DELETE FROM `evento_comparecerao` WHERE `user_id`='" . $user_id . "' AND `event_id`='" . $event_id . "'")) {
			
			if($conn->execute()) {
				
				return true;

			}
			
		}
		
	}

	return false;

}

function register_new_event($name, $info, $date, $init, $end, $shift, $local) {
	global $socialtecdatabase;

	if(isset($name) || $name != null || isset($info) || $info != null || isset($date) || $date != null || isset($init) || $init != null || isset($end) || $end != null || isset($shift) || $shift != null || isset($local) || $local != null) {
	
		$eid = GenerateString(18, _ID_);

		if($conn = $socialtecdatabase->prepare("INSERT INTO `evento`(`id`, `desc_event`, `nome_event`, `data`, `hora_inicio`, `hora_fim`, `p_Imagem`, `local`, `responsavel`, `turno`, `finalizado`, `adiado`) VALUES ('" . $eid. "', '" . $info . "', '" . $name . "', '" . $date . "', '" . $init . "', '" . $end . "', '" . '[IMAGEM-EVENTO]' . "', '" . $local . "', '" . $_SESSION['user_id'] . "', '" . $shift . "', '0', '0')")) {
		
			if($conn->execute()) {
			
				return $eid;
			
			}
		
		}
	
	}

	return false;

}

function del_event($event_id) {
	global $socialtecdatabase;

	if(isset($event_id) || $event_id != null) {
	
		if($conn = $socialtecdatabase->prepare("DELETE FROM `evento` WHERE `id`='" . $event_id . "'")) {
		
			if($conn->execute()) {
			
				return true;

			}
		
		}

	}

	return false;

}

function del_event_comp($event_id) {
	global $socialtecdatabase;

	if(isset($event_id) || $event_id != null) {
		
		if($conn = $socialtecdatabase->prepare("DELETE FROM `evento_comparecerao` WHERE `event_id`='" . $event_id . "'")) {
			
			if($conn->execute()) {
				
				return true;

			}
			
		}

	}

	return false;

}

function del_event_colabs($event_id) {
	global $socialtecdatabase;

	if(isset($event_id) || $event_id != null) {
		
		if($conn = $socialtecdatabase->prepare("DELETE FROM `evento_colaboradores` WHERE `event_id`='" . $event_id . "'")) {
			
			if($conn->execute()) {
				
				return true;

			}
			
		}

	}

	return false;

}

function insert_event_colab($event_id, $user_id) {
	global $socialtecdatabase;

	if(isset($event_id) || $event_id != null) {
		
		$cid = GenerateString(18, _ID_);

		if($conn = $socialtecdatabase->prepare("INSERT INTO `evento_colaboradores`(`id`, `user_id`, `event_id`) VALUES ('" . $cid . "', '" . $user_id . "', '" . $event_id . "')")) {
			
			if($conn->execute()) {
				
				return $cid;

			}
			
		}

	}

	return false;

}