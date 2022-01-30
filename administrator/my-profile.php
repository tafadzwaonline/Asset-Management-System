<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

  $pagetitle ="My Profile";
	$activeregistrationusers = "active open";
	$activeMyProfile = "active";
?>
  <?php include('includes/header.php');?>

	<?php
		//get user shit
		$stmt = $db->prepare('SELECT * FROM profilemaster WHERE Username = :Username');
		$stmt->execute(array(':Username' => $_SESSION["username"] ));
		$fetchUserDetails = $stmt->fetch();
	 ?>
	<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="#">Home</a>
					</li>

					<li>
						<a href="#">Users</a>
					</li>
					<li class="active">My Profile</li>
				</ul><!-- /.breadcrumb -->

			<?php include('includes/nav-setings.php');?>

				<div class="page-header">
					<h1>
						My Profile

					</h1>
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
                                              <h3 class="lighter block green">Your information</h3>

    																							<form class="form-horizontal" id="validation-form" method="get" autocomplete='off'>
																										<div class="space-2"></div>

																									<div class="hr hr-dotted"></div>
																										<div class="space-2"></div>

                                                        <div class="form-group">
                                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Username">Username:</label>

                                                              <div class="col-xs-12 col-sm-9">
                                                                    <div class="clearfix">
                                                                        <input type="text" id="Username" name="Username" class="col-xs-12 col-sm-5" value='<?php echo $fetchUserDetails['Username'];?>' />
                                                                    </div>
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="FullName">Name:</label>

                                                              <div class="col-xs-12 col-sm-9">
                                                                  <div class="clearfix">
                                                                      <input type="text" id="FullName" name="FullName" class="col-xs-12 col-sm-5" value='<?php echo $fetchUserDetails['Name'];?>' />
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Email Address:</label>

                                                                <div class="col-xs-12 col-sm-9">
                                                                  <div class="clearfix">
                                                                      <input type="email" name="email" id="email" class="col-xs-12 col-sm-6" value='<?php echo $fetchUserDetails['Email'];?>' />
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

                                                                        <input type="tel" id="phone" name="phone" value='<?php echo $fetchUserDetails['PhoneNumber'];?>'/>
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

                                                                            <input type="tel" id="OfficeTelephone" name="OfficeTelephone" value='<?php echo $fetchUserDetails['OfficeTelephone'];?>' />
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
                                                                          <input type="password"  name="password" id="password" class="col-xs-12 col-sm-4"  />
                                                                      </div>
                                                                  </div>
                                                        </div>

                                                        <div class="space-2"></div>

                                                        <div class="form-group">
                                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Confirm Password:</label>

                                                                <div class="col-xs-12 col-sm-9">
                                                                    <div class="clearfix">
                                                                            <input type="password"  name="password2" id="password2" class="col-xs-12 col-sm-4"  />
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
	              																														 {?>
																																								<option <?php if($fetchUserDetails['Office']==$row['OfficeName']){echo "selected ='true'";}  ?> ><?php echo $row['OfficeName'];?></option>
																																							<?php
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
																																									?>
	 																																								<option <?php if($fetchUserDetails['Department']==$row['DepartmentName']){echo "selected ='true'";}  ?> ><?php echo $row['DepartmentName'];?></option>
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
                                          <div class="wizard-actions center" >

                                                  <button class="btn btn-success btn-next" data-last="Finish">
                                                            <i class="ace-icon fa fa-floppy-o icon-on-right"></i>
                                                            Update Changes

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

<script src="../assets/js/jquery-ui.custom.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="../assets/js/bootstrap-editable.min.js"></script>
		<script src="../assets/js/chosen.jquery.min.js"></script>
		<script src="../assets/js/bootstrap-datepicker.min.js"></script>
		<script src="../assets/js/moment.min.js"></script>
		<script src="../assets/js/autosize.min.js"></script>
		<script src="../assets/js/jquery.inputlimiter.min.js"></script>
		<script src="../assets/js/bootstrap-tag.min.js"></script>

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
			 message: "Are you sure you want to make changes to your profile?",
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


					 $.post('../custom/update-profile.php',
					 {
						 'Name': $('[name=FullName]').val(), 'Email': $('[name=email]').val(), 'Username': $('[name=Username]').val(),
			 			 'PhoneNumber': $('[name=phone]').val(), 'Password': $('[name=password]').val(), 'Office': $('[name=Office]').val(),
			 			 'Department': $('[name=Department]').val(), 'OfficeTelephone': $('[name=OfficeTelephone]').val(),'uID': "<?php echo $fetchUserDetails['Id']; ?>"
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

// return !jQuery.validator.methods.required(value, element) || /^[a-zA-Z0-9_]+$/i.test(value);
      $.mask.definitions['~']='[+-]';
      $('#phone').mask('(263) 999-999999');
//$('#phone').mask('(263) 999-9999');
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
                },
                platform: {
                    required: true
                },
                subscription: {
                    required: true
                },
                gender: {
                    required: true,
                },
                agree: {
                    required: true,
                },
								my_photo: {
                    required: true,
                }
          },

            messages: {
                    email: {
                            required: "Please provide a valid email.",
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
                    OfficeTelephone: "You must provide the office telephone number of the office you work in or 'N/A'",
                    my_photo: "Please upload your photo"
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




					$('#my_photo , #id-input-file-2').ace_file_input({
						no_file:'No File ...',
						btn_choose:'Choose',
						btn_change:'Change',
						droppable:false,
						onchange:null,
						thumbnail:false //| true | large
						//whitelist:'gif|png|jpg|jpeg'
						//blacklist:'exe|php'
						//onchange:''
						//
					});
					//pre-show a file name, for example a previously selected file
					//$('#my_photo').ace_file_input('show_file_list', ['myfile.txt'])


					$('#photo_upload').ace_file_input({
						style: 'well',
						btn_choose: 'Drop a photo here or click to choose',
						btn_change: null,
						no_icon: 'ace-icon fa fa-cloud-upload',
						droppable: true,
						thumbnail: 'small'//large | fit
						//,icon_remove:null//set null, to hide remove/reset button
						/**,before_change:function(files, dropped) {
							//Check an example below
							//or examples/file-upload.html
							return true;
						}*/
						/**,before_remove : function() {
							return true;
						}*/
						,
						preview_error : function(filename, error_code) {
							//name of the file that failed
							//error_code values
							//1 = 'FILE_LOAD_FAILED',
							//2 = 'IMAGE_LOAD_FAILED',
							//3 = 'THUMBNAIL_FAILED'
							//alert(error_code);
						}

					}).on('change', function(){
						//console.log($(this).data('ace_input_files'));
						//console.log($(this).data('ace_input_method'));
					});


					//$('#photo_upload')
					//.ace_file_input('show_file_list', [
						//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
						//{type: 'file', name: 'hello.txt'}
					//]);




					//dynamically change allowed formats by changing allowExt && allowMime function
					$('#id-file-format').removeAttr('checked').on('change', function() {
						var whitelist_ext, whitelist_mime;
						var btn_choose
						var no_icon
						if(this.checked) {
							btn_choose = "Drop images here or click to choose";
							no_icon = "ace-icon fa fa-picture-o";

							whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
							whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
						}
						else {
							btn_choose = "Drop a photo here or click to choose";
							no_icon = "ace-icon fa fa-cloud-upload";

							whitelist_ext = null;//all extensions are acceptable
							whitelist_mime = null;//all mimes are acceptable
						}
						var file_input = $('#photo_upload');
						file_input
						.ace_file_input('update_settings',
						{
							'btn_choose': btn_choose,
							'no_icon': no_icon,
							'allowExt': whitelist_ext,
							'allowMime': whitelist_mime
						})
						file_input.ace_file_input('reset_input');

						file_input
						.off('file.error.ace')
						.on('file.error.ace', function(e, info) {
							//console.log(info.file_count);//number of selected files
							//console.log(info.invalid_count);//number of invalid files
							//console.log(info.error_list);//a list of errors in the following format

							//info.error_count['ext']
							//info.error_count['mime']
							//info.error_count['size']

							//info.error_list['ext']  = [list of file names with invalid extension]
							//info.error_list['mime'] = [list of file names with invalid mimetype]
							//info.error_list['size'] = [list of file names with invalid size]


							/**
							if( !info.dropped ) {
								//perhapse reset file field if files have been selected, and there are invalid files among them
								//when files are dropped, only valid files will be added to our file array
								e.preventDefault();//it will rest input
							}
							*/


							//if files have been selected (not dropped), you can choose to reset input
							//because browser keeps all selected files anyway and this cannot be changed
							//we can only reset file field to become empty again
							//on any case you still should check files with your server side script
							//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
						});


						/**
						file_input
						.off('file.preview.ace')
						.on('file.preview.ace', function(e, info) {
							console.log(info.file.width);
							console.log(info.file.height);
							e.preventDefault();//to prevent preview
						});
						*/

					});


					});
					</script>
					</body>
					</html>
