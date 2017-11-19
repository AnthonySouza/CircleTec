<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'user.php';
require_once _COURSE_ROOT_ . 'course.php';

require_once 'pubs.php';
require_once 'followers.php';
require_once 'friends.php';

function create_user_top_content($user_id) {
	global $_STRINGS;

	$_usr = new  User($user_id);

	echo '<div class="user-top-data">';
	echo '<div class="background_loading">';
	echo '</div>';
	echo '<div class="box-overlay">';
	echo '</div>';

    echo '<div class="col-sm-2">';
    echo '</div>';
    echo '<div class="col-sm-8">';

    echo '<div class="user-top-info-contend">';
    echo '<div class="col-sm-4">';
    echo '<div class="user-avatar-picture">';
    echo '<img src="' . $_usr->get_picture() . '" alt="">';
	echo '<div class="choose-user-picture-button">';
    echo '<i class="icon-cog-1"></i>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '<div class="col-sm-8">';
    echo '<div class="user-info-data-content">';
    echo '<div class="user-avatar-name">';
    echo '<span>' . $_usr->get_long_username() . '</span>';
    echo '</div>';
    echo '<div class="user-avatar-motto">';
    echo '<span>' . $_usr->get_motto() . '</span>';
    echo '</div>';
    echo '<div class="user-avatar-act-info">';
    echo '<a href="#"><span><span>' . get_user_publications_count($_usr) . '</span>' . $_STRINGS->get_value('web.publications') . '</span></a>';
	echo '<a href="#"><span><span>' . get_user_friends_count($_usr) . '</span>' . $_STRINGS->get_value('web.friends') . '</span></a>';
	echo '<a href="#"><span><span>' . get_user_followers_count($_usr) . '</span>' . $_STRINGS->get_value('web.followers') . '</span></a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
	echo '<div class="col-sm-2">';
	echo '<div class="choose-backgound-picture-button">';
	echo '<div class="content">';
	echo '<button>Trocar Capa</button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
	
    echo '</div>';

}

function create_user_view_menu_bar($view_user) {
	global $_STRINGS;

	$_usr = new User($view_user);

	echo '<div class="user-top-data-bottom-menu" id="top-menu-user">';
    echo '<div class="user-info-top-menu-user">';
    echo '<div class="content">';
    echo '<div class="user-picture">';
    echo '<img src="' . $_usr->get_picture() . '" alt="">';
    echo '</div>';
    echo '<div class="user-name">';
    echo '<span>' . $_usr->get_long_username() . '</span>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="menu">';
    echo '<div class="menu-option" id="ref-timeline">';
    echo '<div class="menu-button">';
    echo '<div class="menu-button-contend">';
    echo '<span>' . $_STRINGS->get_value('web.timeline') . '</span>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="menu-option" id="ref-photos">';
    echo '<div class="menu-button">';
    echo '<div class="menu-button-contend">';
    echo '<span>' . $_STRINGS->get_value('web.photos') . '</span>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="menu-option" id="ref-about">';
    echo '<div class="menu-button">';
    echo '<div class="menu-button-contend">';
    echo '<span>' . $_STRINGS->get_value('web.about') . '</span>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

}

function create_user_info_content($user_id) {
	global $_STRINGS;

	$user = new User($user_id);
	$course = new Course($user->get_course());

	echo '<div class="left-content">';
    echo '<div class="user-left-info-contend">';
    echo '<div class="user-motto">';
    echo '<span>' . $user->get_motto() . '</span>';
    echo '<div class="edt-motto-button-contend">';
    echo '<div class="s-icon">';
    echo '<span class="edit-icon"></span>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="user-cur">';
    echo '<span id="spn-cur-title"><i class="icon-star-circled"></i>' . $_STRINGS->get_value('web.course') . '</span>';
    echo '<span id="spn-cur-value">' . $course->get_nome() . '</span>';
    echo '<div class="edit-item-button">';
    echo '<div class="button"><span><i class="icon-edit"></i></span></div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="user-cur-module">';
    echo '<span id="spn-cur-module-title"><i class="icon-dribbble-3"></i>'.  $_STRINGS->get_value('web.module') . '</span>';
    echo '<span id="spn-cur-module-value">3 Semestre</span>';
    echo '<div class="edit-item-button">';
    echo '<div class="button"><span><i class="icon-edit"></i></span></div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="user-cur-per">';
    echo '<span id="spn-cur-per-title"><i class="icon-cloud-sun-inv"></i>' . $_STRINGS->get_value('web.period') . '</span>';
    echo '<span id="spn-cur-per-value">Noturno</span>';
    echo '<div class="edit-item-button">';
    echo '<div class="button"><span><i class="icon-edit"></i></span></div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '<div class="user-left-info-contend">';
    echo '<div class="user-motto">';
    echo '<span>Eventos</span>';
    echo '<div class="edt-motto-button-contend">';
    echo '<div class="s-icon">';
    echo '<span class="edit-icon"></span>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="user-comp-event">';
    echo '<span id="spn-comp-event"><i class="icon-star-3">Comparecer? em</i></span>';
    echo '<span id="spn-comp-event-value">Infoday Etec</span>';
    echo '</div>';
    echo '<div class="user-comp-event">';
    echo '<span id="spn-comp-event-title"><i class="icon-star-3">Comparecer? em</i></span>';
    echo '<span id="spn-comp-event-value">Infoday Etec</span>';
    echo '</div>';
    echo '<div class="user-comp-event">';
    echo '<span id="spn-comp-event-title"><i class="icon-star-3">Comparecer? em</i></span>';
    echo '<span id="spn-comp-event-value">Infoday Etec</span>';
    echo '</div>';
    echo '</div>';

	draw_friends_content($user_id);

    echo '</div>';

}

function create_user_info_content_html(User $user) {
	global $_STRINGS;

	$course = new Course($user->get_course());
	$html = '';

	$html .=  '<div class="left-content">';
    $html .=  '<div class="user-left-info-contend">';
    $html .=  '<div class="user-motto">';
    $html .=  '<span>' . $user->get_motto() . '</span>';
    $html .=  '<div class="edt-motto-button-contend">';
    $html .=  '<div class="s-icon">';
    $html .=  '<span class="edit-icon"></span>';
    $html .=  '</div>';
    $html .=  '</div>';
    $html .=  '</div>';
    $html .=  '<div class="user-cur">';
    $html .=  '<span id="spn-cur-title"><i class="icon-star-circled"></i>' . $_STRINGS->get_value('web.course') . '</span>';
    $html .=  '<span id="spn-cur-value">' . $course->get_nome() . '</span>';
    $html .=  '<div class="edit-item-button">';
    $html .=  '<div class="button"><span><i class="icon-edit"></i></span></div>';
    $html .=  '</div>';
    $html .=  '</div>';
    $html .=  '<div class="user-cur-module">';
    $html .=  '<span id="spn-cur-module-title"><i class="icon-dribbble-3"></i>'.  $_STRINGS->get_value('web.module') . '</span>';
    $html .=  '<span id="spn-cur-module-value">3 Semestre</span>';
    $html .=  '<div class="edit-item-button">';
    $html .=  '<div class="button"><span><i class="icon-edit"></i></span></div>';
    $html .=  '</div>';
    $html .=  '</div>';
    $html .=  '<div class="user-cur-per">';
    $html .=  '<span id="spn-cur-per-title"><i class="icon-cloud-sun-inv"></i>' . $_STRINGS->get_value('web.period') . '</span>';
    $html .=  '<span id="spn-cur-per-value">Noturno</span>';
    $html .=  '<div class="edit-item-button">';
    $html .=  '<div class="button"><span><i class="icon-edit"></i></span></div>';
    $html .=  '</div>';
    $html .=  '</div>';
    $html .=  '</div>';

    $html .=  '<div class="user-left-info-contend">';
    $html .=  '<div class="user-motto">';
    $html .=  '<span>Eventos</span>';
    $html .=  '<div class="edt-motto-button-contend">';
    $html .=  '<div class="s-icon">';
    $html .=  '<span class="edit-icon"></span>';
    $html .=  '</div>';
    $html .=  '</div>';
    $html .=  '</div>';
    $html .=  '<div class="user-comp-event">';
    $html .=  '<span id="spn-comp-event"><i class="icon-star-3">Comparecer? em</i></span>';
    $html .=  '<span id="spn-comp-event-value">Infoday Etec</span>';
    $html .=  '</div>';
    $html .=  '<div class="user-comp-event">';
    $html .=  '<span id="spn-comp-event-title"><i class="icon-star-3">Comparecer? em</i></span>';
    $html .=  '<span id="spn-comp-event-value">Infoday Etec</span>';
    $html .=  '</div>';
    $html .=  '<div class="user-comp-event">';
    $html .=  '<span id="spn-comp-event-title"><i class="icon-star-3">Comparecer? em</i></span>';
    $html .=  '<span id="spn-comp-event-value">Infoday Etec</span>';
    $html .=  '</div>';
    $html .=  '</div>';
    $html .=  '</div>';

	return $html;

}