<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

  $pagetitle ="Add asset";
	$activeParent = "active open";
	$activeAddAsset = "active open";
	$activeAddasset = "active";
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
							<li class="active">Add asset</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								New Item Wizard
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
														<li data-step="1" class="active">
															<span class="step">1</span>
															<span class="title">General Information</span>
														</li>

														<li data-step="2">
															<span class="step">2</span>
															<span class="title">Asset Information</span>
														</li>

														<li data-step="3">
															<span class="step">3</span>
															<span class="title">Finance Information</span>
														</li>

														<li data-step="4">
															<span class="step">4</span>
															<span class="title">Finish</span>
														</li>
													</ul>
												</div>

												<hr />

												<div class="step-content pos-rel">
													<div class="step-pane active" data-step="1">
														<h3 class="lighter block green">Enter the following information</h3>


														<form class="form-horizontal" id="general-information" method="get">
															<div class="hr hr-dotted"></div>


															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetType">AssetType:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="assetType" name="assetType" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<<?php
																			$stmt = $db->query('SELECT CategoryName FROM availablecategory ORDER BY CategoryName DESC');
																			while($row = $stmt->fetch())
																			{
																				?>
																				<option value="<?php echo $row['CategoryName'];?>"> <?php echo $row['CategoryName'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
															<!--<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetManufacturer">Manufacturer:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="assetManufacturer" id="assetManufacturer" class="col-xs-12 col-sm-4" />
																	</div>
																</div>
															</div>-->


															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetModel">Model:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="assetModel" id="assetModel" class="col-xs-12 col-sm-4" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>
														</form>
													</div>

													<div class="step-pane" data-step="2">
														<h3 class="lighter block green">Enter the following information</h3>

														<form class="form-horizontal" id="asset-information" method="get">
															<div class="hr hr-dotted"></div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetSerial">Serial Number:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="assetSerial" id="assetSerial" class="col-xs-12 col-sm-4" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetNumber">Asset Number:</label>

																
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" id="assetNumber" name="assetNumber" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetName">Asset Name:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="assetName" id="assetName" class="col-xs-12 col-sm-4" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetStatus">Status:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="assetStatus" name="assetStatus" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<?php
																			$stmt = $db->query('SELECT Status FROM asset_status ORDER BY Status ASC');
																			while($row_status = $stmt->fetch())
																			{
																				?>
																					<option value="<?php echo $row_status['Status']; ?>" > <?php echo $row_status['Status'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>

															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetCondition">Condition:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="assetCondition" name="assetCondition" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<?php
																			$stmt = $db->query('SELECT AssetCondition FROM asset_Condition ORDER BY AssetCondition ASC');
																			while($row_Condition = $stmt->fetch())
																			{
																				?>
																					<option value="<?php echo $row_Condition['AssetCondition']; ?>" > <?php echo $row_Condition['AssetCondition'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>

															<div class="space-2"></div>

															<!--<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="warrantyExpiry">Warranty Expiry:</label>

																<div class="col-xs-12 col-lg-3 col-md-4 col-sm-4">
																	<div class="input-group input-group-sm">
																		<input name ="warrantyExpiry" type="text" id="datepicker" class="form-control" />
																		<span class="input-group-addon">
																			<i class="ace-icon fa fa-calendar"></i>
																		</span>
																	</div>
																</div>
															</div>-->
														</form>
													</div>

													<div class="step-pane" data-step="3">
														<h3 class="lighter block green">Enter the following information</h3>

														<form class="form-horizontal" id="finance-information" method="get">
															<div class="hr hr-dotted"></div>
															<!-- REMOVE VENDOR INFO<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetVendor">Vendor:</label>
																<div class="col-xs-12 col-sm-9">
																	<select id="assetVendor" name="assetVendor" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<<?php
																			$stmt = $db->query('SELECT VendorName FROM new_vendor ORDER BY VendorName DESC');
																			while($row_vendor= $stmt->fetch())
																			{
																				?>
																				<option> <?php echo $row_vendor['VendorName'];?></option>
																				<?php
																			}
																		 ?>
																		 <option value="N/A">N/A</option>
																	</select>
																</div>

															</div>-->

															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetPurchasePrice">Purchase price(USD):</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="assetPurchasePrice"  id="assetPurchasePrice" class="col-xs-12 col-sm-4" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="ExpectedAssetLife">Expected Asset Life:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="ExpectedAssetLife"  id="ExpectedAssetLife" class="col-xs-12 col-sm-4" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetScrapValue">Depreciation Rate (%):</label>
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="assetScrapValue"   id="assetScrapValue" class="col-xs-12 col-sm-4" />
																	</div>
																</div>

															</div>


															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="purchaseDate">Purchase Date:</label>

																<div class="col-xs-12 col-lg-3 col-md-4 col-sm-4">
																	<div class="input-group input-group-sm">
																		<input name ="purchaseDate" type="text" id="datepicker2" class="form-control" />

																		<span class="input-group-addon">
																			<i class="ace-icon fa fa-calendar"></i>
																		</span>
																	</div>
																</div>
															</div>
														</form>
													</div>

													<div class="step-pane" data-step="4">
														<div class="center">
															<h3 class="green">Congrats!</h3>
															Your asset information was entered succesfully! Click finish to save your asset information!
														</div>
													</div>
												</div>
											</div>

											<hr />
											<div class="wizard-actions">
												<button class="btn btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Prev
												</button>

												<button class="btn btn-success btn-next" data-last="Finish">
													Next
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>
											</div>
											<div id="dialog-success" class="hide">
												<p>
												Office Deleted successfully.
												</p>

											</div><!-- #dialog-message -->
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>
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

				//override dialog's title function to allow for HTML titles
				$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
					_title: function(title) {
						var $title = this.options.title || '&nbsp;'
						if( ("title_html" in this.options) && this.options.title_html == true )
							title.html($title);
						else title.text($title);
					}
				}));


				var $validation = true;
				$('#fuelux-wizard-container')
				.ace_wizard({
					//step: 2 //optional argument. wizard will jump to step "2" at first
					//buttons: '.wizard-actions:eq(0)'
				})
				.on('actionclicked.fu.wizard' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#general-information').valid()) e.preventDefault();
					}else if(info.step == 2 && $validation) {
						if(!$('#asset-information').valid()) e.preventDefault();
					}else if(info.step == 3 && $validation) {
						if(!$('#finance-information').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {
					$.post('../custom/addAsset.php',
				  {
				    assetType: $('[name=assetType]').val(), assetManufacturer: $('[name=assetManufacturer]').val(),
						assetModel:  $('[name=assetModel]').val(), assetSerial:  $('[name=assetSerial]').val(), assetNumber:  $('[name=assetNumber]').val(),
						assetName:  $('[name=assetName]').val(), assetStatus:  $('[name=assetStatus]').val(), assetCondition:  $('[name=assetCondition]').val(),
						warrantyExpiry:  $('[name=warrantyExpiry]').val(), assetVendor:  $('[name=assetVendor]').val(), assetPurchasePrice:  $('[name=assetPurchasePrice]').val(),
						ExpectedAssetLife:  $('[name=ExpectedAssetLife]').val(), assetScrapValue:  $('[name=assetScrapValue]').val(), purchaseDate:  $('[name=purchaseDate]').val()
				  },
				  function(data){
						bootbox.dialog({
							message: data,
							buttons: {
								"success" : {
									"label" : "OK",
									"className" : "btn-sm btn-primary"
								}
							}
						});
						//refresh me
						window.setTimeout(function(){
							location.reload()
						}, 2000)
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

				//documentation : http://docs.jquery.com/Plugins/Validation/validate

				$('#general-information').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						assetType: {
							required: true

						},
						assetManufacturer: {
							required: true

						},
						assetBrand: {
							required: true

						},
						assetModel: {
							required: true
						}
					},

					messages: {
						assetType: {
							required: "Please select the asset type"
						},
						assetManufacturer: {
							required: "Please specify the asset's manufacturer"
						},
						assetBrand: "Please specify the asset's brand",
						assetModel: "Please specify the asset's model"
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

				$('#asset-information').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						assetName: {
							required: true

						},
						assetSerial: {
							required: true

						},
						assetNumber: {
							required: true

						},
						assetStatus: {
							required: true
						},
						assetCondition: {
							required: true

						},
						warrantyExpiry: {
							required: true
						}
					},

					messages: {
						assetName: {
							required: "Please specify the asset's name"

						},
						assetSerial: {
							required: "Please specify the asset's serial number"
						},
						assetNumber: "Please specify the asset's number",
						assetStatus: "Please specify the asset's status",
						assetCondition: "Please choose the asset's condition",
						warrantyExpiry: "Please choose the asset's warranty expiry date"
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
				jQuery.validator.addMethod("numbers", function (value, element) {
					return this.optional(element) || /^[0.0-9.9]+$/i.test(value);
				}, "Use numbers only.");

				$('#finance-information').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						assetVendor: {
							required: true

						},
						assetPurchasePrice: {
							required: true,
							numbers: 'required'

						},
						ExpectedAssetLife: {
							required: true,
							//numbers: 'required'

						},
						assetScrapValue: {
							required: true,
							//numbers: 'required'
						},
						purchaseDate: {
							required: true

						}
					},

					messages: {
						assetPurchasePrice: {
							required: "Please specify the asset's purchase price"

						},
						ExpectedAssetLife: {
							required: "Please specify the asset's expected life in years"
						},
						assetScrapValue: "Please specify the asset's scrap value",
						purchaseDate: "Please choose the asset's purchase date",
						assetVendor: "Please choose the asset's vendor"
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


					$("#datepicker").datepicker({
						showOtherMonths: true,
						selectOtherMonths: false,
					});
					$("#datepicker2").datepicker({
						showOtherMonths: true,
						selectOtherMonths: false,
					});
			})
		</script>
	</body>
</html>
