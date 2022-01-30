<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

		if(isset($_GET['id'])){
	    $id = base64_decode($_GET['id']);
	    $stmt = $db->prepare('SELECT * FROM assetlicences WHERE Id = :assetId');
	    $stmt->execute(array(':assetId' =>$id));
	    $row_assignedLicence = $stmt->fetch();
	    //if post does not exists redirect user.
	    if($row_assignedLicence['Id'] == ''){
	    //  header('Location: view-asset');
	      exit;
	    }

	  }else {
	    # code...
	    header('Location: view-asset');
	    exit;
	  }

  $pagetitle ="Assign Licence";
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
							<li>
								<a href="#">View Asset</a>
							</li>
							<li class="active">Assign Licence</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								Assign Licence

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


														<form class="form-horizontal" id="licences-form" method="get">
															<?php
																$stmt = $db->prepare('SELECT * FROM new_item WHERE SerialNumber = :assetId');
																$stmt->execute(array(':assetId' =>$row_assignedLicence['AssetID']));
																$row_assetIsht = $stmt->fetch();
															 ?>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="AssetName">Asset Name:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="AssetName" id="AssetName" class="col-xs-12 col-sm-6" value="<?php echo $row_assetIsht['AssetName']; ?>"/>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="SerialNumber"> Serial Number:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="SerialNumber" id="SerialNumber" class="col-xs-12 col-sm-6" value = "<?php echo strtoupper($row_assetIsht['SerialNumber']); ?>"/>
																	</div>
																</div>
															</div>
                              <div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="LicenceName">Licence:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="LicenceName" name="LicenceName" class="select2" data-placeholder="Click to Choose..."  onchange="getData(this.value, 'ActivationCode')" >
																		<option value="">&nbsp;</option>
																		<<?php
																			$stmt = $db->query('SELECT Id, Name FROM new_licence WHERE (Slots - SlotsUsed)>0 OR ReUsable = 1');
																			while($row = $stmt->fetch())
																			{
																				?>
																				<option value="<?php echo $row['Id'];?>" <?php if($row['Name']==$row_assignedLicence['LicenceName']){echo "selected = 'true'";} ?>> <?php echo $row['Name'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
															<div class="form-group" >
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="ActivationCode">Activation Code:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="ActivationCode" id="ActivationCode" class="col-xs-12 col-sm-6" disabled value="<?php echo $row_assignedLicence['LicenceID'] ?>"/>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="LicenceSlots">Available Slots:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" class="input-sm" id="AvailableSlots" name="AvailableSlots"  disabled/>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="LicenceValidity">Validity Period in Days:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" class="input-sm" id="Validity"  name="Validity" disabled/>
																	</div>
																</div>
															</div>

															<div class="space-2"></div>


														</form>
													</div>


												</div>
											</div>

											<hr />
											<div class="wizard-actions center">
												<div class="wizard-actions center">

													<button class="btn btn-white btn-info btn-bold btn-next" data-last="Finish">
														<i class="ace-icon fa fa-floppy-o bigger-120 green"></i>
														Save
													</button>

													<a href="javascript:history.back()" class="btn btn-white btn-default btn-bold">
														<i class="ace-icon fa fa-times red2"></i>
														Cancel
													</a>

												</div>
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

		<script src="../assets/js/jquery-ui.custom.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="../assets/js/chosen.jquery.min.js"></script>
		<script src="../assets/js/spinbox.min.js"></script>
		<script src="../assets/js/bootstrap-datepicker.min.js"></script>
		<script src="../assets/js/bootstrap-timepicker.min.js"></script>
		<script src="../assets/js/moment.min.js"></script>
		<script src="../assets/js/daterangepicker.min.js"></script>
		<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="../assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="../assets/js/jquery.knob.min.js"></script>
		<script src="../assets/js/autosize.min.js"></script>
		<script src="../assets/js/jquery.inputlimiter.min.js"></script>
		<script src="../assets/js/jquery.maskedinput.min.js"></script>
		<script src="../assets/js/bootstrap-tag.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		function getData(LicenceId, divid){
				$.ajax({
						url: '../custom/getLicenceKey.php?LicenceId='+LicenceId, //call storeemdata.php to store form data
						success: function(html) {
								$('[name=ActivationCode]').val(html);
						}
				});
				$.ajax({
						url: '../custom/getAvailableSlots.php?LicenceId='+LicenceId, //call storeemdata.php to store form data
						success: function(html) {
								$('[name=AvailableSlots]').val(html);
						}
				});
				$.ajax({
						url: '../custom/getValidity.php?LicenceId='+LicenceId, //call storeemdata.php to store form data
						success: function(html) {
								$('[name=Validity]').val(html);
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
						if(!$('#licences-form').valid()) e.preventDefault();
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
							label: "Yes!",
							className: "btn-danger",
							callback: function() {

								var vid = "<?php echo $_GET['id'];?>";
									$.post('../custom/update-assignLicence.php', {
										'SerialNumber': $('[name=SerialNumber]').val(),  'ActivationCode':  $('[name=ActivationCode]').val(),
										'AvailableSlots':  $('[name=AvailableSlots]').val(), 'LicenceName': $('[name=LicenceName]').val(), 'Id':vid })
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


				}).on('stepclick.fu.wizard', function(e){
				  //e.preventDefault();//this will prevent clicking and selecting steps
				});

				$('#licences-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						ActivationCode: {
				      required: true
				    },
				    LicenceVendor: {
				      required: true,
				    },
				    LicenceName: {
				      required: true,
				    },
				    LicenceSlots: {
				      required: true,
				    },
				    LicenceValidity: {
				      required: true,
				    },
						reusable: {
							required: true,
						}
					},

					messages: {
						LicenceName: "Please choose a licence",
						reusable: "Please specify if the licence is reusable or not",
				    ActivationCode: "Please enter the licence activation code",
						LicenceSlots: "Please enter the number of slots for this licence",
						LicenceValidity: "Please enter the licence validity period",
				    LicenceVendor: "Please choose the parent office"
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

				$('#LicenceSlots').ace_spinner({value:0,min:1,max:10000,step:1, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#LicenceValidity').ace_spinner({value:0,min:1,max:10000,step:1, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});

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
