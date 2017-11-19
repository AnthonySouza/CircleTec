<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

if(HELP_ME_MESSAGE) {
	require_once _HELP_ME_GITHUB_ROOT_ . 'forkme.php';
}

require_once _CORE_ROOT_ . 'page.php';
require_once _CORE_ROOT_ . 'login.php';
require_once _CORE_ROOT_ . 'register.php';
require_once _CORE_ROOT_ . 'functions.php';
require_once _CORE_ROOT_ . 'session.php';
require_once _CORE_ROOT_ . 'user.php';

require_once _EVENTS_ROOT_ . 'events.php';

if(!logged()) {
	header('Location: ' . _LOGIN_ROOT_);
} else {
	$user = get_logged_user_class();
	$curso = get_logged_user_course_class($user);
}

require '../post.php';
require '../feed.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.3.0, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/st-logo-128x68.png" type="image/x-icon">
    <meta name="description" content="Social Tec, Entre, conheça e faça novos amiguinhos.">
    <title>SocialTec</title>
</head>
<body>

    <link rel="stylesheet" href="/stresources/assets/tether/tether.min.css" />
    <link rel="stylesheet" href="/stresources/assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/stresources/assets/bootstrap/css/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="/stresources/assets/bootstrap/css/bootstrap-reboot.min.css" />
    <link rel="stylesheet" href="/stresources/assets/animate.css/animate.min.css" />
    <link rel="stylesheet" href="/stresources/assets/theme/css/style.css" />
    <link rel="stylesheet" href="/stresources/assets/mobirise/css/mbr-additional.css" type="text/css" />
    <link rel="stylesheet" href="/stresources/assets/socialtec/css/page.css" type="text/css" />
    <link rel="stylesheet" href="/stresources/assets/icons/css/fontello.css" type="text/css" />
    <link rel="stylesheet" href="/stresources/assets/normalize/normalize.min.css" type="text/css" />
    <link rel="stylesheet" href="/stresources/assets/balloon/balloon.min.css" type="text/css" />
    <link rel="stylesheet" href="/stresources/assets/socicon/css/styles.css" type="text/css" />

    <div class="top" style="display: flex; position: fixed;">
        

        <div class="col col-lg-2">

            <div class="web-site-name">
                <div class="title">
                    <span>SOCIALTEC</span>
                </div>
            </div>

        </div>

        <div class="col col-4">

            <div class="search-content">
                <div class="content">
                    <div class="search-icon">
                        <div class="top-menu-icon">
                            <!--<span class="top-icon icon-search"></span>-->
                            <i class="top-menu-icon icon-chat-empty on" style="left: -10px;"></i>
                        </div>
                    </div>
                    <div class="search-input">
                        <input data-toggle="dropdown" type="text" placeholder="Procurar" name="" id="">
                        <ul class="dropdown-menu tt-view-find-objects" aria-labelledby="dLabel">
                            <a href="#">
                                <div class="object-content">
                                    <div class="object-user-content">
                                        <div class="user">
                                            <div class="user-picture">
                                                <img src="<?php echo $user->get_picture(); ?>" alt="<?php echo $user->get_long_username(); ?>">
                                            </div>
                                            <div class="user-info">
                                                <div class="user-name">
                                                    <span><?php echo $user->get_long_username(); ?></span>
                                                </div>
                                                <div class="user-cur">
                                                    <span>Inform?tica</span>
                                                </div>
                                            </div>
                                            <div class="user-points">
                                                <div class="silver">
                                                    <span>30</span>
                                                </div>
                                                <div class="bronze">
                                                    <span>07</span>
                                                </div>
                                                <div class="gold">
                                                    <span>06</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="col col-3">
            <div class="function-icons-menu">
                <div class="icons-buttons-content">
                    <div class="button" id="user_local_notifications_button" data-trigger="click focus" rel="popover" data-content="" data-original-title="">
                        <div class="icon-content">
                            <a>
                                <i class="top-menu-icon icon-home off"></i>
                            </a>
                        </div>
                    </div>
                    <div class="button" id="user_local_messages_button" rel="popover" data-trigger="click focus" data-content="" data-original-title="">
                        <div class="icon-content">
                            <a>
                                <i class="top-menu-icon icon-chat-empty off"></i>
                            </a>
                        </div>
                    </div>
                    <div class="button" id="user_local_events_button" rel="popover" data-trigger="click focus" data-content="" data-original-title="">
                        <div class="icon-content">
                            <a>
                                <i class="top-menu-icon icon-flash off"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col col-3">
            <div class="user-function-menu">
                <div class="user-function-content">
                    <div class="user">
                        <div class="picture">
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <a href="#">
                                    <li class="tt-socialtec-userex-button">Configura??es</li>
                                </a>
                                <a href="#">
                                    <li class="tt-socialtec-userex-button">Sair</li>
                                </a>
                            </ul>
                            <img id="user_account_settings_button" rel="popover" data-content="" data-original-title="" src="<?php echo $user->get_picture(); ?>" alt="<?php echo $user->get_long_username(); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="user-top-data">
        <div class="user-background-picture">
            <div class="picture" id="jarallax-container-0">
                <img src="https://i.imgur.com/fLqFVgl.jpg" alt="">
            </div>
            <div class="alter-background-picture-button-contend">
                <div class="alter-bpb-button">
                    <i class="icon-params"></i>
                </div>
            </div>
        </div>
        <div class="user-top-info-contend">
            <div class="user-avatar-picture">
                <div class="user-picture-info-top-bar">
                    <div class="user-picture-info-bottom-bar-top">
                        <span class="tupeicon pen-edit-picture"></span>
                    </div>
                </div>
                <img src="https://scontent.fsod1-1.fna.fbcdn.net/v/t1.0-1/p160x160/20882083_864503297039438_6282003365892983060_n.jpg?oh=0064fbbf08f95580bb823ef016f3a7c8&oe=5A179CB9" alt="">
            </div>
            <div class="user-avatar-name">
                <span>Antonio Souza</span>
            </div>
            <div class="user-right-functions-buttons-contend">
                <div class="function-buttons">
                    <div class="function-option">
                        <div class="function-button">
                            <div class="function-button-contend">
                                <span><i class="_icon icon-pen"></i>Editar Perfil</span>
                            </div>
                        </div>
                    </div>
                    <div class="function-option">
                        <div class="function-button">
                            <div class="function-button-contend">
                                <span><i class="_icon icon-params"></i>Configurações</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="user-top-data-bottom-menu" id="top-menu-user">
        <div class="user-info-top-menu-user">
            <div class="content">
                <div class="user-picture">
                    <img src="https://scontent.fsod1-1.fna.fbcdn.net/v/t1.0-1/p160x160/20882083_864503297039438_6282003365892983060_n.jpg?oh=0064fbbf08f95580bb823ef016f3a7c8&oe=5A179CB9" alt="">
                </div>
                <div class="user-name">
                    <span>Antonio Souza</span>
                </div>
            </div>
        </div>
        <div class="menu">
            <div class="menu-option">
                <div class="menu-button">
                    <div class="menu-button-contend">
                        <span>Linha do Tempo</span>
                    </div>
                </div>
            </div>
            <div class="menu-option">
                <div class="menu-button">
                    <div class="menu-button-contend">
                        <span>Fotos</span>
                    </div>
                </div>
            </div>
            <div class="menu-option">
                <div class="menu-button">
                    <div class="menu-button-contend">
                        <span>Sobre</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-data-contend">
        <div class="col-xs-6 col-sm-3">
            <div class="left-content">
                <div class="user-left-info-contend">
                    <div class="user-motto">
                        <span>Live Today, Love Tomorrow, Unite Forever</span>
                        <div class="edt-motto-button-contend">
                            <div class="s-icon">
                                <span class="edit-icon"></span>
                            </div>
                        </div>
                    </div>
                    <div class="user-cur">
                        <span id="spn-cur-title"><i class="icon-star-circled"></i>Curso</span>
                        <span id="spn-cur-value">Informática</span>
						<div class="edit-item-button">
							<div class="button"><span><i class="icon-edit"></i></span></div>
						</div>
                    </div>
                    <div class="user-cur-module">
                        <span id="spn-cur-module-title"><i class="icon-dribbble-3"></i>Módulo</span>
                        <span id="spn-cur-module-value">3 Semestre</span>
						<div class="edit-item-button">
							<div class="button"><span><i class="icon-edit"></i></span></div>
						</div>
                    </div>
                    <div class="user-cur-per">
                        <span id="spn-cur-per-title"><i class="icon-cloud-sun-inv"></i>Periodo</span>
                        <span id="spn-cur-per-value">Noturno</span>
						<div class="edit-item-button">
							<div class="button"><span><i class="icon-edit"></i></span></div>
						</div>
                    </div>
                </div>

                <div class="user-left-info-contend">
                    <div class="user-motto">
                        <span>Eventos</span>
                        <div class="edt-motto-button-contend">
                            <div class="s-icon">
                                <span class="edit-icon"></span>
                            </div>
                        </div>
                    </div>
                    <div class="user-comp-event">
                        <span id="spn-comp-event"><i class="icon-star-3">Comparecerá em</i></span>
                        <span id="spn-comp-event-value">Infoday Etec</span>
                    </div>
                    <div class="user-comp-event">
                        <span id="spn-comp-event-title"><i class="icon-star-3">Comparecerá em</i></span>
                        <span id="spn-comp-event-value">Infoday Etec</span>
                    </div>
					<div class="user-comp-event">
                        <span id="spn-comp-event-title"><i class="icon-star-3">Comparecerá em</i></span>
                        <span id="spn-comp-event-value">Infoday Etec</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6">

            <?php

			create_feed_content();		

            ?>

        </div>

    <!--News-Feed-Contend-->
    </div>
    


	<script src="/stresources/assets/jquery/jquery.min.js"></script>
    <script src="/stresources/assets/popper/popper.min.js"></script>
    <script src="/stresources/assets/tether/tether.min.js"></script>
    <script src="/stresources/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/stresources/assets/smooth-scroll/smooth-scroll.js"></script>
    <script src="/stresources/assets/viewport-checker/jquery.viewportchecker.js"></script>
    <script src="/stresources/assets/theme/js/script.js"></script>
    <script src="/stresources/assets/criptography/cripto.js"></script>
    <script src="/stresources/assets/security/js/security.js"></script>
    <script src="/stresources/assets/jarallax/jarallax.min.js"></script>

    <script>

    	$(document)
		.one('focus.new-comment-input', 'textarea.new-comment-input', function () {
			var savedValue = this.value;
			this.value = '';
			this.baseScrollHeight = this.scrollHeight;
			this.value = savedValue;
		})
		.on('input.new-comment-input', 'textarea.new-comment-input', function () {
			var minRows = this.getAttribute('data-min-rows') | 0, rows;
			this.rows = minRows;
			rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 20);
			this.rows = minRows + rows;
		});

    	$('#9kd32').click(function () {
    		alert("Ativado");
    		if (!$('#9kd32 > .post-icon.like.active').length) {
    			alert("Ativado");
    		} else {
    			alert("Desativado");
    		}
    	});

    	$('#r93mnd2').click(function () {
    		$('#73bdn19').css('display', 'none');
    		$('#281ehns').css('display', 'none');
    		$('#8he9219').css('display', 'none');

    		$('#hfu43nd').removeClass('m-contend-button-p1-obj-hidden').addClass('m-contend-button-p1');
    		$('#r93mnd2').removeClass('m-contend-button-p1').addClass('m-contend-button-p1-obj-hidden');
    		$('#gd732jas').removeClass('m-contend-search-input-top-text-p1-obj-hidden').addClass('mobile-top-search-input');
    	});
    	$('#hfu43nd').click(function () {
    		$('#73bdn19').css('display', 'inline');
    		$('#281ehns').css('display', 'inline');
    		$('#8he9219').css('display', 'inline');

    		$('#hfu43nd').removeClass('m-contend-button-p1').addClass('m-contend-button-p1-obj-hidden');
    		$('#r93mnd2').removeClass('m-contend-button-p1-obj-hidden').addClass('m-contend-button-p1');
    		$('#gd732jas').removeClass('mobile-top-search-input').addClass('m-contend-search-input-top-text-p1-obj-hidden');
    	});

    	//VER MAIS//
    	$('#ej390e').click(function () {

    		$('#d82o2mw').removeClass('vw-contend-hidden');
    		$('#d82o2mw').slideDown('slow', function () {
    			$('#ej390e').css('display', 'none');
    		});
    	});

    	$(function () {
    		$('[data-toggle="tooltip"]').tooltip()
    	})

    	$('#he723hn').click(function () {
    		$('#hd893j').tooltip('show');
    	});

    	var offset = $('#top-menu-user').offset().top;
    	var menu = $('#top-menu-user');
    	var user_content_info = $('.user-info-top-menu-user');
    	$(document).on('scroll', function () {
    		if (offset <= $(window).scrollTop() + 50) {
    			menu.addClass('fixed');
    			user_content_info.css('display', 'flex');
    		} else {
    			menu.removeClass('fixed');
    			user_content_info.css('display', 'none');
    		}
    	});
    </script>
</body>
</html>
