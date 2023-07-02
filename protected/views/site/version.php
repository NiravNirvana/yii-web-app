<?php
//$itrate=ceil($cnt/$_COOKIE['ac_pagination_dropdown']);$i=($_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']==0)?0:ceil($_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']);$count=0;	
//echo $itrate."<br><br>"; 
//echo $i."<br><br>"; 
//exit(0);
//echo Yii::app()->baseUrl."/protected/view/site/";exit(0);
?>


<script>
$(document).ready(function() {
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
				toastr.success("success : version updated !");
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
				toastr.success("success : version removed !");
	setCookie('ERROR','',365);	
}	
else if(getCookie('ERROR')=='d2_title')		
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
				toastr.success("success : ad-title removed !");
	setCookie('ERROR','',365);	
}	
else if(getCookie('ERROR')=='e2_title')		
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
				toastr.success("success : ad-title updated !");
	setCookie('ERROR','',365);	
}	
else if(getCookie('ERROR')=='d2_e')		
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
				toastr.success("success : ad-title removed !");
	setCookie('ERROR','',365);	
}	
else if(getCookie('ERROR')=='i2_title')		
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
				toastr.success("success : ad-title added !");
	setCookie('ERROR','',365);	
}	

});
<?php Yii::app()->session['err']=""; ?>	

function checkedALL(a)
{
	//alert(a.checked);
	
		
	$("input[name='vlist[]']").each(function() {
		if(a.checked==true)
			this.checked = true;
		else
			this.checked = false;
	});	
		
}
</script>	




<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Manage Version Ads</h3>
			<span class="kt-subheader__separator kt-subheader__separator--v"></span>
		</div>
	</div>
</div>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="row">
		<div class="col">
			<div class="alert alert-light alert-elevate fade show" role="alert">
				<!--begin: Quick Actions -->
				<div class="kt-header__topbar-item dropdown col-lg-3">
					<div class="col-sm-12 kt-header__topbar-wrapper btn btn-success btn-elevate btn-pill btn-elevate-air btn-md" data-toggle="dropdown" data-offset="0px,7px" aria-expanded="true">
						<span class="kt-header__topbar-icon">
							Version
						</span>
					</div>
					<div class="dropdown-menu dropdown-menu-fit dropdown-menu-anim dropdown-menu-top-unround  dropdown-menu-xl">
							<!--begin::Portlet-->
							<div class="kt-portlet">
								<!--begin::Form-->
								<form class="kt-form" method="post" action="sv">
									<div class="kt-portlet__body col-md-12"  style="height:250px;overflow-y:scroll;">
											<div class="col-md-12">
													<div class="row">
																<div class="col-sm-8">
																	<label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
																		<input type="checkbox" onclick="checkedALL(this);">
																		All
																		<span></span>
																	</label>
																</div>
													</div>
												<?php foreach($rw_f_vesion as $val){ $val=json_decode(json_encode($val),true); ?>
													<div class="row">
																<div class="col-sm-8">
																	<label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
																		<input type="checkbox" name="vlist[]" value="<?php echo $val['_id']['$oid']?>" <?php if(in_array($val['_id']['$oid'], Yii::app()->session['vlist_his'])) echo "checked"; ?>>
																		<?php echo $val['title']?>
																		<span></span>
																	</label>
																</div>
													</div>
												<?php } ?>
											</div>
									</div>
									<div class="kt-form__actions col-12 " >
										<div class="col-5 pull-left">
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#kt_blockui_4_1_modal_add_version">
												<i class="flaticon2-plus"></i> Add New
											</button>
										</div>
										<div class="col-3 pull-right">
											<button type="submit" name="version_filter" class="pull-right btn btn-primary">Submit</button>
										</div>
										<div class="col-3 pull-right">
											<button type="submit" name="reset_vlist" value="reset_vlist" class="pull-right btn btn-secondary">Reset</button>
										</div>
									</div>
								</form>

								<!--end::Form-->
							</div>

							<!--end::Portlet-->

					</div>
				</div>

				<!--end: Quick Actions -->
				
				<!--begin: Quick Actions -->
				<div class="kt-header__topbar-item dropdown  col-lg-3">
					<div class="col-sm-12 kt-header__topbar-wrapper btn btn-success btn-elevate btn-pill btn-elevate-air btn-md" data-toggle="dropdown" data-offset="0px,7px" aria-expanded="true">
						<span class="kt-header__topbar-icon">
							Adtype 
						</span>
					</div>
					<div class="dropdown-menu dropdown-menu-fit dropdown-menu-anim dropdown-menu-top-unround  dropdown-menu-xl">
						<!--begin::Portlet-->
							<div class="kt-portlet">
								<!--begin::Form-->
								<form class="kt-form">
									<div class="col-md-12 kt-portlet__body"  style="height:250px;overflow-y:scroll;">
											
											<div class="col-md-12">
												
												<?php foreach($rw_f_ad_type as $val){ $val=json_decode(json_encode($val),true); ?>	
													<div class="row">
														<div class="col-sm-8">
															<label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
																<input type="checkbox"> <?php echo $val['title']?>
																<span></span>
															</label>
														</div>
														
													</div>
												<?php } ?>
											</div>
									
									</div>
									<div class="kt-form__actions col-12 " >
										
										<button type="button" class="pull-left btn btn-primary btn-sm" data-toggle="modal" data-target="#kt_blockui_4_1_modal_add_adtype">
											<i class="flaticon2-plus"></i> Add New
										</button>
										
										<button type="reset" class="pull-right btn btn-primary">Submit</button>
										
									</div>
								</form>

								<!--end::Form-->
							</div>
							<!--end::Portlet-->
					</div>
				</div>

				<!--end: Quick Actions -->
				
				<!--begin: Quick Actions -->
				<div class="kt-header__topbar-item dropdown  col-lg-3">
					<div class="col-sm-12 kt-header__topbar-wrapper btn btn-success btn-elevate btn-pill btn-elevate-air btn-md" data-toggle="dropdown" data-offset="0px,7px" aria-expanded="true">
						<span class="kt-header__topbar-icon">
							Adtitle 
						</span>
					</div>
					<div class="dropdown-menu dropdown-menu-fit dropdown-menu-anim  dropdown-menu-top-unround dropdown-menu-xl">
						<!--begin::Portlet-->
							<div class="kt-portlet">
								<!--begin::Form-->
								<form class="kt-form" method="post" action="sv">
									<div class="col-md-12 kt-portlet__body"  style="height:250px;overflow-y:scroll;">
											<div class="col-md-12">
												<?php $i=0; foreach($rw_f_adtitle as $v){ ?>	
													<div class="row">
															<div class="col-sm-8">
																<label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
																	<input type="checkbox" name="adtitlelist[]" value="<?php echo $v;?>" <?php if(in_array($v, Yii::app()->session['adtitle_list_his'])) echo "checked"; ?>> <?php echo $v?>
																	<span></span>
																</label>
															</div>	
															
													</div>
												<?php } ?>
											</div>
										
									</div>
									<div class="kt-form__actions col-12 " >
										
										<div class="col-5 pull-left">
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#kt_blockui_4_1_modal_add_advertisement">
												<i class="flaticon2-plus"></i> Add New
											</button>
										</div>
										<div class="col-3 pull-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
										<div class="col-3 pull-right">
											<button type="submit" name="reset_adtitlelist" value="reset_adtitlelist" class="btn btn-secondary">Reset</button>
										</div>
										
									</div>
								</form>

								<!--end::Form-->
							</div>

							<!--end::Portlet-->
					</div>
				</div>

				<!--end: Quick Actions -->
				
				<!--begin: Quick Actions -->
				<div class="kt-header__topbar-item dropdown  col-lg-3">
					<div class="col-sm-12 kt-header__topbar-wrapper btn btn-success btn-elevate btn-pill btn-elevate-air btn-md" data-toggle="dropdown" data-offset="0px,7px" aria-expanded="true">
						<span class="kt-header__topbar-icon">
							Mode 
						</span>
					</div>
					<div class="dropdown-menu dropdown-menu-fit dropdown-menu-anim dropdown-menu-top-unround  dropdown-menu-xl">
						<!--begin::Portlet-->
							<div class="kt-portlet">
								<!--begin::Form-->
								<form class="kt-form" method="post" action="sv">
									<div class="kt-portlet__body" style="height:250px;overflow-y:scroll;">
										<div class="col-md-12">
											<div class="col-md-12">
												
												<?php $i=0; foreach($rw_f_ad_mode as $v){ ?>
													<div class="row">	
														<div class="col-sm-8">
															<label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
																<input type="checkbox"  name="admodelist[]" value="<?php echo $v;?>" <?php if(in_array($v, Yii::app()->session['admode_list_his'])) echo "checked"; ?>> <?php echo $v?>
																<span></span>
															</label>
														</div>	
													</div>
												<?php } ?>
												
											</div>
										</div>
									</div>
									<div class="kt-form__actions col-12 " >
										
										<div class="col-5 pull-left">
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#kt_blockui_4_1_modal_add_mode">
												<i class="flaticon2-plus"></i> Add New
											</button>
										</div>
										<div class="col-3 pull-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
										<div class="col-3 pull-right">
											<button type="submit" name="reset_admodelist" value="reset_admodelist" class="btn btn-secondary">Reset</button>
										</div>
										
									</div>
								</form>

								<!--end::Form-->
							</div>

							<!--end::Portlet-->
					</div>
				</div>

				<!--end: Quick Actions -->
				
				
				
			</div>
			
			
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
							<!--begin::Modal ADD NEW VERSION-->
							<div class="modal fade" id="kt_blockui_4_1_modal_add_version" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add version</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="post" action="sv"  enctype="multipart/form-data">
										<div class="modal-body" id="data_view">
											
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Version title:</label>
													<input type="text" name="vnm"  class="form-control" id="title" placeholder="Enter title">
													<span id="err_title" class="kt-font-danger"></span>
												</div>
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">New features:</label>
													<textarea class="form-control" name="feture"  placeholder="Enter features"  id="fetureA" cols="85" rows="5"></textarea>
													<span id="err_fetureA" class="kt-font-danger"></span>
												</div>
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Version code:</label>
													<input type="text" name="vcode" id="vcodeA"  placeholder="Enter version code"  class="form-control" >
													<span id="err_vcodeA" class="kt-font-danger"></span>
												</div>
												
												<div class="form-group row">
													<label class="col-4 col-form-label">Status</label>
													<div class="col-2">
														<span class="kt-switch">
															<label>
																<input type="checkbox" name="enbl" />
																<span></span>
															</label>
														</span>
													</div>
													
													<label class="col-4 col-form-label"> Is forcefully ?</label>
													<div class="col-2">
														<span class="kt-switch">
															<label>
																<input type="checkbox" name="frc" />
																<span></span>
															</label>
														</span>
													</div>
												</div>
												
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit"  onclick="return validate_version(this);"  class="btn btn-primary"  name="addvrs"  >Add</button>
										</div>
										</form>
									</div>
								</div>
							  </div>
							<!--end::Modal-->
							
							<!--begin::Modal ADD NEW ADTYPE-->
							<div class="modal fade" id="kt_blockui_4_1_modal_add_adtype" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add ad-type</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="post" action="sv"  enctype="multipart/form-data">
											<div class="modal-body" id="data_view">
													<div class="form-group">
														<label for="recipient-name" class="form-control-label">Ad-type:</label>
														<input type="text" name="adtp"  class="form-control" id="type" placeholder="Enter ad-type">
														<span id="err_type" class="kt-font-danger"></span>
													</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" onclick="return validate_ad_type(this);" class="btn btn-primary" name="addtype" >Add</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!--end::Modal-->
							
							<!--begin::Modal ADD NEW VERSION-->
							<div class="modal fade" id="kt_blockui_4_1_modal_add_advertisement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add new ad-title</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="post" action="sv"  enctype="multipart/form-data">
										<div class="modal-body" id="data_view">
											
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Advertisement title:</label>
													<input type="text" name="admnm" placeholder="Enter advertisement title"  class="form-control">
													<span id="err_title" class="kt-font-danger"></span>
												</div>
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Count:</label>
													<input type="number" name="count" value="0"  placeholder="View on count"  class="form-control" min="0">
													<span id="err_title" class="kt-font-danger"></span>
												</div>
												<div class="form-group row">
													<label class="col-2 col-form-label">Status</label>
													<div class="col-1">
														<span class="kt-switch">
															<label>
																<input type="checkbox"  name="enbl"  />
																<span></span>
															</label>
														</span>
													</div>
												</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit"  onclick="/*return validate(this);*/"  class="btn btn-primary" name="addTitle" >Add</button>
										</div>
										</form>
									</div>
								</div>
							  </div>
							<!--end::Modal-->
							
							<!--begin::Modal ADD NEW VERSION-->
							<div class="modal fade" id="kt_blockui_4_1_modal_add_mode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add new mode</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="post" action="sv"  enctype="multipart/form-data">
										<div class="modal-body" id="data_view">
											
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Advertisement id:</label>
													<input type="text" name="adcnm"  placeholder="Enter advertisement id"  class="form-control">
													<span id="err_title" class="kt-font-danger"></span>
												</div>
											
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Keyword:</label>
													<input type="text" name="kw" placeholder="Enter keyword" class="form-control">
													<span id="err_title" class="kt-font-danger"></span>
												</div>
												
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit"  onclick="return validate(this);"  class="btn btn-primary" name="addMode" >Add</button>
										</div>
										</form>
									</div>
								</div>
							  </div>
							<!--end::Modal-->
							
							
					</div>
				</div>
			</div>
		
		</div>
		
			
		</div>
	</div>
</div>



<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="row">
		<div class="col">
			<div class="alert alert-light alert-elevate fade show" role="alert">
				<div class="kt-header__topbar-item dropdown  col-lg-3">
					<button onclick="location.href='sv?table=1'" class="btn btn-outline-brand btn-elevate btn-pill col-md-12 <?php if(Yii::app()->session['table']==1)echo 'active';?>" type="button"> Version table</button>
				</div>
				<div class="kt-header__topbar-item dropdown  col-lg-3">
					<button onclick="location.href='sv?table=2'" class="btn btn-outline-brand btn-elevate btn-pill col-md-12 <?php if(Yii::app()->session['table']==2)echo 'active';?>" type="button"> Ad title table</button>
				</div>
				
				<div class="kt-header__topbar-item dropdown  col-lg-3">
					<button onclick="location.href='sv?table=3'" class="btn btn-outline-brand btn-elevate btn-pill col-md-12 <?php if(Yii::app()->session['table']==3)echo 'active';?>" type="button"> Mode table</button>
				</div>
			</div>
		</div>
	</div>
</div>





<?php 
if(Yii::app()->session['table']==1)
	include_once("version_table.php");
else if(Yii::app()->session['table']==2)
	include_once("version_adtitle.php");
else if(Yii::app()->session['table']==3)
	include_once("version_mode.php");
?>


















<script>


////////////VALIDATION SCRIPT ADD/////////
function validate_version(a)
{
	
	//alert(a.id);
	title=document.getElementById("title").value;
	feture=document.getElementById("fetureA").value;
	code=document.getElementById("vcodeA").value;
	
	title_id=document.getElementById("err_title");
	feture_id=document.getElementById("err_fetureA");
	code_id=document.getElementById("err_vcodeA");
	
	title_id.innerHTML='';
	feture_id.innerHTML='';
	code_id.innerHTML='';
	
	IsError=0;
	
	if(title==""){
		title_id.innerHTML="&nbsp;error : version title can't be blank ! ";
		IsError=1;
	}
	if(feture==""){
		feture_id.innerHTML="&nbsp;error : new features can't be blank ! ";
		IsError=1;
	}
	if(code==""){
		code_id.innerHTML="&nbsp;error : version code can't be blank ! ";
		IsError=1;
	}
	
	
	
	if(IsError==0)
	{
		progress();
		return true;
	}
	else
	{
		return false;
	}
	
	
}
function validate_ad_type(a)
{
	
	//alert(a.id);
	type=document.getElementById("type").value;
	
	type_id=document.getElementById("err_type");
	
	type_id.innerHTML='';
	
	IsError=0;
	
	if(type==""){
		type_id.innerHTML="&nbsp;error : ad-type can't be blank ! ";
		IsError=1;
	}
	
	
	if(IsError==0)
	{
		progress();
		return true;
	}
	else
	{
		return false;
	}
	
	
}
////////////END VALIDATION SCRIPT/////////







// Class definition

var KTBootstrapSelect = function () {
    
    // Private functions
    var demos = function () {
        // minimum setup
        $('.kt-selectpicker').selectpicker();
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

jQuery(document).ready(function() {
    KTBootstrapSelect.init();
});

</script>

<!--begin::Page Scripts(used by this page)
		<script src="<?php echo Yii::app()->baseUrl; ?>/assets/js/pages/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
<!--end::Page Scripts -->