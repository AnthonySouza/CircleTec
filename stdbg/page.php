<?php

require_once 'init.php';

require_once _USER_ROOT_ . 'menu.php';

require_once _FEED_ROOT_ . 'feed.php';
require_once _DAY_ROOT_ . 'day.php';
require_once _EVENTS_ROOT_ . 'events.php';
require_once _CORE_ROOT_ . 'user.php';

require_once _USER_ROOT_ . 'info.php';
require_once _WEATHER_ROOT_ . 'weather.php';
require_once _SEARCH_ROOT_ . 'search.php';

function create_top_page($web_name, $icon, $description) {
	echo '<!DOCTYPE html>';
	echo '<html>';
	echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<link rel="shortcut icon" href="' . $icon . '" type="image/x-icon">';
    echo '<meta name="description" content="' . $description . '">';
    echo '<title>' . $web_name . '</title>';
	echo '</head>';
}

function create_body_content() {
	echo '<body>';
}

function close_body_content() {
	echo '</body>';
}

function create_end_page() {
	echo '</html>';
}

function insert_imports_css() {

	echo '<link rel="stylesheet" href="/stresources/assets/tether/tether.min.css" />';
    echo '<link rel="stylesheet" href="/stresources/assets/bootstrap/css/bootstrap.min.css" />';
    echo '<link rel="stylesheet" href="/stresources/assets/bootstrap/css/bootstrap-grid.min.css" />';
    echo '<link rel="stylesheet" href="/stresources/assets/bootstrap/css/bootstrap-reboot.min.css" />';
    echo '<link rel="stylesheet" href="/stresources/assets/theme/css/style.css" />';
    echo '<link rel="stylesheet" href="/stresources/assets/mobirise/css/mbr-additional.css" type="text/css" />';
    echo '<link rel="stylesheet" href="/stresources/assets/socialtec/css/page.css" type="text/css" />';
    echo '<link rel="stylesheet" href="/stresources/assets/icons/css/fontello.css" type="text/css" />';
    echo '<link rel="stylesheet" href="/stresources/assets/normalize/normalize.min.css" type="text/css" />';
    echo '<link rel="stylesheet" href="/stresources/assets/balloon/balloon.min.css" type="text/css" />';
    echo '<link rel="stylesheet" href="/stresources/assets/socicon/css/styles.css" type="text/css" />';
	echo '<link rel="stylesheet" href="/stresources/assets/emojis/css/emojione-awesome.css" type="text/css" />';
	echo '<link rel="stylesheet" href="/stresources/assets/emojis/css/emojione-awesome.css" type="text/css" />';
	echo '<link rel="stylesheet" href="/stresources/assets/emojis/css/emojione.css" type="text/css" />';

}

function insert_imports_js() {

	echo '<script src="/stresources/assets/jquery/jquery.min.js"></script>';
	echo '<script src="/stresources/assets/jquery/jquery.ui.widget.js"></script>';
	echo '<script src="/stresources/assets/jquery/jquery.fileupload.js"></script>';
	echo '<script src="/stresources/assets/jquery/jquery.iframe-transport.js"></script>';
	echo '<script src="/stresources/assets/jquery/jquery.knob.js"></script>';
	echo '<script src="/stresources/assets/velocity/velocity.js"></script>';
	echo '<script src="/stresources/assets/popper/popper.min.js"></script>';
	echo '<script src="/stresources/assets/tether/tether.min.js"></script>';
	echo '<script src="/stresources/assets/emojis/js/emojione.min.js"></script>';
	echo '<script src="/stresources/assets/bootstrap/js/bootstrap.min.js"></script>';
	echo '<script src="/stresources/assets/smooth-scroll/smooth-scroll.js"></script>';
	echo '<script src="/stresources/assets/viewport-checker/jquery.viewportchecker.js"></script>';
	echo '<script src="/stresources/assets/theme/js/script.js"></script>';
	echo '<script src="/stresources/assets/criptography/cripto.js"></script>';
	echo '<script src="/stresources/assets/security/js/security.js"></script>';
	echo '<script src="/stresources/assets/jarallax/jarallax.min.js"></script>';
	//echo '<script src="/stresources/assets/cards/js/script.js"></script>';
	echo '<script src="/stresources/assets/feed/script.js"></script>';
	echo '<script src="/stresources/assets/feed/ajax.js"></script>';
	echo '<script src="/stresources/assets/events/ajax/ajax.js"></script>';
	echo '<script src="/stresources/assets/menu/menu.js"></script>';
	echo '<script src="/stresources/assets/events/js/script.js"></script>';
	echo '<script src="/stresources/assets/dinamics/js/script.js"></script>';
	echo '<script src="/stresources/assets/socialtec/js/script.js"></script>';
	echo '<script src="/stresources/assets/socialtec/js/post.js"></script>';

}

function create_init_page_data($user_id) {

    create_top_page(WEB_SITE_NAME, WEB_SITE_ICON, WEB_SITE_DESCRIPTION);
    create_body_content();
    insert_imports_css();

	
    create_page_user_interface_content($user_id);

    insert_imports_js();
    close_body_content();
    create_end_page();
}

function create_page_user_interface_content($usr) {
	echo '<div class="container-fluid">';
	echo '<div class="row">';

	echo '<div id="left" class="col-xs-6 col-sm-2">';

	echo '</div>';
	echo '<div id="center" class="col-xs-6 col-sm-7">';

	create_feed_global_content($usr);

	echo '</div>';
	echo '<div id="right" class="col-xs-6 col-sm-3 content-fixed">';

	create_top_menu_content($usr);

	create_thisday_box();

	draw_weather_panel();

	draw_events_container();

	echo '</div>';
	
	echo '</div>';
	echo '</div>';
}

function create_page_user_view_interface_content($logged_user, $user) {
	echo '<div class="container-fluid">';
	echo '<div class="row">';

	echo '<div id="left" class="col-xs-6 col-sm-2">';

	create_user_info_content($user);

	echo '</div>';
	echo '<div id="center" class="col-xs-6 col-sm-7">';

	create_feed_content($user);

	echo '</div>';
	echo '<div id="right" class="col-xs-6 col-sm-3 content-fixed">';

	echo '</div>';
	
	echo '</div>';
	echo '</div>';

	//draw_user_photos_interface();

}

function draw_user_photos_interface() {

	echo '<div class="container" style="padding: 20px;">';

	echo '<div class="top-title">';
	echo '<span>Galerias de imagens</span>';
	echo '</div>';
	
	/****************************/
	echo '<div class="row">';

    echo '<div class="column">';
	echo '<div class="image-object">';
	echo '<div class="object-contend">';
	echo '<div class="image" onclick="openModal();currentSlide(1)">';
	echo '<img src="https://i.imgur.com/Wetf2Kh.jpg">';

	echo '<div class="image-gallery-info-overlay">';

	echo '<a href="#"><span>Fotos de Antonio</span></a>';

    echo '</div>';

    echo '</div>';
	
    echo '</div>';
    echo '</div>';
    echo '</div>';

	

	echo '</div>';

	



	echo '</div>';

	echo '<div id="myModal" class="v-i-modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="v-i-modal-content">

    <div class="mySlides">
      <div class="numbertext">1 / 4</div>
      <img src="https://i.imgur.com/Wetf2Kh.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 4</div>
      <img src="https://i.imgur.com/Wetf2Kh.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 4</div>
      <img src="https://i.imgur.com/Wetf2Kh.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 4</div>
      <img src="https://i.imgur.com/Wetf2Kh.jpg" style="width:100%">
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>

    <div class="v-i-modal-colunm">
      <img class="demo" src="https://i.imgur.com/Wetf2Kh.jpg" onclick="currentSlide(1)" alt="Nature">
    </div>

    <div class="v-i-modal-colunm">
      <img class="demo" src="https://i.imgur.com/Wetf2Kh.jpg" onclick="currentSlide(2)" alt="Trolltunga">
    </div>

    <div class="v-i-modal-colunm">
      <img class="demo" src="https://i.imgur.com/Wetf2Kh.jpg" onclick="currentSlide(3)" alt="Mountains">
    </div>

    <div class="v-i-modal-colunm">
      <img class="demo" src="https://i.imgur.com/Wetf2Kh.jpg" onclick="currentSlide(4)" alt="Lights">
    </div>
  </div>
</div>
';

}

function reflesh_aj_page_user_view_interface_content_html($logged_user, $user) {

	$html = '';

	$html .=  '<div id="left" class="col-xs-6 col-sm-2">';

	$html .= create_user_info_content_html($user);

	$html .=  '</div>';
	$html .=  '<div id="center" class="col-xs-6 col-sm-7">';

	$html .= create_feed_content_html($user);

	$html .=  '</div>';
	$html .=  '<div id="right" class="col-xs-6 col-sm-3 content-fixed">';

	$html .=  '</div>';

	return $html;

}

function create_page_more_divisor() {

	echo '<div class="m-content-divisor">';

	echo '</div>';

}

function create_user_page($view_user) {

	$usr = new User($view_user);

	create_top_page($usr->get_long_username(), WEB_SITE_ICON, WEB_SITE_DESCRIPTION);

	create_body_content();
	insert_imports_css();

	create_top_menu_content_b(new User($_SESSION['user_id']));
	create_user_top_content($view_user);
	create_user_view_menu_bar($view_user);

	create_page_user_view_interface_content($_SESSION['user_id'], $view_user);
	
	insert_imports_js();
	close_body_content();
	create_end_page();

}

function create_search_page($query) {

	create_top_page($query, WEB_SITE_ICON, WEB_SITE_DESCRIPTION);

	create_body_content();
	insert_imports_css();

	insert_search_content_page($query, new User($_SESSION['user_id']));
	
	insert_imports_js();
	close_body_content();
	create_end_page();

}

function insert_search_content_page($query, $user) {

	echo '<div class="container-fluid" style="height: 100%;background-color: #fff;">';
	echo '<div class="row" style="height: 100%;">';

	echo '<div id="left" class="col-xs-6 col-sm-2" style="padding-top: 5px; padding-bottom: 5px;">';

	draw_search_options();
	
	echo '</div>';
	echo '<div id="center" class="col-xs-6 col-sm-7" style="padding-top: 5px;">';

	draw_search_contend($query);

	echo '</div>';
	echo '<div id="right" class="col-xs-6 col-sm-3 content-fixed">';

	create_top_menu_content_b($user);

	

	echo '</div>';
	
	echo '</div>';
	echo '</div>';
	
}

function draw_search_contend($query) {
	
	echo '<div class="search-data-contend">';
	echo '<div class="contend">';
	echo '<div class="top-content-search">';
	
	create_search_top_bar($query);

	echo '</div>';	
	echo '</div>';

	echo '<div class="search-results-contend">';

	search_query($query);

	echo '</div>';
	echo '</div>';
	
}

?>