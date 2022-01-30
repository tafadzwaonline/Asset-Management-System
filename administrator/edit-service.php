<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }


  $pagetitle ="View Asset";
	$activeParent = "active open";
	$activenewService= "active";
	$activenewService = "active open";


		if(isset($_GET['id'])){
	    $id = base64_decode($_GET['id']);
	    $stmt = $db->prepare('SELECT * FROM new_item WHERE Id = :assetId');
	    $stmt->execute(array(':assetId' =>$id));
	    $row = $stmt->fetch();
	    //if post does not exists redirect user.
	    if($row['Id'] == ''){
	      header('Location: view-asset');
	      exit;
	    }

	  }else {
	    # code...
	    header('Location: view-asset');
	    exit;
	  }

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
							<li class="active">Asset Repair</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								Asset Repair Information
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
														<h3 class="lighter block green">Asset information</h3>
														<form class="form-horizontal" id="validation-form" method="get">

														<div class="vspace-6-sm"></div>
														<div class="step-content pos-rel col-sm-11 col-sm-offset-1 col-lg-offset-0 col-lg-12">
															<div class="row">
																<div class="tabbable">
																	<ul class="nav nav-tabs" id="myTab">
																		<li class="active">
																			<a data-toggle="tab" href="#home">
																				<i class="green ace-icon fa fa-home bigger-120"></i>
																				Asset Information
																			</a>
																		</li>
																		<li>
																			<a data-toggle="tab" href="#repair">
																				Repair Informaton

																			</a>
																		</li>
																		<li>
																			<a data-toggle="tab" href="#history">
																				Repair History

																			</a>
																		</li>
																	</ul>

																	<div class="tab-content">
																		<div id="home" class="tab-pane fade in active">
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="SerialNumber">Serial Number:</label>

																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<input type="text" name="SerialNumber" id="SerialNumber" class="col-xs-12 col-sm-6" value="<?php echo $row['SerialNumber']; ?>" />
																					</div>
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="AssetNumber">Asset Number:</label>

																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<input type="text" name="AssetNumber" id="AssetNumber" class="col-xs-12 col-sm-6"  value="<?php echo $row['AssetNumber']; ?>" />
																					</div>
																				</div>
																			</div>
																			<div class="hr hr-dotted"></div>


																			<div class="space-2"></div>
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="SerialNumber">Type:</label>

																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<input type="text" name="SerialNumber" id="SerialNumber" class="col-xs-12 col-sm-6" value="<?php echo $row['Type']; ?>" />
																					</div>
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="AssetNumber">Model:</label>

																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<input type="text" name="AssetNumber" id="AssetNumber" class="col-xs-12 col-sm-6"  value="<?php echo $row['Model']; ?>" />
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="SerialNumber">Manufacturer:</label>

																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<input type="text" name="SerialNumber" id="SerialNumber" class="col-xs-12 col-sm-6" value="<?php echo $row['Manufacturer']; ?>" />
																					</div>
																				</div>
																			</div>
																			<div class="hr hr-dotted"></div>


																			<div class="space-2"></div>
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="AssetNumber"> Condition:</label>

																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<input type="text" name="AssetNumber" id="AssetNumber" class="col-xs-12 col-sm-6"  value="<?php echo $row['AssetCondition']; ?>" />
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="ScrapValue">Status:</label>

																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<input type="text" name="ScrapValue" id="ScrapValue" class="col-xs-12 col-sm-6" value="<?php echo $row['Status']; ?>" />
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="ExpectedLife">Warranty Expiry:</label>

																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<input type="text" name="ExpectedLife" id="ExpectedLife" class="col-xs-12 col-sm-6" value="<?php echo $row['WarrantyExpiry']; ?>" />
																					</div>
																				</div>
																			</div>
																		</div>

																		<div id="history" class="tab-pane fade">
																			<div class="row">
																				<div class="col-xs-12">
																					<div class="clearfix">
																						<div class="pull-right tableTools-container"></div>
																					</div>

																					<div class="table-header">
																						Asset repair history
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
																									<th>Date Of Repair</th>
																									<th>Repair Type</th>
																									<th>Description</th>
																									<th>Repaired By</th>
																									<th>Cost</th>
																									<th></th>
																								</tr>
																							</thead>

																							<tbody>
																							<?php
																							$stmt = $db->prepare('SELECT * FROM itemrepairs WHERE ItemSerialNumber = :SerialNumber OR ItemSerialNumber = :AssetNumber');
																							$stmt->execute(array(
																								':SerialNumber' => base64_decode($_GET['id']),
 																						   ':AssetNumber' => base64_decode($_GET['id'])));
																							while($row=$stmt->fetch(PDO::FETCH_ASSOC))
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
																									<td><?php echo $row['DateOfRepair'] ?></td>
																									<td><?php echo $row['RepairType'] ?></td>
																									<td><?php echo $row['RepairsMade'] ?></td>
																									<td><?php echo $row['RepairedBy'] ?></td>
																									<td><?php echo $row['Cost'] ?></td>

																									<td>
																										<div class="hidden-sm hidden-xs action-buttons">
																											<a class="green" href="edit-service?id=<?php echo $_GET['id']; ?>&r=<?php $key = base64_encode($row['Id']); echo $key ?>">
																												<i class="ace-icon fa fa-pencil bigger-130"></i>
																											</a>

																											<a class="red delete_record" data-id="<?php echo $row['Id']; ?>" href="javascipt:void(0)">
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
																		<div id="repair" class="tab-pane fade">
																			<?php
																			if(isset($_GET['r'])){

																				$repairID = base64_decode($_GET['r']);

																				$stmt = $db->prepare('SELECT * FROM itemrepairs WHERE Id = :assetId');
																				$stmt->execute(array(':assetId' =>$repairID));
																				$rowGetRepair = $stmt->fetch();
																			}

																			 ?>
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="RepairType">Repair Type</label>

																				<div class="col-xs-12 col-sm-9">
																					<select id="RepairType" name="RepairType" class="select2" data-placeholder="Click to Choose...">
																						<option value="">&nbsp;</option>
																							<option value="Inspection" <?php if($rowGetRepair['RepairType']=="Inspection"){echo "selected = 'true'";} ?>>Inspection</option>
																							<option value="Maintenance"  <?php if($rowGetRepair['RepairType']=="Maintenance"){echo "selected = 'true'";} ?>>Maintenance</option>
																							<option value="Repair"  <?php if($rowGetRepair['RepairType']=="Repair"){echo "selected = 'true'";} ?>>Repair</option>
																					</select>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="RepairDerscription">Description of repair</label>

																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<textarea class="input-xlarge" name="RepairDerscription" id="RepairDerscription"><?php echo htmlspecialchars($rowGetRepair['RepairsMade']); ?></textarea>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="RepairedBy">Repaired By</label>

																				<div class="col-xs-12 col-sm-9">
																					<select id="RepairedBy" name="RepairedBy" class="select2" data-placeholder="Click to Choose...">
																						<option value="">&nbsp;</option>
																						<<?php
																							$stmt = $db->query('SELECT VendorName FROM new_vendor ORDER BY VendorName DESC');
																							while($row = $stmt->fetch())
																							{
																								?>
																								<option <?php if($rowGetRepair['RepairedBy']==$row['VendorName']){echo "selected = 'true'";} ?> > <?php echo $row['VendorName'];?></option>
																								<?php
																							}
																						 ?>
																					</select>
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="RepairDate"> Date of Repair</label>

																				<div class="col-xs-12 col-lg-3 col-md-4 col-sm-4">
																					<div class="input-group input-group-sm">
																						<input name ="RepairDate" type="text" id="RepairDate" class="form-control" value="<?php echo $rowGetRepair['DateOfRepair']; ?>"/>

																						<span class="input-group-addon">
																							<i class="ace-icon fa fa-calendar"></i>
																						</span>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="RepairCost">Repair Cost</label>
																				<div class="col-xs-12 col-sm-9">
																					<div class="clearfix">
																						<input type="text" name="RepairCost" id="RepairCost" class="col-xs-12 col-sm-4" value="<?php echo $rowGetRepair['Cost']; ?>"/>
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

												<button class="btn btn-success btn-next" data-last="Finish">
													<i class="ace-icon fa fa-floppy-o"></i>
													Save

												</button>
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
		<script src="../assets/js/jquery-ui.min.js"></script><!-- Calendar-->
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

			$('.delete_record').click(function(e){

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


							$.post('../custom/deleteRepairRecord.php', { 'delete':pid })
							.done(function(response){
								bootbox.alert(response);
								parent.fadeOut('slow');

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
					bootbox.dialog({
						message: "Are you sure you want to make changes to this record?",
						title: "<i class='glyphicon glyphicon-refresh'></i> Update !",
						buttons: {
						success: {
							label: "No",
							className: "btn-success",
							callback: function() {
							 $('.bootbox').modal('hide');
							}
						},
						danger: {
							label: "Update!",
							className: "btn-danger",
							callback: function() {


								$.post('../custom/updateRepairRecord.php',
								{
									'RepairType': $('[name=RepairType]').val(), 'RepairCost': $('[name=RepairCost]').val(),
									'RepairDerscription': $('[name=RepairDerscription]').val(), 'RepairedBy': $('[name=RepairedBy]').val(),
									'RepairDate': $('[name=RepairDate]').val(), 'Id': "<?php echo $_GET['r'];?>"

								})
								.done(function(response){
									bootbox.alert(response);
									parent.fadeOut('slow');

								})
								.fail(function(){
									bootbox.alert('Something Went Wrog ....');
								})

							}
						}
						}
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

				jQuery.validator.addMethod("num_Only", function(value, element) {
				   return this.optional(element) || /^[0-9]+$/i.test(value);
				}, "Use letters, numbers or an underscore only");

				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {

						RepairType: {
							required: true
						},
						RepairCost: {
							required: true,
							num_Only:true
						},

						RepairDerscription: {
							required: true
						},
						RepairedBy: {
							required: true
						},
						RepairDate: {
							required: true,
						}
					},

					messages: {
						RepairCost: {
							required: "You must provide the repair cost.",
							num_Only: "Use numbers 0-9 only"
						},

						RepairType: "Please choose the repair type",
						RepairDerscription: "Please give a description of the repairs that were made",
						RepairedBy: "Please choose who repaired the asset",
						RepairDate: "Please choose the repair date"
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






				$("#RepairDate").datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
				});


			})
		</script>
	</body>
</html>
