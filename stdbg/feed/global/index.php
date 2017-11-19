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

    <link rel="stylesheet" href="/stresources/assets/tether/tether.min.css" />
    <link rel="stylesheet" href="/stresources/assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/stresources/assets/bootstrap/css/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="/stresources/assets/bootstrap/css/bootstrap-reboot.min.css" />
    <!--<link rel="stylesheet" href="/stresources/assets/animate.css/animate.min.css" />-->
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
                                    <li class="tt-socialtec-userex-button">Configura��es</li>
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

    <div class="container">
        <div class="row">

            <div class="col-xs-6 col-sm-2" style="padding-left: 0;">
                <nav>
                    <ul>
                        <li>
                            <a href='#profile'>
                                <div class='fa fa-user'></div>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href='#message'>
                                <div class='fa fa-envelope'></div>
                                Messages
        <span class='badge right'>12</span>
                            </a>
                        </li>
                        <li class='sub-menu'>
                            <a href='#settings'>
                                <div class='fa fa-gear'></div>
                                Settings
        <div class='fa fa-caret-down right'></div>
                            </a>
                            <ul>
                                <li>
                                    <a href='#settings'>Account
                                    </a>
                                </li>
                                <li>
                                    <a href='#settings'>Profile
                                    </a>
                                </li>
                                <li>
                                    <a href='#settings'>Secruity &amp; Privacy
                                    </a>
                                </li>
                                <li>
                                    <a href='#settings'>Password
                                    </a>
                                </li>
                                <li>
                                    <a href='#settings'>Notification
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class='sub-menu'>
                            <a href='#message'>
                                <div class='fa fa-question-circle'></div>
                                Help
        <div class='fa fa-caret-down right'></div>
                            </a>
                            <ul>
                                <li>
                                    <a href='#settings'>FAQ's
                                    </a>
                                </li>
                                <li>
                                    <a href='#settings'>Submit a Ticket
                                    </a>
                                </li>
                                <li>
                                    <a href='#settings'>Network Status
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a id="teste">
                                <div class='fa fa-sign-out'></div>
                                Logout
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>



            <div class="col-xs-6 col-sm-7" style="margin-top: 10px;">
                <div class="news-feed-contend news-feed-user-vw-contend" style="top: 0px;">


                    <div class="feed-post-content">
                        <div class="post-contend">
                            <div class="post-top">
                                <div class="user-contend">
                                    <div class="picture">
                                        <img src="<?php echo $user->get_picture(); ?>" />
                                    </div>
                                    <!--picture-->
                                    <div class="name">
                                        <span><?php echo $user->get_long_username(); ?></span>
                                    </div>
                                    <!--picture-->
                                </div>
                                <!--user-contend-->
                            </div>
                            <!--post-top-->

                            <div class="separator-content">
                                <div class="separator"></div>
                            </div>

                            <div class="post-center">
                                <div class="post-text-contend">
                                    <span>Lorem ipsum vehicula pulvinar volutpat vehicula eget class primis, leo metus urna odio vulputate donec magna odio curabitur, etiam nunc imperdiet hac torquent donec neque. tellus orci netus ornare aliquam dictum risus proin, nullam cras conubia ipsum pulvinar nulla, ut scelerisque venenatis augue eros bibendum. congue aenean elementum magna nibh torquent tempus, ac ad imperdiet conubia scelerisque adipiscing augue, ullamcorper potenti orci duis suscipit. ante iaculis elementum sem odio luctus posuere, inceptos at iaculis elit mauris facilisis, quam sem mattis donec sodales. lorem orci commodo laoreet enim ligula leo porttitor, adipiscing pharetra morbi iaculis porta aptent enim habitant, eleifend netus mauris luctus quis tempus. </span>
                                </div>

                                <div class="separator-content"></div>

                                <div class="post-picture-contend">
                                    <div class="post-picture-info-bottom-bar">
                                        <div class="post-picture-info-bottom-bar-title">
                                            <span>Teste</span>
                                        </div>
                                    </div>
                                    <img src="https://demo.oxwall.com/ow_userfiles/plugins/photo/photo_96_57c949d887563.jpg" />
                                </div>
                                <!--post-picture-contend-->

                                <div class="post-info">
                                    <div class="likes">
                                        <div class="likes-contend" style="display: inline-block;">
                                            <div class="efxs-pointer" style="line-height: 15px; top: 50%;">
                                                <span id="s-likes" data-balloon="Nenhuma curtida" data-balloon-pos="down">Curtir</span>
                                            </div>
                                        </div>
                                    </div>

                                    <span style="font-size: 30px; color: #828282;">. </span>

                                    <div class="comments">
                                        <div class="comments-contend" style="display: inline-block;">
                                            <div class="efxs-pointer" style="line-height: 15px; top: 50%;">
                                                <span id="s-comments" data-balloon="Nenhum coemtário" data-balloon-pos="down">Comentar</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--post-info-->
                            </div>
                            <!--post-center-->

                            <div class="post-bottom">

                                <div class="post-actions-info">
                                    <div class="post-actions-info-content">
                                        <div class="content-info">
                                            <span class="small-icon like active"></span>
                                            <span>&nbsp;<span class="user-rel">Você</span>,
									&nbsp;<span class="user-rel">Pedro Lima</span>,
									&nbsp;<span class="user-rel">Ricardo Azzevedo</span>
                                                &nbsp;e mais
										&nbsp;<span class="user-rel">300 pessoas</span>
                                                &nbsp;curtiram isso.
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="new-post-comment">

                                    <div class="user-new-comment-picture">
                                        <div class="content">
                                            <img src="https://scontent.fsod1-1.fna.fbcdn.net/v/t1.0-1/p160x160/20882083_864503297039438_6282003365892983060_n.jpg?oh=0064fbbf08f95580bb823ef016f3a7c8&oe=5A179CB9" alt="">
                                        </div>
                                    </div>

                                    <div class="new-comment-contend">
                                        <textarea class="new-comment-input" placeholder="Comente" name="response-comment" name="" id="" cols="" rows="1"></textarea>
                                    </div>

                                </div>
                                <!--new-post-comment-->

                            </div>
                            <!--post-bottom-->


                        </div>
                        <!--post-contend-->
                    </div>
                    <!--feed-post-content-->

                    <!--WAIT-LOADING-POST-MESSAGE-->
                    <!--<div class="feed-post-content">
						<div class="post-content">
							<div class="post-loading-message">
								<div class="dots-container" id="dots-container">
									<div class="dot"></div>
									<div class="dot"></div>
									<div class="dot"></div>
								</div>
							</div>
						</div>
					</div>-->
                    <!--WAIT-LOADING-POST-MESSAGE-->

                </div>
                <!--News-Feed-Contend-->

            </div>
            <div class="col-xs-6 col-sm-3" style="margin-top: 10px;position: fixed;right: 0;">
                <!--right-panel-->

                <div class="this-day">
                    <div class="dd-content">
                        <div class="picture">
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPGc+Cgk8ZWxsaXBzZSBzdHlsZT0iZmlsbDojRjREQkMzOyIgY3g9IjE1NC4xNTQiIGN5PSIyNjYuNTMzIiByeD0iMzUuMjkyIiByeT0iMzUuMTcxIi8+Cgk8ZWxsaXBzZSBzdHlsZT0iZmlsbDojRjREQkMzOyIgY3g9IjM1Ny44NDYiIGN5PSIyNjYuNTMzIiByeD0iMzUuMjkyIiByeT0iMzUuMTcxIi8+CjwvZz4KPHBhdGggc3R5bGU9ImZpbGw6IzgwODA4MDsiIGQ9Ik03Ni40NjgsNTEyYy02LjYxLDAtMTEuOTY5LTUuMzM5LTExLjk2OS0xMS45Mjh2LTQxLjc0OWMwLTM4LjE0NywzMS4xNDEtNjkuMTgzLDY5LjQyLTY5LjE4MyAgaDI0NC4xNjNjMzguMjc5LDAsNjkuNDIsMzEuMDM0LDY5LjQyLDY5LjE4M3Y0MS43NDhjMCw2LjU4OC01LjM1OSwxMS45MjgtMTEuOTY5LDExLjkyOEg3Ni40NjhWNTEyeiIvPgo8cGF0aCBzdHlsZT0ib3BhY2l0eTowLjE7ZW5hYmxlLWJhY2tncm91bmQ6bmV3ICAgIDsiIGQ9Ik0xMDkuNDA2LDUwMC4wNzJ2LTQxLjc0OWMwLTM4LjE0NywzMS4xNDEtNjkuMTgzLDY5LjQyLTY5LjE4M2gtNDQuOTA4ICBjLTM4LjI3OSwwLTY5LjQyLDMxLjAzNC02OS40Miw2OS4xODN2NDEuNzQ4YzAsNi41ODgsNS4zNTksMTEuOTI4LDExLjk2OSwxMS45MjhoNDQuOTA4ICBDMTE0Ljc2NSw1MTIsMTA5LjQwNiw1MDYuNjYxLDEwOS40MDYsNTAwLjA3MnoiLz4KPGc+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNFRjY0NUU7IiBjeD0iMjU2IiBjeT0iNDUxLjEwMyIgcj0iMTMuNDczIi8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRUY2NDVFOyIgZD0iTTI2OS40NzQsNTAzLjkxNmMwLTcuNDQyLTYuMDMyLTEzLjQ3NC0xMy40NzQtMTMuNDc0cy0xMy40NzQsNi4wMzItMTMuNDc0LDEzLjQ3NCAgIGMwLDMuMDM4LDEuMDE4LDUuODMxLDIuNzEzLDguMDg0aDIxLjUyMkMyNjguNDU2LDUwOS43NDYsMjY5LjQ3NCw1MDYuOTUzLDI2OS40NzQsNTAzLjkxNnoiLz4KPC9nPgo8cGF0aCBzdHlsZT0iZmlsbDojNjY2NjY2OyIgZD0iTTMwMS44MSw1MTJ2LTg1LjY5M2MwLTQuNDY0LTMuNjItOC4wODQtOC4wODQtOC4wODRjLTQuNDY1LDAtOC4wODQsMy42Mi04LjA4NCw4LjA4NFY1MTJIMzAxLjgxeiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRUY2NDVFOyIgZD0iTTM0OC45NDMsMzcyLjY5NGMwLDEzLjgzNC0xMS4yNTQsMjUuMDQ5LTI1LjEzNiwyNS4wNDlIMTg4LjE5MyAgYy0xMy44ODMsMC0yNS4xMzYtMTEuMjE1LTI1LjEzNi0yNS4wNDlsMCwwYzAtMTMuODM0LDExLjI1NS0yNS4wNSwyNS4xMzYtMjUuMDVoMTM1LjYxMyAgQzMzNy42ODksMzQ3LjY0NCwzNDguOTQzLDM1OC44NiwzNDguOTQzLDM3Mi42OTRMMzQ4Ljk0MywzNzIuNjk0eiIvPgo8cGF0aCBzdHlsZT0ib3BhY2l0eTowLjE7ZW5hYmxlLWJhY2tncm91bmQ6bmV3ICAgIDsiIGQ9Ik0xODUuNDUsMzcyLjY5NGMwLTEzLjgzNCwxMS4yNTQtMjUuMDUsMjUuMTM2LTI1LjA1aC0yMi4zOTIgIGMtMTMuODgzLDAtMjUuMTM2LDExLjIxNS0yNS4xMzYsMjUuMDVjMCwxMy44MzQsMTEuMjU1LDI1LjA0OSwyNS4xMzYsMjUuMDQ5aDIyLjM5MkMxOTYuNzAzLDM5Ny43NDQsMTg1LjQ1LDM4Ni41MjgsMTg1LjQ1LDM3Mi42OTQgIHoiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDg0RTRFOyIgZD0iTTMwMy44MTIsMzg5Ljk2YzE2Ljc1MSwxNi42OTIsMjMuOTMsMzYuNjAzLDE2LjAzNyw0NC40N2MtNy44OTUsNy44NjYtMjcuODczLDAuNzEzLTQ0LjYyMy0xNS45ODIgICBjLTE2Ljc1LTE2LjY5NC0yMy45My0zNi42MDMtMTYuMDM3LTQ0LjQ3MUMyNjcuMDg0LDM2Ni4xMSwyODcuMDYzLDM3My4yNjcsMzAzLjgxMiwzODkuOTZ6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDg0RTRFOyIgZD0iTTIzNi43NzQsNDE4LjQ0OGMtMTYuNzUxLDE2LjY5NC0zNi43MjgsMjMuODQ4LTQ0LjYyMywxNS45ODIgICBjLTcuODk0LTcuODY3LTAuNzE1LTI3Ljc3NywxNi4wMzYtNDQuNDdjMTYuNzUxLTE2LjY5NCwzNi43MjgtMjMuODUsNDQuNjIzLTE1Ljk4MyAgIEMyNjAuNzA0LDM4MS44NDUsMjUzLjUyNCw0MDEuNzU0LDIzNi43NzQsNDE4LjQ0OHoiLz4KPC9nPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNCQTNDM0M7IiBkPSJNMjg4LjQ3Myw0MTEuMjQ1Yy0yLjA2NSwwLTQuMTI4LTAuNzg2LTUuNzA2LTIuMzU4bC0yOS4yODQtMjkuMTgzICAgYy0zLjE2My0zLjE1MS0zLjE3MS04LjI3LTAuMDItMTEuNDMyYzMuMTUyLTMuMTY0LDguMjctMy4xNzEsMTEuNDMyLTAuMDJsMjkuMjg0LDI5LjE4M2MzLjE2MywzLjE1MSwzLjE3MSw4LjI3LDAuMDIsMTEuNDMyICAgQzI5Mi42MjEsNDEwLjQ1MiwyOTAuNTQ3LDQxMS4yNDUsMjg4LjQ3Myw0MTEuMjQ1eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0JBM0MzQzsiIGQ9Ik0yMjMuNTI3LDQxMS4yNDVjLTIuMDc0LDAtNC4xNDctMC43OTMtNS43MjYtMi4zNzhjLTMuMTUxLTMuMTYyLTMuMTQzLTguMjgxLDAuMDItMTEuNDMyICAgbDI5LjI4My0yOS4xODNjMy4xNjEtMy4xNTEsOC4yOC0zLjE0NCwxMS40MzIsMC4wMmMzLjE1MSwzLjE2MiwzLjE0Myw4LjI4MS0wLjAyLDExLjQzMmwtMjkuMjgzLDI5LjE4MyAgIEMyMjcuNjU1LDQxMC40NTksMjI1LjU5LDQxMS4yNDUsMjIzLjUyNyw0MTEuMjQ1eiIvPgo8L2c+CjxwYXRoIHN0eWxlPSJmaWxsOiNGRkU3Q0M7IiBkPSJNMzY5Ljk4NiwyNzcuMjkzYzAsNTQuNjk0LTU2Ljc2Niw5OS4wMzMtMTExLjY0Nyw5OS4wMzNoLTQuNjc3ICBjLTU0Ljg4MSwwLTExMS42NDctNDQuMzM5LTExMS42NDctOTkuMDMzdi02Ny41NzZjMC01NC42OTQsNDQuNDktOTkuMDMyLDk5LjM3Mi05OS4wMzJoMjkuMjI4ICBjNTQuODgyLDAsOTkuMzcyLDQ0LjMzOCw5OS4zNzIsOTkuMDMyVjI3Ny4yOTN6Ii8+CjxwYXRoIHN0eWxlPSJvcGFjaXR5OjAuMTtlbmFibGUtYmFja2dyb3VuZDpuZXcgICAgOyIgZD0iTTE2NC4zNzksMjc3LjI5M3YtNjcuNTc2YzAtNTQuNjk0LDQ0LjQ5LTk5LjAzMiw5OS4zNzItOTkuMDMyaC0yMi4zNjUgIGMtNTQuODgyLDAtOTkuMzcyLDQ0LjMzOC05OS4zNzIsOTkuMDMydjY3LjU3NmMwLDU0LjY5NCw1Ni43NjYsOTkuMDMzLDExMS42NDcsOTkuMDMzaDQuNjc3YzIuOTIzLDAsNS44NDktMC4xNDMsOC43NzQtMC4zOTIgIEMyMTUuMTcsMzcxLjQ5LDE2NC4zNzksMzI5LjAyOSwxNjQuMzc5LDI3Ny4yOTN6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNBRjg2NUQ7IiBkPSJNMzY5Ljk4NiwyNTEuMTV2LTQxLjQzMmMwLTU0LjY5NC00NC40OS05OS4wMzItOTkuMzcyLTk5LjAzMmgtMTAuODM4djQxLjQzMiAgYzAsNTQuNjk0LDQ0LjQ5LDk5LjAzMiw5OS4zNzIsOTkuMDMySDM2OS45ODZ6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNDNjlDNkQ7IiBkPSJNMzIzLjkwNywxNTIuMTE3VjEyNi4xMmMtMTUuNDAxLTkuNzcyLTMzLjY4My0xNS40MzUtNTMuMjkzLTE1LjQzNWgtMjkuMjI4ICBjLTU0Ljg4MiwwLTk5LjM3Miw0NC4zMzgtOTkuMzcyLDk5LjAzMnYyNS45OTdjMTUuNDAxLDkuNzcyLDMzLjY4MywxNS40MzUsNTMuMjk0LDE1LjQzNWgyOS4yMjcgIEMyNzkuNDE3LDI1MS4xNSwzMjMuOTA3LDIwNi44MTEsMzIzLjkwNywxNTIuMTE3eiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiM1MzQ3NDE7IiBkPSJNMjA4LjA2NywzMDEuMTY5Yy00LjQ2NSwwLTguMDg0LTMuNjItOC4wODQtOC4wODR2LTEwLjY3N2MwLTQuNDY0LDMuNjItOC4wODQsOC4wODQtOC4wODQgICBzOC4wODQsMy42Miw4LjA4NCw4LjA4NHYxMC42NzdDMjE2LjE1MiwyOTcuNTUsMjEyLjUzMiwzMDEuMTY5LDIwOC4wNjcsMzAxLjE2OXoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiM1MzQ3NDE7IiBkPSJNMzAzLjkzMywzMDEuMTY5Yy00LjQ2NSwwLTguMDg0LTMuNjItOC4wODQtOC4wODR2LTEwLjY3N2MwLTQuNDY0LDMuNjItOC4wODQsOC4wODQtOC4wODQgICBjNC40NjUsMCw4LjA4NCwzLjYyLDguMDg0LDguMDg0djEwLjY3N0MzMTIuMDE3LDI5Ny41NSwzMDguMzk3LDMwMS4xNjksMzAzLjkzMywzMDEuMTY5eiIvPgo8L2c+CjxwYXRoIHN0eWxlPSJmaWxsOiNDNEE0ODY7IiBkPSJNMjU2LjAwMSwzNDAuMDI4QzI1NiwzNDAuMDI4LDI1Ni4wMDEsMzQwLjAyOCwyNTYuMDAxLDM0MC4wMjhjLTkuMTcyLDAtMTcuNzk2LTMuNTcxLTI0LjI4MS0xMC4wNTcgIGMtMy4xNTctMy4xNTctMy4xNTctOC4yNzYsMC0xMS40MzJjMy4xNTctMy4xNTcsOC4yNzYtMy4xNTcsMTEuNDMyLDBjMy40MzIsMy40MzEsNy45OTUsNS4zMjIsMTIuODQ4LDUuMzIyICBzOS40MTYtMS44OSwxMi44NDgtNS4zMjJjMy4xNTctMy4xNTcsOC4yNzYtMy4xNTgsMTEuNDMyLDBjMy4xNTcsMy4xNTgsMy4xNTcsOC4yNzYsMCwxMS40MzIgIEMyNzMuNzk2LDMzNi40NTUsMjY1LjE3MiwzNDAuMDI4LDI1Ni4wMDEsMzQwLjAyOHoiLz4KPHBhdGggc3R5bGU9ImZpbGw6IzgwODA4MDsiIGQ9Ik00MDQuNDc0LDc1LjczMWMwLTI1LjA5NS0yMC40MTMtNDUuNDM4LTQ1LjU5NC00NS40MzhjLTYuMzM1LDAtMTIuMzY4LDEuMjg5LTE3Ljg1MSwzLjYxNyAgQzMzNS45MDgsMTQuMzk5LDMxOC4xMDEsMCwyOTYuOTE4LDBjLTE3LjUwMSwwLTMyLjY5MSw5LjgzMi00MC4zMzQsMjQuMjUxQzI0OC45NDMsOS44MzIsMjMzLjc1MiwwLDIxNi4yNTEsMCAgYy0yMS4zNTQsMC0zOS4yNzIsMTQuNjMzLTQ0LjIyOCwzNC4zODNjLTUuNzYxLTIuNjItMTIuMTU2LTQuMDkxLTE4LjkwMi00LjA5MWMtMjUuMTgxLDAtNDUuNTk0LDIwLjM0My00NS41OTQsNDUuNDM4ICBjMCwyMS4yNzcsMTQuNjc2LDM5LjEzMSwzNC40ODgsNDQuMDc1djkxLjU0NWgyMjcuOTcydi05MS41NDVDMzg5Ljc5OCwxMTQuODYyLDQwNC40NzQsOTcuMDA4LDQwNC40NzQsNzUuNzMxeiIvPgo8cGF0aCBzdHlsZT0ib3BhY2l0eTowLjE7ZW5hYmxlLWJhY2tncm91bmQ6bmV3ICAgIDsiIGQ9Ik0xNDEuMjE2LDc1LjczMWMwLTE5LjE2MSwxMS45MDgtMzUuNTQxLDI4Ljc0Ni00Mi4yMiAgYy01LjIxMi0yLjA3LTEwLjg5LTMuMjE4LTE2Ljg0Mi0zLjIxOGMtMjUuMTgxLDAtNDUuNTk0LDIwLjM0My00NS41OTQsNDUuNDM4YzAsMjEuMjc3LDE0LjY3NiwzOS4xMzEsMzQuNDg4LDQ0LjA3NXY5MS41NDVoMzMuNjkgIHYtOTEuNTQ1QzE1NS44OTEsMTE0Ljg2MiwxNDEuMjE2LDk3LjAwOCwxNDEuMjE2LDc1LjczMXoiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojOTk5OTk5OyIgZD0iTTIxMC43MjksMTk4LjMzM2MtNC40NjUsMC04LjA4NC0zLjYyLTguMDg0LTguMDg0di0zMy43MjFjMC00LjQ2NSwzLjYyLTguMDg0LDguMDg0LTguMDg0ICAgczguMDg0LDMuNjIsOC4wODQsOC4wODR2MzMuNzIxQzIxOC44MTMsMTk0LjcxNCwyMTUuMTk0LDE5OC4zMzMsMjEwLjcyOSwxOTguMzMzeiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6Izk5OTk5OTsiIGQ9Ik0yNTYsMTk4LjMzM2MtNC40NjUsMC04LjA4NC0zLjYyLTguMDg0LTguMDg0di0zMy43MjFjMC00LjQ2NSwzLjYyLTguMDg0LDguMDg0LTguMDg0ICAgYzQuNDY1LDAsOC4wODQsMy42Miw4LjA4NCw4LjA4NHYzMy43MjFDMjY0LjA4NCwxOTQuNzE0LDI2MC40NjUsMTk4LjMzMywyNTYsMTk4LjMzM3oiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiM5OTk5OTk7IiBkPSJNMzAxLjI3MSwxOTguMzMzYy00LjQ2NSwwLTguMDg0LTMuNjItOC4wODQtOC4wODR2LTMzLjcyMWMwLTQuNDY1LDMuNjItOC4wODQsOC4wODQtOC4wODQgICBjNC40NjUsMCw4LjA4NCwzLjYyLDguMDg0LDguMDg0djMzLjcyMUMzMDkuMzU2LDE5NC43MTQsMzA1LjczNiwxOTguMzMzLDMwMS4yNzEsMTk4LjMzM3oiLz4KPC9nPgo8cmVjdCB4PSIxNDIuMDEyIiB5PSIxODIuMTY3IiBzdHlsZT0iZmlsbDojRUY2NDVFOyIgd2lkdGg9IjIyNy45NzYiIGhlaWdodD0iMjkuMTg2Ii8+CjxyZWN0IHg9IjE0Mi4wMTIiIHk9IjE4Mi4xNjciIHN0eWxlPSJvcGFjaXR5OjAuMTtlbmFibGUtYmFja2dyb3VuZDpuZXcgICAgOyIgd2lkdGg9IjMzLjY4OCIgaGVpZ2h0PSIyOS4xODYiLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />
                        </div>
                        <div class="info">
                            <span>Hoje será Arroz com Almondega. Bom Apetit!</span>
                        </div>
                    </div>
                </div>

                <?php draw_events_container(); ?>

                <!--<div class="separator-content"><div class="separator"></div></div>-->

            </div>
            <!--right-panel-->

        </div>
    </div>
    <!--container-->

	<?php insert_fork_me_on_github() ?>

    <div class="modal" id="add-new-event-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="new-event-modal-content">


                <!--<div class="processing-info-dots-panel">
                    <div class="content">
                        <div class="dots-container" id="processing-event-dots-container">
							<div class="dot"></div>
							<div class="dot"></div>
							<div class="dot"></div>
						</div>
                    </div>
                </div>-->

                <div class="new-event-top-title">
                    <div class="content">
                        <div class="col-3">
                            <div class="title">
                                <i class="icon-dribbble-3"></i>
                                <span>Novo Evento</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-container">
                    <div class="content">
                        <div class="event-settings">
                            <div class="event-picture">
                                <div class="content">
                                    <div class="event-image">
                                        <div class="event-image-insert-button">
                                            <div class="button">
                                                <span>Trocar Imagem</span>
                                            </div>
                                        </div>
                                        <img src="https://i.imgur.com/WpnFhs2.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="event-settings">
                                <div class="content">
                                    <div class="event-name">
                                        <div class="content">
                                            <div class="col-sm-4">
                                                <div class="title">
                                                    <span>Nome do Evento</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input">
                                                    <input type="text" name="input-event-name" id="input-event-name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="event-info">
                                        <div class="content">
                                            <div class="col-sm-4">
                                                <div class="title">
                                                    <span>Nós diga sobre o evento</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input">
                                                    <textarea name="input-event-info" id="input-event-info" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="event-date">
                                        <div class="content">
                                            <div class="col-sm-4">
                                                <div class="title">
                                                    <span>Data</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input">
                                                    <input type="date" name="input-event-date" id="input-event-date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="event-start-time">
                                        <div class="content">
                                            <div class="col-sm-4">
                                                <div class="title">
                                                    <span>Início</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input">
                                                    <input type="time" name="input-event-start-time" id="input-event-start-time">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="event-end-time">
                                        <div class="content">
                                            <div class="col-sm-4">
                                                <div class="title">
                                                    <span>Fim</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input">
                                                    <input type="time" name="input-event-end-time" id="input-event-end-time">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="event-shift">
                                        <div class="content">
                                            <div class="col-sm-4">
                                                <div class="title">
                                                    <span>Turno</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input">
                                                    <select name="input-event-shift" id="input-event-shift">
                                                        <option value="0">Manhã</option>
                                                        <option value="1">Tarde</option>
                                                        <option value="2">Noite</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="event-local">
                                        <div class="content">
                                            <div class="col-sm-4">
                                                <div class="title">
                                                    <span>Local</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input">
                                                    <input type="text" name="input-event-local" id="input-event-local">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="bottom-buttons">
                            <div class="content">
                                <div class="buttons-content">
                                    <div class="button" id="create-event-button">
                                        <span>Criar Evento</span>
                                    </div>
                                    <div class="ex-button" id="exit-event-button">
                                        <span>Sair</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
    <script src="/stresources/assets/cards/js/script.js"></script>
    <script src="/stresources/assets/dinamics/js/script.js"></script>
    <script src="/stresources/assets/feed/ajax.js"></script>
    <script src="/stresources/assets/events/ajax/ajax.js"></script>
	<script src="/stresources/assets/menu/menu.js"></script>
	<script src="/stresources/assets/events/js/script.js"></script>

    <script>
    	$('.sub-menu ul').hide();
    	$(".sub-menu a").click(function () {
    		$(this).parent(".sub-menu").children("ul").slideToggle("100");
    		$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
    	});
    </script>

    <script language="Javascript">
    	var dots = document.querySelectorAll('.dot')
    	var colors = ['#ffffff', '#ffffff', '#ffffff']
    	function animateDots() {
    		for (var i = 0; i < dots.length; i++) {
    			dynamics.animate(dots[i], {
    				translateY: -20,
    				backgroundColor: colors[i]
    			}, {
    				type: dynamics.forceWithGravity,
    				bounciness: 800,
    				elasticity: 200,
    				duration: 2000,
    				delay: i * 450
    			})
    		}

    		dynamics.setTimeout(animateDots, 2500)
    	}
    	//animateDots();
    </script>

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
