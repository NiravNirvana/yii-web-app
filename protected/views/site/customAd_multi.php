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
			<h3 class="kt-subheader__title">Manage Multiple Banner &nbsp;&nbsp;&nbsp;<b class="kt-font-info"> <?php echo Yii::app()->session['title']; ?></b></h3>
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
							<button type="button" class="btn btn-brand btn-icon-sm" onclick="flag=0;showICON_RESET();" data-toggle="modal" data-target="#kt_blockui_4_1_modal">
								<i class="flaticon2-plus"></i> Add New
							</button>
							&nbsp;
							<!--<button type="button" onclick="delete_all_call();" class="btn btn-danger btn-icon-sm" >-->
							<button type="button" onclick="delete_all_call();" class="btn btn-danger btn-icon-sm" >
								<i class="flaticon2-trash"></i> Delete Items
							</button>
							<script>
							var flag=0;
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
										 if (flag==0 && $('#kt_blockui_4_1_modal').attr('aria-hidden')!='true' && $('#kt_blockui_4_1_modal').attr('aria-modal') == 'true' ) {
											
											toastr.info("Select Banner Now !");
											document.getElementById('fileInputA').click();
										 flag=1;
										 }
										 
									});
								});
								
								
							</script>	
							<!--begin::Modal ADD NEW-->
							<div class="modal fade" id="kt_blockui_4_1_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add New Banner</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="post" action="acm"  enctype="multipart/form-data">
										<div class="modal-body" id="add_form">
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
														<input type="file" multiple onchange="loadFileE(event)"  name="multi_banner[]" style="visibility:hidden" id="fileInputA" accept="image/*" />
														<button type="button"  onclick="document.getElementById('fileInputA').click();" class="btn btn-success btn-block">Brows Banner</button>
													</div>
													<div class="col-xl-4">
														<input type="file" multiple onchange="loadFileE1(event)" name="multi_icon_unused[]"  style="visibility:hidden" id="fileInputA11111" accept="image/*" />
														<button type="button"  onclick="showICON()"  class="btn btn-success btn-block">Brows Icon</button>
													</div>
												</div>
											
											
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Design Page:</label>
													<input type="text" name="link"  class="form-control" id="designpage" placeholder="Enter design page link">
													<span id="err_designpage" class="kt-font-danger"></span>
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
										<div class="modal-body" id="icon_select" style="display:none;">
												
												<div class="form-group row">
													<div class="col-xl-3">
														<center>
															<input type="hidden" name="selectedFile" id="selectedFile_ID" value=""/>
															<input type="file" multiple onchange="loadFileE1(event)" name="multi_icon[]"  style="visibility:hidden" id="fileInputA1" accept="image/*" />
															<img id="Aoutput1"  onclick="document.getElementById('fileInputA1').click();"  src="<?php echo Yii::app()->baseUrl; ?>/assets/media/icons/svg/Files//Cloud-upload.svg"  style="max-width:100px;max-height:100px;height:90px;"  />
														</center>
													</div>
													<?php foreach($ICONS_SET as $vv){?>
													<div class="col-xl-3" >
														<center>
															<br>
															<img onclick="selectICON(this,'<?php echo $vv; ?>');" src="<?php echo Yii::app()->baseUrl; ?>/images/AD/<?php echo $vv?>" style="max-width:100px;max-height:100px;height:95px;/*background-color:#E3E1D0;*/" />
														</center>
													</div>
													<?php } ?>
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
										<form method="post" action="acm" id="edit_form1"  enctype="multipart/form-data">
										<div class="modal-body" id="add_form_e">
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
														<input type="file" multiple onchange="loadFileE_e(event)" name="multi_banner" style="visibility:hidden" id="fileInputA_e" accept="image/*" />
														<button type="button"  onclick="document.getElementById('fileInputA_e').click();" class="btn btn-success btn-block">Brows Banner</button>
													</div>
													<div class="col-xl-4">
														<input type="file" multiple onchange="loadFileE1_e(event)" name="multi_icon_unused" style="visibility:hidden" id="fileInputA1_e_unused" accept="image/*" />
														<button type="button"  onclick="showICON_E();"  class="btn btn-success btn-block">Brows Icon</button>
													</div>
												</div>
											
											
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Design Page:</label>
													<input type="text" name="link"  class="form-control" id="designpage_e" placeholder="Enter design page link">
													<span id="err_designpage_e" class="kt-font-danger"></span>
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
										<div class="modal-body" id="icon_select_e" style="display:none;">
												<div class="form-group row">
													<div class="col-xl-3">
														<center>
															<input type="hidden" name="selectedFile" id="selectedFile_ID_e" value=""/>
															<input type="file" multiple onchange="loadFileE1_e(event)" name="multi_icon"  style="visibility:hidden" id="fileInputA1_e" accept="image/*" />
															<img id="Aoutput1_e"  onclick="document.getElementById('fileInputA1_e').click();"  src="<?php echo Yii::app()->baseUrl; ?>/assets/media/icons/svg/Files//Cloud-upload.svg"  style="max-width:100px;max-height:100px;height:90px;"  />
														</center>
													</div>
													<?php foreach($ICONS_SET as $vv){?>
													<div class="col-xl-3">
														<center>
															<br>
															<img onclick="selectICON_E(this,'<?php echo $vv; ?>');" src="<?php echo Yii::app()->baseUrl; ?>/images/AD/<?php echo $vv?>" style="max-width:100px;max-height:100px;height:95px;/*background-color:#E3E1D0;*/" />
														</center>
													</div>
													<?php } ?>
												</div>
										</div>
										<div class="modal-footer">
											<script>
												// this is the id of the form
												$("#edit_form1").submit(function(e) {
													e.preventDefault(); // avoid to execute the actual submit of the form.
													//alert();
													var form = $(this);
													var url = form.attr('action');
													//alert(url);
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
																	console.log(returndata);
																},
																error: function(aa) {
																	//alert(aa);
																	//Do Something to handle error
																	console.log(aa);
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

		<br>
		<!--begin: Pagination-->
					<div class="kt-pagination  kt-pagination--brand">
						<div class="kt-pagination__toolbar">
							<select class="form-control kt-font-brand" style="width: 60px;" onchange="setCookie('ac_pagination_dropdown',this.value,365);setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);window.location='acm?pagination_dropdown='+this.value">
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
								<a href="acm?skip=0" onclick="setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);"><i class="fa fa-angle-double-left kt-font-brand"></i></a>
							</li>
							
							<?php if(0<$_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']){?>
							<li class="kt-pagination__link--next">
								<a href="acm?skip=<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>,365);"><i class="fa fa-angle-left kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<?php if($_COOKIE['ac_pagination_page']!=1){?>
							<li>
								<a href="#">...</a>
							</li>
							<?php } ?>
							
							
							<?php $itrate=ceil($cnt/$_COOKIE['ac_pagination_dropdown']);$i=($_COOKIE['ac_pagination_page']-1)*6;$count=0;while(($i+1)<=$itrate&&$count<6){?>
								<li <?php if($_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']==$i)echo 'class="kt-pagination__link--active"'; ?>>
									<a href="acm?skip=<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>" onclick="setCookie('ac_pagination_skip',<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>,365);"><?php echo $i+1; ?></a>
								</li>
							<?php $i++;$count++;} ?>
							
							
							
							<?php if($_COOKIE['ac_pagination_page']<($itrate/6)){ ?>
								<li>
									<a href="#">...</a>
								</li>
							<?php } ?>
							
							<?php if($_COOKIE['ac_pagination_skip']<($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']))){?>
							<li class="kt-pagination__link--prev">
								<a href="acm?skip=<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>" onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>,365);"><i class="fa fa-angle-right kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<li class="kt-pagination__link--last">
								<a href="acm?skip=<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>" onclick="setCookie('ac_pagination_page',<?php echo ceil(($cnt/$_COOKIE['ac_pagination_dropdown'])/6);?>,365);setCookie('ac_pagination_skip',<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>,365);"><i class="fa fa-angle-double-right kt-font-brand"></i></a>
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
								url: 'acm?did='+id1+'&b='+banner+'&i='+icon,
								success: function(response) {
									//Do Something
									setCookie('ERROR','d2',365);
									window.location.reload();
									
									
								},
								error: function(aa) {
									//Do Something to handle error
								}
							});
					//window.location='acm?did='+id1+'&b='+banner+'&i='+icon;
		   
					//alert();
				}
			});
		}
		function enable_call(id1,enable)
		{
			//alert(enable);return;
			$.ajax({
					url: 'acm?lid='+id1+'&now='+enable,
					success: function(response) {
						//Do Something
						setCookie('ERROR','e1',365);
						console.log(response);
						window.location.reload();
					},
					error: function(aa) {
						//Do Something to handle error
					}
				});
		}
		function delete_all_call()
		{
			var ck=0;
			var deleteAll = 'acm?deleteAll=1&';
					
			$('input[type=checkbox]').each(function () {
				if(this.checked&&($(this).val())!='on')
				{					
					deleteAll+=$(this).val()+'=&';
					ck=ck+1;
				}	
			});
			//alert(ck);alert(deleteAll);return;
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
								error: function(aa) {
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
						<th style="text-align: center;">Design Page </th>
						<th style="text-align: center;">Status </th>
						<th style="text-align: center;">
							<a href="acm?sort=1&on=date&op=<?php if(Yii::app()->session['sort']['sort_cad_op']==-1)echo '1';else echo '-1';?>" style="color:#93A2DD;">
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
						<th style="text-align: center;">Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php $i=$_COOKIE['ac_pagination_skip'];foreach($rw as $key=>$v){$v=json_decode(json_encode($v),true);?>
				<!--<input type="hidden" value="<?php //echo  $key; ;?>" id="h_eid" />-->
					<input type="hidden" value="<?php echo $v['banner']?>" 		 id="<?php echo  $key; ;?>_h_banner" />
					<input type="hidden" value="<?php echo $v['icon']?>" 		 id="<?php echo  $key; ;?>_h_icon" />
					<input type="hidden" value="<?php echo $v['design_page']?>"    id="<?php echo  $key; ;?>_h_designpage" />
					<input type="hidden" value="<?php echo $v['color']?>"       id="<?php echo  $key; ;?>_h_color" />
					<tr>
						<td style="vertical-align: middle;">
							<label class="kt-checkbox">
								<input type="checkbox" id="<?php echo  $key; ;?>" name='del' value="<?php echo  $key;?>"> <?php echo $i+1; ?>
								<span></span>
							</label>
						</td>
						<td style="text-align: center;"><img  src="<?php echo Yii::app()->baseUrl; ?>/images/AD/<?php echo $v['banner']?>" style="height:100px;"  /></td>
						<td style="text-align: center;"><br><img  src="<?php echo Yii::app()->baseUrl; ?>/images/AD/<?php echo $v['icon']?>" style="height:70px;"  /></td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['design_page'];?></td>
						<td style="text-align: center;vertical-align: middle;"><span class="kt-badge kt-badge--inline kt-badge--<?php if($v['enable']==0)echo "dark";else echo "primary"; ?>"><?php if($v['enable']==0)echo "Ofiline";else echo "Online"; ?></span></td>
						<td style="text-align: center;vertical-align: middle;"><?php echo date('d/m/Y',strtotime($v['date']));?></td>
						<td style="text-align: center;vertical-align: middle;" >
							<a nohref  class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit details" data-toggle="modal" nohref data-target="#kt_blockui_4_1_modal_edit" onclick="showICON_RESET_E();getData('<?php echo  $key; ;?>')">
								<i style="font-size: 1.8rem;" class="la la la-edit"></i>
							</a>
							
							<span class="kt-switch kt-switch--sm">
								<label>	
									<input type="checkbox" <?php if($v['enable']=="1")echo 'checked="checked"'; ?> name="" onclick='javascript:enable_call("<?php echo  $key; ?>","<?php echo $v['enable']; ?>")' style="height:16px;position: inherit;margin-left: 0;" />
									<span></span>
								</label>	
							</span>
							<!--
							<a href='javascript:enable_call("<?php echo  $key; ?>","<?php echo $v['enable']; ?>")'  class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit details">
								<i style="font-size: 1.8rem;" class="la la-<?php if($v['enable']==0)echo "ban"; else echo "check-circle";?>"></i>
							</a>-->
							
							<a href='javascript:delete_call("<?php echo  $key; ?>","<?php echo $v['banner']; ?>","<?php echo $v['icon']; ?>");' class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
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
							<select class="form-control kt-font-brand" style="width: 60px;" onchange="setCookie('ac_pagination_dropdown',this.value,365);setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);window.location='acm?pagination_dropdown='+this.value">
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
								<a href="acm?skip=0" onclick="setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);"><i class="fa fa-angle-double-left kt-font-brand"></i></a>
							</li>
							
							<?php if(0<$_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']){?>
							<li class="kt-pagination__link--next">
								<a href="acm?skip=<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>,365);"><i class="fa fa-angle-left kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<?php if($_COOKIE['ac_pagination_page']!=1){?>
							<li>
								<a href="#">...</a>
							</li>
							<?php } ?>
							
							
							<?php $itrate=ceil($cnt/$_COOKIE['ac_pagination_dropdown']);$i=($_COOKIE['ac_pagination_page']-1)*6;$count=0;while(($i+1)<=$itrate&&$count<6){?>
								<li <?php if($_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']==$i)echo 'class="kt-pagination__link--active"'; ?>>
									<a href="acm?skip=<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>" onclick="setCookie('ac_pagination_skip',<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>,365);"><?php echo $i+1; ?></a>
								</li>
							<?php $i++;$count++;} ?>
							
							
							
							<?php if($_COOKIE['ac_pagination_page']<($itrate/6)){ ?>
								<li>
									<a href="#">...</a>
								</li>
							<?php } ?>
							
							<?php if($_COOKIE['ac_pagination_skip']<($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']))){?>
							<li class="kt-pagination__link--prev">
								<a href="acm?skip=<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>" onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>,365);"><i class="fa fa-angle-right kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<li class="kt-pagination__link--last">
								<a href="acm?skip=<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>" onclick="setCookie('ac_pagination_page',<?php echo ceil(($cnt/$_COOKIE['ac_pagination_dropdown'])/6);?>,365);setCookie('ac_pagination_skip',<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>,365);"><i class="fa fa-angle-double-right kt-font-brand"></i></a>
							</li>
						</ul>
						
					</div>

		<!--end: Pagination-->			
	</div>

</div>
<!-- end:: Content -->

<script>
function showICON()
{
	document.getElementById('icon_select').style.display='block';
	document.getElementById('add_form').style.display='none';
}
function selectICON(th,a)
{
	
	//th.style.display='none';
	document.getElementById('selectedFile_ID').value=a;
	
	document.getElementById('Aoutput1').src='<?php echo Yii::app()->baseUrl; ?>/images/AD/'+a;
	document.getElementById('icon_select').style.display='none';
	document.getElementById('add_form').style.display='block';
	//alert();
}
function showICON_RESET()
{
	document.getElementById('icon_select').style.display='none';
	document.getElementById('add_form').style.display='block';
}

/////////////////////EDIT////////////////////
function showICON_E()
{
	document.getElementById('icon_select_e').style.display='block';
	document.getElementById('add_form_e').style.display='none';
}
function selectICON_E(th,a)
{
	
	//th.style.display='none';
	document.getElementById('selectedFile_ID_e').value=a;
	
	document.getElementById('Aoutput1_e').src='<?php echo Yii::app()->baseUrl; ?>/images/AD/'+a;
	document.getElementById('icon_select_e').style.display='none';
	document.getElementById('add_form_e').style.display='block';
	//alert();
}
function showICON_RESET_E()
{
	document.getElementById('icon_select_e').style.display='none';
	document.getElementById('add_form_e').style.display='block';
}





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
	designpage=document.getElementById("designpage").value;
	color=document.getElementById("codeBTCA").value;
	
	image_id=document.getElementById("err_image");
	designpage_id=document.getElementById("err_designpage");
	
	image_id.innerHTML='';
	designpage_id.innerHTML='';
	
	IsError=0;
	
		
	if(banner==""&&icon==""){
		image_id.innerHTML="&nbsp;error : banner & icon can't be blank ! ";
		IsError=1;
	}
	if(designpage==""){
		designpage_id.innerHTML="&nbsp;error : designpage can't be blank ! ";
		IsError=1;
	}
	
	if(IsError==0)
	{
		//progress();
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
	
	document.getElementById('designpage_e').value=document.getElementById(a+'_h_designpage').value;
	document.getElementById('codeBTCA_e').value=document.getElementById(a+'_h_color').value;
	document.getElementById('clrBTCA_e').value=document.getElementById(a+'_h_color').value;
	
}



////////////VALIDATION SCRIPT EDIT/////////
function validate_e(a)
{
	
	//alert(a.id);
	designpage=document.getElementById("designpage_e").value;
	designpage_id=document.getElementById("err_designpage_e");
	
	
	designpage_id.innerHTML='';
	
	IsError=0;
	
	if(designpage==""){
		designpage_id.innerHTML="&nbsp;error : designpage can't be blank ! ";
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
showICON();	
};


var loadFileE1 = function(event) {
 // alert(event.target.files.length);
		var outputE = document.getElementById('Aoutput1');
		outputE.style.height="100px";
		outputE.src = URL.createObjectURL(event.target.files[0]);
	
		document.getElementById('icon_select').style.display='none';
		document.getElementById('add_form').style.display='block';
		document.getElementById('selectedFile_ID').value='';
	
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

//toastr.info("Select Icon Now !");		
//document.getElementById('fileInputA1_e').click();	
};


var loadFileE1_e = function(event) {
 // alert(event.target.files.length);
		var outputE = document.getElementById('Aoutput1_e');
		outputE.style.height="100px";
		outputE.src = URL.createObjectURL(event.target.files[0]);
	
		//alert();
		document.getElementById('icon_select_e').style.display='none';
		document.getElementById('add_form_e').style.display='block';
		document.getElementById('selectedFile_ID_e').value='';
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
