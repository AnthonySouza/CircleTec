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

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Criar Conta</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">

    <link rel='stylesheet prefetch' href='https://cdn.gitcdn.xyz/cdn/angular/bower-material/v1.0.0-rc3/angular-material.css'>

    
</head>

<body>
    <div ng-controller="DemoCtrl" ng-cloak="" class="md-inline-form" ng-app="MyApp" layout="column" layout-sm="row" layout-align="center center" layout-align-sm="start start" layout-fill>
        <md-content id="SignupContent" class="md-whiteframe-10dp" flex-sm>
				<md-toolbar flex id="materialToolbar">
						<div class="md-toolbar-tools"> <span flex=""></span> <span class="md-headline" align="center">Junte-se a n&#243;s</span> <span flex=""></span> </div>
				</md-toolbar>
				<div layout-padding="">
						<div></div>
						<form id="reg_form" name="userForm" method="POST" action="/register/registercallback.php?token=<?php echo $token; ?>" ng-submit="user.submit(userForm.$valid)" enctype="multipart/form-data">
								<input type="hidden" name="action" value="signup" />
								<div layout="row" layout-sm="column">
										<md-input-container flex-gt-sm="">
												<label>Nome</label>
												<input ng-model="user.first_name" name="first_name" required type="text" ng-pattern="/^[a-zA-Z'. -]+$/" placeholder="Primeiro Nome">
												<div ng-if="userForm.first_name.$dirty" ng-messages="userForm.first_name.$error" role="alert">
														<div ng-message="required" class="my-message">É necessário que você insira seu primeiro nome.</div>
														<div ng-message="pattern" class="my-message">Entre com um nome válido.</div>
												</div>
										</md-input-container>
										<md-input-container flex-gt-sm="">
												<label>Sobre Nome</label>
												<input ng-model="user.last_name" name="last_name" required type="text" ng-pattern="/^[a-zA-Z'. -]+$/" placeholder="Ultimo Nome">
												<div ng-if="userForm.last_name.$dirty" ng-messages="userForm.last_name.$error" role="alert">
														<div ng-message="required" class="my-message">Sobre nome é necessário.</div>
														<div ng-message="pattern" class="my-message">Entre com seu sobrenome real.</div>
												</div>
										</md-input-container>
								</div>
								<div layout="row" layout-sm="column">
										<p style="font-size: 12px; margin-left: 3px; margin-top: 18px;">Genero: </p>
										<input type="hidden" name="gender" value="{{user.gender}}" />
										<md-radio-group style="margin: 12px 0 19px;" ng-model="user.gender" required>
												<md-radio-button value="m" class="md-primary">Homem</md-radio-button>
												<md-radio-button value="f">Mulher</md-radio-button>
										</md-radio-group>
										<md-input-container flex-gt-sm="60">
												<label>Idade</label>
												<input required type="number" step="any" name="age" ng-model="user.age" min="13" max="100" placeholder="20" />
												<div ng-if="userForm.age.$dirty" ng-messages="userForm.age.$error" role="alert" multiple>
														<div ng-message="required">Precisamos saber sua idade.</div>
														<div ng-message="min">Pessoas com menos de 13 anos não podem se registrar.</div>
														<div ng-message="max">Desculpe {{userForm.age.$viewValue}} anos não são permitidos</div>
												</div>
										</md-input-container>
								</div>
								<div layout="row" layout-sm="column">
										<md-input-container flex-gt-sm="">
												<label>Email</label>
												<input required type="email" name="email" ng-model="user.email" ng-pattern="/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/" placeholder="seuemail@etec.sp.gov.br" />
												<div ng-if="userForm.email.$dirty" ng-messages="userForm.email.$error" role="alert">
														<div ng-message="required" class="my-message">Endereço de email CPS é necessário.</div>
														<div ng-message="pattern" class="my-message">Entre com um endereço de email válido. </div>
														<div ng-message="email" class="my-message">Entre com um endereço de email verdadeiro. </div>
												</div>
										</md-input-container>
								</div>
								<div layout="row" layout-sm="column">
										<md-input-container flex-gt-sm="">
												<label>Senha</label>
												<input id="pass1" name="password" ng-model="user.password" type="password" minlength="8" maxlength="100" ng-pattern="/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/" required placeholder="********">
												<div ng-if="userForm.password.$dirty" ng-messages="userForm.password.$error" role="alert" multiple>
														<div ng-message="required">Uma senha é necessária.</div>
														<div ng-message="pattern">Sua senha deve pelo menos conter um número, um caractere minúsculo e um maiúsculo.</div>
														<div ng-message="minlength">Sua senha deve pelo menos ter 8 caracteres.</div>
														<div ng-message="maxlength">Sua senha não pode ser maior que 100 caracteres.</div>
												</div>
										</md-input-container>
										<md-input-container flex-gt-sm="">
												<label>Confirmar Senha</label>
												<input id="pass2" name="confmPassword" ng-model="user.confmPassword" type="password" minlength="8" maxlength="100" ng-pattern="/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/" required compare-to="user.password" placeholder="********">
												<div ng-if="userForm.confmPassword.$dirty" ng-messages="userForm.confmPassword.$error" role="alert">
														<div ng-message="required">Senha de confirmação é necessária.</div>
														<div ng-message="compareTo">As senhas não se coincidem.</div>
												</div>
										</md-input-container>
								</div>
								<md-button onclick="procceed()" class="md-raised md-primary" style="width:100%; margin: 0px 0px;" type="submit" ng-disabled="userForm.$invalid" name="submit">Registrar</md-button>
								<md-button class="md-raised md-primary" ng-href="https://codepen.io/faizanrupani/pen/QjzMJp" target="_blank" style="width:100%; margin: 15px 0px 0px 0px;">Já tenho uma conta</md-button>
						</form>
				</div>
		</md-content>
    </div>
	<script src="http://127.0.0.1/stresources/assets/security/js/security.js"></script>
	<script src="http://127.0.0.1/stresources/assets/criptography/cripto.js"></script>
	<script src="http://127.0.0.1/stresources/assets/jquery/jquery.min.js"></script>
	<script>
		function procceed() {

			$('<input type="hidden" id="password">').appendTo('#reg_form');
			$('<input type="hidden" id="confmPassword">').appendTo('#reg_form');

			$('#password').val($('#pass1'));
			$('#confmPassword').val($('#pass2'));

			$('#reg_form').submit();

		}
	</script>
	<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-animate.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-route.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-aria.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular-messages.min.js'></script>
    <script src='https://cdn.gitcdn.xyz/cdn/angular/bower-material/v1.0.0-rc3/angular-material.js'></script>
    <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-114/assets-cache.js'></script>
    <script src="http://127.0.0.1/stresources/assets/login/js/script.js"></script>
</body>
</html>