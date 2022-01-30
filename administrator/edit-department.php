<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

  $pagetitle ="Add Department";
	$activeDep = "active open";
	$activeViewdepartmant = "active";
	if(isset($_GET['id'])){

    $id = base64_decode($_GET['id']);

    $stmt = $db->prepare('SELECT * FROM officedepartments WHERE Id = :deptId');
    $stmt->execute(array(':deptId' =>$id));
    $row = $stmt->fetch();
    //if post does not exists redirect user.
    if($row['Id'] == ''){
      header('Location: view-department');
      exit;
    }

  }else {
    # code...
    header('Location: view-department');
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
								<a href="#">Department</a>
							</li>
							<li class="active">Edit Department</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								Edit Department

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
														<?php $id = base64_decode($_GET['id']);

												    $stmt = $db->prepare('SELECT * FROM officedepartments WHERE Id = :deptId');
												    $stmt->execute(array(':deptId' =>$id));
												    $row = $stmt->fetch();
														 ?>

														<form class="form-horizontal" id="office-form" method="get">
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="DepartmentId">Deprtment ID:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="DepartmentId" id="DepartmentId" class="col-xs-12 col-sm-6" value ="<?php echo $row['DepartmentId']; ?>" disabled />
																	</div>
																</div>
															</div>
                              <div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="ParentOffice">Parent Office:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="ParentOffice" name="ParentOffice" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<?php
																			$stmt = $db->query('SELECT OfficeName FROM officestable ORDER BY OfficeName DESC');
																			while($row2 = $stmt->fetch())
																			{
																				?>
																				<option value ="<?php echo $row2['OfficeName']; ?>" <?php if($row['ParentOffice']==$row2['OfficeName']){ echo "selected ='true'";} ?> > <?php echo $row2['OfficeName'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="DepartmentName">Department Name:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="DepartmentName" id="DepartmentName" class="col-xs-12 col-sm-6" value ="<?php echo $row['DepartmentName']; ?>" />
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
					 message: "Are you sure you want to make changes to this department?",
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
								 $.post('../custom/updateDepartment.php', {  'DepartmentId': $('[name=DepartmentId]').val(), 'ParentOffice': $('[name=ParentOffice]').val(), 'DepartmentName':  $('[name=DepartmentName]').val(), 'Id':vid })
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

				$('#office-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						DepartmentName: {
				      required: true
				    },
				    ParentOffice: {
				      required: true,
				    },
				    DepartmentId: {
				      required: true,
				    }
					},

					messages: {
						DepartmentId: "Please enter a Department ID",
				    DepartmentName: "Please enter a Department name",
				    ParentOffice: "Please choose the parent office"
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
