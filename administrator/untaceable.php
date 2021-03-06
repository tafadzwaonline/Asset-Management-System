<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

		if(isset($_GET['id'])){
	    $id = base64_decode($_GET['id']);
	    $stmt = $db->prepare('SELECT * FROM new_item WHERE Id = :assetId');
	    $stmt->execute(array(':assetId' =>$id));
	    $row2 = $stmt->fetch();
	    //if post does not exists redirect user.
	    if($row2['Id'] == ''){
	    //  header('Location: view-asset');
	      exit;
	    }

	  }else {
	    # code...
	    header('Location: view-asset');
	    exit;
	  }

  $pagetitle ="Assign  Item";
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
							<li class="active">Assign Item</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								Assign Item

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


														<form class="form-horizontal" id="assignment-form" method="get">
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="AssetName">Asset Name:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="AssetName" id="AssetName" class="col-xs-12 col-sm-6" value="<?php echo $row2['AssetName']; ?>"/>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="SerialNumber"> Serial Number:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="SerialNumber" id="SerialNumber" class="col-xs-12 col-sm-6" value = "<?php echo strtoupper($row2['SerialNumber']); ?>"/>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="AssetNumber"> Asset Number:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="AssetNumber" id="AssetNumber" class="col-xs-12 col-sm-6" value = "<?php echo strtoupper($row2['AssetNumber']); ?>"/>
																	</div>
																</div>
															</div>
                              <div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="AssignedUser">User:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="AssignedUser" name="AssignedUser" class="select2" data-placeholder="Click to Choose..."  onchange="getData(this.value, 'ActivationCode')" >
																		<option value="">&nbsp;</option>
																		<<?php
																			$stmt = $db->query("SELECT Id, EmployeeName FROM new_technicianr");
																			while($row = $stmt->fetch())
																			{
																				?>
																				<option value="<?php echo $row['Id'];?>"> <?php echo $row['EmployeeName'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
															<div class="form-group" >
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="UserOffice">Office:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="UserOffice" id="UserOffice" class="col-xs-12 col-sm-6" disabled />
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="UserDepartment">Department:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" class="input-sm" id="UserDepartment" name="UserDepartment"  disabled/>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="AssignmentPeriod:">Assignment period:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="AssignmentPeriod" name="AssignmentPeriod" class="select2" data-placeholder="Click to Choose..." >
																		<option value="">&nbsp;</option>
																		<option value="1">Long term</option>
																		<option value="2">Short term</option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="NumberOfDays">Number of Days(For short term assignment):</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" class="input-sm" id="NumberOfDays"  name="NumberOfDays"/>
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
		function getData(UserId, divid){
				$.ajax({
						url: '../custom/getOffice.php?UserId='+UserId, //call storeemdata.php to store form data
						success: function(html) {
								$('[name=UserOffice]').val(html);
						}
				});
				$.ajax({
						url: '../custom/getDepartment.php?UserId='+UserId, //call storeemdata.php to store form data
						success: function(html) {
								$('[name=UserDepartment]').val(html);
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
						if(!$('#assignment-form').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {
				  $.post('../custom/assignAsset.php',
				  {
				    SerialNumber: $('[name=SerialNumber]').val(),  AssignedUser:  $('[name=AssignedUser]').val(), NumberOfDays:  $('[name=NumberOfDays]').val(), AssignmentPeriod:  $('[name=AssignmentPeriod]').val(), AssetNumber: $('[name=AssetNumber]').val()
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
            //clearfiels
          //  $('[name=LicenceName]').val('');
        //    $('[name=ActivationCode]').val('');
        //    $('[name=LicenceVendor]').val('');
				  });


				}).on('stepclick.fu.wizard', function(e){
				  //e.preventDefault();//this will prevent clicking and selecting steps
				});

				$('#assignment-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {

						AssignedUser: {
							required: true,
						},
						AssignmentPeriod: {
							required: true,
						}
					},

					messages: {

						AssignedUser: "Please choose a user",
						AssignmentPeriod: "Please choose the assignment period"
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

				$('#NumberOfDays').ace_spinner({value:0,min:1,max:10000,step:1, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});

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
