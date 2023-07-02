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
				toastr.success("success : Admin added !");
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
				toastr.success("success : Sticker updated !");
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
				toastr.success("success : Sticker removed !");
	setCookie('ERROR','',365);	
}	


});
<?php Yii::app()->session['err']=""; ?>	
</script>	




<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Manage Admin</h3>
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
							<button type="button" onclick="showStickerList_RESET();" class="btn btn-brand btn-icon-sm" data-toggle="modal" data-target="#kt_blockui_4_1_modal">
								<i class="flaticon2-plus"></i> Add New
							</button>
							&nbsp;
							
							<button type="button" onclick="delete_all_call();" class="btn btn-danger btn-icon-sm" >
								<i class="flaticon2-trash"></i> Delete Items
							</button>
							<!--begin::Modal ADD NEW-->
							<div class="modal fade" id="kt_blockui_4_1_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="post" action="na"  enctype="multipart/form-data">
										<div class="modal-body" id="data_view">
											
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Title:</label>
													<input type="text" name="tdnm"  class="form-control" id="title" placeholder="Enter title">
													<span id="err_title" class="kt-font-danger"></span>
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
											<h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="post" action="na" id="edit_form"  enctype="multipart/form-data">
										<div class="modal-body" id="data_view">
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Title:</label>
													<input type="text" name="tdnm"  class="form-control" id="title_e" placeholder="Enter title">
													<span id="err_title_e" class="kt-font-danger"></span>
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
											
											
											
											<input type="hidden" name="oldthumbnail" value="" id="oldthumbnail" />
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
							
							<div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
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
											<a class="dropdown-item" href='javascript:resetCookie();window.location="na?search=1&type=2";'>All</a>
											<a class="dropdown-item" href='javascript:resetCookie();window.location="na?search=1&type=1";'>Online</a>
											<a class="dropdown-item" href='javascript:resetCookie();window.location="na?search=1&type=0";'>Offline</a>
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
							
						</div>	
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
							<select class="form-control kt-font-brand" style="width: 60px;" onchange="setCookie('ac_pagination_dropdown',this.value,365);setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);window.location='na?pagination_dropdown='+this.value">
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
								<a href="na?skip=0" onclick="setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);"><i class="fa fa-angle-double-left kt-font-brand"></i></a>
							</li>
							
							<?php if(0<$_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']){?>
							<li class="kt-pagination__link--next">
								<a href="na?skip=<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>,365);<?php if((($_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'])/$_COOKIE['ac_pagination_dropdown'])%6==0){?>setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']-1;?>,365);<?php } ?>"><i class="fa fa-angle-left kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<?php if($_COOKIE['ac_pagination_page']!=1){?>
							<li>
								<a href="na?skip=<?php echo $_COOKIE['ac_pagination_skip']-($_COOKIE['ac_pagination_dropdown']*6);?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']-($_COOKIE['ac_pagination_dropdown']*6);?>,365);setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']-1;?>,365);">...</a>
							</li>
							<?php } ?>
							
							
							<?php $itrate=ceil($cnt/$_COOKIE['ac_pagination_dropdown']);$i=($_COOKIE['ac_pagination_page']-1)*6;$count=0;while(($i+1)<=$itrate&&$count<6){?>
								<li <?php if($_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']==$i)echo 'class="kt-pagination__link--active"'; ?>>
									<a href="na?skip=<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>" onclick="setCookie('ac_pagination_skip',<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>,365);"><?php echo $i+1; ?></a>
								</li>
							<?php $i++;$count++;} ?>
							
							
							
							<?php if($_COOKIE['ac_pagination_page']<($itrate/6)){ ?>
								<li>
									<a href="na?skip=<?php echo $_COOKIE['ac_pagination_skip']+($_COOKIE['ac_pagination_dropdown']*6);?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']+($_COOKIE['ac_pagination_dropdown']*6);?>,365);setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']+1;?>,365);">...</a>
								</li>
							<?php } ?>
							
							<?php if($_COOKIE['ac_pagination_skip']<($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']))){?>
							<li class="kt-pagination__link--prev">
								<a href="na?skip=<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>" onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>,365);<?php if((($_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'])/$_COOKIE['ac_pagination_dropdown'])%6==0){?>setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']+1;?>,365);<?php } ?>"><i class="fa fa-angle-right kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<li class="kt-pagination__link--last">
								<a href="na?skip=<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>" onclick="setCookie('ac_pagination_page',<?php echo ceil(($cnt/$_COOKIE['ac_pagination_dropdown'])/6);?>,365);setCookie('ac_pagination_skip',<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>,365);"><i class="fa fa-angle-double-right kt-font-brand"></i></a>
							</li>
						</ul>
						
					</div>

		<!--end: Pagination-->		
		<br>
		<div class="kt-portlet__body kt-portlet__body--fit table-responsive">
		<script>
		function delete_call(id1)
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
								url: 'na?did='+id1,
								success: function(response) {
									//Do Something
									setCookie('ERROR','d2',365);
									window.location.reload();
									
									
								},
								error: function(xhr) {
									//Do Something to handle error
								}
							});
					//window.location='na?did='+id1+'&b='+banner+'&i='+icon;
		   
					//alert();
				}
			});
		}
		function enable_call(id1,enable)
		{
			$.ajax({
					url: 'na?lid='+id1+'&now='+enable,
					success: function(response) {
						//Do Something
						setCookie('ERROR','e1',365);
						//console.log(response);
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
			var deleteAll = 'na?deleteAll=1&';
					
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
									console.log(response);
									setCookie('ERROR','d2',365);
									window.location.reload();
								},
								error: function(xhr) {
									//Do Something to handle error
									console.log(xhr);
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
						<th style="text-align: center;">Title  </th>	
						<th style="text-align: center;">DB Prefix  </th>	
						<th style="text-align: center;">Status  </th>
						<th style="text-align: center;">Date  </th>
						<th style="text-align: center;">Actions</th>
					</tr>
				</thead>
				<tbody>
				<script>
					$(document).ready(function(){
						
					 var first=<?php $rwFST=json_decode(json_encode($rw),true); if(isset($rwFST[0]['_id'] ['$oid']))echo "'".$rwFST[0]['_id'] ['$oid']."'";?>;
					 var last=<?php $rwLST=json_decode(json_encode($rw),true); if(isset($rwLST[$cnt_move-1]['_id'] ['$oid']))echo "'".$rwLST[$cnt_move-1]['_id'] ['$oid']."'";?>;
					 var min=<?php $min=json_decode(json_encode($rw),true); $minv=array(); foreach($min as $miv)$minv[]=$miv['position']; echo count($minv)>0 ? min($minv):0;  ?>;
					 var max=<?php $max=json_decode(json_encode($rw),true); $maxv=array(); foreach($max as $mav)$maxv[]=$mav['position']; echo count($maxv)>0 ? max($maxv):0;  ?>;
					 //alert(min+" "+max);	
							$(".up,.down").click(function(){
								var row = $(this).parents("tr:first");
								//alert($(this).attr("data-index")); return;
								if ($(this).is(".up")) {
									if(this.id!=first)
									{	//alert("up"+this.id);
										progress();
										$.ajax({
										  url: 'ajxna',
										   type: "POST",
										  dataType: 'json',
										   data: {'mid':this.id,'op':'up'},
										  success: function( resp ) {
											console.log(resp);		
											 
											//console.log(resp['new']+"|"+resp['last']);
											if(resp['pos']==min)
											{
												first=resp['moved'];
												console.log("i m now 1st"+first);		
											
											}
											if(resp['moved']==last)
											{
												last=resp['replacewith'];
												console.log("last position Updated"+last);		
											
											}
											
											
											
										  },
										  success: function (returndata) {
												console.log( 'success', returndata);
												window.location.reload();
											},
										  error: function( req, status, err ) {
											console.log( 'something went wrong', req,status, err );
										  }
										});
									
									}
									//row.insertBefore(row.prev());
									//window.location.reload();
								} else {//alert("down"+this.id+" "+last);
									if(this.id!=last)
									{	
											progress();
											$.ajax({
												  url: 'ajxna',
												   type: "POST",
												  dataType: 'json',
												   data: {'mid':this.id,'op':'down'},
												  success: function( resp ) {
													console.log(resp);		
													 
													//console.log(resp['new']+"|"+resp['last']);
													if(resp['pos']==max)
													{
														last=resp['moved'];
														console.log("i m now last "+last);		
													
													}
													if(resp['moved']==first)
													{
														first=resp['replacewith'];
														console.log("first position Updated"+last);		
													
													}
												  },
												   success: function (returndata) {
														console.log( 'success', returndata);
														window.location.reload();
													},
												  error: function( req, status, err ) {
													console.log( 'something went wrong', status, err );
												  }
												});
								
									}
									//row.insertAfter(row.next());
									//window.location.reload();
								}
							});
						});
							
				</script>				
				<?php $i=$_COOKIE['ac_pagination_skip'];foreach($rw as $v){$v=json_decode(json_encode($v),true);?>
					<input type="hidden" value="<?php echo $v['title']?>"    id="<?php echo $v['_id']['$oid'];?>_h_title" />
					<input type="hidden" value="<?php echo $v['enable']?>"     id="<?php echo $v['_id']['$oid'];?>_h_enable" />
					<input type="hidden" value="<?php echo $v['date']?>"        id="<?php echo $v['_id']['$oid'];?>_h_date" />
					<tr>
						<td style="vertical-align: middle;">
							<label class="kt-checkbox">
								<input type="checkbox" name='del' id="<?php echo $v['_id']['$oid'];?>" value="<?php echo $v['_id']['$oid'];?>"> <?php echo $i+1; ?>
								<span></span>
							</label>
						</td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['title'];?></td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['table_prefix'];?></td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['date']; ?></td>
						<td style="text-align: center;vertical-align: middle;"><span class="kt-badge kt-badge--inline kt-badge--<?php if($v['enable']==0)echo "dark";else echo "primary"; ?>"><?php if($v['enable']==0)echo "Offline";else echo "Online"; ?></span></td>
						<td style="text-align: center;vertical-align: middle;" >
							
							<a href='javascript:;' id="<?php echo $v['_id'] ['$oid']."|".$v['position']; ?>"  class="btn btn-sm btn-clean btn-icon btn-icon-md  up" title="Move Up">
								<i class="fa fa-arrow-up" style="/*color:red;*/font-size: 1.4rem;"></i>
							</a>
							
							<a href='javascript:;' id="<?php echo $v['_id'] ['$oid']."|".$v['position']; ?>"  class="btn btn-sm btn-clean btn-icon btn-icon-md down" title="Move Down">
								<i class="fa fa-arrow-down" style="/*color:red;*/font-size: 1.4rem;"></i>
							</a>
							
							<div class="dropdown dropdown-inline">
								<button type="button" class="btn btn-clean btn-icon btn-sm btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="la la-cog" style="font-size: 1.8rem;"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item"  data-toggle="modal" nohref data-target="#kt_blockui_4_1_modal_edit" onclick="getData('<?php echo $v['_id']['$oid'];?>')"><i class="la la-edit"></i> Edit Details</a>
									<a class="dropdown-item" href="na?mid_fst=<?php echo $v['_id'] ['$oid']; ?>"><i class="la la-angle-double-up"></i> Move First</a>
									<a class="dropdown-item" href="na?mid_lst=<?php echo $v['_id'] ['$oid']; ?>"><i class="la la-angle-double-down"></i> Move Last</a>
								</div>
							</div>
							
							<span class="kt-switch kt-switch--sm">
								<label>	
									<input type="checkbox" <?php if($v['enable']=="1")echo 'checked="checked"'; ?> name="" onclick='javascript:enable_call("<?php echo $v['_id']['$oid']; ?>","<?php echo $v['enable']; ?>")' style="height:16px;position: inherit;margin-left: 0;" />
									<span></span>
								</label>	
							</span>
							
							<a href='javascript:delete_call("<?php echo $v['_id']['$oid']; ?>");' class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
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
							<select class="form-control kt-font-brand" style="width: 60px;" onchange="setCookie('ac_pagination_dropdown',this.value,365);setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);window.location='na?pagination_dropdown='+this.value">
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
								<a href="na?skip=0" onclick="setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);"><i class="fa fa-angle-double-left kt-font-brand"></i></a>
							</li>
							
							<?php if(0<$_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']){?>
							<li class="kt-pagination__link--next">
								<a href="na?skip=<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>,365);<?php if((($_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'])/$_COOKIE['ac_pagination_dropdown'])%6==0){?>setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']-1;?>,365);<?php } ?>"><i class="fa fa-angle-left kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<?php if($_COOKIE['ac_pagination_page']!=1){?>
							<li>
								<a href="na?skip=<?php echo $_COOKIE['ac_pagination_skip']-($_COOKIE['ac_pagination_dropdown']*6);?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']-($_COOKIE['ac_pagination_dropdown']*6);?>,365);setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']-1;?>,365);">...</a>
							</li>
							<?php } ?>
							
							
							<?php $itrate=ceil($cnt/$_COOKIE['ac_pagination_dropdown']);$i=($_COOKIE['ac_pagination_page']-1)*6;$count=0;while(($i+1)<=$itrate&&$count<6){?>
								<li <?php if($_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']==$i)echo 'class="kt-pagination__link--active"'; ?>>
									<a href="na?skip=<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>" onclick="setCookie('ac_pagination_skip',<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>,365);"><?php echo $i+1; ?></a>
								</li>
							<?php $i++;$count++;} ?>
							
							
							
							<?php if($_COOKIE['ac_pagination_page']<($itrate/6)){ ?>
								<li>
									<a href="na?skip=<?php echo $_COOKIE['ac_pagination_skip']+($_COOKIE['ac_pagination_dropdown']*6);?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']+($_COOKIE['ac_pagination_dropdown']*6);?>,365);setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']+1;?>,365);">...</a>
								</li>
							<?php } ?>
							
							<?php if($_COOKIE['ac_pagination_skip']<($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']))){?>
							<li class="kt-pagination__link--prev">
								<a href="na?skip=<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>" onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>,365);<?php if((($_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'])/$_COOKIE['ac_pagination_dropdown'])%6==0){?>setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']+1;?>,365);<?php } ?>"><i class="fa fa-angle-right kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<li class="kt-pagination__link--last">
								<a href="na?skip=<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>" onclick="setCookie('ac_pagination_page',<?php echo ceil(($cnt/$_COOKIE['ac_pagination_dropdown'])/6);?>,365);setCookie('ac_pagination_skip',<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>,365);"><i class="fa fa-angle-double-right kt-font-brand"></i></a>
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
					url: 'na?generalSearch='+$(this).val(),
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
								

/////////////ADDD////////////////////////


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
	title=document.getElementById("title").value;
	
	title_id=document.getElementById("err_title");
	
	title_id.innerHTML='';
	
	IsError=0;
	if(title==""){
		title_id.innerHTML="&nbsp;error : title can't be blank ! ";
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
	document.getElementById('eid').value=a;
	document.getElementById('title_e').value=document.getElementById(a+'_h_title').value;
	
}



////////////VALIDATION SCRIPT EDIT/////////
function validate_e(a)
{
	
	//alert(a.id);
	title=document.getElementById("title_e").value;
	
	title_id=document.getElementById("err_title_e");
	
	title_id.innerHTML='';
	
	IsError=0;
	
		
	if(title==""){
		title_id.innerHTML="&nbsp;error : title can't be blank ! ";
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