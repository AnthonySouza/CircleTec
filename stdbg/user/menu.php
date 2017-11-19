<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';
require_once _CORE_ROOT_ . 'user.php';

function create_top_menu_content($user) {
	echo '<div class="top" id="top">';
	
	create_search_top_menu();
	create_user_top_menu($user);

	echo '</div>';
}

function create_top_menu_content_b($user) {
	//echo '<div class="top" id="top">';
	
	create_user_top_menu_b($user);

	//echo '</div>';
}

function create_user_top_menu_b($user) {

	echo '<div class="user-buttom-menu block">';
	echo '<div class="user-picture">';
	echo '<img class="modal-trigger" data-modal="#modal-3" src="' . $user->get_picture() . '" alt="">';
	echo '<div class="notification">';
	echo '<div class="notification-label">';
	echo '<span>1</span>';
	echo '</div>';
	echo '</div>';
	echo '</div>';

	echo '<div class="animation-overlay-content">';
	echo '<span></span>';
	echo '</div>';

	echo '</div>';
}

function create_user_top_menu($user) {
	echo '<div class="user-buttom-menu">';
	echo '<div class="user-picture">';
	echo '<img class="modal-trigger" data-modal="#modal-3" src="' . $user->get_picture() . '" alt="">';
	echo '<div class="notification">';
	echo '<div class="notification-label">';
	echo '<span>1</span>';
	echo '</div>';
	echo '</div>';
	echo '</div>';

	echo '<div class="animation-overlay-content">';
	echo '<span></span>';
	echo '</div>';

	echo '<div class="cd-overlay-nav">';
	echo '<span></span>';
	echo '</div> <!-- cd-overlay-nav -->';
 
	echo '<div class="cd-overlay-content">';
	echo '<span></span>';
	echo '</div>';

	echo '</div>';
}

function create_search_top_menu() {
	echo '<div class="search-buttom-menu">';
	echo '<div class="search-content">';
	echo '<i class="icon-search-5"></i>';
	echo '<div class="input">';
	echo '<input type="text" placeholder="Digite sua pesquisa" id="input-search-top-menu">';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}

function create_search_top_bar($value) {
	echo '<div class="search-buttom-bar">';
	echo '<div class="search-content">';
	echo '<i class="icon-search-5"></i>';
	echo '<div class="input">';
	echo '<input type="text" class="search-top-bar-input" placeholder="Digite sua pesquisa" value="' . $value . '">';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}

?>