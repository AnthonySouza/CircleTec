<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';
require_once _CORE_ROOT_ . 'token.php';
require_once _CORE_ROOT_ . 'tokenauth.php';
require_once _CORE_ROOT_ . 'method.php';
require_once _CORE_ROOT_ . 'page.php';
require_once _CORE_ROOT_ . 'session.php';
require_once _CORE_ROOT_ . 'errors.php';

$token = Token::PageToken();
if( TokenAuth::set_token($token, PAGE_TOKEN)) {
	TokenAuth::use_token($token);
}

$_SESSION['login_security_token'] = $token;

@$error_code = $_GET['event'];
@$login = $_SESSION['user_email'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="generator" content="Mobirise v4.3.0, mobirise.com" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" href="../res.php?file=images/st-logo-128x68.png&resource=picture_file" type="image/x-icon" />
	<meta name="description" content="Entrar na SocialTec" />
	<title>Login</title>

	<link rel="stylesheet" href="/stresources/assets/tether/tether.min.css" />
	<link rel="stylesheet" href="/stresources/assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/stresources/assets/bootstrap/css/bootstrap-grid.min.css" />
	<link rel="stylesheet" href="/stresources/assets/bootstrap/css/bootstrap-reboot.min.css" />
	<link rel="stylesheet" href="/stresources/assets/animate.css/animate.min.css" />
	<link rel="stylesheet" href="/stresources/assets/theme/css/style.css" />
	<link rel="stylesheet" href="/stresources/assets/mobirise/css/mbr-additional.css" type="text/css" />
	<link rel="stylesheet" href="/stresources/assets/socialtec/css/page.css" type="text/css" />
</head>
<body>
	<div class="cont">
		<div class="demo">
			<div class="login">
				<div class="login__check"></div>
				<form action="/login/logincallback.php?token=<?php echo $token; ?>" id="form" method="post" data-form-title="Login Form" focus>
					<div class="login__form">

<?php
if(isset($error_code) || null != $error_code) {
	switch ($error_code)
	{
		case ERR_LOGIN_ACCOUNT_BLOCKED:
			echo '
        <div class="err-contend-activated">
          <div class="err_contend">
            <div class="err_user_is_blocked">
              <span>';

			$_STRINGS->get_w_value('login.user-account-blocked');

			echo'</span>
            </div>
          </div>
        </div>
      ';
			break;
		case ERR_LOGIN_ACCOUNT_MAIL_NOT_FOUND:
			echo '
        <div class="err-contend-activated">
          <div class="err_contend">
            <div class="err_user_is_blocked">
              <span>';

			$_STRINGS->get_w_value('login.user-not-exists');

			echo'</span>
            </div>
          </div>
        </div>
      ';
			break;
		case ERR_LOGIN_ACCOUNT_MAIL_INVALID:
			echo '
        <div class="err-contend-activated">
          <div class="err_contend">
            <div class="err_mail-invalid">
              <span>';

			$_STRINGS->get_w_value('login.invalid-cps-email');

			echo'</span>
            </div>
          </div>
        </div>
      ';
			break;
		case ERR_LOGIN_ACCOUNT_PASS_INCORRECT:
			echo '
        <div class="err-contend-activated">
          <div class="err_contend">
            <div class="err_pass">
              <span>';

			$_STRINGS->get_w_value('login.pass-incorrect');

			echo'</span>
            </div>
          </div>
        </div>
      ';
			break;
		case ERR_PAGE_AUTHENTICATION_ERROR:
			echo '
        <div class="err-contend-activated">
          <div class="err_contend">
            <div class="err_pass">
              <span>';

			$_STRINGS->get_w_value('login.login-token-auth-error');

			echo'</span>
            </div>
          </div>
        </div>
      ';
			break;
		case ERR_PAGE_AUTHENTICATION_ERROR_INVALID_PUBLIC_TOKEN:
			echo '
        <div class="err-contend-activated">
          <div class="err_contend">
            <div class="err_pass">
              <span>';

			$_STRINGS->get_w_value('login.public-token-fatal-error');

			echo'</span>
            </div>
          </div>
        </div>
      ';
			break;
		default:
	}
}
?>

						<div class="login__row">
							<svg class="login__icon name svg-icon" viewbox="0 0 20 20">
								<path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8"></path>
							</svg>
							<input type="email" class="login__input name" name="login__input__mail" placeholder="Email" value="<?php if(isset($_SESSION['user_email'])) { echo $_SESSION['user_email']; } ?>" />
						</div>
						<div class="login__row">
							<svg class="login__icon pass svg-icon" viewbox="0 0 20 20">
								<path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0"></path>
							</svg>
							<input type="password" class="login__input pass" id="pass" name="login__input__pass" placeholder="Senha" />
						</div>
						<button type="button" class="login__submit">Entrar</button>
						<p class="login__signup">
							Ainda não tem uma conta? &nbsp;
							<a href="/register/">Cadastrar-se</a>
						</p>
					</div>
				</form>
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
	<input name="animation" type="hidden" />
	<script>
		$('.login__submit').click(function () {
			var pass = formhash($('#pass').val());
			$('#pass').val(null);
			$('<input>').attr({
				type: 'hidden',
				id: 'security_pass',
				name: 'security_pass',
				value: pass
			}).appendTo('#form');
			document.getElementById('form').submit();
		});
    $(document).ready(function() {

    	var animating = false,
			submitPhase1 = 1100,
			submitPhase2 = 400,
			logoutPhase1 = 800,
			$login = $(".login"),
			$app = $(".app");

    	function ripple(elem, e) {
    		$(".ripple").remove();
    		var elTop = elem.offset().top,
				elLeft = elem.offset().left,
				x = e.pageX - elLeft,
				y = e.pageY - elTop;
    		var $ripple = $("<div class='ripple'></div>");
    		$ripple.css({top: y, left: x});
    		elem.append($ripple);
    	};

    	$(document).on("click", ".login__submit", function(e) {
    		if (animating) return;
    		animating = true;
    		var that = this;
    		ripple($(that), e);
    		$(that).addClass("processing");
    		setTimeout(function() {
    			$(that).addClass("success");
    			setTimeout(function() {
    				$app.show();
    				$app.css("top");
    				$app.addClass("active");
    			}, submitPhase2 - 70);
    			setTimeout(function() {
    				$login.hide();
    				$login.addClass("inactive");
    				animating = false;
    				$(that).removeClass("success processing");
    			}, submitPhase2);
    		}, submitPhase1);
    	});
});
    </script>
</body>
</html>