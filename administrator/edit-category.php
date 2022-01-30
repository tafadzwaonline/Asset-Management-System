<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

	if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
    $stmt = $db->prepare('SELECT * FROM availablecategory WHERE Id = :CategoryId');
    $stmt->execute(array(':CategoryId' =>$id));
    $row = $stmt->fetch();
    //if post does not exists redirect user.
    if($row['Id'] == ''){
      header('Location: view-category');
      exit;
    }

  }else {
    # code...
    header('Location: view-category');
    exit;
  }
  //else

  $pagetitle ="View Categories";
  $activeParent = "active open";
  $activeCatParent= "active open";
  $activeViewcategory = "active";

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
								<a href="#">Categories</a>
							</li>
							<li class="active">Edit Category</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								Edit Category

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

														<?php
															$id = base64_decode($_GET['id']);
															$stmt = $db->prepare('SELECT * FROM availablecategory WHERE Id = :CategoryId');
															$stmt->execute(array(':CategoryId' =>$id));
															$row = $stmt->fetch();
														 ?>


														<form class="form-horizontal" id="category-form" method="get" >

                                  <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="CategoryID">Category ID:</label>

                                        <div class="col-xs-12 col-sm-9">
                                                  <div class="clearfix">
                                                      <input type="text" id="CategoryID" name="CategoryID" class="col-xs-12 col-sm-5" disabled value="<?php echo $row['CategoryId']; ?>" />
                                                 </div>
                                        </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="CategoryName">Category Name:</label>

                                          <div class="col-xs-12 col-sm-9">
                                              <div class="clearfix">
                                                    <input type="text" id="CategoryName" name="CategoryName" class="col-xs-12 col-sm-5" value="<?php echo $row['CategoryName']; ?>" />
                                              </div>
                                          </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="CategoryDescription">Description:</label>

                                          <div class="col-xs-12 col-sm-9">
                                              <div class="clearfix">
                                                  <textarea class="input-xlarge" name="CategoryDescription" id="CategoryDescription" ><?php echo htmlspecialchars($row['Description']); ?></textarea>
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
						if(!$('#category-form').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {
					bootbox.dialog({
						message: "Are you sure you want to make changes to this category?",
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


								$.post('../custom/updateCategory.php', { 'CategoryID': $('[name=CategoryID]').val(), 'CategoryName': $('[name=CategoryName]').val(), 'CategoryDescription': $('[name=CategoryDescription]').val(), 'Id': "<?php echo $_GET['id'];?>" })
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
        jQuery.validator.addMethod("lettersOnly", function(value, element) {
				   return this.optional(element) || /^[a-z,\s]+$/i.test(value);
				}, "Use letters, spaces and commas only");

				$('#category-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						CategoryID: {
							required: true
						},
						CategoryName: {
							required: true
						},
						CategoryDescription: {
							required: true,
							lettersOnly: true
						}
					},

					messages: {
						CategoryID: {
							required: "Please provide a category ID."
						},
						CategoryName: {
							required: "Please provide a category Name"
						},
						CategoryDescription: {
							required: "Please provide a category description"
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


				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});

			});
		</script>
	</body>
</html>
