<?php
//$itrate=ceil($cnt/$_COOKIE['ac_pagination_dropdown']);$i=($_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']==0)?0:ceil($_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']);$count=0;	
//echo $itrate."<br><br>"; 
//echo $i."<br><br>"; 
//exit(0);

?>


<script>
$(document).ready(function() {
<?php if(Yii::app()->session['err']=='imgerr'){ ?>		
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
	toastr.error("Error : Problem with image !");	
<?php } else if(Yii::app()->session['err']=='i2'){ ?>					
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
				toastr.success("success : PrivacyPolicy added !");
<?php }  else if(Yii::app()->session['err']=='i3'){ ?>		
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
				toastr.error("Error : Something went wrong !");
<?php } ?>					
	
console.log(getCookie('ERROR'));

if(getCookie('ERROR')=='e1')		
{
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
				toastr.success("success : Sticker set updated !");
	setCookie('ERROR','',365);	
}	
else if(getCookie('ERROR')=='d2')		
{
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
				toastr.success("success : Sticker set removed !");
	setCookie('ERROR','',365);	
}	


});
<?php Yii::app()->session['err']=""; ?>	
</script>	




<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Manage PrivacyPolicy</h3>
			<span class="kt-subheader__separator kt-subheader__separator--v"></span>
			
		</div>
		
	</div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="fa fa-info-circle" style="color:#5D78FF;"></i>
				</span>
				<h3 class="kt-portlet__head-title">
					paste your html code here:
				</h3>
			</div>
		</div>
		<div class="kt-portlet__body">

			<div class="kt-portlet__body kt-portlet__body--fit">
				<div class="row">	
						<!--begin::Form-->
						<form class="kt-form col-md-12" action="pp"  method="post">
							<div class="kt-portlet__body">
								<div class="form-group form-group-last">
									<label for="exampleTextarea">Example textarea</label>
									<textarea class="form-control" id="exampleTextarea"  name="content" rows="30"><?php if(isset($rw))echo stripslashes($rw);?></textarea>
								</div>
							</div>
							<div class="kt-portlet__foot">
								<div class="kt-form__actions">
									<button type="submit" name="add"  class="btn btn-primary">Submit</button>
									<button type="reset" class="btn btn-secondary">Reset</button>
								</div>
							</div>
						</form>

						<!--end::Form-->
				</div>
			</div>
				
		</div>

</div>
<!-- end:: Content -->
<script>
function showStickerList()
{
	document.getElementById('sticker_view').style.display='block';
	document.getElementById('data_view').style.display='none';
}
function showStickerList_RESET()
{
	document.getElementById('data_view').style.display='block';
	document.getElementById('sticker_view').style.display='none';
}


var loadFileE1 = function(event) {
	
	var outputE = document.getElementById('Aoutput1');
	outputE.style.height="150px";
	outputE.src = URL.createObjectURL(event.target.files[0]);
	
 var app='<div class="col-xl-3"><center><img id="Aoutput1"  onclick="showStickerList_RESET();"  src="<?php echo Yii::app()->baseUrl; ?>/assets/media/icons/svg/Communication/Reply.svg"  style="max-width:40px;max-height:40px;height:40px;"  /><div>Totle: '+event.target.files.length+'</div></center></div>';	
 for(i=0;i<event.target.files.length;i++)
 {
	//alert((event.target.files[i].type).split('/')[1]);
 	//var output = document.getElementById('output'+(i+1));
 	//output.src = URL.createObjectURL(event.target.files[i]);
	app=app+'<div class="col-xl-3"><center style="padding:2px;margin:2px;border:1px solid;"><img src="'+URL.createObjectURL(event.target.files[i])+'" style="max-width:80px;max-height:80px;" /><div>'+(event.target.files[i].type).split('/')[1]+'</div></center></div>';
 }	
	
	document.getElementById('app').innerHTML=app;
	document.getElementById('count_stc').innerHTML='Stickers : '+event.target.files.length;
};

var loadFileE1_e = function(event) {
 // alert(event.target.files.length);
		var outputE = document.getElementById('Aoutput1_e');
		outputE.style.height="100px";
		outputE.src = URL.createObjectURL(event.target.files[0]);
	
};


////////////GET DATA() ///////////////////////
function getData(a)
{
	//alert(a);
	document.getElementById('Aoutput1_e').src= '<?php echo Yii::app()->baseUrl; ?>/images/STIKKER/'+document.getElementById(a+'_h_banner').value;
	
	//OLD BANNER&ICON
	document.getElementById('oldbanner').value= document.getElementById(a+'_h_banner').value;
	
	document.getElementById('eid').value=a;
	
}

</script>