<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'database.php';
require_once _CORE_ROOT_ . 'user.php';
require_once _COURSE_ROOT_ . 'course.php';
require_once _MODULE_ROOT_ . 'module.php';

function search_query($query) {
	global $socialtecdatabase;
	global $_STRINGS;

	$query_arr = explode(' ', $query);
	$sql = '';

	if(sizeof($query_arr) > 0) {
	
		$sql = "SELECT * FROM `usuario` WHERE `nome` LIKE '" . base64_encode($query_arr[0]) . "'";

		if(isset($query_arr[1])) {

			if($query_arr[1] !== null) {
			
				$sql .= " AND `sobre_nome` LIKE '" . base64_encode($query_arr[1]) . "'";

			}

		}
	
	}

	if($conn = $socialtecdatabase->prepare($sql)) {
	
		if($conn->execute()) {
		
			$row = $conn->fetchAll(PDO::FETCH_ASSOC);

			if(sizeof($row) > 0) {
			
				for ($i = 0; $i < sizeof($row); $i++)
				{

					$usr = new User($row[$i]['id']);
					$cur = new Course($usr->get_course());
					$mod = new Module($usr);

					echo '<div class="search-object" uid="' . $usr->get_id() . '">';
					echo '<div class="search-object-contend">';
					echo '<div class="user-picture">';
					echo '<div class="picture">';
					echo '<img src="' . $usr->get_picture() . '">';
					echo '</div>';
					echo '</div>';

					echo '<div class="user-info">';
					echo '<div class="user-name">';
					echo '<a href="#"><span>' . $usr->get_long_username() . '</span></a>';
					echo '</div>';
					echo '<div class="user-cur">';
					echo '<span>' . $cur->get_nome() . '</span>';
					echo '</div>';
					echo '<div class="user-module">';
					echo '<span>' . $mod->get_module() . ' ' . $_STRINGS->get_value('web.module') . '</span>';
					echo '</div>';
					echo '</div>';

					echo '<div class="user-options">';
					echo '<div class="contend">';
					echo '<button class="add-friend-button" uid="' . $usr->get_id() . '"><i class="icon-user-add-1"></i></button>';
					echo '<button class="add-follower-button" uid="' . $usr->get_id() . '"><i class="icon-users-3"></i>Seguir</button>';
					echo '</div>';
					echo '</div>';

					echo '<div class="settings-button" uid="' . $usr->get_id() . '">';
					echo '<i class="icon-cog-1"></i>';
					echo '</div>';

					echo '</div>';
					echo '</div>';

				}
			
			} else {
			
				echo '<div class="no-results-found-display">';
				echo '<div class="contend">';
				echo '<div class="background-image">';
				echo '<i class="icon-map-2"></i>';
				echo '</div>';
				echo '</div>';
				echo '<div class="message">';
				echo '<span>Nenhum resultado encontrado por "' . $query . '".</span>';
				echo '</div>';
				echo '</div>';
			
			}
		
		}
	
	}

}

function get_aj_query_result($arr_data) {

	global $socialtecdatabase;
	global $_STRINGS;

	$html = '';
	$query_arr = explode(' ', $arr_data['query']); //EAE BRUNOO
	$sql = '';

	if(sizeof($query_arr) > 0) {
		
		$sql = "SELECT * FROM `usuario` WHERE `nome` LIKE '" . base64_encode($query_arr[0]) . "'";

		if(isset($query_arr[1])) {

			if($query_arr[1] !== null) {
				
				$sql .= " AND `sobre_nome` LIKE '" . base64_encode($query_arr[1]) . "'";

			}

		}
		
	}

	if($conn = $socialtecdatabase->prepare($sql)) {
		
		if($conn->execute()) {
			
			$row = $conn->fetchAll(PDO::FETCH_ASSOC);

			if(sizeof($row) > 0) {
				
				for ($i = 0; $i < sizeof($row); $i++)
				{

					$usr = new User($row[$i]['id']);
					$cur = new Course($usr->get_course());
					$mod = new Module($usr);

					$html .= '<div class="search-object" uid="' . $usr->get_id() . '">';
					$html .= '<div class="search-object-contend">';
					$html .= '<div class="user-picture">';
					$html .= '<div class="picture">';
					$html .= '<img src="' . $usr->get_picture() . '">';
					$html .= '</div>';
					$html .= '</div>';

					$html .= '<div class="user-info">';
					$html .= '<div class="user-name">';
					$html .= '<a href="user.php?id=' . $usr->get_id() . '"><span>' . $usr->get_long_username() . '</span></a>';
					$html .= '</div>';
					$html .= '<div class="user-cur">';
					$html .= '<span>' . $cur->get_nome() . '</span>';
					$html .= '</div>';
					$html .= '<div class="user-module">';
					$html .= '<span>' . $mod->get_module() . ' ' . $_STRINGS->get_value('web.module') . '</span>';
					$html .= '</div>';
					$html .= '</div>';

					if($usr->get_id() !== $_SESSION['user_id']) {
						$html .= '<div class="user-options">';
						$html .= '<div class="contend">';
						$html .= '<button class="add-friend-button" uid="' . $usr->get_id() . '"><i class="icon-user-add-1"></i></button>';
						$html .= '<button class="add-follower-button" uid="' . $usr->get_id() . '"><i class="icon-users-3"></i>Seguir</button>';
						$html .= '</div>';
						$html .= '</div>';
					}

					$html .= '<div class="settings-button" uid="' . $usr->get_id() . '">';
					$html .= '<i class="icon-cog-1"></i>';
					$html .= '</div>';

					$html .= '</div>';
					$html .= '</div>';

				}
				
			} else {
				
				$html .= '<div class="no-results-found-display">';
				$html .= '<div class="contend">';
				$html .= '<div class="background-image">';
				$html .= '<i class="icon-map-2"></i>';
				$html .= '</div>';
				$html .= '</div>';
				$html .= '<div class="message">';
				$html .= '<span>Nenhum resultado encontrado por "' . $arr_data['query'] . '".</span>';
				$html .= '</div>';
				$html .= '</div>';
				
			}
			
		}
		
	}

	return $html;

}

function draw_search_options() {
	global $_STRINGS;
	
	echo '<div class="search_options">';
	echo '<div class="contend">';
	
	echo '<div>';

	echo '<span class="o-title">' . $_STRINGS->get_value('web.find-to') . '</span>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="globe" id="globe" autocomplete="off">';
	echo '<label class="select-radio" for="globe"><i class="icon-globe-5 icon-curs-search"></i>' . $_STRINGS->get_value('web.all') . '</label>';
	echo '</div>';
	
	echo '<div class="select-option">';
	echo '<input type="checkbox" name="peoples" id="peoples" autocomplete="off">';
	echo '<label class="select-radio" for="peoples"><i class="icon-users-1 icon-curs-search"></i>' . $_STRINGS->get_value('web.alunos') . '</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="profs" id="profs" autocomplete="off">';
	echo '<label class="select-radio" for="profs"><i class="icon-lamp icon-curs-search"></i>' . $_STRINGS->get_value('web.profs') . '</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="sups" id="sups" autocomplete="off">';
	echo '<label class="select-radio" for="sups"><i class="icon-religious-jewish icon-curs-search"></i>' . $_STRINGS->get_value('web.sups') . '</label>';
	echo '</div>';

	echo '</div>';

	/********************************************************************/

	echo '<div>';

	echo '<span class="o-title">' . $_STRINGS->get_value('web.local') . '</span>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="school" id="school" autocomplete="off">';
	echo '<label class="select-radio" for="school"><i class="icon-school icon-curs-search"></i>' . $_STRINGS->get_value('web.escola') . '</label>';
	echo '</div>';
	
	echo '<div class="select-option">';
	echo '<input type="checkbox" name="course" id="course" autocomplete="off">';
	echo '<label class="select-radio" for="course"><i class="icon-college icon-curs-search"></i>' . $_STRINGS->get_value('web.curso') . '</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="modules" id="modules" autocomplete="off">';
	echo '<label class="select-radio" for="modules"><i class="icon-certificate icon-curs-search"></i>' . $_STRINGS->get_value('web.modulos') . '</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="periods" id="periods" autocomplete="off">';
	echo '<label class="select-radio" for="periods"><i class="icon-sun-filled icon-curs-search"></i>' . $_STRINGS->get_value('web.periodos') . '</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="room" id="room" autocomplete="off">';
	echo '<label class="select-radio" for="room"><i class="icon-home icon-curs-search"></i>' . $_STRINGS->get_value('web.sala') . '</label>';
	echo '</div>';

	echo '</div>';

	/********************************************************************/

	echo '<div>';

	echo '<span class="o-title">' . $_STRINGS->get_value('web.curso') . '</span>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="cur-adm" id="cur-adm" autocomplete="off">';
	echo '<label class="select-radio" for="cur-adm"><i class="icon-chart icon-curs-search"></i>' . $_STRINGS->get_value('web.cur-adm') . '</label>';
	echo '</div>';
	
	echo '<div class="select-option">';
	echo '<input type="checkbox" name="cur-cv" id="cur-cv" autocomplete="off">';
	echo '<label class="select-radio" for="cur-cv"><i class="icon-file-image icon-curs-search"></i>' . $_STRINGS->get_value('web.cur-cv') . '</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="cur-ft" id="cur-ft" autocomplete="off">';
	echo '<label class="select-radio" for="cur-ft"><i class="icon-camera-1 icon-curs-search"></i>' . $_STRINGS->get_value('web.cur-foto') . '</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="cur-farm" id="cur-farm" autocomplete="off">';
	echo '<label class="select-radio" for="cur-farm"><i class="icon-user-md icon-curs-search"></i>' . $_STRINGS->get_value('web.cur-farm') . '</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="cur-rh" id="cur-rh" autocomplete="off">';
	echo '<label class="select-radio" for="cur-rh"><i class="icon-home icon-curs-search"></i>' . $_STRINGS->get_value('web.cur-rh') . '</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="cur-info" id="cur-info" autocomplete="off">';
	echo '<label class="select-radio" for="cur-info"><i class="icon-laptop icon-curs-search"></i>' . $_STRINGS->get_value('web.cur-info') . '</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="cur-qui-int" id="cur-qui-int" autocomplete="off">';
	echo '<label class="select-radio" for="cur-qui-int"><i class="icon-beaker-1 icon-curs-search"></i>' . $_STRINGS->get_value('web.cur-quim') . ' (Integrado)</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="cur-adm-int" id="cur-adm-int" autocomplete="off">';
	echo '<label class="select-radio" for="cur-adm-int"><i class="icon-chart icon-curs-search"></i>' . $_STRINGS->get_value('web.cur-adm') . ' (Integrado)</label>';
	echo '</div>';
	
	echo '<div class="select-option">';
	echo '<input type="checkbox" name="cur-cv-int" id="cur-cv-int" autocomplete="off">';
	echo '<label class="select-radio" for="cur-cv-int"><i class="icon-file-image icon-curs-search"></i>' . $_STRINGS->get_value('web.cur-cv') . ' (Integrado)</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="cur-ft-int" id="cur-ft-int" autocomplete="off">';
	echo '<label class="select-radio" for="cur-ft-int"><i class="icon-camera-1 icon-curs-search"></i>' . $_STRINGS->get_value('web.cur-foto') . ' (Integrado)</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="cur-farm-int" id="cur-farm-int" autocomplete="off">';
	echo '<label class="select-radio" for="cur-farm-int"><i class="icon-user-md icon-curs-search"></i>' . $_STRINGS->get_value('web.cur-farm') . ' (Integrado)</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="cur-rh-int" id="cur-rh-int" autocomplete="off">';
	echo '<label class="select-radio" for="cur-rh-int"><i class="icon-home icon-curs-search"></i>' . $_STRINGS->get_value('web.cur-rh') . ' (Integrado)</label>';
	echo '</div>';

	echo '<div class="select-option">';
	echo '<input type="checkbox" name="cur-info-int" id="cur-info-int" autocomplete="off">';
	echo '<label class="select-radio" for="cur-info-int"><i class="icon-laptop icon-curs-search"></i>' . $_STRINGS->get_value('web.cur-info') . ' (Integrado)</label>';
	echo '</div>';

	echo '</div>';

	/********************************************************************/

	echo '</div>';
	echo '</div>';
	
}