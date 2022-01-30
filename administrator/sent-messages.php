<?php
require('../func/config.php');
if(!$user->is_logged_in()){ header('Location: login'); }

$pagetitle ="Sent Messages";
$activeMessages = "active open";
$activeSent = "active";

include('includes/header.php');?>
	<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="#">Home</a>
					</li>

					<li>
						<a href="#">Messages</a>
					</li>
					<li class="active">Inbox</li>
				</ul><!-- /.breadcrumb -->

			<?php include('includes/nav-setings.php');?>

				<div class="page-header">
					<h1>
						Sent Messages
					</h1>
				</div><!-- /.page-header -->

				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<div class="row">
							<div class="col-xs-12">
								<div class="tabbable">
									<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
										<li class="li-new-mail pull-right">
											<a data-toggle="tab" href="#write" data-target="write" class="btn-new-mail">
												<span class="btn btn-purple no-border">
													<i class="ace-icon fa fa-envelope bigger-130"></i>
													<span class="bigger-110">Write Message</span>
												</span>
											</a>
										</li><!-- /.li-new-mail -->

										<li class="active">
											<a data-toggle="tab" href="#inbox" data-target="inbox">
												<i class="orange ace-icon fa fa-location-arrow bigger-130"></i>
														<span class="bigger-110">Sent</span>
											</a>
										</li><!-- /.dropdown -->
									</ul>

									<div class="tab-content no-border no-padding">
										<div id="inbox" class="tab-pane in active">
											<div class="message-container">
												<div id="id-message-list-navbar" class="message-navbar clearfix">
													<div class="message-bar">
														<div class="message-infobar" id="id-message-infobar">
															<span class="blue bigger-150">Sent Messages</span>

														</div>
													</div>

													<div>
														<div class="messagebar-item-left">
															<label class="inline middle">
																<input type="checkbox" id="id-toggle-all" class="ace" />
																<span class="lbl"></span>
															</label>

															&nbsp;
															<div class="inline position-relative">
																<a href="#" data-toggle="dropdown" class="dropdown-toggle">
																	<i class="ace-icon fa fa-caret-down bigger-125 middle"></i>
																</a>

																<ul class="dropdown-menu dropdown-lighter dropdown-100">
																	<li>
																		<a id="id-select-message-all" href="#">All</a>
																	</li>

																	<li>
																		<a id="id-select-message-none" href="#">None</a>
																	</li>

																	<li class="divider"></li>

																	<li>
																		<a id="id-select-message-unread" href="#">Unread</a>
																	</li>

																	<li>
																		<a id="id-select-message-read" href="#">Read</a>
																	</li>
																</ul>
															</div>
														</div>

														<div class="messagebar-item-right">
															<div class="inline position-relative">
																<a href="#" data-toggle="dropdown" class="dropdown-toggle">
																	Sort &nbsp;
																	<i class="ace-icon fa fa-caret-down bigger-125"></i>
																</a>

																<ul class="dropdown-menu dropdown-lighter dropdown-menu-right dropdown-100">
																	<li>
																		<a href="#">
																			<i class="ace-icon fa fa-check green"></i>
																			Date
																		</a>
																	</li>

																	<li>
																		<a href="#">
																			<i class="ace-icon fa fa-check invisible"></i>
																			From
																		</a>
																	</li>

																	<li>
																		<a href="#">
																			<i class="ace-icon fa fa-check invisible"></i>
																			Subject
																		</a>
																	</li>
																</ul>
															</div>
														</div>

														<div class="nav-search minimized">
															<form class="form-search">
																<span class="input-icon">
																	<input type="text" autocomplete="off" class="input-small nav-search-input" placeholder="Search inbox ..." />
																	<i class="ace-icon fa fa-search nav-search-icon"></i>
																</span>
															</form>
														</div>
													</div>
												</div>
												<div id="id-message-new-navbar" class="hide message-navbar clearfix">
													<div class="message-bar">
														<div class="message-toolbar">

															<button type="button" class="btn btn-xs btn-white btn-primary">
																<i class="ace-icon fa fa-times bigger-125 orange2"></i>
																<span class="bigger-110">Discard</span>
															</button>
														</div>
													</div>

													<div>
														<div class="messagebar-item-left">
															<a href="#" class="btn-back-message-list">
																<i class="ace-icon fa fa-arrow-left bigger-110 middle blue"></i>
																<b class="middle bigger-110">Back</b>
															</a>
														</div>

														<div class="messagebar-item-right">
															<span class="inline btn-send-message">
																<button type="button"  id="sendMesage" class="btn btn-sm btn-primary no-border btn-white btn-round">
																	<span class="bigger-110">Send</span>

																	<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																</button>
															</span>
														</div>
													</div>
												</div>
												<div class="message-list-container">
													<div class="message-list" id="message-list">
													<?php
														$get_total_rows = 0;
														$total_pages = 1;
														$item_per_page      = 10; //item to display per page
														$page_url           = "http://localhost/wpams/inbox";
														if(isset($_GET["page"]))
														{ //Get page number from $_GET["page"]
															$page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
														if(!is_numeric($page_number))
														{
															die('Invalid page number!');
														} //incase of invalid page number
														}else{
																$page_number = 1; //if there's no page number, set it to 1
														}

														$stmt = $db->prepare('SELECT * FROM private_msg WHERE UserFrom = :UserFrom ORDER BY Id DESC');
														$stmt->execute(array(':UserFrom' => $_SESSION["Id"]));
														if($stmt->rowCount() > 0)
														{
															$get_total_rows = $stmt->rowCount(); //hold total records in variable  ,

															$total_pages = ceil($get_total_rows/$item_per_page); //break records into pages
															################# Display Records per page ############################COUNT(postTitle)
															$page_position = (($page_number-1) * $item_per_page);

															$stmt2 = $db->prepare('SELECT * FROM private_msg WHERE UserFrom = :UserFrom ORDER BY Id DESC LIMIT '.$page_position.', '.$item_per_page.'');
															$stmt2->execute(array(':UserFrom' => $_SESSION["Id"]));

															while($row = $stmt2->fetch())
															{
																echo "<div class='message-item'>
																	<label class='inline'>
																		<input type='checkbox' class='ace' />
																		<span class='lbl'></span>
																	</label>

																	<i class='message-star ace-icon fa fa-star-o light-grey'></i>
																	<span class='sender' title='".$row['UserTo']."'>".$row['UserTo']." </span>
																	<span class='time'>".date('jS M Y', strtotime($row['Date']))."</span>


																	<span class='summary'>
																	<span class='message-flags'>
																			<i class='ace-icon fa fa-reply light-grey'></i>
																		</span>
																		<span class='text'>
																		<a href='readmessage?id=".$row['Id']."&page=s'>
																			";if(strlen($row['MessageBody'])> 2000){
																				$msg_body = substr($row['MessageBody'], 0, 20). "...";
																				echo $msg_body;
																			}else {
																				echo $row['MessageBody'];
																			}
																		echo	" </a>
																		</span>
																	</span>
																</div>";
															}
														 //end loop
													 }else {
														 echo "No messges found";
													 }
													 ?>
												 </div>
											</div>
												<div class="message-footer clearfix">
													<div class="pull-left"> <?php if(isset($get_total_rows)){echo $get_total_rows;}else{echo "0";} ?> messages total </div>

													<div class="pull-right">
														<div class="inline middle"> page <?php if(isset($_GET["page"])){echo $_GET["page"];}else{echo "1"; } ?> of <?php if(isset($total_pages)){echo $total_pages;}else{echo "1";} ?> </div>

														&nbsp; &nbsp;
														<?php
														echo $user->paginate($item_per_page, $page_number, $get_total_rows, $total_pages, $page_url);
														?>
													</div>
												</div>
											</div>
										</div>
									</div><!-- /.tabbable -->
							</div><!-- /.col -->
						</div><!-- /.row -->

						<form id="id-message-form" class="hide form-horizontal message-form col-xs-12">
							<div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-recipient">Recipient:</label>

									<div class="col-sm-9">
										<select id="To" name="To" class="select2" data-placeholder="Click to Choose Recipient...">
											<option value="">&nbsp;</option>
											<<?php
												$me = $_SESSION['Id'];
												$stmt = $db->query("SELECT * FROM profilemaster WHERE Status = 'Y' AND Id <> $me ORDER BY Name DESC");
												$stmt->execute();
												while($row = $stmt->fetch())
												{
													?>
													<option value="<?php echo $row['Id'];?>"> <?php echo $row['Name'];?></option>
													<?php
												}
											 ?>
										</select>
									</div>
								</div>

								<div class="hr hr-18 dotted"></div>


								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">
										<span class="inline space-24 hidden-480"></span>
										Message:
									</label>

									<div class="col-sm-9">
										<textarea id="MsgBox" class="autosize-transition form-control" name="MsgBox"></textarea>
									</div>
								</div>
								<div class="space"></div>
							</div>
						</form>
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
<script src="../assets/js/bootstrap-tag.min.js"></script>
<script src="../assets/js/jquery.hotkeys.index.min.js"></script>
<script src="../assets/js/bootstrap-wysiwyg.min.js"></script>
<script src="../assets/js/autosize.min.js"></script>
<script src="../assets/js/bootbox.js"></script>
<script src="../assets/js/select2.min.js"></script>
<!-- ace scripts -->
<script src="../assets/js/ace-elements.min.js"></script>
<script src="../assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($){

		$('.select2').css('width','200px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		});

		//handling tabs and loading/displaying relevant messages and forms
		//not needed if using the alternative view, as described in docs
		$('#inbox-tabs a[data-toggle="tab"]').on('show.bs.tab', function (e) {
			var currentTab = $(e.target).data('target');
			if(currentTab == 'write') {
				Inbox.show_form();
			}
			else if(currentTab == 'inbox') {
				Inbox.show_list();
			}
		})

		autosize($('textarea[class*=autosize]'));

		$(document).one('ajaxloadstart.page', function(e) {
			autosize.destroy('textarea[class*=autosize]')

			$('.limiterBox,.autosizejs').remove();
			$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
		});


		//basic initializations
		$('.message-list .message-item input[type=checkbox]').removeAttr('checked');
		$('.message-list').on('click', '.message-item input[type=checkbox]' , function() {
			$(this).closest('.message-item').toggleClass('selected');
			if(this.checked) Inbox.display_bar(1);//display action toolbar when a message is selected
			else {
				Inbox.display_bar($('.message-list input[type=checkbox]:checked').length);
				//determine number of selected messages and display/hide action toolbar accordingly
			}
		});


		//check/uncheck all messages
		$('#id-toggle-all').removeAttr('checked').on('click', function(){
			if(this.checked) {
				Inbox.select_all();
			} else Inbox.select_none();
		});

		//select all
		$('#id-select-message-all').on('click', function(e) {
			e.preventDefault();
			Inbox.select_all();
		});

		//select none
		$('#id-select-message-none').on('click', function(e) {
			e.preventDefault();
			Inbox.select_none();
		});

		//select read
		$('#id-select-message-read').on('click', function(e) {
			e.preventDefault();
			Inbox.select_read();
		});

		//select unread
		$('#id-select-message-unread').on('click', function(e) {
			e.preventDefault();
			Inbox.select_unread();
		});

		/////////



		//display second message right inside the message list
		$('.message-list .message-item:eq(1) .text').on('click', function(){
			var message = $(this).closest('.message-item');

			//if message is open, then close it
			if(message.hasClass('message-inline-open')) {
				message.removeClass('message-inline-open').find('.message-content').remove();
				return;
			}

			$('.message-container').append('<div class="message-loading-overlay"><i class="fa-spin ace-icon fa fa-spinner orange2 bigger-160"></i></div>');
			setTimeout(function() {
				$('.message-container').find('.message-loading-overlay').remove();
				message
					.addClass('message-inline-open')
					.append('<div class="message-content" />')
				var content = message.find('.message-content:last').html( $('#id-message-content').html() );

				//remove scrollbar elements
				content.find('.scroll-track').remove();
				content.find('.scroll-content').children().unwrap();

				content.find('.message-body').ace_scroll({
					size: 150,
					mouseWheelLock: true,
					styleClass: 'scroll-visible'
				});

			}, 500 + parseInt(Math.random() * 500));

		});



		//back to message list
		$('.btn-back-message-list').on('click', function(e) {

			e.preventDefault();
			$('#inbox-tabs a[href="#inbox"]').tab('show');
		});

		//submit message
		$('#sendMesage').on('click', function(e) {
			e.preventDefault();

			$.post('../custom/sendmessage.php',
			{
				Reciepient: $('[name=To]').val(), Message: $('[name=MsgBox]').val()
			},
			function(data){
				if(data == 'success'){
					bootbox.dialog({
						message: "Your message has been sent succesfully.",
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}
					});
				//	var delay = 1000; //Your delay in milliseconds
				//		setTimeout(function(){ window.location = "http://localhost/wpams"; }, delay);

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

		});

		//hide message list and display new message form
		/**
		$('.btn-new-mail').on('click', function(e){
			e.preventDefault();
			Inbox.show_form();
		});
		*/




		var Inbox = {
			//displays a toolbar according to the number of selected messages
			display_bar : function (count) {
				if(count == 0) {
					$('#id-toggle-all').removeAttr('checked');
					$('#id-message-list-navbar .message-toolbar').addClass('hide');
					$('#id-message-list-navbar .message-infobar').removeClass('hide');
				}
				else {
					$('#id-message-list-navbar .message-infobar').addClass('hide');
					$('#id-message-list-navbar .message-toolbar').removeClass('hide');
				}
			}
			,
			select_all : function() {
				var count = 0;
				$('.message-item input[type=checkbox]').each(function(){
					this.checked = true;
					$(this).closest('.message-item').addClass('selected');
					count++;
				});

				$('#id-toggle-all').get(0).checked = true;

				Inbox.display_bar(count);
			}
			,
			select_none : function() {
				$('.message-item input[type=checkbox]').removeAttr('checked').closest('.message-item').removeClass('selected');
				$('#id-toggle-all').get(0).checked = false;

				Inbox.display_bar(0);
			}
			,
			select_read : function() {
				$('.message-unread input[type=checkbox]').removeAttr('checked').closest('.message-item').removeClass('selected');

				var count = 0;
				$('.message-item:not(.message-unread) input[type=checkbox]').each(function(){
					this.checked = true;
					$(this).closest('.message-item').addClass('selected');
					count++;
				});
				Inbox.display_bar(count);
			}
			,
			select_unread : function() {
				$('.message-item:not(.message-unread) input[type=checkbox]').removeAttr('checked').closest('.message-item').removeClass('selected');

				var count = 0;
				$('.message-unread input[type=checkbox]').each(function(){
					this.checked = true;
					$(this).closest('.message-item').addClass('selected');
					count++;
				});

				Inbox.display_bar(count);
			}
		}

		//show message list (back from writing mail or reading a message)
		Inbox.show_list = function() {
			$('.message-navbar').addClass('hide');
			$('#id-message-list-navbar').removeClass('hide');

			$('.message-footer').addClass('hide');
			$('.message-footer:not(.message-footer-style2)').removeClass('hide');

			$('.message-list').removeClass('hide').next().addClass('hide');
			//hide the message item / new message window and go back to list
		}

		//show write mail form
		Inbox.show_form = function() {
			if($('.message-form').is(':visible')) return;
			if(!form_initialized) {
				initialize_form();
			}


			var message = $('.message-list');
			$('.message-container').append('<div class="message-loading-overlay"><i class="fa-spin ace-icon fa fa-spinner orange2 bigger-160"></i></div>');

			setTimeout(function() {
				message.next().addClass('hide');

				$('.message-container').find('.message-loading-overlay').remove();

				$('.message-list').addClass('hide');
				$('.message-footer').addClass('hide');
				$('.message-form').removeClass('hide').insertAfter('.message-list');

				$('.message-navbar').addClass('hide');
				$('#id-message-new-navbar').removeClass('hide');


				//reset form??
				$('.message-form .wysiwyg-editor').empty();

				$('.message-form .ace-file-input').closest('.file-input-container:not(:first-child)').remove();
				$('.message-form input[type=file]').ace_file_input('reset_input');

				$('.message-form').get(0).reset();

			}, 300 + parseInt(Math.random() * 300));
		}




		var form_initialized = false;
		function initialize_form() {
			if(form_initialized) return;
			form_initialized = true;

			//intialize wysiwyg editor
			$('.message-form .wysiwyg-editor').ace_wysiwyg({
				toolbar:
				[
					'bold',
					'italic',
					'strikethrough',
					'underline',
					null,
					'justifyleft',
					'justifycenter',
					'justifyright',
					null,
					'createLink',
					'unlink',
					null,
					'undo',
					'redo'
				]
			}).prev().addClass('wysiwyg-style1');



			//file input
			$('.message-form input[type=file]').ace_file_input()
			.closest('.ace-file-input')
			.addClass('width-90 inline')
			.wrap('<div class="form-group file-input-container"><div class="col-sm-7"></div></div>');

			//Add Attachment
			//the button to add a new file input
			$('#id-add-attachment')
			.on('click', function(){
				var file = $('<input type="file" name="attachment[]" />').appendTo('#form-attachments');
				file.ace_file_input();

				file.closest('.ace-file-input')
				.addClass('width-90 inline')
				.wrap('<div class="form-group file-input-container"><div class="col-sm-7"></div></div>')
				.parent().append('<div class="action-buttons pull-right col-xs-1">\
					<a href="#" data-action="delete" class="middle">\
						<i class="ace-icon fa fa-trash-o red bigger-130 middle"></i>\
					</a>\
				</div>')
				.find('a[data-action=delete]').on('click', function(e){
					//the button that removes the newly inserted file input
					e.preventDefault();
					$(this).closest('.file-input-container').hide(300, function(){ $(this).remove() });
				});
			});
		}

	});
</script>
</body>
</html>
