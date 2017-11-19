<?php

define("HELP_ME_MESSAGE", "TRUE", TRUE);

define("WEB_SITE_NAME", "CircleTec", TRUE);
define("WEB_SITE_DESCRIPTION", "CircleTec a rede social que conecta alunos.", TRUE);
define("WEB_SITE_ICON", "favicon.jpg", TRUE);

define("__URL_ROOT__", $_SERVER['HTTP_HOST'], TRUE);
define("__ROOT__", $_SERVER['DOCUMENT_ROOT'] . '\\', TRUE);

define("_CORE_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/core/', TRUE);
define("_USER_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/user/', TRUE);
define("_CONFIG_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/config/', TRUE);
define("_ASSETS_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/assets/', TRUE);
define("_UTILS_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/utils/', TRUE);
define("_LOGIN_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/login/', TRUE);
define("_REGISTER_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/register/', TRUE);
define("_FEED_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/feed/', TRUE);
define("_FEED_CORE_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/feed/core/', TRUE);
define("_GLOBAL_FEED_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/feed/global/', TRUE);
define("_USER_FEED_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/feed/user/', TRUE);
define("_HELP_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/help/', TRUE);
define("_HELP_ME_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/help/me/', TRUE);
define("_HELP_ME_GITHUB_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/help/me/github/', TRUE);
define("_EVENTS_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/events/', TRUE);
define("_COURSE_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/course/', TRUE);
define("_DAY_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/day/', TRUE);
define("_WEATHER_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/weather/', TRUE);
define("_MODULE_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/module/', TRUE);
define("_SEARCH_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/search/', TRUE);
define("_EMOJIONE_ROOT_", $_SERVER['DOCUMENT_ROOT'] . '/emojis/src/', TRUE);

define("_URL_CORE_ROOT_", __URL_ROOT__ . '/core/', TRUE);
define("_URL_USER_ROOT_", __URL_ROOT__ . '/user/', TRUE);
define("_URL_CONFIG_ROOT_", __URL_ROOT__ . '/config/', TRUE);
define("_URL_ASSETS_ROOT_", __URL_ROOT__ . '/assets/', TRUE);
define("_URL_UTILS_ROOT_", __URL_ROOT__ . '/utils/', TRUE);
define("_URL_LOGIN_ROOT_", __URL_ROOT__ . '/login/', TRUE);
define("_URL_REGISTER_ROOT_", __URL_ROOT__ . '/register/', TRUE);
define("_URL_FEED_ROOT_", __URL_ROOT__ . '/feed/', TRUE);
define("_URL_FEED_CORE_ROOT_", __URL_ROOT__ . '/feed/core/', TRUE);
define("_URL_GLOBAL_FEED_ROOT_", __URL_ROOT__ . '/feed/global/', TRUE);
define("_URL_USER_FEED_ROOT_", __URL_ROOT__ . '/feed/user/', TRUE);
define("_URL_HELP_ROOT_", __URL_ROOT__ . '/help/', TRUE);
define("_URL_HELP_ME_ROOT_", __URL_ROOT__ . '/help/me/', TRUE);
define("_URL_HELP_ME_GITHUB_ROOT_", __URL_ROOT__ . '/help/me/github/', TRUE);
define("_URL_EVENTS_ROOT_", __URL_ROOT__ . '/events/', TRUE);
define("_URL_COURSE_ROOT_", __URL_ROOT__ . '/course/', TRUE);

define("_URL_EMOJIONE_DATA_ROOT_", '/stresources/assets/emojis/data/', TRUE);

define("_ID_", "123456789", TRUE);
define("_ELEMENTS_", "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", TRUE);
define("_LOGIN_", "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", TRUE);
define("RESOURCES_SERVER", "http://127.0.0.1/stresources/assets/", TRUE);
define("SESSION_NAME", "7518bdc440022207d436ff1a0ed9e71cea21705ac38cf921969e646ef6addd7618c8da2f769c571a7602e3d4a7096684e87c36f4e6c30f28660e3d3a8f4177ef", TRUE);

define("PASS_DEFAULT_LENGTH", 128, TRUE);
define("CPS_MAIL_FORMAT", "etec.sp.gov.br", TRUE);

define("LOGGED_SUCCEFULL", "ZzlRabWd7Ku1TjPG5dpEpTLX0", TRUE);
define("USER_ACCOUNT_IS_BLOCKED", "2apakMU5kW3HTEtuJyF0CRxyT", TRUE);
define("USER_PASSWORD_UNKNOWN_FATAL_ERROR", "04EtAF8KDJBaA0mL7HYsPsn4X", TRUE);
define("USER_PASSWORD_INCORRECT", "Bi5GSTRqLAsa3Ceb8yHJtqxI8", TRUE);

define("SOCIALTEC_CONFIG_INI", __ROOT__ . 'config.ini', TRUE);

define("AJAX_SCRIPT_RECEIVED_SUCCESS", '1', TRUE);

define("POST_VISIBILITY_GLOBAL", 'public', TRUE);
define("POST_VISIBILITY_PRIVATE", 'private', TRUE);
define("POST_VISIBILITY_ROOM", 'room', TRUE);

define("IMGUR_OAUTH_CLIENT_ID", '56f5ed32fd71eb2', TRUE);
define("IMGUR_OAUTH_CLIENT_SECRET", 'af40b29fb1824d9c7ab0c137d975629f5b416140', TRUE);

define("POST_COMMENTS_VIEW_ALL", "0", TRUE);
define("POST_COMMENTS_VIEW_REVELANTS", "1", TRUE);
define("POST_COMMENTS_VIEW_LAST_UPLOADEDS", "2", TRUE);

/************************************SESSION*************************************/
/********************************************************************************/

session_start();

/**************************************LANG**************************************/
/********************************************************************************/

require_once _CORE_ROOT_ .	'language.php';
$_STRINGS = new Language();

/**************************************USER**************************************/
/********************************************************************************/

require_once _CORE_ROOT_ .	'user.php';

if(isset($_SESSION['user_id'])) {
	$_USER = new User($_SESSION['user_id']);
}

function to_feed_page() {

    header("Location: " . _GLOBAL_FEED_ROOT_);

}