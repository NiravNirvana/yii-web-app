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
				toastr.success("success : Video added !");
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
				toastr.success("success : Video set updated !");
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
			<h3 class="kt-subheader__title">Manage Videos</h3>
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
					Total Images:
					<small><?php echo $cnt; ?></small>&nbsp;&nbsp;&nbsp;
					
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
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
												url: 'fv?did='+id1,
												success: function(response) {
													//Do Something
													setCookie('ERROR','d2',365);
													window.location.reload();
													
													
												},
												error: function(xhr) {
													//Do Something to handle error
												}
											});
									//window.location='ST?did='+id1+'&b='+banner+'&i='+icon;
						   
									//alert();
								}
							});
						}
						
						function delete_all_call()
						{
							var ck=0;
							var deleteAll = 'fv?deleteAll=1&';
									
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
						
							&nbsp;
							<label class="kt-checkbox">
								<input type="checkbox" onclick="checkedALL(this);" > <b>Check All</b>
								<span></span>
							</label>
							&nbsp;
							&nbsp;
							&nbsp;
							<button type="button" class="btn btn-brand btn-icon-sm" onclick="showStickerList_RESET();" data-toggle="modal" data-target="#kt_blockui_4_1_modal">
								<i class="flaticon2-plus"></i> Add Images
							</button>
							&nbsp;
							<!--<button type="button" onclick="delete_all_call();" class="btn btn-danger btn-icon-sm" >-->
							<button type="button" onclick="delete_all_call();" class="btn btn-danger btn-icon-sm" >
								<i class="flaticon2-trash"></i> Delete Images
							</button>
								
							<!--begin::Modal ADD NEW-->
							<div class="modal fade" id="kt_blockui_4_1_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add Video</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="post" action="fv"  enctype="multipart/form-data">
										<div class="modal-body" id="data_view">
											
												<div class="form-group row">
													<div class="col-xl-3"></div>
													<div class="col-xl-6">
														<center>
															<video class="col-xl-12" id="Aoutput1" src=""   style="height:300px;" controls autoplay />
														</center>
													</div>
													<div class="col-xl-3"></div>
													
													<div class="col-xl-12">
														<center><span id="err_image" class="kt-font-danger"></span></center>
													</div>	
												</div>
												
												<div class="form-group row">
													<div class="col-xl-4"></div>
													<div class="col-xl-4">
														<input type="file" multiple onchange="loadFileE1(event)" name="tdimg[]" style="visibility:hidden" id="fileInputA1" accept="video/*" />
														<button type="button" id="count_stc" onclick="document.getElementById('fileInputA1').click();"  class="btn btn-success btn-block">Brows Stickers</button>
													</div>
												</div>
												
										</div>
										<div class="modal-body" id="sticker_view" style="display:none;">
												
												<div class="form-group row" id="app">
													<!--
													<div class="col-xl-2">
														<center>
															<img id="Aoutput1"  onclick="showStickerList_RESET();"  src="<?php echo Yii::app()->baseUrl; ?>/assets/media/icons/svg/Communication/Reply.svg"  style="max-width:40px;max-height:40px;height:40px;"  />
														</center>
													</div>
													
													<div class="col-xl-2" >
														<center>
															<img src="<?php echo Yii::app()->baseUrl; ?>/assets/media/icons/svg/Files//Cloud-upload.svg" style="max-width:80px;max-height:80px;height:80px;/*background-color:#E3E1D0;*/" />
														</center>
													</div>
													-->
												</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit"  class="btn btn-primary" name="addTD" id="kt_blockui_4_1">Add</button>
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
											<a class="dropdown-item" href='javascript:resetCookie();window.location="fv?search=1&type=2";'>All</a>
											<a class="dropdown-item" href='javascript:resetCookie();window.location="fv?search=1&type=1";'>Online</a>
											<a class="dropdown-item" href='javascript:resetCookie();window.location="fv?search=1&type=0";'>Offline</a>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
					
				</div>
			</div>

			<!--end: Search Form -->
			<br>
			<!--begin: Pagination-->
					<div class="kt-pagination  kt-pagination--brand">
						<div class="kt-pagination__toolbar">
							<select class="form-control kt-font-brand" style="width: 60px;" onchange="setCookie('ac_pagination_dropdown',this.value,365);setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);window.location='fv?pagination_dropdown='+this.value">
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
								<a href="fv?skip=0" onclick="setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);"><i class="fa fa-angle-double-left kt-font-brand"></i></a>
							</li>
							
							<?php if(0<$_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']){?>
							<li class="kt-pagination__link--next">
								<a href="fv?skip=<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>,365);<?php if((($_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'])/$_COOKIE['ac_pagination_dropdown'])%6==0){?>setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']-1;?>,365);<?php } ?>"><i class="fa fa-angle-left kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<?php if($_COOKIE['ac_pagination_page']!=1){?>
							<li>
								<a href="fv?skip=<?php echo $_COOKIE['ac_pagination_skip']-($_COOKIE['ac_pagination_dropdown']*6);?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']-($_COOKIE['ac_pagination_dropdown']*6);?>,365);setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']-1;?>,365);">...</a>
							</li>
							<?php } ?>
							
							
							<?php $itrate=ceil($cnt/$_COOKIE['ac_pagination_dropdown']);$i=($_COOKIE['ac_pagination_page']-1)*6;$count=0;while(($i+1)<=$itrate&&$count<6){?>
								<li <?php if($_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']==$i)echo 'class="kt-pagination__link--active"'; ?>>
									<a href="fv?skip=<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>" onclick="setCookie('ac_pagination_skip',<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>,365);"><?php echo $i+1; ?></a>
								</li>
							<?php $i++;$count++;} ?>
							
							
							
							<?php if($_COOKIE['ac_pagination_page']<($itrate/6)){ ?>
								<li>
									<a href="fv?skip=<?php echo $_COOKIE['ac_pagination_skip']+($_COOKIE['ac_pagination_dropdown']*6);?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']+($_COOKIE['ac_pagination_dropdown']*6);?>,365);setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']+1;?>,365);">...</a>
								</li>
							<?php } ?>
							
							<?php if($_COOKIE['ac_pagination_skip']<($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']))){?>
							<li class="kt-pagination__link--prev">
								<a href="fv?skip=<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>" onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>,365);<?php if((($_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'])/$_COOKIE['ac_pagination_dropdown'])%6==0){?>setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']+1;?>,365);<?php } ?>"><i class="fa fa-angle-right kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<li class="kt-pagination__link--last">
								<a href="fv?skip=<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>" onclick="setCookie('ac_pagination_page',<?php echo ceil(($cnt/$_COOKIE['ac_pagination_dropdown'])/6);?>,365);setCookie('ac_pagination_skip',<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>,365);"><i class="fa fa-angle-double-right kt-font-brand"></i></a>
							</li>
						</ul>
						
					</div>

		<!--end: Pagination-->		
		<br>
		<script>
		function delete_all_call()
		{
			var ck=0;
			var deleteAll = 'fv?deleteAll=1&';
					
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
		
		function enable_call(id1,enable)
		{
			$.ajax({
					url: 'fv?lid='+id1+'&now='+enable,
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
		function isfree_call(id1,isfree)
		{
			$.ajax({
					url: 'fv?fid='+id1+'&now='+isfree,
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
		
		function delete_call(id1,flnm)
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
								url: 'fv?did='+id1+'&flnm='+flnm,
								success: function(response) {
									//Do Something
									setCookie('ERROR','d2',365);
									window.location.reload();
									
									
								},
								error: function(xhr) {
									//Do Something to handle error
								}
							});
					//window.location='fv?did='+id1+'&b='+banner+'&i='+icon;
		   
					//alert();
				}
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
			<div class="kt-portlet__body kt-portlet__body--fit">
				<div class="row">	
				  <?php $i=0; foreach($rw as $key=>$v){ $v=json_decode(json_encode($v),true);?>		
					<input type="hidden" value="<?php echo $v['filename']?>" id="<?php echo  $v['_id'] ['$oid'];?>_h_banner" />
					
					<!--Begin::Section-->
					<div class="col-xl-2">
						<div class="kt-portlet kt-portlet--height-fluid">
								<!--begin::Widget -->
								<div class="kt-widget--user-profile-4">
									<div class="kt-widget__head">
										<div class="kt-widget__media" >
											<center>
												<video  style="height:300px;width:230px;" class="kt-widget__img kt-hidden-" src="<?php echo Yii::app()->baseUrl; ?>/images/VIDEO/<?php echo $v['filename']; ?>" alt="Video" controls />
											</center>
										</div>
										<div class="kt-widget__content">
											<div class="kt-widget__section">
												<center>
												<div class="kt-widget__button">
													<?php echo ($i+1)."."; ?><span class="btn btn-label-warning btn-sm"><?php echo pathinfo($v['filename'], PATHINFO_EXTENSION); ?></span>&nbsp;&nbsp;<span class="kt-badge kt-badge--inline kt-badge--<?php if($v['enable']==0)echo "dark";else echo "primary"; ?>"><?php if($v['enable']==0)echo "Offline";else echo "Online"; ?></span>
												</div>
												<div class="kt-widget__action" style="margin-top: 0.3rem;">
													<label class="kt-checkbox" style="margin-bottom: 13px;">
														<input type="checkbox" name='del' id="<?php echo $v['_id'] ['$oid'];?>" value="<?php echo $v['_id'] ['$oid'];?>"> 
														<span></span>
													</label>
													<span class="kt-switch kt-switch--sm">
														<label>	
															<input type="checkbox" <?php if($v['enable']=="1")echo 'checked="checked"'; ?> name="" onclick='javascript:enable_call("<?php echo $v['_id']['$oid']; ?>","<?php echo $v['enable']; ?>")' style="height:16px;position: inherit;margin-left: 0;" />
															<span></span>
														</label>	
													</span>
													<a href='javascript:delete_call("<?php echo  $v['_id'] ['$oid']; ?>");' style="margin: 0 0rem;" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Remove">
														<i class="la la-trash" style="color:red;font-size: 1.8rem;"></i>
													</a>
												</div>
												</center>
											</div>
										</div>
									</div>
								</div>
								<!--end::Widget -->
						</div>
					</div>
					<!--End::Section-->
				  <?php $i++;} ?>   	
				</div>
			</div>
					<br>
					<!--begin: Pagination-->
					<div class="kt-pagination  kt-pagination--brand">
						<div class="kt-pagination__toolbar">
							<select class="form-control kt-font-brand" style="width: 60px;" onchange="setCookie('ac_pagination_dropdown',this.value,365);setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);window.location='fv?pagination_dropdown='+this.value">
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
								<a href="fv?skip=0" onclick="setCookie('ac_pagination_page',1,365);setCookie('ac_pagination_skip',0,365);"><i class="fa fa-angle-double-left kt-font-brand"></i></a>
							</li>
							
							<?php if(0<$_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']){?>
							<li class="kt-pagination__link--next">
								<a href="fv?skip=<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'];?>,365);<?php if((($_COOKIE['ac_pagination_skip']-$_COOKIE['ac_pagination_dropdown'])/$_COOKIE['ac_pagination_dropdown'])%6==0){?>setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']-1;?>,365);<?php } ?>"><i class="fa fa-angle-left kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<?php if($_COOKIE['ac_pagination_page']!=1){?>
							<li>
								<a href="fv?skip=<?php echo $_COOKIE['ac_pagination_skip']-($_COOKIE['ac_pagination_dropdown']*6);?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']-($_COOKIE['ac_pagination_dropdown']*6);?>,365);setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']-1;?>,365);">...</a>
							</li>
							<?php } ?>
							
							
							<?php $itrate=ceil($cnt/$_COOKIE['ac_pagination_dropdown']);$i=($_COOKIE['ac_pagination_page']-1)*6;$count=0;while(($i+1)<=$itrate&&$count<6){?>
								<li <?php if($_COOKIE['ac_pagination_skip']/$_COOKIE['ac_pagination_dropdown']==$i)echo 'class="kt-pagination__link--active"'; ?>>
									<a href="fv?skip=<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>" onclick="setCookie('ac_pagination_skip',<?php echo $i*$_COOKIE['ac_pagination_dropdown']; ?>,365);"><?php echo $i+1; ?></a>
								</li>
							<?php $i++;$count++;} ?>
							
							
							
							<?php if($_COOKIE['ac_pagination_page']<($itrate/6)){ ?>
								<li>
									<a href="fv?skip=<?php echo $_COOKIE['ac_pagination_skip']+($_COOKIE['ac_pagination_dropdown']*6);?>"  onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']+($_COOKIE['ac_pagination_dropdown']*6);?>,365);setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']+1;?>,365);">...</a>
								</li>
							<?php } ?>
							
							<?php if($_COOKIE['ac_pagination_skip']<($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']))){?>
							<li class="kt-pagination__link--prev">
								<a href="fv?skip=<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>" onclick="setCookie('ac_pagination_skip',<?php echo $_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'] ;?>,365);<?php if((($_COOKIE['ac_pagination_skip']+$_COOKIE['ac_pagination_dropdown'])/$_COOKIE['ac_pagination_dropdown'])%6==0){?>setCookie('ac_pagination_page',<?php echo $_COOKIE['ac_pagination_page']+1;?>,365);<?php } ?>"><i class="fa fa-angle-right kt-font-brand"></i></a>
							</li>
							<?php } ?>
							<li class="kt-pagination__link--last">
								<a href="fv?skip=<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>" onclick="setCookie('ac_pagination_page',<?php echo ceil(($cnt/$_COOKIE['ac_pagination_dropdown'])/6);?>,365);setCookie('ac_pagination_skip',<?php echo ($cnt-($cnt%$_COOKIE['ac_pagination_dropdown']));?>,365);"><i class="fa fa-angle-double-right kt-font-brand"></i></a>
							</li>
						</ul>
						
					</div>

					<!--end: Pagination-->		
		</div>

</div>
<!-- end:: Content -->
<script>
function resetCookie()
{
		setCookie('ac_pagination_dropdown',10,365);
		setCookie('ac_pagination_page','1',365);
		setCookie('ac_pagination_skip','0',365);
}
function showStickerList_RESET()
{
	document.getElementById('data_view').style.display='block';
	document.getElementById('sticker_view').style.display='none';
}

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
	//outputE.style.height="300px";
	outputE.src = URL.createObjectURL(event.target.files[0]);
	
	//alert();
	
// var app='<div class="col-xl-3"><center><img id="Aoutput1"  onclick="showStickerList_RESET();"  src="<?php echo Yii::app()->baseUrl; ?>/assets/media/icons/svg/Communication/Reply.svg"  style="object-fit: contain;max-width:40px;max-height:40px;height:40px;"  /><div>Totle: '+event.target.files.length+'</div></center></div>';	
// for(i=0;i<event.target.files.length;i++)
// {
//	//alert((event.target.files[i].type).split('/')[1]);
// 	//var output = document.getElementById('output'+(i+1));
// 	//output.src = URL.createObjectURL(event.target.files[i]);
//	app=app+'<div class="col-xl-3"><center style="padding:2px;margin:2px;border:1px solid;"><img src="'+URL.createObjectURL(event.target.files[i])+'" style="object-fit: contain;max-width:80px;max-height:80px;" /><div>'+(event.target.files[i].type).split('/')[1]+'</div></center></div>';
// }	
//	
//	document.getElementById('app').innerHTML=app;
//	document.getElementById('count_stc').innerHTML='Videos : '+event.target.files.length;
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
	document.getElementById('Aoutput1_e').src= '<?php echo Yii::app()->baseUrl; ?>/images/DECORATION/'+document.getElementById(a+'_h_banner').value;
	
	//OLD BANNER&ICON
	document.getElementById('oldbanner').value= document.getElementById(a+'_h_banner').value;
	
	document.getElementById('eid').value=a;
	
}

</script>