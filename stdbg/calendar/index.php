<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

require_once _CORE_ROOT_ . 'page.php';
require_once _CORE_ROOT_ . 'login.php';
require_once _CORE_ROOT_ . 'register.php';
require_once _CORE_ROOT_ . 'functions.php';
require_once _CORE_ROOT_ . 'session.php';
require_once _CORE_ROOT_ . 'user.php';

$user = get_logged_user_class();
$curso = get_logged_user_course_class($user);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.3.0, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/st-logo-128x68.png" type="image/x-icon">
    <meta name="description" content="Social Tec, Entre, conhe?a e fa?a novos amiguinhos.">
    <title>SocialTec</title>
</head>
<body>

    <link rel="stylesheet" href="http://127.0.0.1/stresources/assets/tether/tether.min.css" />
    <link rel="stylesheet" href="http://127.0.0.1/stresources/assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="http://127.0.0.1/stresources/assets/bootstrap/css/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="http://127.0.0.1/stresources/assets/bootstrap/css/bootstrap-reboot.min.css" />
    <!--<link rel="stylesheet" href="http://127.0.0.1/stresources/assets/animate.css/animate.min.css" />-->
    <link rel="stylesheet" href="http://127.0.0.1/stresources/assets/theme/css/style.css" />
    <link rel="stylesheet" href="http://127.0.0.1/stresources/assets/mobirise/css/mbr-additional.css" type="text/css" />
    <link rel="stylesheet" href="http://127.0.0.1/stresources/assets/socialtec/css/page.css" type="text/css" />
    <link rel="stylesheet" href="http://127.0.0.1/stresources/assets/icons/css/fontello.css" type="text/css" />
    <link rel="stylesheet" href="http://127.0.0.1/stresources/assets/normalize/normalize.min.css" type="text/css" />
    <link rel="stylesheet" href="http://127.0.0.1/stresources/assets/balloon/balloon.min.css" type="text/css" />
    <link rel="stylesheet" href="http://127.0.0.1/stresources/assets/socicon/css/styles.css" type="text/css" />

    <div class="top" style="display: flex; position: fixed;">
        <div class="space"></div>
        <div class="web-site-name">
            <div class="title">
                <span>SOCIALTEC</span>
            </div>
        </div>
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
        <div class="function-icons-menu">
            <div class="icons-buttons-content">
                <div class="button">
                    <div class="icon-content">
                        <a href="">
                            <i class="top-menu-icon icon-home off"></i>
                        </a>
                    </div>
                </div>
                <div class="button">
                    <div class="icon-content">
                        <a href="">
                            <i class="top-menu-icon icon-chat-empty off"></i>
                        </a>
                    </div>
                </div>
                <div class="button">
                    <div class="icon-content">
                        <a href="">
                            <i class="top-menu-icon icon-flash off"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-function-menu">
            <div class="user-function-content">
                <div class="user">
                    <div class="picture">
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <a href="#">
                                <li class="tt-socialtec-userex-button">Configura��es</li>
                            </a>
                            <a href="#">
                                <li class="tt-socialtec-userex-button">Sair</li>
                            </a>
                        </ul>
                        <img data-toggle="dropdown" data-balloon="Antonio Souza" data-balloon-pos="down" src="<?php echo $user->get_picture(); ?>" alt="<?php echo $user->get_long_username(); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="calendar">
        <div class="calendar-top">

        </div>
        <div class="calendar-sem-buttons">
            <div class="button"><span>DOM</span></div>
            <div class="button"><span>SEG</span></div>
            <div class="button"><span>TER</span></div>
            <div class="button"><span>QUA</span></div>
            <div class="button"><span>QUI</span></div>
            <div class="button"><span>SEX</span></div>
            <div class="button"><span>SAB</span></div>
        </div>
        <div class="calendar-buttons">
            <div class="button"><span>1</span></div>
        </div>
    </div>

    <script src="http://127.0.0.1/stresources/assets/jquery/jquery.min.js"></script>
    <script src="http://127.0.0.1/stresources/assets/popper/popper.min.js"></script>
    <script src="http://127.0.0.1/stresources/assets/tether/tether.min.js"></script>
    <script src="http://127.0.0.1/stresources/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://127.0.0.1/stresources/assets/smooth-scroll/smooth-scroll.js"></script>
    <script src="http://127.0.0.1/stresources/assets/viewport-checker/jquery.viewportchecker.js"></script>
    <script src="http://127.0.0.1/stresources/assets/theme/js/script.js"></script>
    <script src="http://127.0.0.1/stresources/assets/criptography/cripto.js"></script>
    <script src="http://127.0.0.1/stresources/assets/security/js/security.js"></script>
    <script src="http://127.0.0.1/stresources/assets/jarallax/jarallax.min.js"></script>
    <script src="http://127.0.0.1/stresources/assets/cards/js/script.js"></script>
    <script src="http://127.0.0.1/stresources/assets/dinamics/js/script.js"></script>
    <script src="http://127.0.0.1/stresources/assets/feed/ajax.js"></script>

</body>
</html>