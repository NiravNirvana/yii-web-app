 
<script>

$(document).ready(function() {






	
<?php if(Yii::app()->session['err']=='nch'){ ?>		
	
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
	toastr.error("error : old password not match !");
<?php } else if(Yii::app()->session['err']=='ch'){ ?>					

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

	
	toastr.success("success : password reset successfully !");
<?php } ?>

				
});
<?php Yii::app()->session['err']=""; ?>	



function validate(a)
{
	//alert(a.id);
	oldp=document.getElementById("old").value;
	newp=document.getElementById("new").value;
	confp=document.getElementById("conf").value;
	
	oldp_id=document.getElementById("err_old");
	newp_id=document.getElementById("err_new");
	confp_id=document.getElementById("err_conf");
	
	if(a.id=="old")
	{
		oldp_id.innerHTML='';
	}
	else if(a.id=="new")
	{
		newp_id.innerHTML='';
	}
	else if(a.id=="conf")
	{
		confp_id.innerHTML='';
	}
	else if(a.id=="sub")
	{
		oldp_id.innerHTML='';
		newp_id.innerHTML='';
		confp_id.innerHTML='';
	}
	
	
	IsError=0;
	
	//var emailpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	var passwordpattern  =  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
	
	if(a.id=="old")
	{
		if(oldp=="")
		{
			oldp_id.innerHTML=" old password can't be blank !  ";
			return;  
		}
		else if(!oldp.match(passwordpattern))
		{
			oldp_id.innerHTML=" old password [>6 digit,1 number,1 special symbol] !  ";
			return;
		}
	}
	else if(a.id=="sub")
	{
		if(oldp=="")
		{
			oldp_id.innerHTML=" old password can't be blank !  ";
			IsError=1;
		}
		else if(!oldp.match(passwordpattern))
		{
			oldp_id.innerHTML=" old password [>6 digit,1 number,1 special symbol] !  ";
			IsError=1;
		}
	}
	
	
	
	if(a.id=="new")
	{
		if(newp=="")
		{
			newp_id.innerHTML=" new password can't be blank ! ";
			return;
		}
		else if(!newp.match(passwordpattern))
		{
			newp_id.innerHTML=" new password [>6 digit,1 number,1 special symbol] ! ";
			return;
		}			
	}
	else if(a.id=="sub")
	{
		if(newp=="")
		{
			newp_id.innerHTML=" new password can't be blank ! ";
			IsError=1;
		}
		else if(!newp.match(passwordpattern))
		{
			newp_id.innerHTML=" new password [>6 digit,1 number,1 special symbol] ! ";
			IsError=1;
		}
	}
	
	
	
	if(a.id=="conf")
	{
		if(confp=="")
		{
			confp_id.innerHTML=" confirm password password can't be blank ! ";
			return;
		}
		else if(!confp.match(passwordpattern))
		{
			confp_id.innerHTML=" confirm password [>6 digit,1 number,1 special symbol] ! ";
			return;
		}
		else if(confp!=newp)
		{
			 confp_id.innerHTML=" confirm password can't be match ! ";
			 return;
		}
	}
	else if(a.id=="sub")
	{
		if(confp=="")
		{
			confp_id.innerHTML=" confirm password password can't be blank ! ";
			IsError=1;
		}
		else if(!confp.match(passwordpattern))
		{
			confp_id.innerHTML=" confirm password [>6 digit,1 number,1 special symbol] ! ";
			IsError=1;
		}
		else if(confp!=newp)
		{
			 confp_id.innerHTML=" confirm password can't be match ! ";
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


function showdata()
{
	//alert();
	
	 $('#eye').removeClass( 'fa fa-eye-slash' ).addClass( 'fa fa-eye' );
	 var oldp = document.getElementById("old");
	 
	 var newp = document.getElementById("new");
	
	 var confp = document.getElementById("conf");
	
		oldp.type = "text";
		newp.type = "text";
		confp.type = "text";
}

function hidedata()
{
	//alert();
	
	 $('#eye').removeClass( 'fa fa-eye' ).addClass( 'fa fa-eye-slash' );
	  var oldp = document.getElementById("old");
	
	  var newp = document.getElementById("new");
	
	  var confp = document.getElementById("conf");
	
		oldp.type = "password";
		newp.type = "password";
		confp.type = "password";
	 
}


</script>
								
								

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Change Password</h3>
			<span class="kt-subheader__separator kt-subheader__separator--v"></span>
			
		</div>
		
	</div>
</div>
<!-- end:: Content Head -->
<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4">

			<!--begin::Portlet-->
			<div class="kt-portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							<img src="<?php echo Yii::app()->baseUrl; ?>/assets/media/icons/svg/Home/Key.svg" />
							Change Password
							
						</h3>
					</div>
						
				</div>

				<!--begin::Form-->
				<form class="kt-form" action="chp" method="post" >
					<div class="kt-portlet__body">
						<div class="kt-section kt-section--first">
							<div class="form-group">
								<label>Old Password:</label>
								<input type="password" name="old" id="old" onblur="validate(this)"  class="form-control" placeholder="Enter Old Password">
								<span id="err_old" class="form-text text-muted kt-font-danger"></span>
							</div>
							<div class="form-group">
								<label>New Password:</label>
								<input type="password" name="new" id="new" onblur="validate(this)" class="form-control" placeholder="Enter New Password">
								<span id="err_new" class="form-text text-muted kt-font-danger"></span>
							</div>
							<div class="form-group">
								<label>Confirm Password:</label>
								<input type="password" id="conf" onblur="validate(this)" class="form-control" placeholder="Enter Confirm Password" >
								<span id="err_conf" class="form-text text-muted kt-font-danger"></span>
							</div>
							
						</div>
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="button" onmousedown="showdata();" onmouseup="hidedata();" class="btn btn-primary">show</button>
							<button type="submit" id="sub" name="chng" onclick="return validate(this);" class="btn btn-primary">Submit</button>
							<button type="reset" class="btn btn-secondary">Cancel</button>
							
					
						</div>
					</div>
				</form>

				<!--end::Form-->
			</div>

			<!--end::Portlet-->
		</div>
	</div>
</div>

						<!-- end:: Content -->