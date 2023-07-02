<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */




//echo md5("@123");
//exit(0);
?>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
   
<script>
$(document).ready(function() {
		

<?php if($err!=''){ ?>		
setTimeout(function(){$('#noty_topCenter_layout_container').fadeOut(1000);}, 4000)
	noty({text: 'Error : <?php echo $err; ?>', layout: 'topCenter', type: 'error'});                      
<?php } ?>					
						
});

function validate()
{
	
	$('#noty_topCenter_layout_container').remove();
	//alert();
	eml=document.getElementById("eml").value;
	pwd=document.getElementById("psw").value;
	
	
	IsError=0;
	
	//var emailpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	var passwordpattern  =  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
	
	if(eml=="")
	{
		setTimeout(function(){noty({text: "Error : Email Can't be Blank ! ", layout: 'topCenter', type: 'error'});}, 200)
		  
		IsError=1;
	}
	/*else if(!eml.match(emailpattern))
	{
		alert();
		setTimeout(function(){noty({text: "Error : Invalide Email Formate ! ", layout: 'topCenter', type: 'error'});}, 200)
		  
		IsError=1;
	}*/

	
	if(pwd=="")
	{
		setTimeout(function(){noty({text: "Error : Password Can't be Blank ! ", layout: 'topCenter', type: 'error'});}, 800)
		
		
		IsError=1;
	}
	else if(!pwd.match(passwordpattern))
	{
		setTimeout(function(){noty({text: "Error : Password [>6 digit,1 number,1 special Symbol] ! ", layout: 'topCenter', type: 'error'});}, 800)
		
		
		IsError=1;
	}
	
	
	
	
	
	
	if(IsError==0)
	{
		return true;
	}
	else
	{
		setTimeout(function(){$('#noty_topCenter_layout_container').fadeOut(1000);}, 4000)
		
		return false;
	}
	
	
}


</script>

<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo Yii::app()->baseUrl; ?>/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Log In</strong> to your account</div>
                    <form action="gallery_new/index.php/sl" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="eml" id="eml" placeholder="User Name" autocomplete="text"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="psw" id="psw" placeholder="Password" autocomplete="password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="sf" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" onclick="return validate();" name="log" type="submit" >Log In</button>
                        </div>
                    </div>
                    <!--
					<div class="login-or">OR</div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block btn-twitter"><span class="fa fa-twitter"></span> Twitter</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block btn-facebook"><span class="fa fa-facebook"></span> Facebook</button>
                        </div>
                        <div class="col-md-4">                            
                            <button class="btn btn-info btn-block btn-google"><span class="fa fa-google-plus"></span> Google</button>
                        </div>
                    </div>
					-->
                   <!-- <div class="login-subtitle">
                        Don't have an account yet? <a href="#">Create an account</a>
                    </div>
					-->
					
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2019 
                    </div>
                    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>
			 
			 
			
			
        </div>
			
        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?php echo Yii::app()->baseUrl; ?>/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="<?php echo Yii::app()->baseUrl; ?>/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->
        
        
			
			
            <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/plugins/jquery/jquery.min.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/plugins/jquery/jquery-ui.min.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/plugins/bootstrap/bootstrap.min.js"></script>        
            <!-- END PLUGINS -->

            <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='<?php echo Yii::app()->baseUrl; ?>/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
            <script type='text/javascript' src='<?php echo Yii::app()->baseUrl; ?>/js/plugins/noty/jquery.noty.js'></script>
            <script type='text/javascript' src='<?php echo Yii::app()->baseUrl; ?>/js/plugins/noty/layouts/topCenter.js'></script>
            <script type='text/javascript' src='<?php echo Yii::app()->baseUrl; ?>/js/plugins/noty/layouts/topLeft.js'></script>
            <script type='text/javascript' src='<?php echo Yii::app()->baseUrl; ?>/js/plugins/noty/layouts/topRight.js'></script>            
            
            <script type='text/javascript' src='<?php echo Yii::app()->baseUrl; ?>/js/plugins/noty/themes/default.js'></script>
            
            <!-- END PAGE PLUGINS -->

            <!-- START TEMPLATE -->
            <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/settings.js"></script>
            
            <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/plugins.js"></script>        
            <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/actions.js"></script>        
            <!-- END TEMPLATE -->
        <!-- END SCRIPTS -->         
        
    </body>
</html>




