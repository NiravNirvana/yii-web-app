
	<!--begin::Modal EDIT NEW-->
	<div class="modal fade" id="kt_blockui_4_1_modal_editversion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit version</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="sv" id="edit_form_version"  enctype="multipart/form-data">
				<div class="modal-body" id="data_view">
					
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">Version title:</label>
							<input type="text" name="vnm_e"  class="form-control" id="title_e" placeholder="Enter title">
							<span id="err_title_e" class="kt-font-danger"></span>
						</div>
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">New features:</label>
							<textarea class="form-control" name="features_e" id="features_e"  placeholder="Enter features"  cols="85" rows="5"></textarea>
							<span id="err_features_e" class="kt-font-danger"></span>
						</div>
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">Version code:</label>
							<input type="text" name="code_e" id="code_e"  placeholder="Enter version code"  class="form-control" >
							<span id="err_code_e" class="kt-font-danger"></span>
						</div>
						
						<div class="form-group row">
							<label class="col-4 col-form-label">Status</label>
							<div class="col-2">
								<span class="kt-switch">
									<label>
										<input type="checkbox" name="enbl" id="enabled_e" />
										<span></span>
									</label>
								</span>
							</div>
							
							<label class="col-4 col-form-label"> Is forcefully ?</label>
							<div class="col-2">
								<span class="kt-switch">
									<label>
										<input type="checkbox" name="frc" id="force_e" />
										<span></span>
									</label>
								</span>
							</div>
						</div>
						
				</div>
				<div class="modal-footer">
					<script>
						// this is the id of the form
						$("#edit_form_version").submit(function(e) {
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
											setCookie('ERROR','e1',365);
											window.location.reload();
										}
									});
						});
					</script>
					
					
					
					<input type="hidden" name="eid" value="" id="eid" />
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit"  onclick="return validate_version_e(this);"  class="btn btn-primary" name="editvrs" id="kt_blockui_4_1_edit">Edit</button>
				</div>
				</form>
			</div>
		</div>
	  </div>
	<!--end::Modal-->
<!-- begin:: Content -->

<!--begin::Modal Note EDIT NEW-->
	<div class="modal fade" id="kt_blockui_4_1_modal_editnote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit note: <span id="note_ver"></span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="sv" id="edit_form_note"  enctype="multipart/form-data">
				<div class="modal-body" id="data_view">
						
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">Note:</label>
							<textarea class="form-control" name="note_e" id="note_e"  placeholder="Enter note"  cols="85" rows="15"></textarea>
							<span id="err_note_e" class="kt-font-danger"></span>
						</div>
						
				</div>
				<div class="modal-footer">
					<script>
						// this is the id of the form
						$("#edit_form_note").submit(function(e) {
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
											setCookie('ERROR','e1',365);
											window.location.reload();
										}
									});
						});
					</script>
					
					
					
					<input type="hidden" name="eid_note" value="" id="eid_note" />
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit"   class="btn btn-primary" name="editvrs" id="kt_blockui_4_1_editnote">Edit</button>
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
					Total version:
					<small><?php echo $cnt; ?></small>
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
							
							
					</div>
				</div>
			</div>
		
		</div>
		<div class="kt-portlet__body">

			
			
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
								url: 'sv?did_ver='+id1,
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
						<th style="text-align: center;">Version title  </th>	
						<!--<th style="text-align: center;">Used In  </th>-->
						<th style="text-align: center;">Version code  </th>
						<!--<th style="text-align: center;">Type  </th>-->
						<th style="text-align: center;">Version vise user  </th>
						<th style="text-align: center;">Status  </th>
						<th style="text-align: center;">Actions</th>
					</tr>
				</thead>
				<tbody>
					
				<?php $i=$_COOKIE['ac_pagination_skip'];foreach($rw_t_vesion as $v){$v=json_decode(json_encode($v),true);?>
					<input type="hidden" value="<?php echo $v['title']?>"    id="<?php echo $v['_id']['$oid'];?>_h_title" />
					<input type="hidden" value="<?php echo $v['code']?>"     id="<?php echo $v['_id']['$oid'];?>_h_code" />
					<input type="hidden" value="<?php echo $v['features']?>"      id="<?php echo $v['_id']['$oid'];?>_h_features" />
					<input type="hidden" value="<?php echo $v['enabled']?>"        id="<?php echo $v['_id']['$oid'];?>_h_enabled" />
					<input type="hidden" value="<?php echo $v['is_force']?>"        id="<?php echo $v['_id']['$oid'];?>_h_is_force" />
					<input type="hidden" value="<?php echo isset($v['version_note'])?stripslashes($v['version_note']):'';?>"        id="<?php echo $v['_id']['$oid'];?>_h_version_note" />
					<tr>
						<td style="vertical-align: middle;">
							 <?php echo $i+1; ?>
						</td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['title'];?></td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['code']; ?></td>
						<td style="text-align: center;vertical-align: middle;"><?php echo $v['users']; ?></td>
						<td style="text-align: center;vertical-align: middle;"><span class="kt-badge kt-badge--inline kt-badge--<?php if($v['enabled']==0)echo "dark";else echo "primary"; ?>"><?php if($v['enabled']==0)echo "Offline";else echo "Online"; ?></span></td>
						<td style="text-align: center;vertical-align: middle;" >
							
							<a data-toggle="modal" nohref data-target="#kt_blockui_4_1_modal_editnote" onclick="getDataNote('<?php echo $v['_id']['$oid'];?>')" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Note">
								<i class="la la-clipboard" style="font-size: 1.8rem;"></i>
							</a>
							
							<a data-toggle="modal" nohref data-target="#kt_blockui_4_1_modal_editversion" onclick="getDataVersion('<?php echo $v['_id']['$oid'];?>')" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
								<i class="la la-edit" style="font-size: 1.8rem;"></i>
							</a>
							
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
						
	</div>

</div>


<script>



////////////GET DATA() ///////////////////////
function getDataVersion(a)
{
	//alert(a);
	//alert(document.getElementById(a+'_h_enabled').value);
	
	
	document.getElementById('eid').value=a;
	
	document.getElementById('title_e').value=document.getElementById(a+'_h_title').value;
	document.getElementById('code_e').value=document.getElementById(a+'_h_code').value;
	document.getElementById('features_e').innerHTML=document.getElementById(a+'_h_features').value;
	
	
	//alert(document.getElementById(a+'_h_for_whatsapp').value);
	
	if(document.getElementById(a+'_h_enabled').value!=0)
		document.getElementById('enabled_e').checked=true;
	if(document.getElementById(a+'_h_is_force').value!=0)
		document.getElementById('force_e').checked=true;
	
}

function validate_version_e(a)
{
	
	//alert(a.id);
	title=document.getElementById("title_e").value;
	features=document.getElementById("features_e").value;
	code=document.getElementById("code_e").value;
	
	title_id=document.getElementById("err_title_e");
	features_id=document.getElementById("err_features_e");
	code_id=document.getElementById("err_code_e");
	
	title_id.innerHTML='';
	features_id.innerHTML='';
	code_id.innerHTML='';
	
	IsError=0;
	
	if(title==""){
		title_id.innerHTML="&nbsp;error : version title can't be blank ! ";
		IsError=1;
	}
	if(features==""){
		features_id.innerHTML="&nbsp;error : new features can't be blank ! ";
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

function getDataNote(a)
{
	//alert(a);
	//alert(document.getElementById(a+'_h_version_note').value);
	document.getElementById('eid_note').value=a;
	document.getElementById('note_e').innerHTML=document.getElementById(a+'_h_version_note').value;
	document.getElementById('note_ver').innerHTML=document.getElementById(a+'_h_title').value;

	
}


</script>
