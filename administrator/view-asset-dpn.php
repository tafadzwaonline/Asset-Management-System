<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

	if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
    $stmt = $db->prepare('SELECT * FROM new_item WHERE Id = :assetId');
    $stmt->execute(array(':assetId' =>$id));
    $row2 = $stmt->fetch();
    //if asset does not exists redirect user.
    if($row2['Id'] == ''){
      header('Location: view-asset');
      exit;
    }

  }else {
    # code...
    header('Location: view-asset');
    exit;
  }

  $pagetitle ="View Asset";
	$activeParent = "active open";
	$activeViewAsset= "active";
	$activeAddAsset = "active open";
?>
  <?php include('includes/header.php');?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Assets</a>
							</li>
							<li>
								<a href="#">My Assets</a>
							</li>
							<li class="active">View Asset</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');

					$id = base64_decode($_GET['id']);
					$stmt = $db->prepare('SELECT * FROM new_item WHERE Id = :assetId');
					$stmt->execute(array(':assetId' =>$id));
					$row = $stmt->fetch();

					?>

						<div class="page-header">
							<h1>
								<?php echo $row['Type']; ?>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter"> </h4>

									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div id="fuelux-wizard-container">
												<div>
													<ul class="steps">
														<li data-step="1" class="active hidden">

														</li>

													</ul>
												</div>

												<div class="step-content pos-rel">
													<div class="step-pane active" data-step="1">
														<h3 class="lighter block green">Asset Depreciation</h3>
														<form class="form-horizontal" id="validation-form" method="get">

														<div class="vspace-6-sm"></div>
														<div class="step-content pos-rel col-sm-11 col-sm-offset-1 col-lg-offset-0 col-lg-12">
															<div class="row">
																<div class="tabbable">
																	<ul class="nav nav-tabs" id="myTab">
																		
																		<li class="active">
																			<a data-toggle="tab" href="#finance">
																				<i class="green ace-icon fa fa-home bigger-120"></i>
																				Finance Information

																			</a>
																		</li>

																	</ul>

																	<div class="tab-content">
																		

																		<div id="finance" class="tab-pane fade in active">
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="AssetName"> Description:</label>

																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<input type="text" name="AssetName" id="AssetName" class="col-xs-12 col-sm-6" value="<?php echo $row['AssetName']; ?>" disabled/>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="AssetNumber">Asset Number :</label>

																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<input type="text" name="AssetNumber" id="AssetNumber" class="col-xs-12 col-sm-6" value="<?php echo $row['AssetNumber']; ?>" disabled />
																					</div>
																				</div>
																			</div>
																			


																			<div class="hr hr-dotted"></div>


																			<div class="space-2"></div>
																			<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Type">Asset Type:</label>

																<div class="col-xs-12 col-lg-3 col-md-4 col-sm-4">
																	<div class="clearfix">
																		<input name ="Type" type="text" id="Type" class="col-xs-12 col-sm-6" value="<?php echo $row['Type']; ?>" disabled/>
																	
																	</div>
																</div>
															</div>
															 <div class="hr hr-dotted"></div>


																			<div class="space-2"></div>
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">Depreciation :</label>

																				<div class="col-xs-12 col-sm-9">
																					<select id="DepreciationMethod" name="state" class="select2" data-placeholder="Click to Choose..." onchange="getData(this.value, 'displaydata')">
																						<option value=" "></option>
																						 <option value=""></option>
																						<option value=""></option>
																						<option value="3">Yearly Depreciation</option>

																					</select>
																					
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-xs-12" id="displaydata">

																				</div><!-- /.span -->
																			</div><!-- /.row -->
																		</div>

																		<div id="vendor" class="tab-pane fade">
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="ScrapValue">Vendor:</label>

																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<input type="text" name="ScrapValue" id="ScrapValue" class="col-xs-12 col-sm-6" value="<?php echo $row['Vendor']; ?>" />
																					</div>
																				</div>
																			</div>
																		</div>

																		<div id="custodian" class="tab-pane fade">
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="ScrapValue">Custodian:</label>

																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<input type="text" name="ScrapValue" id="ScrapValue" class="col-xs-12 col-sm-6" value="<?php if($row['SerialNumber']=="N/A"){echo $user->getAssignedUserName($user->getCustodian($row['AssetNumber']));}else{echo $user->getAssignedUserName($user->getCustodian($row['SerialNumber']));}  ?>" />
																					</div>
																				</div>
																			</div>
																		</div>
																		<div id="licences" class="tab-pane fade">
																			<div class="row">
																				<div class="col-xs-12">
																					<div class="clearfix">
																						<div class="pull-right tableTools-container"></div>
																					</div>

																					<div class="table-header">
																						Asset Licences
																					</div>

																					<!-- div.table-responsive -->

																					<!-- div.dataTables_borderWrap -->
																					<div>
																						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
																							<thead>
																								<tr>
																									<th class="center">
																										<label class="pos-rel">
																											<input type="checkbox" class="ace" />
																											<span class="lbl"></span>
																										</label>
																									</th>
																									<th>Licence Name</th>
																									<th>Licence Key</th>
																									<th>Date Installed</th>
																									<th>Installed By</th>
																									<th>Status</th>
																									<th></th>
																								</tr>
																							</thead>

																							<tbody>
																							<?php
																							$myDate = date('Y/m/d');
																							$date = str_replace('/', '-', $myDate);
																							$form = date('Y-m-d', strtotime($date));

																							$stmt = $db->prepare("SELECT assetlicences.Id, new_licence.ReUsable,new_licence.Period, assetlicences.LicenceName, assetlicences.LicenceID ,assetlicences.DateInstalled,assetlicences.AddedBy, DATEDIFF('$form', assetlicences.DateInstalled) as Days FROM assetlicences, new_licence WHERE assetlicences.LicenceID = new_licence.SerialNumber AND assetlicences.AssetID = :AssetID");
																							$stmt->execute(array(
																							 ':AssetID' => $row['SerialNumber']));
																							while($rowLicence=$stmt->fetch(PDO::FETCH_ASSOC))
																							{
																								//extract($row);
																							 ?>
																								<tr>
																									<td class="center">
																										<label class="pos-rel">
																											<input type="checkbox" class="ace" />
																											<span class="lbl"></span>
																										</label>
																									</td>
																									<td><?php echo $rowLicence['LicenceName'] ?></td>
																									<td><?php echo $rowLicence['LicenceID'] ?></td>

																									<td><?php echo $rowLicence['DateInstalled'] ?></td>
																									<td><?php echo $rowLicence['AddedBy'] ?></td>
																									<td>
																										<?php
																										if($rowLicence['Days'] > $rowLicence['Period'])
																										{
																											$days = $rowLicence['Days'] - $rowLicence['Period'];
																											if($rowLicence['ReUsable']=="1"){
																												echo "Re-usable";
																											}else {
																												echo "<span class='label label-warning arrowed-right arrowed-in'>Licence Expired $days days ago</span>";
																											}

																										}else {
																											if($rowLicence['ReUsable']=="1"){
																												echo "Re-usable";
																											}else {
																												$days = $rowLicence['Period'] - $rowLicence['Days'];
																												echo "<span class='label label-success arrowed-right arrowed-in'> Licence valid. $days days remaining</span>";
																											}

																										} ?>
																									</td>

																									<td>
																										<div class="hidden-sm hidden-xs action-buttons">

																											<a class="green" href="edit-licence-assigned?id=<?php $key = base64_encode($rowLicence['Id']); echo $key ?>">
																												<i class="ace-icon fa fa-pencil bigger-130"></i>
																											</a>

																											<a class="red delete_licence" data-id="<?php echo $rowLicence['Id']; ?>" href="javascipt:void(0)">
																												<i class="ace-icon fa fa-trash-o bigger-130"></i>
																											</a>
																										</div>
																									</td>
																								</tr>
																								<?php
																							}
																								 ?>
																							</tbody>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div id="inventory" class="tab-pane fade">
																			<div class="row">
																				<div class="col-xs-12">


																					<div class="table-header">
																						Asset Inventory History
																					</div>

																					<!-- div.table-responsive -->

																					<!-- div.dataTables_borderWrap -->
																					<div>
																						<table id="inventory-table" class="table table-striped table-bordered table-hover">
																							<thead>
																								<tr>
																									<th class="center">
																										<label class="pos-rel">
																											<input type="checkbox" class="ace" />
																											<span class="lbl"></span>
																										</label>
																									</th>
																									<th>Status</th>
																									<th>Condition</th>
																									<th>Custodian</th>
																									<th>Office</th>
																									<th>Department</th>
																									<th>Date</th>
																									<th>Action</th>
																								</tr>
																							</thead>

																							<tbody>
																							<?php
																							$myDate = date('Y/m/d');
																							$date = str_replace('/', '-', $myDate);
																							$form = date('Y-m-d', strtotime($date));

																							$stmt = $db->prepare("SELECT * FROM new_inventory WHERE AssetNumber = :AssetNumber AND AssetSerial = :AssetSerial");
																							$stmt->execute(array(':AssetNumber' => $row['AssetNumber'], ':AssetSerial' => $row['SerialNumber']));
																							while($row_inventory=$stmt->fetch(PDO::FETCH_ASSOC))
																							{
																								//extract($row);
																							 ?>
																								<tr>
																									<td class="center">
																										<label class="pos-rel">
																											<input type="checkbox" class="ace" />
																											<span class="lbl"></span>
																										</label>
																									</td>
																									<td><?php echo $row_inventory['Status'] ?></td>
																									<td><?php echo $row_inventory['AssetCondition'] ?></td>

																									<td><?php echo $row_inventory['Custodian'] ?></td>
																									<td><?php echo $row_inventory['Office'] ?></td>
																									<td><?php echo $row_inventory['Department'] ?></td>

																									<td><?php echo $row_inventory['DateAdded'] ?></td>
																									<td>
																										<div class="hidden-sm hidden-xs action-buttons">

																											<a class="green" href="edit-inventory?id=<?php $key = base64_encode($row_inventory['Id']); echo $key ?>">
																												<i class="ace-icon fa fa-pencil bigger-130"></i>
																											</a>

																											<a class="red delete_inventory" data-id="<?php echo $row_inventory['Id']; ?>" href="javascipt:void(0)">
																												<i class="ace-icon fa fa-trash-o bigger-130"></i>
																											</a>
																										</div>

																									</td>
																								</tr>
																								<?php
																							}
																								 ?>
																							</tbody>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															 </div>
															</div>
														</form>
													</div>


												</div>
											</div>

											<hr />
											<div class="wizard-actions center">

												<a class="btn btn-success btn-next" href="javascript:history.back()">
													<i class="ace-icon fa fa-arrow-left"></i>
													Back

												</a>
											</div>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php  include('includes/footer.php'); ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="../assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="../assets/js/wizard.min.js"></script>
		<script src="../assets/js/jquery.validate.min.js"></script>
		<script src="../assets/js/jquery-additional-methods.min.js"></script>
		<script src="../assets/js/bootbox.js"></script>
		<script src="../assets/js/jquery.maskedinput.min.js"></script>
		<script src="../assets/js/select2.min.js"></script>
		<script src="../assets/js/jquery.dataTables.min.js"></script>
		<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../assets/js/dataTables.buttons.min.js"></script>
		<script src="../assets/js/buttons.flash.min.js"></script>
		<script src="../assets/js/buttons.html5.min.js"></script>
		<script src="../assets/js/buttons.print.min.js"></script>
		<script src="../assets/js/buttons.colVis.min.js"></script>
		<script src="../assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		$(document).ready(function(){
			$('.delete_licence').click(function(e){

				e.preventDefault();

				var pid = $(this).attr('data-id');
				var parent = $(this).parent("td").parent("tr");

				bootbox.dialog({
					message: "Are you sure you want to Delete this licence record?",
					title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
					buttons: {
					success: {
						label: "No",
						className: "btn-success",
						callback: function() {
						 $('.bootbox').modal('hide');
						}
					},
					danger: {
						label: "Delete!",
						className: "btn-danger",
						callback: function() {


							$.post('../custom/deleteAssignedlicence.php', { 'delete':pid })
							.done(function(response){
								bootbox.alert(response);
								parent.fadeOut('slow');
								//rload page
								window.setTimeout(function(){
									location.reload()
								}, 3000)
							})
							.fail(function(){
								bootbox.alert('Something Went Wrong ....');
							})

						}
					}
					}
				});


			});
			$('.delete_inventory').click(function(e){

				e.preventDefault();

				var pid = $(this).attr('data-id');
				var parent = $(this).parent("td").parent("tr");

				bootbox.dialog({
					message: "Are you sure you want to Delete ?",
					title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
					buttons: {
					success: {
						label: "No",
						className: "btn-success",
						callback: function() {
						 $('.bootbox').modal('hide');
						}
					},
					danger: {
						label: "Delete!",
						className: "btn-danger",
						callback: function() {


							$.post('../custom/deleteinventory.php', { 'delete':pid })
							.done(function(response){
								bootbox.alert(response);
								parent.fadeOut('slow');
								//rload page
								window.setTimeout(function(){
									location.reload()
								}, 3000)
							})
							.fail(function(){
								bootbox.alert('Something Went Wrong ....');
							})

						}
					}
					}
				});


			});

		});
			function getData(DepreciationMethod, divid){
					$.ajax({
							url: '../custom/getDepreciation.php?DepreciationMethod='+DepreciationMethod+'&id='+"<?php echo $row['Id'];?>", //call storeemdata.php to store form data
							success: function(html) {
									var ajaxDisplay = document.getElementById(divid);
									ajaxDisplay.innerHTML = html;
							}
					});
			}
			jQuery(function($) {

				$('[data-rel=tooltip]').tooltip();

				$('.select2').css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});


				var $validation = true;
				$('#fuelux-wizard-container')
				.ace_wizard({
					//step: 2 //optional argument. wizard will jump to step "2" at first
					//buttons: '.wizard-actions:eq(0)'
				})
				.on('actionclicked.fu.wizard' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {
					$.post('../custom/addOffice.php',
					{OfficeId: "WPC/O/1",OfficeName: "Lands"
				  },
					function(){
						bootbox.dialog({
							message: "Thank you! Your information was successfully saved!",
							buttons: {
								"success" : {
									"label" : "OK",
									"className" : "btn-sm btn-primary"
								}
							}
						});
					});


				}).on('stepclick.fu.wizard', function(e){
					//e.preventDefault();//this will prevent clicking and selecting steps
				});


				//jump to a step
				/**
				var wizard = $('#fuelux-wizard-container').data('fu.wizard')
				wizard.currentStep = 3;
				wizard.setState();
				*/

				//determine selected step
				//wizard.selectedItem().step



				//hide or show the other form which requires validation
				//this is for demo only, you usullay want just one form in your application
				$('#skip-validation').removeAttr('checked').on('click', function(){
					$validation = this.checked;
					if(this.checked) {
						$('#sample-form').hide();
						$('#validation-form').removeClass('hide');
					}
					else {
						$('#validation-form').addClass('hide');
						$('#sample-form').show();
					}
				})



				//documentation : http://docs.jquery.com/Plugins/Validation/validate


				$.mask.definitions['~']='[+-]';
				$('#phone').mask('(999) 999-9999');

				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");

				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						email: {
							required: true,
							email:true
						},
						password: {
							required: true,
							minlength: 5
						},
						password2: {
							required: true,
							minlength: 5,
							equalTo: "#password"
						},
						name: {
							required: true
						},
						phone: {
							required: true,
							phone: 'required'
						},
						url: {
							required: true,
							url: true
						},
						comment: {
							required: true
						},
						state: {
							//required: true
						},
						platform: {
							required: true
						},
						subscription: {
							required: true
						},
						gender: {
							required: true,
						},
						agree: {
							required: true,
						}
					},

					messages: {
						email: {
							required: "Please provide a valid email.",
							email: "Please provide a valid email."
						},
						password: {
							required: "Please specify a password.",
							minlength: "Please specify a secure password."
						},
						state: "Please choose state",
						subscription: "Please choose at least one option",
						gender: "Please choose gender",
						agree: "Please accept our policy"
					},


					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},

					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},

					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},

					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});




				$('#modal-wizard-container').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');


				/**
				$('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
					$(this).closest('form').validate().element($(this));
				});

				$('#mychosen').chosen().on('change', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
				*/


				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});//initiate dataTables plugin
				var myTable =
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],


					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,

					//,
					//"sScrollY": "200px",
					//"bPaginate": false,

					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element

					//"iDisplayLength": 50


					select: {
						style: 'multi'
					}
			    } );



				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );

				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});


				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {

					defaultColvisAction(e, dt, button, config);


					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});

				////

				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);





				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );




				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header

					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});

				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});



				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});



				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header

					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});



				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					//var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}




				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/





				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/


			})
		</script>
	</body>
</html>
