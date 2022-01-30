<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

	$pagetitle ="Edit Vendor";
//	$activeParent = "active open";
	$activevendorParent= "active open";
	$activeviewVendor = "active";


	if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
    $stmt = $db->prepare('SELECT * FROM new_vendor WHERE Id = :vid');
    $stmt->execute(array(':vid' =>$id));
    $row = $stmt->fetch();
    //if post does not exists redirect user.
    if($row['Id'] == ''){
      header('Location: view-vendor');
      exit;
    }

  }else {
    # code...
    header('Location: view-vendor');
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
								<a href="#">Vendors</a>
							</li>
							<li class="active">Edit vendor</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								Edit Vendor

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
														<h3 class="lighter block green">Enter the following information</h3>

														<?php
															$id = base64_decode($_GET['id']);
													    $stmt = $db->prepare('SELECT * FROM new_vendor WHERE Id = :vid');
													    $stmt->execute(array(':vid' =>$id));
													    $row = $stmt->fetch();

														 ?>
														<form class="form-horizontal" id="validation-form" method="get">
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="VendorNumber">Vendor Number:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" id="VendorNumber" name="VendorNumber" class="col-xs-12 col-sm-5" value="<?php echo $row['VendorNumber']; ?>" disabled/>
																	</div>
																</div>
															</div>

															<div class="space-2"></div>


															<div class="hr hr-dotted"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="VendorName">Vendor Name:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" id="VendorName" name="VendorName" class="col-xs-12 col-sm-5" value="<?php echo $row['VendorName']; ?>" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">Phone Number:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="input-group">
																		<span class="input-group-addon">
																			<i class="ace-icon fa fa-phone"></i>
																		</span>

																		<input type="tel" id="phone" name="phone" value="<?php echo $row['VendorPhone']; ?>" />
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Email Address:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="email" name="email" id="email" class="col-xs-12 col-sm-6"  value="<?php echo $row['VendorEmail']; ?>"/>
																	</div>
																</div>
															</div>


															<div class="space-2"></div>


															<div class="hr hr-dotted"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Town">Town:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" id="Town" name="Town" class="col-xs-12 col-sm-5"  value="<?php echo $row['VendorTown']; ?>"/>
																	</div>
																</div>
															</div>

															<div class="space-8"></div>

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

												<a href="javascript:history.back()" class="btn btn-white btn-default btn-bold">
													<i class="ace-icon fa fa-times red2"></i>
													Cancel
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
						if(!$('#validation-form').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {

					bootbox.dialog({
						message: "Are you sure you want to make changes to this vendor?",
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
									$.post('../custom/updateVendor.php', { 'VendorNumber': $('[name=VendorNumber]').val(), 'VendorName': $('[name=VendorName]').val(), 'VendorPhone': $('[name=phone]').val(), 'VendorEmail': $('[name=email]').val(), 'VendorTown': $('[name=Town]').val(), 'Id':vid })
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

				$.mask.definitions['~']='[+-]';
				$('#phone').mask('(254) 999-999999');

				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{6}( x\d{1,6})?$/.test(value);
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
						VendorNumber: {
							required: true
						},
						VendorName: {
							required: true
						},
						phone: {
							required: true,
							phone: 'required'
						},
						Town: {
							required: true
						}
					},

					messages: {
						email: {
							required: "Please provide a valid email.",
							email: "Please provide a valid email."
						},
						VendorNumber: "Please provide the Vendor Number",
						VendorName: "Please provide the Vendor's name",
						phone: "Please provide the Vendor's phone number",
						Town: "Please provide the Vendor's town"
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
				});
			})
		</script>
	</body>
</html>
