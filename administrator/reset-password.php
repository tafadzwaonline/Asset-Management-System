<?php  require('../func/config.php');
//terminate any active session
  if($user->is_logged_in()){ $user->logout(); }

  $pagetitle ="Reset Password";
   if(empty($_GET['id']) && empty($_GET['code']))
   {
  		//header('Location: login');
   }
 ?>
<?php include('includes/header2.php');?>
		<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Account</a>
							</li>

							<li>
								<a href="#">Forgot password</a>
							</li>
							<li class="active">Reset password</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">

						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter">User information</h4>

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


														<form class="form-horizontal" id="validation-form" method="get" autocomplete='off'>


															<div class="space-2"></div>
															<div class="hr hr-dotted"></div>
																<div class="space-2"></div>
																<div class="space-2"></div>
																		<div class="form-group">
																				<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Password:</label>

																					<div class="col-xs-12 col-sm-9">
																							<div class="clearfix">
																									<input type="password" name="password" id="password" class="col-xs-12 col-sm-4" />
																							</div>
																						</div>
																			</div>

															<div class="space-2"></div>

														<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Confirm Password:</label>

																	<div class="col-xs-12 col-sm-9">
																				<div class="clearfix">
																						<input type="password" name="password2" id="password2" class="col-xs-12 col-sm-4" />
																				</div>
																		</div>
														</div>


															<div class="space-2"></div>

														</form>
													</div>


												</div>
											</div>

											<hr />
											<div class="wizard-actions center" >

												<button class="btn btn-success btn-next" data-last="Finish">
                          <i class="ace-icon fa fa-floppy-o icon-on-right"></i>
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
					$.post('../custom/reset-success.php',
					{
           Password: $('[name=password]').val(), uID: "<?php echo $_GET['id']; ?>", code: "<?php echo $_GET['code']; ?>"
				  },
					function(data){

            if(data == 'success'){
              bootbox.dialog({
                message: "Your information has been updated succesfully. You can now proceed to use the application",
                buttons: {
                  "success" : {
                    "label" : "OK",
                    "className" : "btn-sm btn-primary"
                  }
                }
              });
              var delay = 1000; //Your delay in milliseconds
                setTimeout(function(){ window.location = "http://localhost/wpams"; }, delay);

            } else {
              bootbox.dialog({
               message: data,
               buttons: {
                 "Fialed" : {
                   "label" : "OK",
                   "className" : "btn-sm btn-primary"
                 }
               }
             });
            }

					});


				}).on('stepclick.fu.wizard', function(e){
					//e.preventDefault();//this will prevent clicking and selecting steps
				});

        $('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						password: {
							required: true,
							minlength: 5
						},
						password2: {
							required: true,
							minlength: 5,
							equalTo: "#password"
						}
					},

					messages: {

						password: {
							required: "Please specify a password.",
							minlength: "Please specify a secure password."
						}
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



				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});
			})
		</script>
	</body>
</html>
