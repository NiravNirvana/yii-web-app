<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */




//echo md5("@123");
//exit(0);
?>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
   
<script>


function validate(a)
{
	
	//alert(a.id);
	eml=document.getElementById("eml").value;
	pwd=document.getElementById("psw").value;
	eml_id=document.getElementById("err_eml");
	pwd_id=document.getElementById("err_pass");
	
	if(a.id=="eml")
	{
		eml_id.innerHTML='';
	}
	else if(a.id=="psw")
	{
		pwd_id.innerHTML='';
	}
	else if(a.id=="sub")
	{
		eml_id.innerHTML='';
		pwd_id.innerHTML='';
	}
	
	IsError=0;
	
	//var emailpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	var passwordpattern  =  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
	if(a.id=="eml")
	{
		if(eml==""){
			eml_id.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; error : username can't be blank ! ";
			return;
		}
	}
	else if(a.id=="sub")
	{	
		if(eml==""){
			eml_id.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; error : username can't be blank ! ";
			IsError=1;
		}
	}	
	/*else if(!eml.match(emailpattern))
	{
		alert();
		setTimeout(function(){noty({text: "Error : Invalide Email Formate ! ", layout: 'topCenter', type: 'error'});}, 200)
		  
		IsError=1;
	}*/

	if(a.id=="psw")
	{
		if(pwd==""){
			pwd_id.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; error : password can't be blank ! ";
			if(a.id=="psw")
				return;
		}
		else if(!pwd.match(passwordpattern)){
			pwd_id.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; error : password [>6 digit,1 number,1 special symbol] ! ";
			if(a.id=="psw")
				return;
		}
	}	
	else if(a.id=="sub")
	{	
		if(pwd==""){
			pwd_id.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; error : password can't be blank ! ";
			IsError=1;
		}
		else if(!pwd.match(passwordpattern)){
			pwd_id.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; error : password [>6 digit,1 number,1 special symbol] !  ";
			IsError=1;
		}
	}	
	
	if(IsError==0)
	{
		return true;
	}
	else
	{
		return false;
	}
	
	
}


</script>
<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="../../../">
		<meta charset="utf-8" />
		<title>Dynamic | Login</title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

		<!--end::Fonts -->

		<!--begin::Page Custom Styles(used by this page) -->
		<link href="<?php echo Yii::app()->baseUrl; ?>/assets/css/pages/login/login-2.css" rel="stylesheet" type="text/css" />

		<!--end::Page Custom Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="<?php echo Yii::app()->baseUrl; ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo Yii::app()->baseUrl; ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
		<link href="<?php echo Yii::app()->baseUrl; ?>/assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo Yii::app()->baseUrl; ?>/assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo Yii::app()->baseUrl; ?>/assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo Yii::app()->baseUrl; ?>/assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v2 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?php echo Yii::app()->baseUrl; ?>/assets/media/bg/bg-1.jpg);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
								<a href="#">
									<img src="<?php echo Yii::app()->baseUrl; ?>/images/logo.webp" style="height: 65;">
								</a>
							</div>
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title"> | </h3>
								</div>
								
								<form class="kt-form" action="<?php echo Yii::app()->baseUrl."/index.php/sl"; ?>" method="post">
										
									<?php if($err!=''){ ?>	
										<div class="alert alert-solid-danger alert-bold" role="alert" id="err_msg_">
											<div class="alert-text" style="text-align:center">error : <?php echo $err; ?></div>
										</div>
									<?php } ?>	
									<div class="input-group">
										<input class="form-control" type="text" name="eml" id="eml" placeholder="User Name" autocomplete="text" onblur="validate(this)">
									</div>
									<span id="err_eml" class="kt-font-danger"></span>
									
									<div class="input-group">
										<input class="form-control" type="password" name="psw" id="psw" placeholder="Password" autocomplete="password" onblur="validate(this)">
									</div>
									<span id="err_pass" class="kt-font-danger"></span>
									
									<div class="row kt-login__extra">
										<div class="col">
											<label class="kt-checkbox">
												<input type="checkbox" name="remember"> Remember me
												<span></span>
											</label>
										</div>
										<div class="col kt-align-right">
											<a href="javascript:;" id="kt_login_forgot" class="kt-link kt-login__link">Forget Password ?</a>
										</div>
									</div>
									<div class="kt-login__actions">
										<button  onclick="return validate(this);" id="sub" name="log"  class="btn btn-pill kt-login__btn-primary">Sign In</button>
									</div>
								</form>
							</div>
							<div class="kt-login__signup">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Sign Up</h3>
									<div class="kt-login__desc">Enter your details to create your account:</div>
								</div>
								<form class="kt-login__form kt-form" action="">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Fullname" name="fullname">
									</div>
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Password" name="password">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Confirm Password" name="rpassword">
									</div>
									<div class="row kt-login__extra">
										<div class="col kt-align-left">
											<label class="kt-checkbox">
												<input type="checkbox" name="agree">I Agree the <a href="#" class="kt-link kt-login__link kt-font-bold">terms and conditions</a>.
												<span></span>
											</label>
											<span class="form-text text-muted"></span>
										</div>
									</div>
									<div class="kt-login__actions">
										<button id="kt_login_signup_submit" class="btn btn-pill kt-login__btn-primary">Sign Up</button>&nbsp;&nbsp;
										<button id="kt_login_signup_cancel" class="btn btn-pill kt-login__btn-secondary">Cancel</button>
									</div>
								</form>
							</div>
							<div class="kt-login__forgot">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Forgotten Password ?</h3>
									<div class="kt-login__desc">Enter your email to reset your password:</div>
								</div>
								<form class="kt-form" action="">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
									</div>
									<div class="kt-login__actions">
										<button id="kt_login_forgot_submit" class="btn btn-pill kt-login__btn-primary">Request</button>&nbsp;&nbsp;
										<button id="kt_login_forgot_cancel" class="btn btn-pill kt-login__btn-secondary">Cancel</button>
									</div>
								</form>
							</div>
							<div class="kt-login__account">
								<span class="kt-login__account-msg">
									Don't have an account yet ?
								</span>&nbsp;&nbsp;
								<a href="javascript:;" id="kt_login_signup" class="kt-link kt-link--light kt-login__account-link">Sign Up</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": [
							"#c5cbe3",
							"#a1a8c3",
							"#3d4465",
							"#3e4466"
						],
						"shape": [
							"#f0f3ff",
							"#d9dffa",
							"#afb4d4",
							"#646c9a"
						]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="<?php echo Yii::app()->baseUrl; ?>/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
		<script src="<?php echo Yii::app()->baseUrl; ?>/assets/js/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="<?php echo Yii::app()->baseUrl; ?>/assets/js/pages/custom/login/login-general.js" type="text/javascript"></script>

		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>



