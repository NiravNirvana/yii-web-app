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
				toastr.success("success : Custom-Ad added !");
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
				toastr.success("success : Custom-AD updated !");
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
				toastr.success("success : Custom-AD removed !");
	setCookie('ERROR','',365);	
}	


});
<?php Yii::app()->session['err']=""; ?>	
</script>	




<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Manage Custom-AD</h3>
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
					<i class="kt-font-brand flaticon2-line-chart"></i>
				</span>
				<h3 class="kt-portlet__head-title">
					Total Records:
					<small><?php echo $cnt; ?></small>
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
						&nbsp;
							<button type="button" class="btn btn-brand btn-icon-sm" data-toggle="modal" data-target="#kt_blockui_4_1_modal">
								<i class="flaticon2-plus"></i> Add New
							</button>
							&nbsp;
							<!--<button type="button" onclick="delete_all_call();" class="btn btn-danger btn-icon-sm" >-->
							<button type="button" onclick="delete_all_call();" class="btn btn-danger btn-icon-sm" >
								<i class="flaticon2-trash"></i> Delete Items
							</button>
							<script>
							
								jQuery(document).ready(function() {    
									toastr.options = {
									  "closeButton": false,
									  "debug": false,
									  "newestOnTop": true,
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
	
									$("body").on('DOMSubtreeModified', "#kt_blockui_4_1_modal", function() {
										 if ( $('#kt_blockui_4_1_modal').attr('aria-hidden')!='true' && $('#kt_blockui_4_1_modal').attr('aria-modal') == 'true' ) {
											
											toastr.info("Select Banner Now !");
											document.getElementById('fileInputA').click();
										 }
										 
									});
								});
								
								
							</script>	
							<!--begin::Modal ADD NEW-->
							<div class="modal fade" id="kt_blockui_4_1_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add Custom-AD</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="post" action="ac"  enctype="multipart/form-data">
										<div class="modal-body">
												<div class="form-group row">
													<div class="col-xl-8">
														<center>
															<img id="Aoutput" src="<?php echo Yii::app()->baseUrl; ?>/assets/media/icons/svg/Files//Cloud-upload.svg" style="max-width:250px;max-height:150px;height:150px;"  />
														</center>
													</div>
													<div class="col-xl-4">
														<center>
															<br><br>
															<img id="Aoutput1" src="<?php echo Yii::app()->baseUrl; ?>/assets/media/icons/svg/Files//Cloud-upload.svg"  style="max-width:100px;max-height:100px;height:100px;"  />
														</center>
													</div>
													<div class="col-xl-12">
														<center><span id="err_image" class="kt-font-danger"></span></center>
													</div>	
												</div>
												
												<div class="form-group row">
													<div class="col-xl-8">
														<input type="file" multiple onchange="loadFileE(event)" name="banner" style="visibility:hidden" id="fileInputA" accept="image/*" />
														<button type="button"  onclick="document.getElementById('fileInputA').click();" class="btn btn-success btn-block">Brows Banner</button>
													</div>
													<div class="col-xl-4">
														<input type="file" multiple onchange="loadFileE1(event)" name="icon" style="visibility:hidden" id="fileInputA1" accept="image/*" />
														<button type="button"  onclick="document.getElementById('fileInputA1').click();"  class="btn btn-success btn-block">Brows Icon</button>
													</div>
												</div>
											
											
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Title:</label>
													<input type="text" name="tdnm"  class="form-control" id="title" placeholder="Enter title">
													<span id="err_title" class="kt-font-danger"></span>
												</div>
												
									
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Description:</label>
													<textarea  name="desc"  class="form-control" rows="3" id="description" placeholder="Enter description"></textarea>
													<span id="err_desc" class="kt-font-danger"></span>
												</div>
												
									
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Playstore Link:</label>
													<input type="text" name="link"  class="form-control" id="playstorelink" placeholder="Enter playstore link">
													<span id="err_playlink" class="kt-font-danger"></span>
												</div>
												
									
												<div class="form-group row">
													<div class="col-xl-4">
														<label for="recipient-name" class="form-control-label">Rating:</label>
														<input type="text" name="rating"  class="form-control" id="rating" placeholder="Enter rating">
													</div>
													<div class="col-xl-4">
														<label for="recipient-name" class="form-control-label">Reviews:</label>
														<input type="text" name="review"  class="form-control" id="review" placeholder="Enter review">
													</div>
													<div class="col-xl-4">
														<label for="recipient-name" class="form-control-label">Downloads:</label>
														<input type="text" name="download"  class="form-control" id="downloads" placeholder="Enter downloads">
													</div>
													<span id="err_color" class="kt-font-danger"></span>
												</div>
												
									
												<div class="form-group row">
													<div class="col-xl-8">
														<label for="recipient-name" class="form-control-label">Button Color:</label>
														<input type="color" class="form-control" id="clrBTCA" onchange="getcodeBTCA(this);" value="#A50303">
													</div>
													<div class="col-xl-4">
														<label for="recipient-name" class="form-control-label">Color Code:</label>
														<input type="text" class="form-control" name="clr" onblur="setcolorBTCA(this)" value="#A50303" id="codeBTCA" >
													</div>
												</div>
												
											
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit"  onclick="return validate(this);"  class="btn btn-primary" name="addTD" id="kt_blockui_4_1">Add</button>
										</div>
										</form>
									</div>
								</div>
							  </div>
							<!--end::Modal-->
							<!--begin::Modal EDIT NEW-->
							<div class="modal fade" id="kt_blockui_4_1_modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Edit Custom-AD</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="post" action="ac" id="edit_form"  enctype="multipart/form-data">
										<div class="modal-body">
												<div class="form-group row">
													<div class="col-xl-8">
														<center>
															<img id="Aoutput_e" src="<?php echo Yii::app()->baseUrl; ?>/assets/media/icons/svg/Files//Cloud-upload.svg" style="max-width:250px;max-height:150px;height:150px;"  />
														</center>
													</div>
													<div class="col-xl-4">
														<center>
															<br><br>
															<img id="Aoutput1_e" src="<?php echo Yii::app()->baseUrl; ?>/assets/media/icons/svg/Files//Cloud-upload.svg"  style="max-width:100px;max-height:100px;height:100px;"  />
														</center>
													</div>
													<div class="col-xl-12">
														<center><span id="err_image_e" class="kt-font-danger"></span></center>
													</div>	
												</div>
												
												<div class="form-group row">
													<div class="col-xl-8">
														<input type="file" multiple onchange="loadFileE_e(event)" name="banner" style="visibility:hidden" id="fileInputA_e" accept="image/*" />
														<button type="button"  onclick="document.getElementById('fileInputA_e').click();" class="btn btn-success btn-block">Brows Banner</button>
													</div>
													<div class="col-xl-4">
														<input type="file" multiple onchange="loadFileE1_e(event)" name="icon" style="visibility:hidden" id="fileInputA1_e" accept="image/*" />
														<button type="button"  onclick="document.getElementById('fileInputA1_e').click();"  class="btn btn-success btn-block">Brows Icon</button>
													</div>
												</div>
											
											
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Title:</label>
													<input type="text" name="tdnm"  class="form-control" id="title_e" placeholder="Enter title">
													<span id="err_title_e" class="kt-font-danger"></span>
												</div>
												
									
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Description:</label>
													<textarea  name="desc"  class="form-control" rows="3" id="description_e" placeholder="Enter description"></textarea>
													<span id="err_desc_e" class="kt-font-danger"></span>
												</div>
												
									
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Playstore Link:</label>
													<input type="text" name="link"  class="form-control" id="playstorelink_e" placeholder="Enter playstore link">
													<span id="err_playlink_e" class="kt-font-danger"></span>
												</div>
												
									
												<div class="form-group row">
													<div class="col-xl-4">
														<label for="recipient-name" class="form-control-label">Rating:</label>
														<input type="text" name="rating"  class="form-control" id="rating_e" placeholder="Enter rating">
													</div>
													<div class="col-xl-4">
														<label for="recipient-name" class="form-control-label">Reviews:</label>
														<input type="text" name="review"  class="form-control" id="review_e" placeholder="Enter review">
													</div>
													<div class="col-xl-4">
														<label for="recipient-name" class="form-control-label">Downloads:</label>
														<input type="text" name="download"  class="form-control" id="downloads_e" placeholder="Enter downloads">
													</div>
													<span id="err_color_e" class="kt-font-danger"></span>
												</div>
												
									
												<div class="form-group row">
													<div class="col-xl-8">
														<label for="recipient-name" class="form-control-label">Button Color:</label>
														<input type="color" class="form-control" id="clrBTCA_e" onchange="getcodeBTCA_e(this);" value="#A50303">
													</div>
													<div class="col-xl-4">
														<label for="recipient-name" class="form-control-label">Color Code:</label>
														<input type="text" class="form-control" name="clr" onblur="setcolorBTCA_e(this)" value="#A50303" id="codeBTCA_e" >
													</div>
												</div>
												
											
										</div>
										<div class="modal-footer">
											<script>
												// this is the id of the form
												$("#edit_form").submit(function(e) {
													e.preventDefault(); // avoid to execute the actual submit of the form.

													var form = $(this);
													var url = form.attr('action');
													
													var formData = new FormData($(this)[0]);
													$.ajax({
																url: url,
																type: 'POST',
																data: formData,
																async: false,
																cache: false,
																contentType: false,
																processData: false,
																success: function (returndata) {
																	//alert(returndata);
																	setCookie('ERROR','e1',365);
																	window.location.reload();
																}
															});
												});
											</script>
											
											
											
											<input type="hidden" name="oldbanner" value="" id="oldbanner" />
											<input type="hidden" name="oldicon" value="" id="oldicon" />
											<input type="hidden" name="eid" value="" id="eid" />
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit"  onclick="return validate_e(this);"  class="btn btn-primary" name="editST" id="kt_blockui_4_1_edit">Edit</button>
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
		<div class="kt-portlet__body">

			<!--begin: Search Form -->
			<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
				<div class="row align-items-center">
					<div class="col-xl-8 order-2 order-xl-1">
						<div class="row align-items-center">
							
							<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
								<div class="kt-form__group kt-form__group--inline">
									<div class="kt-form__label">
										<label>Status:</label>
									</div>
									
									<div class="dropdown">
										<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<?php if(Yii::app()->session['search_cad']==2)echo "All Status";
												  else if(Yii::app()->session['search_cad']==1)echo "Online";
												  else if(Yii::app()->session['search_cad']==0)echo "Offline";
													
											?>
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href='javascript:resetCookie();window.location="ac?search=1&type=2";'>All</a>
											<a class="dropdown-item" href='javascript:resetCookie();window.location="ac?search=1&type=1";'>Online</a>
											<a class="dropdown-item" href='javascript:resetCookie();window.location="ac?search=1&type=0";'>Offline</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
								<script>
									jQuery('#generalSearch').ready(function() { 
										//alert($('#generalSearch').val());
										var oldtxt=$('#generalSearch').val();
										if(oldtxt!='')
											$('#generalSearch').focus().val("").blur().focus().val(oldtxt);
									});		
								</script>
								<div class="kt-input-icon kt-input-icon--left">
									<input type="text" class="form-control" placeholder="Search..." value="<?php if(isset(Yii::app()->session['generalSearch'])) echo Yii::app()->session['generalSearch']; ?>" <?php /*if(isset(Yii::app()->session['search_cad'])&&Yii::app()->session['search_cad']!='')echo 'autofocus';*/?> id="generalSearch">
									<span class="kt-input-icon__icon kt-input-icon__icon--left">
										<span><i class="la la-search"></i></span>
									</span>
								</div>
								
							</div>
							<div class="col-md-1 kt-margin-b-20-tablet-and-mobile" id="progress" style="visibility:hidden;">
								<div class="col-sm" >
									<div class="kt-spinner kt-spinner--sm kt-spinner--brand"></div>
								</div>
							</div>
							<!--
							<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
								<div class="kt-form__group kt-form__group--inline">
									<div class="kt-form__label">
										<label>Type:</label>
									</div>
									<div class="kt-form__control">
										<select class="form-control bootstrap-select" id="kt_form_type">
											<option value="">All</option>
											<option value="1">Online</option>
											<option value="2">Retail</option>
											<option value="3">Direct</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						-->
					</div>
					<div class="col-xl-4 order-1 order-xl-2 kt-align-right">
						<a href="#" class="btn btn-default kt-hidden">
							<i class="la la-cart-plus"></i> New Order
						</a>
						<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none"></div>
					</div>
				</div>
			</div>

			<!--end: Search Form -->
		</div>
		<br>
		<!--begin: Pagination-->
					<div class="kt-pagination  kt-pagination--brand">
						<div class="kt-pagination__toolbar">
							<select class="form-control kt-font-brand" style="width: 60px;" onchange="setCookie('ac_pagination_dropdown',this.value,365);setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);window.location='ac?pagination_dropdown='+this.value">
								<option <?php if(isset($_COOKIE['ac_pagination_dropdown'])&& $_COOKIE['ac_pagination_dropdown']==10) echo "selected" ; ?> value="10">10</option>
								<option <?php if(isset($_COOKIE['ac_pagination_dropdown'])&& $_COOKIE['ac_pagination_dropdown']==20) echo "selected" ; ?> value="20">20</option>
								<option <?php if(isset($_COOKIE['ac_pagination_dropdown'])&& $_COOKIE['ac_pagination_dropdown']==30) echo "selected" ; ?> value="30">30</option>
								<option <?php if(isset($_COOKIE['ac_pagination_dropdown'])&& $_COOKIE['ac_pagination_dropdown']==50) echo "selected" ; ?> value="50">50</option>
								<option <?php if(isset($_COOKIE['ac_pagination_dropdown'])&& $_COOKIE['ac_pagination_dropdown']==100)echo "selected" ; ?> value="100">100</option>
							</select>
							<span class="pagination__desc">
									Displaying <?php if(isset($_COOKIE['ac_pagination_dropdown'])) echo  $_COOKIE['ac_pagination_dropdown']; ?> of <?php echo $cnt; ?> records
							</span>
						</div>
						<ul class="kt-pagination__links">
							<li class="kt-pagination__link--first">
								<a href="ac?skip=0" onclick="setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);"><i class="fa fa-angle-double-left kt-font-brand"></i></a>
							</li>
							
							<?php if(0<$_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']){?>
							<li class="kt-pagination__link--next">
								<a href="ac?skip=<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>,365);"><i class="fa fa-angle-left kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<?php if($_COOKIE['ac_pagination_page']!=1){?>
							<li>
								<a href="#">...</a>
							</li>
							<?php } ?>
							
							
							<?php $itrate=ceil($cnt/$_COOKIE['ac_pagination_dropdown']);$i=($_COOKIE['ac_pagination_page']-1)*6;$count=0;while(($i+1)<=$itrate&&$count<6){?>
								<li <?php if($_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']==$i)echo 'class="kt-pagination__link--active"'; ?>>
									<a href="ac?skip=<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>" onclick="setCookie('ac_pagination_skip',<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>,365);"><?php echo $i+1; ?></a>
								</li>
							<?php $i++;$count++;} ?>
							
							
							
							<?php if($_COOKIE['ac_pagination_page']<($itrate/6)){ ?>
								<li>
									<a href="#">...</a>
								</li>
							<?php } ?>
							
							<?php if($_COOKIE['ac_pagination_skip']<($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']))){?>
							<li class="kt-pagination__link--prev">
								<a href="ac?skip=<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>" onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>,365);"><i class="fa fa-angle-right kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<li class="kt-pagination__link--last">
								<a href="ac?skip=<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>" onclick="setCookie('ac_pagination_page',<?php echo ceil(($cnt/$_COOKIE['ac_pagination_dropdown'])/6);?>,365);setCookie('ac_pagination_skip',<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>,365);"><i class="fa fa-angle-double-right kt-font-brand"></i></a>
							</li>
						</ul>
						
					</div>

		<!--end: Pagination-->		
		<br>
		<div class="kt-portlet__body kt-portlet__body--fit table-responsive">
		<script>
		function delete_call(id1,banner,icon)
		{
			
			//alert();
			swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes, delete it!'
			}).then(function(result) {
				if (result.value) {
					progress();
					
					$.ajax({
								url: 'ac?did='+id1+'&b='+banner+'&i='+icon,
								success: function(response) {
									//Do Something
									setCookie('ERROR','d2',365);
									window.location.reload();
									
									
								},
								error: function(xhr) {
									//Do Something to handle error
								}
							});
					//window.location='ac?did='+id1+'&b='+banner+'&i='+icon;
		   
					//alert();
				}
			});
		}
		function enable_call(id1,enable)
		{
			$.ajax({
					url: 'ac?lid='+id1+'&now='+enable,
					success: function(response) {
						//Do Something
						setCookie('ERROR','e1',365);
						
						window.location.reload();
					},
					error: function(xhr) {
						//Do Something to handle error
					}
				});
		}
		function delete_all_call()
		{
			var ck=0;
			var deleteAll = 'ac?deleteAll=1&';
					
			$('input[type=checkbox]').each(function () {
				if(this.checked&&($(this).val())!='on')
				{					
					deleteAll+=$(this).val()+'=&';
					ck=ck+1;
				}	
			});
			//alert(ck);return;
			// if no checkbox seleceted
			if(ck==0)return;
			
			//alert();
			swal.fire({
				title: 'Are you sure?',
				text: ck+" Rows - You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes, delete it!'
			}).then(function(result) {
				if (result.value) {
					
					//alert(deleteAll);
					
					progress();
					
					$.ajax({
								url: deleteAll,
								success: function(response) {
									//Do Something
									setCookie('ERROR','d2',365);
									window.location.reload();
								},
								error: function(xhr) {
									//Do Something to handle error
								}
							});
					//alert();
				}
			});
		}
		
		function checkedALL(a)
		{
			//alert(a.checked);
			
				
			$("input[name='del']").each(function() {
				if(a.checked==true)
					this.checked = true;
				else
					this.checked = false;
			});	
				
		}
		
		function progress()
		{
			KTApp.blockPage({
				overlayColor: '#000000',
				type: 'v2',
				state: 'primary',
				message: 'Processing...'
			});

			setTimeout(function() {
				KTApp.unblockPage();
			}, 2000);
			
		}
		
		</script>
			<!--begin: Datatable -->
			<table class="table table-striped" id="table_search">
				<thead>
					<tr>
						<th width="35">
							<label class="kt-checkbox">
								<input type="checkbox" onclick="checkedALL(this);" > No
								<span></span>
							</label>
						</th>
						<th style="text-align: center;">Banner</th>
						<th style="text-align: center;">Icon  </th>
						<th style="text-align: center;">
							<a href="ac?sort=1&on=add_title&op=<?php if(Yii::app()->session['sort']['sort_cad_op']==-1)echo '1';else echo '-1';?>" style="color:#93A2DD;">
								Title
							    <?php if(Yii::app()->session['sort']['sort_cad_on']=='add_title'){
										if(Yii::app()->session['sort']['sort_cad_op']==-1){?>
								<i class="la la-long-arrow-up"></i>
								<?php }else if(Yii::app()->session['sort']['sort_cad_op']==1){?>
								<i class="la la-long-arrow-down "></i>
								<?php }}else{ ?>
								<i class="la la-long-arrow-down " style="visibility:hidden"></i>
								<?php }?>
								
							</a>
						</th>
						<th style="text-align: center;">
							<a href="ac?sort=1&on=date&op=<?php if(Yii::app()->session['sort']['sort_cad_op']==-1)echo '1';else echo '-1';?>" style="color:#93A2DD;">
								Uploaded
							    <?php  if(Yii::app()->session['sort']['sort_cad_on']=='date'){
										if(Yii::app()->session['sort']['sort_cad_op']==-1){?>
								<i class="la la-long-arrow-up"></i>
								<?php }else if(Yii::app()->session['sort']['sort_cad_op']==1){?>
								<i class="la la-long-arrow-down "></i>
								<?php }}else{ ?>
								<i class="la la-long-arrow-down " style="visibility:hidden"></i>
								<?php } ?>
								
							</a>
						</th>
						<th style="text-align: center;">Status </th>
						<th style="text-align: center;">Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php $i=$_COOKIE['ac_pagination_skip'];foreach($rw as $v){$v=json_decode(json_encode($v),true);?>
				<!--<input type="hidden" value="<?php echo $v['_id']['$oid'];?>" id="h_eid" />-->
					<input type="hidden" value="<?php echo $v['banner']?>" 		 id="<?php echo $v['_id']['$oid'];?>_h_banner" />
					<input type="hidden" value="<?php echo $v['icon']?>" 		 id="<?php echo $v['_id']['$oid'];?>_h_icon" />
					<input type="hidden" value="<?php echo $v['add_title']?>"    id="<?php echo $v['_id']['$oid'];?>_h_title" />
					<input type="hidden" value="<?php echo $v['add_desc']?>"     id="<?php echo $v['_id']['$oid'];?>_h_desc" />
					<input type="hidden" value="<?php echo $v['install']?>"      id="<?php echo $v['_id']['$oid'];?>_h_pl" />
					<input type="hidden" value="<?php echo $v['review']?>"        id="<?php echo $v['_id']['$oid'];?>_h_review" />
					<input type="hidden" value="<?php echo $v['rating']?>"       id="<?php echo $v['_id']['$oid'];?>_h_rating" />
					<input type="hidden" value="<?php echo $v['download']?>"     id="<?php echo $v['_id']['$oid'];?>_h_downloads" />
					<input type="hidden" value="<?php echo $v['color']?>"       id="<?php echo $v['_id']['$oid'];?>_h_color" />
					<tr>
						<td style="vertical-align: middle;">
							<label class="kt-checkbox">
								<input type="checkbox" name='del' id="<?php echo $v['_id']['$oid'];?>" value="<?php echo $v['_id']['$oid'];?>"> <?php echo $i+1; ?>
								<span></span>
							</label>
						</td>
						<td style="text-align: center;"><img  src="<?php echo Yii::app()->baseUrl; ?>/images/AD/<?php echo $v['banner']?>" style="height:100px;"  /></td>
						<td style="text-align: center;"><br><img  src="<?php echo Yii::app()->baseUrl; ?>/images/AD/<?php echo $v['icon']?>" style="height:70px;"  /></td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['add_title'];?></td>
						<td style="text-align: center;vertical-align: middle;"><?php echo date('d/m/Y',strtotime($v['date']));?></td>
						<td style="text-align: center;vertical-align: middle;"><span class="kt-badge kt-badge--inline kt-badge--<?php if($v['enable']==0)echo "dark";else echo "primary"; ?>"><?php if($v['enable']==0)echo "Ofiline";else echo "Online"; ?></span></td>
						<td style="text-align: center;vertical-align: middle;" >
							
							
							<!--<div class="dropdown">
								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">
									<i class="la la-cog" style="font-size: 1.8rem;"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
									<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Manage Banners</a>
								</div>
							</div>-->
							
							<div class="dropdown dropdown-inline">
								<button type="button" class="btn btn-clean btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="la la-cog" style="font-size: 1.8rem;"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item"  data-toggle="modal" nohref data-target="#kt_blockui_4_1_modal_edit" onclick="getData('<?php echo $v['_id']['$oid'];?>')"><i class="la la-edit"></i> Edit Details</a>
									<a class="dropdown-item" href="acm?FR=<?php echo $v['_id']['$oid']; ?>&title=<?php echo $v['add_title'];?>"><i class="la la-image"></i> Manage Banners</a>
								</div>
							</div>
							<span class="kt-switch kt-switch--sm">
								<label>	
									<input type="checkbox" <?php if($v['enable']=="1")echo 'checked="checked"'; ?> name="" onclick='javascript:enable_call("<?php echo $v['_id']['$oid']; ?>","<?php echo $v['enable']; ?>")' style="height:16px;position: inherit;margin-left: 0;" />
									<span></span>
								</label>	
							</span>
							<!--
							<a href='javascript:enable_call("<?php echo $v['_id']['$oid']; ?>","<?php echo $v['enable']; ?>")'  class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit details">
								<i style="font-size: 1.8rem;" class="la la-<?php if($v['enable']==0)echo "ban"; else echo "check-circle";?>"></i>
							</a>
							-->
							<a href='javascript:delete_call("<?php echo $v['_id']['$oid']; ?>","<?php echo $v['banner']; ?>","<?php echo $v['icon']; ?>");' class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
								<i class="la la-trash" style="color:red;font-size: 1.8rem;"></i>
							</a>
						</td>
						
					</tr>
				<?php $i++; } ?>	
				</tbody>
					
			</table>
								
		<!--end: Datatable -->
		</div>
		<br>
				<!--begin: Pagination-->
					<div class="kt-pagination  kt-pagination--brand">
						<div class="kt-pagination__toolbar">
							<select class="form-control kt-font-brand" style="width: 60px;" onchange="setCookie('ac_pagination_dropdown',this.value,365);setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);window.location='ac?pagination_dropdown='+this.value">
								<option <?php if(isset($_COOKIE['ac_pagination_dropdown'])&& $_COOKIE['ac_pagination_dropdown']==10) echo "selected" ; ?> value="10">10</option>
								<option <?php if(isset($_COOKIE['ac_pagination_dropdown'])&& $_COOKIE['ac_pagination_dropdown']==20) echo "selected" ; ?> value="20">20</option>
								<option <?php if(isset($_COOKIE['ac_pagination_dropdown'])&& $_COOKIE['ac_pagination_dropdown']==30) echo "selected" ; ?> value="30">30</option>
								<option <?php if(isset($_COOKIE['ac_pagination_dropdown'])&& $_COOKIE['ac_pagination_dropdown']==50) echo "selected" ; ?> value="50">50</option>
								<option <?php if(isset($_COOKIE['ac_pagination_dropdown'])&& $_COOKIE['ac_pagination_dropdown']==100)echo "selected" ; ?> value="100">100</option>
							</select>
							<span class="pagination__desc">
									Displaying <?php if(isset($_COOKIE['ac_pagination_dropdown'])) echo  $_COOKIE['ac_pagination_dropdown']; ?> of <?php echo $cnt; ?> records
							</span>
						</div>
						<ul class="kt-pagination__links">
							<li class="kt-pagination__link--first">
								<a href="ac?skip=0" onclick="setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);"><i class="fa fa-angle-double-left kt-font-brand"></i></a>
							</li>
							
							<?php if(0<$_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']){?>
							<li class="kt-pagination__link--next">
								<a href="ac?skip=<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>,365);"><i class="fa fa-angle-left kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<?php if($_COOKIE['ac_pagination_page']!=1){?>
							<li>
								<a href="#">...</a>
							</li>
							<?php } ?>
							
							
							<?php $itrate=ceil($cnt/$_COOKIE['ac_pagination_dropdown']);$i=($_COOKIE['ac_pagination_page']-1)*6;$count=0;while(($i+1)<=$itrate&&$count<6){?>
								<li <?php if($_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']==$i)echo 'class="kt-pagination__link--active"'; ?>>
									<a href="ac?skip=<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>" onclick="setCookie('ac_pagination_skip',<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>,365);"><?php echo $i+1; ?></a>
								</li>
							<?php $i++;$count++;} ?>
							
							
							
							<?php if($_COOKIE['ac_pagination_page']<($itrate/6)){ ?>
								<li>
									<a href="#">...</a>
								</li>
							<?php } ?>
							
							<?php if($_COOKIE['ac_pagination_skip']<($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']))){?>
							<li class="kt-pagination__link--prev">
								<a href="ac?skip=<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>" onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>,365);"><i class="fa fa-angle-right kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<li class="kt-pagination__link--last">
								<a href="ac?skip=<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>" onclick="setCookie('ac_pagination_page',<?php echo ceil(($cnt/$_COOKIE['ac_pagination_dropdown'])/6);?>,365);setCookie('ac_pagination_skip',<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>,365);"><i class="fa fa-angle-double-right kt-font-brand"></i></a>
							</li>
						</ul>
						
					</div>

		<!--end: Pagination-->			
	</div>

</div>

						<!-- end:: Content -->
<script>




// GENRAL SEARCH //////////////////
jQuery(document).ready(function() { 
	jQuery('#generalSearch').on('input', function() {
		//alert(""+$(this).val());
			//visibility:hidden
			$("#progress").css({"visibility":"visible"});
			$.ajax({
					url: 'ac?generalSearch='+$(this).val(),
					success: function(response) {
						//Do Something
						console.log(response);
						//$("#table_search").empty();
						// $("#progress").css({"visibility":"hidden"});
						window.location.reload();
						
							
						
						
					},
					error: function(xhr) {
						//Do Something to handle error
						console.log(xhr);
					}
				});
			
	});
});
								







/////// RESET COOKIE ///////////
function resetCookie()
{
		setCookie('ac_pagination_dropdown',10,365);
		setCookie('ac_pagination_page','1',365);
		setCookie('ac_pagination_skip','0',365);
}



////////////VALIDATION SCRIPT ADD/////////
function validate(a)
{
	
	//alert(a.id);
	banner=document.getElementById("fileInputA").value;
	icon=document.getElementById("fileInputA1").value;
	title=document.getElementById("title").value;
	desc=document.getElementById("description").value;
	playlink=document.getElementById("playstorelink").value;
	color=document.getElementById("codeBTCA").value;
	
	image_id=document.getElementById("err_image");
	title_id=document.getElementById("err_title");
	desc_id=document.getElementById("err_desc");
	playlink_id=document.getElementById("err_playlink");
	color_id=document.getElementById("err_color");
	
	image_id.innerHTML='';
	title_id.innerHTML='';
	desc_id.innerHTML='';
	playlink_id.innerHTML='';
	color_id.innerHTML='';
	
	IsError=0;
	
		
	if(banner==""&&icon==""){
		image_id.innerHTML="&nbsp;error : banner & icon can't be blank ! ";
		IsError=1;
	}
	if(title==""){
		title_id.innerHTML="&nbsp;error : title can't be blank ! ";
		IsError=1;
	}
	if(desc==""){
		desc_id.innerHTML="&nbsp;error : description can't be blank ! ";
		IsError=1;
	}
	if(playlink==""){
		playlink_id.innerHTML="&nbsp;error : Playstore link can't be blank ! ";
		IsError=1;
	}
	if(color==""){
		color_id.innerHTML="&nbsp;error : color can't be blank ! ";
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


////////////GET DATA() ///////////////////////
function getData(a)
{
	//alert(a);
	
	
	
	document.getElementById('Aoutput_e').src= '<?php echo Yii::app()->baseUrl; ?>/images/AD/'+document.getElementById(a+'_h_banner').value;
	document.getElementById('Aoutput1_e').src='<?php echo Yii::app()->baseUrl; ?>/images/AD/'+document.getElementById(a+'_h_icon').value;
	
	//OLD BANNER&ICON
	document.getElementById('oldbanner').value= document.getElementById(a+'_h_banner').value;
	document.getElementById('oldicon').value=document.getElementById(a+'_h_icon').value;
	
	
	document.getElementById('eid').value=a;
	
	document.getElementById('title_e').value=document.getElementById(a+'_h_title').value;
	document.getElementById('description_e').value=document.getElementById(a+'_h_desc').value;
	document.getElementById('playstorelink_e').value=document.getElementById(a+'_h_pl').value;
	document.getElementById('rating_e').value=document.getElementById(a+'_h_rating').value;
	document.getElementById('review_e').value=document.getElementById(a+'_h_review').value;
	document.getElementById('downloads_e').value=document.getElementById(a+'_h_downloads').value;
	document.getElementById('codeBTCA_e').value=document.getElementById(a+'_h_color').value;
	document.getElementById('clrBTCA_e').value=document.getElementById(a+'_h_color').value;
	
}



////////////VALIDATION SCRIPT EDIT/////////
function validate_e(a)
{
	
	//alert(a.id);
	title=document.getElementById("title_e").value;
	desc=document.getElementById("description_e").value;
	playlink=document.getElementById("playstorelink_e").value;
	color=document.getElementById("codeBTCA_e").value;
	
	title_id=document.getElementById("err_title_e");
	desc_id=document.getElementById("err_desc_e");
	playlink_id=document.getElementById("err_playlink_e");
	color_id=document.getElementById("err_color_e");
	
	title_id.innerHTML='';
	desc_id.innerHTML='';
	playlink_id.innerHTML='';
	color_id.innerHTML='';
	
	IsError=0;
	
		
	if(title==""){
		title_id.innerHTML="&nbsp;error : title can't be blank ! ";
		IsError=1;
	}
	if(desc==""){
		desc_id.innerHTML="&nbsp;error : description can't be blank ! ";
		IsError=1;
	}
	if(playlink==""){
		playlink_id.innerHTML="&nbsp;error : Playstore link can't be blank ! ";
		IsError=1;
	}
	if(color==""){
		color_id.innerHTML="&nbsp;error : color can't be blank ! ";
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

////////////IMAGE UPLOAD SCRIPT/////////
function getcodeBTCA(a)
{
		//alert();
		document.getElementById('codeBTCA').value = a.value;
}
function setcolorBTCA(a)
{
		//alert();
		document.getElementById('clrBTCA').value = a.value;
}

var loadFileE = function(event) {
 // alert(event.target.files.length);
		var outputE = document.getElementById('Aoutput');
		outputE.style.height="150px";
		outputE.src = URL.createObjectURL(event.target.files[0]);

toastr.info("Select Icon Now !");		
document.getElementById('fileInputA1').click();	
};


var loadFileE1 = function(event) {
 // alert(event.target.files.length);
		var outputE = document.getElementById('Aoutput1');
		outputE.style.height="100px";
		outputE.src = URL.createObjectURL(event.target.files[0]);
	
};
//////////////////////////////EDIT FUN
function getcodeBTCA_e(a)
{
		//alert();
		document.getElementById('codeBTCA_e').value = a.value;
}
function setcolorBTCA_e(a)
{
		//alert();
		document.getElementById('clrBTCA_e').value = a.value;
}

var loadFileE_e = function(event) {
 // alert(event.target.files.length);
		var outputE = document.getElementById('Aoutput_e');
		outputE.style.height="150px";
		outputE.src = URL.createObjectURL(event.target.files[0]);

toastr.info("Select Icon Now !");		
document.getElementById('fileInputA1_e').click();	
};


var loadFileE1_e = function(event) {
 // alert(event.target.files.length);
		var outputE = document.getElementById('Aoutput1_e');
		outputE.style.height="100px";
		outputE.src = URL.createObjectURL(event.target.files[0]);
	
};

////////////END IMAGE UPLOAD SCRIPT /////////




///////////// ADD DATA SCRIPT DILOG
/*
 "use strict";
// Class definition
var KTBlockUIDemo = function () {
    // Private functions
    // modal blocking
    var demo4 = function () {
        // default
        $('#kt_blockui_4_1').click(function() {
            // geting Data From Fields
				var f1=$( "#name1" ).val();
				var f2=$( "#name2" ).val();
			
				//alert(f1);
				//alert(f2);
			
			
			// PROGRESS BAR CODE
				//Show Loader
				KTApp.block('#kt_blockui_4_1_modal .modal-content', {});
				setTimeout(function() {
					// Hide Loader
						KTApp.unblock('#kt_blockui_4_1_modal .modal-content');
					
					// DISMISS DILOG
						$('#kt_blockui_4_1_modal').modal('toggle'); 
					
					// Making empty Controlls
						$( "#name1" ).val("");
						$( "#name2" ).val("");
				}, 2000);
        });
     }

    return {
        // public functions
        init: function() {
            demo4(); 
        }
    };
}();

jQuery(document).ready(function() {    
    KTBlockUIDemo.init();
});
*/
///////////// END ADD DATA SCRIPT DILOG////////////////

///////////// DATA TABLE SCRIPT DILOG /////////////////

///////////// KTSweetAlert2Demo SCRIPT DILOG
  $('#kt_sweetalert_demo_8').click(function(e) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                if (result.value) {
                    swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            });
        });
///////////// END KTSweetAlert2Demo SCRIPT DILOG
</script>



<!--begin::Page Scripts(used by this page) 
		<script src="<?php echo Yii::app()->baseUrl; ?>/assets/js/pages/crud/metronic-datatable/base/html-table.js" type="text/javascript"></script>
<!--end::Page Scripts -->
<!--end::Page Scripts 
<script src="<?php echo Yii::app()->baseUrl; ?>/assets/js/pages/components/extended/sweetalert2.js" type="text/javascript"></script>
-->
