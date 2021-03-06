<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

	$pagetitle ="Edit inventory";
	$activeParent = "active open";
	$activeViewAsset= "active";
	$activeAddAsset = "active open";
	if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
    $stmt = $db->prepare('SELECT * FROM new_inventory WHERE Id = :assetId');
    $stmt->execute(array(':assetId' =>$id));
    $row_fechAsset = $stmt->fetch();
    //ifpost does not exists redirect user.
    if($row_fechAsset['Id'] == ''){
      header('Location: view-asset');
      exit;
   }

  }else {
		if(isset($_SERVER['HTTP_REFERER'])) {
		  header('Location: '.$_SERVER['HTTP_REFERER']);
		}
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
								<a href="#">Inventory</a>
							</li>
							<li class="active">Edit Inventory</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								Edit inventory

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat">

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
														<h3 class="lighter block green">Enter the following information</h3>


														<form class="form-horizontal" id="office-form" method="get">

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="InventoryDate">Inventory Date:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" id="InventoryDate" name="InventoryDate" class="col-xs-12 col-sm-8" disabled="true" value="<?php echo $row_fechAsset['DateAdded']; ?>" />
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetNumber">Asset Number:</label>

																<div class="col-xs-12 col-sm-9">
																	<input type="text" id="assetNumber" name="assetNumber" class="col-xs-12 col-sm-8" disabled="true" value="<?php echo $row_fechAsset['AssetNumber']; ?>"/>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetSerial">Serial Number:</label>

																<div class="col-xs-12 col-sm-9">
																	<input type="text" id="assetSerial" name="assetSerial" class="col-xs-12 col-sm-8"  disabled="true" value="<?php echo $row_fechAsset['AssetSerial']; ?>"/>
																</div>
															</div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Custodian">Custodian:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="Custodian" name="Custodian" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<option value="N/A" <?php if( $row_fechAsset['Custodian']=="N/A"){ echo "selected = 'true'";} ?>>N/A</option>
																		<?php
																			$stmt = $db->query("SELECT Id,EmployeeName FROM new_technicianr");
																			while($row = $stmt->fetch())
																			{
																				?>
																				<option value="<?php echo $row['EmployeeName'];?>" <?php if( $row_fechAsset['Custodian']==$row['EmployeeName']){ echo "selected = 'true'";} ?>> <?php echo $row['EmployeeName'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Office">Office:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="Office" name="Office" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<option value="N/A" <?php if( $row_fechAsset['Office']=="N/A"){ echo "selected = 'true'";} ?>>N/A</option>
																		<?php
																			$AssNum = $row_fechAsset['AssetNumber'];
																			$SerialNum = $row_fechAsset['SerialNumber'];

																			$stmt = $db->query("SELECT * FROM officestable");

																			while($row = $stmt->fetch())
																			{
																				?>
																				<option value="<?php echo $row['OfficeName'];?>" <?php if( $row_fechAsset['Office']==$row['OfficeName']){ echo "selected = 'true'";} ?>> <?php echo $row['OfficeName'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Department">Department:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="Department" name="Department" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<option value="N/A" <?php if( $row_fechAsset['Department']=="N/A"){ echo "selected = 'true'";} ?>>N/A</option>
																		<?php
																			$stmt = $db->query("SELECT * FROM officedepartments");
																			while($row = $stmt->fetch())
																			{
																				?>
																				<option value="<?php echo $row['DepartmentName'];?>" <?php if( $row_fechAsset['Department']==$row['DepartmentName']){ echo "selected = 'true'";} ?>> <?php echo $row['DepartmentName'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetStatus">Status:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="assetStatus" name="assetStatus" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<option value="N/A" <?php if( $row_fechAsset['Status']=="N/A"){ echo "selected = 'true'";} ?>>N/A</option>
																		<?php
																			$stmt = $db->query('SELECT Status FROM asset_status ORDER BY Status ASC');
																			while($row_status = $stmt->fetch())
																			{
																				?>
																					<option value="<?php echo $row_status['Status']; ?>" <?php if( $row_fechAsset['Status']==$row_status['Status']){ echo "selected = 'true'";} ?> > <?php echo $row_status['Status'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetCondition">Condition:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="assetCondition" name="assetCondition" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<option value="N/A" <?php if( $row_fechAsset['AssetCondition']=="N/A"){ echo "selected = 'true'";} ?>>N/A</option>
																		<?php
																			$stmt = $db->query('SELECT AssetCondition FROM asset_Condition ORDER BY AssetCondition ASC');
																			while($row_Condition = $stmt->fetch())
																			{
																				?>
																					<option value="<?php echo $row_Condition['AssetCondition']; ?>" <?php if( $row_fechAsset['AssetCondition']==$row_Condition['AssetCondition']){ echo "selected = 'true'";} ?> > <?php echo $row_Condition['AssetCondition'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>

															<div class="space-2"></div>

														</form>
													</div>


												</div>
											</div>

											<hr />
											<div class="wizard-actions center">

												<button class="btn btn-white btn-info btn-bold btn-next" data-last="Finish">
													<i class="ace-icon fa fa-floppy-o bigger-120 green"></i>
													Save
												</button>

												<button class="btn btn-white btn-default btn-bold">
													<i class="ace-icon fa fa-times red2"></i>
													Cancel
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
		<script src="../assets/js/jquery.validate.min.js"></script>
		<script src="../assets/js/jquery-additional-methods.min.js"></script>
		<script src="../assets/js/bootbox.js"></script>
		<script src="../assets/js/jquery.maskedinput.min.js"></script>
		<script src="../assets/js/select2.min.js"></script>

		<script src="../assets/js/jquery-ui.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">

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
						if(!$('#office-form').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {

					bootbox.dialog({
						message: "Are you sure you want to make changes to this inventory record?",
						title: "<i class='glyphicon glyphicon-refresh`></i> Delete !",
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


								$.post('../custom/updateinventory.php',
								{
									'assetSerial': $('[name=assetSerial]').val(), 'assetNumber': $('[name=assetNumber]').val(), 'assetStatus':  $('[name=assetStatus]').val(),
								  'assetCondition': $('[name=assetCondition]').val(), 'Custodian': $('[name=Custodian]').val(), 'Office':  $('[name=Office]').val(),
								  'Department': $('[name=Department]').val(), 'Id': "<?php echo $_GET['id'];?>"

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

				$('#office-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						assetStatus: {
				      required: true
				    },
				    assetCondition: {
				      required: true,
				    },
				    Custodian: {
				      required: true,
				    },
				    Office: {
				      required: true,
				    },
				    Department: {
				      required: true,
				    }
					},

					messages: {
						assetStatus: "Please select an asset status",
				    assetCondition: "Please select an asset condition",
				    Custodian: "Please select a user in charge of athe asset",
						Office: "Please select an office",
				    Department: "Please select a department"
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

				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});
				//override dialog's title function to allow for HTML titles
				$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
					_title: function(title) {
						var $title = this.options.title || '&nbsp;'
						if( ("title_html" in this.options) && this.options.title_html == true )
							title.html($title);
						else title.text($title);
					}
				}));

			});
		</script>
	</body>
</html>
