<?php  require('func/config.php');
//terminate any active session
if($user->is_logged_in()){ $user->logout(); }

$pagetitle ="Final Step";
 if(empty($_GET['id']) && empty($_GET['code']))
 {
		header('Location: logout');
 }else if(isset($_GET['id']) && isset($_GET['code']))
  {
    $id = base64_decode($_GET['id']);
    $code = $_GET['code'];

    $stmt = $db->prepare("SELECT * FROM profilemaster WHERE Id=:uid AND tokenCode=:token");
    $stmt->execute(array(":uid"=>$id,":token"=>$code));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);



  }
 ?>
<?php include('includes/header2.php');?>
		<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">

							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Registration</a>
							</li>

							<li>
								<a href="#">Email Confirmation</a>
							</li>
							<li class="active">Final step</li>
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
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Username">Username:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" id="Username" name="Username" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="FullName">Name:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" id="FullName" name="FullName" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>
														<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Email Address:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="email" name="email" id="email" class="col-xs-12 col-sm-6" value="<?php echo $rows['Email']; ?>" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>
														<div class="hr hr-dotted"></div>
														<div class="space-2"></div>
														<div class="space-2"></div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">Phone Number:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="input-group">
																		<span class="input-group-addon">
																			<i class="ace-icon fa fa-phone"></i>
																		</span>

																		<input type="tel" id="phone" name="phone" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="OfficeTelephone">Office Telephone:</label>

																<div class="col-xs-12 col-sm-9">

																	<div class="clearfix">
																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="ace-icon fa fa-phone"></i>
																			</span>

																			<input type="tel" id="OfficeTelephone" name="OfficeTelephone" />
																		</div>
																	</div>
																</div>
															</div>
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
														<div class="hr hr-dotted"></div>

														<div class="space-2"></div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Office">Office</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="Office" name="Office" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
                                    <?php
                                     $stmt = $db->prepare('SELECT OfficeName FROM officestable');
                                     $stmt->execute();
                                     while($row = $stmt->fetch())
                                     {
                                        echo '<option>'.$row['OfficeName'].'</option>';

                                     }?>
																	</select>
																</div>
															</div>

															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Department">Department</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="Department" name="Department" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
                                    <?php
                                     $stmt = $db->prepare('SELECT DepartmentName FROM officedepartments');
                                     $stmt->execute();
                                     while($row = $stmt->fetch())
                                     {
                                        echo '<option>'.$row['DepartmentName'].'</option>';

                                     }?>
																	</select>
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
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->
		<script src="assets/js/wizard.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<script src="assets/js/jquery-additional-methods.min.js"></script>
		<script src="assets/js/bootbox.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/select2.min.js"></script>

		<script src="assets/js/jquery-ui.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>

		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

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
					$.post('custom/registration-success.php',
					{
            Name: $('[name=FullName]').val(), Email: $('[name=email]').val(), Username: $('[name=Username]').val(),
            PhoneNumber: $('[name=phone]').val(), Password: $('[name=password]').val(), Office: $('[name=Office]').val(),
            Department: $('[name=Department]').val(), OfficeTelephone: $('[name=OfficeTelephone]').val(), uID: "<?php echo $_GET['id']; ?>", code: "<?php echo $_GET['code']; ?>"
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
              // var delay = 1000; //Your delay in milliseconds
              //   setTimeout(function(){ window.location = "http://localhost/wpams"; }, delay);

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

          window.location.href = "./log";
				}).on('stepclick.fu.wizard', function(e){
					//e.preventDefault();//this will prevent clicking and selecting steps
				});


// return !jQuery.validator.methods.required(value, element) || /^[a-zA-Z0-9_]+$/i.test(value);
				$.mask.definitions['~']='[+-]';
				$('#phone').mask('(254) 999-999999');
//$('#phone').mask('(254) 999-9999');
				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{6}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");
				jQuery.validator.addMethod("lettersOnly", function(value, element) {
				   return this.optional(element) || /^[a-z\s]+$/i.test(value);
				}, "Use letters only");
				jQuery.validator.addMethod("letters_num_Only", function(value, element) {
				   return this.optional(element) || /^[a-z0-9_]+$/i.test(value);
				}, "Use letters, numbers or an underscore only");

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
						Username: {
							required: true,
							//username_format :true,
							 minlength: 4,
							 letters_num_Only:true
						},
						FullName: {
							required: true,
							lettersOnly:true
						},
						phone: {
							required: true,
							phone: 'required'
						},
						Department: {
							required: true
						},
						Office: {
							required: true
						},
						OfficeTelephone: {
							required: true
						}
					},

					messages: {
						email: {
							required: "You must provide an email address.",
							email: "Please provide a valid email."
						},
						password: {
							required: "Please specify a password.",
							minlength: "Please specify a secure password."
						},
						FullName: {
							required: "You must provide your full name",
							minlength: "Please specify a secure password."
						},
						Username: {
							required: "You must provide a username first"
							//minlength: "Your username should be at least 4 characters long"
						},
						Department: "Please choose the department you work in",

						Office: "Please choose the office you work in",
						OfficeTelephone: "You must provide the office telephone number of the office you work in or 'N/A'"
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
