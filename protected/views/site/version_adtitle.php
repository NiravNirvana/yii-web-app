<?php //exit(0); ?>




	<!--begin::Modal EDIT NEW-->
	<div class="modal fade" id="kt_blockui_4_1_modal_editadtitlemulti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit ad-Title: <span class="kt-font-primary" id="admode_ver"></span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="sv" id="edit_form_adtitle_emulti"  enctype="multipart/form-data">
				<div class="modal-body" id="data_view">
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">Count:</label>
							<input type="number" name="count_adt_e_m" id="count_emlt"  value="0"  placeholder="View on count"  class="form-control" min="0">
							<span id="err_count_e" class="kt-font-danger"></span>
						</div>
				</div>
				<div class="modal-footer">
					<script>
						// this is the id of the form
						$("#edit_form_adtitle_emulti").submit(function(e) {
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
					<button type="submit" class="btn btn-primary" >Edit</button>
				</div>
				</form>
			</div>
		</div>
	  </div>
	<!--end::Modal-->














<!--begin::Modal EDIT NEW-->
	<div class="modal fade" id="kt_blockui_4_1_modal_editadtitle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit ad-title: <span class="kt-font-primary" id="adttl_ver"></span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="sv" id="edit_form_adtitle_e"  enctype="multipart/form-data">
				<div class="modal-body" id="data_view">
					
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">Advertisement title:</label>
							<input type="text" name="adttl" id="title_e" placeholder="Enter advertisement title"  class="form-control" readonly>
							<span id="err_title_e" class="kt-font-danger"></span>
						</div>
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">Count:</label>
							<input type="number" name="count" id="count_e"  value="0"  placeholder="View on count"  class="form-control" min="0">
							<span id="err_count_e" class="kt-font-danger"></span>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">Status</label>
							<div class="col-1">
								<span class="kt-switch">
									<label>
										<input type="checkbox" id="enable_e" name="enbl"  />
										<span></span>
									</label>
								</span>
							</div>
						</div>
						
				</div>
				<div class="modal-footer">
					<script>
						// this is the id of the form
						$("#edit_form_adtitle_e").submit(function(e) {
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
											window.location.reload();
										}
									});
						});
					</script>
					
					
					
					<input type="hidden" name="eid_adttl" value="" id="eid" />
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit"  class="btn btn-primary" name="editadttl" id="kt_blockui_4_1_edit">Edit</button>
				</div>
				</form>
			</div>
		</div>
	  </div>
	<!--end::Modal-->


<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="kt-font-brand flaticon2-line-chart"></i>
				</span>
				<h3 class="kt-portlet__head-title">
					Total ad-title:
					<small><?php echo $cnt; ?></small>
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
						&nbsp;
							<button type="button"  class="btn btn-outline-brand btn-elevate btn-pill" data-toggle="modal" data-target="#kt_blockui_4_1_modal_editadtitlemulti">
								<i class="flaticon2-plus"></i> Edit multi titles 
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
		function delete_call(Advertisement_title,ver)
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
								url: 'sv?adtitle_del=1&did='+Advertisement_title+'&ver='+ver,
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
		function enable_call(Advertisement_title,ver)
		{
			$.ajax({
					url: 'sv?adtitle_enb=1&lid_ttl='+Advertisement_title+'&ver='+ver,
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
							No
						</th>
						<th style="text-align: center;"> Version </th>	
						<th style="text-align: center;">Advertisement title </th>	
						<th style="text-align: center;">Count  </th>
						<th style="text-align: center;">Visibility mode </th>
						<th style="text-align: center;">Status  </th>
						<th style="text-align: center;">Actions</th>
					</tr>
				</thead>
				<tbody>
					
				<?php $i=$_COOKIE['ac_pagination_skip'];foreach($rw_t_adtitle as $key=>$v){?>
					<input type="hidden" value="<?php echo $v['adm_name']?>"    id="<?php echo $key;?>_h_title" />
					<input type="hidden" value="<?php echo $v['count']?>"     id="<?php echo $key;?>_h_count" />
					<input type="hidden" value="<?php echo $v['enable']?>"        id="<?php echo $key;?>_h_enable" />
					<tr>
						<td style="vertical-align: middle;">
							 <?php echo $i+1; ?>
						</td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['version'];?></td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['adm_name'];?></td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['count']; ?></td>
						<td style="text-align: center;vertical-align: middle;"><b><?php foreach($v['ad_chield'] as $vt)if($vt["enable"]==true){$vvt=$vt['ad_keyword'];break;}else $vvt="Not Set"; echo $vvt; ?></b></td>
						<td style="text-align: center;vertical-align: middle;"><span class="kt-badge kt-badge--inline kt-badge--<?php if($v['enable']==0)echo "dark";else echo "primary"; ?>"><?php if($v['enable']==0)echo "Offline";else echo "Online"; ?></span></td>
						<td style="text-align: center;vertical-align: middle;" >
							<a data-toggle="modal" nohref data-target="#kt_blockui_4_1_modal_editadtitle" onclick="getDataadtitle('<?php echo $key; ?>','<?php echo $v['version']; ?>')" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
								<i class="la la-edit" style="font-size: 1.8rem;"></i>
							</a>
							
							<span class="kt-switch kt-switch--sm">
								<label>	
									<input type="checkbox" <?php if($v['enable']=="1")echo 'checked="checked"'; ?> name="" onclick='javascript:enable_call("<?php echo $v['adm_name']; ?>","<?php echo $v['version']; ?>")' style="height:16px;position: inherit;margin-left: 0;" />
									<span></span>
								</label>	
							</span>
							
							<a href='javascript:delete_call("<?php echo $v['adm_name']; ?>","<?php echo $v['version']; ?>");' class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
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
						
	</div>

</div>

<script>
function getDataadtitle(a,ver)
{
	//alert(a);
	//alert(document.getElementById(a+'_h_enabled').value);
	
	document.getElementById('eid').value=ver;
	document.getElementById('adttl_ver').innerHTML=ver;
	
	document.getElementById('title_e').value=document.getElementById(a+'_h_title').value;
	document.getElementById('count_e').value=document.getElementById(a+'_h_count').value;
	
	//alert(document.getElementById(a+'_h_for_whatsapp').value);
	
	if(document.getElementById(a+'_h_enable').value!=0)
		document.getElementById('enable_e').checked=true;
	
}

</script>