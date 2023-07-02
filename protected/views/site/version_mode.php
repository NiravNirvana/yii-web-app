<?php //exit(0); ?>
<!-- begin:: Content -->



	<!--begin::Modal EDIT NEW-->
	<div class="modal fade" id="kt_blockui_4_1_modal_editadmodemulti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit ad-mode: <span class="kt-font-primary" id="admode_ver"></span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="sv" id="edit_form_admode_emulti"  enctype="multipart/form-data">
				<div class="modal-body" id="data_view">
					
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">Old advertisement-id:</label>
							<input type="text" name="oldid" id="oldid_e" placeholder="Enter old advertisement-id"  class="form-control" readonly	>
							<span id="err_oldid_e" class="kt-font-danger"></span>
						</div>
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">New advertisement-id::</label>
							<input type="text" name="newid" id="newid_e" placeholder="Enter new advertisement-id"  class="form-control" >
							<span id="err_newid_e" class="kt-font-danger"></span>
						</div>
						
				</div>
				<div class="modal-footer">
					<script>
						// this is the id of the form
						$("#edit_form_admode_emulti").submit(function(e) {
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
											console.log(returndata);
											setCookie('ERROR','e2_title',365);
											if(returndata=="err")
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
													toastr.error("error : operation not allow !");
											}
											else
											{
												window.location.reload();
											}	
										}
									});
						});
					</script>
					
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit"  onclick="return validate_admode_emulti(this);"  class="btn btn-primary" >Edit</button>
				</div>
				</form>
			</div>
		</div>
	  </div>
	<!--end::Modal-->



	<!--begin::Modal EDIT NEW-->
	<div class="modal fade" id="kt_blockui_4_1_modal_editadmode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit ad-mode: <span class="kt-font-primary" id="admode_ver"></span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="sv" id="edit_form_admode_e"  enctype="multipart/form-data">
				<div class="modal-body" id="data_view">
					
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">Advertisement-id:</label>
							<input type="text" name="adcnm" id="id_e" placeholder="Enter advertisement-id"  class="form-control" >
							<span id="err_id_e" class="kt-font-danger"></span>
						</div>
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">Keyword:</label>
							<input type="text" name="kw" id="kw_e" placeholder="Enter keyword"  class="form-control" readonly>
							<span id="err_kw_e" class="kt-font-danger"></span>
						</div>
						
				</div>
				<div class="modal-footer">
					<script>
						// this is the id of the form
						$("#edit_form_admode_e").submit(function(e) {
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
											//console.log(returndata);
											setCookie('ERROR','e2_title',365);
											window.location.reload();
										}
									});
						});
					</script>
					
					
					
					<input type="hidden" name="eid_admode" value="" id="eid" />
					<input type="hidden" name="emode_adttl" value="" id="e_adttl" />
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit"  onclick="return validate_admode_e(this);"  class="btn btn-primary" id="kt_blockui_4_1_edit">Edit</button>
				</div>
				</form>
			</div>
		</div>
	  </div>
	<!--end::Modal-->


<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="kt-font-brand flaticon2-line-chart"></i>
				</span>
				<h3 class="kt-portlet__head-title">
					Total version:
					<small><?php echo $cnt; ?></small>
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
						&nbsp;
							<button type="button" onclick="getDataadmodeMulti('<?php $old=0;foreach($rw_t_ad_mode as $oldid)$old=$oldid['ad_token'];echo $old; ?>')"  class="btn btn-outline-brand btn-elevate btn-pill" data-toggle="modal" data-target="#kt_blockui_4_1_modal_editadmodemulti">
								<i class="flaticon2-plus"></i> Edit multi ids 
							</button>	
						&nbsp;	
					</div>
				</div>
			</div>
		
		</div>
		<div class="kt-portlet__body">

			
			
		<br>
		<div class="kt-portlet__body kt-portlet__body--fit table-responsive">
		<script>
		function delete_call(ad_mode,Advertisement_title,ver)
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
								url: 'sv?admode_del=1&admode='+ad_mode+'&ad_ttl='+Advertisement_title+'&ver='+ver,
								success: function(response) {
									//Do Something
									setCookie('ERROR','d2_e',365);
									//console.log(response);
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
		function enable_call(ad_mode,Advertisement_title,ver)
		{
			$.ajax({
					url: 'sv?admode_enb=1&admode='+ad_mode+'&ad_ttl='+Advertisement_title+'&ver='+ver,
					success: function(response) {
						//Do Something
						setCookie('ERROR','e2_title',365);
						//console.log(response);
						window.location.reload();
					},
					error: function(xhr) {
						//Do Something to handle error
					}
				});
		}
		function block_call(ad_mode,Advertisement_title,ver)
		{
			$.ajax({
					url: 'sv?admode_block=1&admode='+ad_mode+'&ad_ttl='+Advertisement_title+'&ver='+ver,
					success: function(response) {
						//Do Something
						setCookie('ERROR','e2_title',365);
						//console.log(response);
						window.location.reload();
					},
					error: function(xhr) {
						//Do Something to handle error
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
			<!--begin: Datatable -->
			<table class="table table-striped" id="table_search">
				<thead>
					<tr>
						<th width="35">
							<!--<label class="kt-checkbox">
								<input type="checkbox" onclick="checkedALL(this);" > No
								<span></span>
							</label>-->
							
							No
						</th>
						<th style="text-align: center;"> Version</th>	
						<th style="text-align: center;"> Advertisement Title</th>	
						<th style="text-align: center;">	Advertisement ID</th>	
						<th style="text-align: center;">Key Word</th>
						<th style="text-align: center;">Status  </th>
						<th style="text-align: center;">Actions</th>
					</tr>
				</thead>
				<tbody>
					
				<?php $i=$_COOKIE['ac_pagination_skip'];foreach($rw_t_ad_mode as $key=>$v){ ?>
					<input type="hidden" value="<?php echo $v['ad_token']?>"    id="<?php echo $key;?>_h_id" />
					<input type="hidden" value="<?php echo $v['ad_keyword']?>"     id="<?php echo $key;?>_h_kw" />
					<tr>
						<td style="vertical-align: middle;">
							 <?php echo $i+1; ?>
						</td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['version'];?></td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['version_adtitle'];?></td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['ad_token'];?></td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['ad_keyword']; ?></td>
						<td style="text-align: center;vertical-align: middle;"><span class="kt-badge kt-badge--inline kt-badge--<?php if($v['enable']==0)echo "dark";else if($v['enable']==1) echo "primary";else if($v['enable']==-1) echo "danger"; ?>"><?php if($v['enable']==0)echo "Offline";else if($v['enable']==1) echo "Online";else if($v['enable']==-1) echo "Block"; ?></span></td>
						<td style="text-align: center;vertical-align: middle;" >
							
							
							<a data-toggle="modal" nohref data-target="#kt_blockui_4_1_modal_editadmode" onclick="getDataadmode('<?php echo $key; ?>','<?php echo $v['version']; ?>','<?php echo $v['version_adtitle'];?>')" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
								<i class="la la-edit" style="font-size: 1.8rem;"></i>
							</a>
							
							<a href='javascript:delete_call("<?php echo $v['ad_keyword']; ?>","<?php echo $v['version_adtitle']; ?>","<?php echo $v['version']; ?>");' style="<?php if($v['ad_token']=='ALTERNATIVE' || $v['ad_token']=='CUSTOM')echo 'visibility:hidden';?>" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
								<i class="la la-trash" style="color:red;font-size: 1.8rem;"></i>
							</a>
							
							<span class="kt-switch kt-switch--sm" title="<?php if($v['enable']=="1")echo 'Disable it';else echo 'Enable it'; ?>">
								<label>	
									<input type="checkbox" <?php if($v['enable']=="1")echo 'checked="checked"'; ?> name="" onclick='javascript:enable_call("<?php echo $v['ad_keyword']; ?>","<?php echo $v['version_adtitle']; ?>","<?php echo $v['version']; ?>")' style="height:16px;position: inherit;margin-left: 0;"  />
									<span></span>
								</label>	
							</span>
							
							<span class="kt-switch kt-switch--sm kt-switch--outline kt-switch--icon kt-switch--danger" title="<?php if($v['enable']!="-1")echo 'Block id';if($v['enable']=="-1") echo 'unblock id'; ?>">
								<label>	
									<input type="checkbox" <?php if($v['enable']=="-1")echo 'checked="checked"'; ?> name="" onclick='javascript:block_call("<?php echo $v['ad_keyword']; ?>","<?php echo $v['version_adtitle']; ?>","<?php echo $v['version']; ?>")' style="height:16px;position: inherit;margin-left: 0;"  />
									<span></span>
								</label>	
							</span>
							
							
						</td>
						
					</tr>
				<?php $i++; } ?>	
				</tbody>
					
			</table>
								
		<!--end: Datatable -->
		</div>
		<br>
						
	</div>

</div>

<script>
function getDataadmode(a,ver,adttl)
{
	//alert(a);
	//alert(document.getElementById(a+'_h_enabled').value);
	
	document.getElementById('eid').value=ver;
	document.getElementById('e_adttl').value=adttl;
	document.getElementById('admode_ver').innerHTML=ver;
	
	document.getElementById('id_e').value=document.getElementById(a+'_h_id').value;
	document.getElementById('kw_e').value=document.getElementById(a+'_h_kw').value;
	
}
function getDataadmodeMulti(oldid)
{
	//alert(oldid);
	//alert(document.getElementById(a+'_h_enabled').value);
	
	document.getElementById('oldid_e').value=oldid;
	
}

function validate_admode_e(a)
{
	
	//alert(a.id);
	ide=document.getElementById("id_e").value;

	id_id=document.getElementById("err_id_e");

	id_id.innerHTML='';

	IsError=0;
	
	if(ide==""){
		id_id.innerHTML="&nbsp;error : Ad-id can't be blank ! ";
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

function validate_admode_emulti(a)
{
	
	//alert(a.id);
	ide=document.getElementById("newid_e").value;

	id_id=document.getElementById("err_newid_e");

	id_id.innerHTML='';

	IsError=0;
	
	if(ide==""){
		id_id.innerHTML="&nbsp;error : New ad-id can't be blank ! ";
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

</script>