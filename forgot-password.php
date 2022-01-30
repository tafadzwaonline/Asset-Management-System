<?php
	require('func/config.php');
	if($user->is_logged_in()){ header('Location: log'); }
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Forgot password - Asset Register</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.min.js"></script>
		<script src="../assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i></i>
									<!-- <span class="red">Asset</span> -->
									<span class="grey" id="id-text2">Asset Register</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; EscrowGroup</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">

								<div id="forgot-box" class="forgot-box widget-box no-border visible">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i></i>
												Retrieve Password
											</h4>

											<div class="space-6"></div>
											<p>
												Enter your email and to receive instructions
											</p>
											<?php
						            if(isset($_POST['btn-submit']))
						            {
						              $email = $_POST['txtemail'];
													$server = $_SERVER['HTTP_HOST'];

						              $stmt = $db->prepare("SELECT Id FROM profilemaster WHERE Email =:Email LIMIT 1");
						              $stmt->execute(array(":Email"=>$email));
						              $row = $stmt->fetch(PDO::FETCH_ASSOC);
						              if($stmt->rowCount() == 1)
						              {
						                $id = base64_encode($row['Id']);
						                $code = md5(uniqid(rand()));

						                $stmt = $db->prepare("UPDATE profilemaster SET tokenCode=:token WHERE Email=:email");
						                $stmt->execute(array(":token"=>$code,"email"=>$email));

														$message = '<!doctype html>';
											       $message.= '<html xmlns="http://www.w3.org/1999/xhtml">';
											        $message.='<head>';
											         $message.='<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
											         $message.='<meta name="viewport" content="initial-scale=1.0" />';
											         $message.='<meta name="format-detection" content="telephone=no" />';
											         $message.='<title></title>';
											         $message.='<style type="text/css">';
											         $message.='body {';
											         $message.='	width: 100%;';
											           $message.='margin: 0;';
											           $message.='padding: 0;';
											           $message.='-webkit-font-smoothing: antialiased;';
											         $message.='}';
											         $message.='@media only screen and (max-width: 600px) {';
											           $message.='table[class="table-row"] {';
											             $message.='float: none !important;';
											             $message.='width: 98% !important;';
											             $message.='padding-left: 20px !important;';
											             $message.='padding-right: 20px !important;';
											           $message.='}';
											         $message.='	table[class="table-row-fixed"] {';
											             $message.='float: none !important;';
											             $message.='width: 98% !important;';
											         $message.='	}';
											           $message.='table[class="table-col"], table[class="table-col-border"] {';
											             $message.='float: none !important;';
											             $message.='width: 100% !important;';
											             $message.='padding-left: 0 !important;';
											             $message.='padding-right: 0 !important;';
											             $message.='table-layout: fixed;';
											           $message.='}';
											           $message.='td[class="table-col-td"] {';
											             $message.='width: 100% !important;';
											           $message.='}';
											           $message.='table[class="table-col-border"] + table[class="table-col-border"] {';
											             $message.='padding-top: 12px;';
											             $message.='margin-top: 12px;';
											             $message.='border-top: 1px solid #E8E8E8;';
											           $message.='}';
											           $message.='table[class="table-col"] + table[class="table-col"] {';
											             $message.='margin-top: 15px;';
											           $message.='}';
											           $message.='td[class="table-row-td"] {';
											             $message.='padding-left: 0 !important;';
											             $message.='padding-right: 0 !important;';
											           $message.='}';
											           $message.='table[class="navbar-row"] , td[class="navbar-row-td"] {';
											             $message.='width: 100% !important;';
											           $message.='}';
											           $message.='img {';
											             $message.='max-width: 100% !important;';
											             $message.='display: inline !important;';
											           $message.='}';
											           $message.='img[class="pull-right"] {';
											             $message.='float: right;';
											             $message.='margin-left: 11px;';
											                   $message.='max-width: 125px !important;';
											             $message.='padding-bottom: 0 !important;';
											           $message.='}';
											           $message.='img[class="pull-left"] {';
											             $message.='float: left;';
											             $message.='margin-right: 11px;';
											             $message.='max-width: 125px !important;';
											             $message.='padding-bottom: 0 !important;';
											           $message.='}';
											           $message.='table[class="table-space"], table[class="header-row"] {';
											             $message.='float: none !important;';
											             $message.='width: 98% !important;';
											           $message.='}';
											           $message.='td[class="header-row-td"] {';
											             $message.='width: 100% !important;';
											           $message.='}';
											         $message.='}';
											         $message.='@media only screen and (max-width: 480px) {';
											           $message.='table[class="table-row"] {';
											             $message.='padding-left: 16px !important;';
											             $message.='padding-right: 16px !important;';
											           $message.='}';
											         $message.='}';
											         $message.='@media only screen and (max-width: 320px) {';
											           $message.='table[class="table-row"] {';
											             $message.='padding-left: 12px !important;';
											             $message.='padding-right: 12px !important;';
											           $message.='}';
											         $message.='}';
											         $message.='@media only screen and (max-width: 458px) {';
											           $message.='td[class="table-td-wrap"] {';
											             $message.='width: 100% !important;';
											           $message.='}';
											         $message.='}';
											         $message.='</style>';
											        $message.='</head>';
											        $message.='<body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">';
											        $message.='<table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">';
											        $message.='<tr><td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;">';
											       $message.='<table><tr><td class="table-td-wrap" align="center" width="458"><table class="table-space" height="18" style="height: 18px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td';
											       $message.='class="table-space-td" valign="middle" height="18" style="height: 18px; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table>';
											       $message.='<table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="8" style="height: ';
											       $message.='8px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>';

											       $message.='<table class="table-row" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; ';
											       $message.='font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">';
											         $message.='<table class="table-col" align="left" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="378" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; ';
											         $message.='width: 378px;" valign="top" align="left">';
											          $message.=' <table class="header-row" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="378" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px';
											          $message.='padding-bottom: 10px; padding-top: 15px;" valign="top" align="left">Thank you for signing up!</td></tr></tbody></table>';
											           $message.='<div style="font-family: Arial, sans-serif; line-height: 20px; color: #444444; font-size: 13px;">';
											             $message.='<b style="color: #777777;">We are sorry you forgot your password</b>';
											             $message.='<br>';
											             $message.='Please click here to recover your password';
											           $message.='</div>';
											         $message.='</td></tr></tbody></table>';
											       $message.='</td></tr></tbody></table>';

											       $message.='<table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height:';
											       $message.='12px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>';
											       $message.='<table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: ';
											        $message.='12px; width: 450px; padding-left: 16px; padding-right: 16px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="center">&nbsp;<table bgcolor="#E8E8E8" height="0" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td bgcolor="#E8E8E8" height="1" ';
											        $message.='width="100%" style="height: 1px; font-size:0;" valign="top" align="left">&nbsp;</td></tr></tbody></table></td></tr></tbody></table>';
											       $message.='<table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: ';
											        $message.='16px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>';

											       $message.='<table class="table-row" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px;  ';
											       $message.='font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">';
											         $message.='<table class="table-col" align="left" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="378" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; ';
											         $message.='width: 378px;" valign="top" align="left">';
											           $message.='<div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;">';
											             $message.='<a href = "http://'.$server.'/reset-password?id='.$id.'&code='.$code.'" style="color: #ffffff; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border: 4px solid #6fb3e0; padding: 4px 9px; font-size: 15px; line-height: 21px; background-color: #6fb3e0;">&nbsp; Reset &nbsp;</a>';
											           $message.='</div>';
											           $message.='<table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 378px; background-color: #ffffff;" width="378" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16"  ';
											           $message.='style="height: 16px; width: 378px; background-color: #ffffff;" width="378" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>';
											         $message.='</td></tr></tbody></table>';
											       $message.='</td></tr></tbody></table>';

											       $message.='<table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="6" style="height: ';
											       $message.='6px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>';

											       $message.='<table class="table-row-fixed" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-fixed-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: ';
											        $message.='13px; font-weight: normal; padding-left: 1px; padding-right: 1px;" valign="top" align="left">';
											         $message.='<table class="table-col" align="left" width="448" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="448" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;"  ';
											         $message.='valign="top" align="left">';
											           $message.='<table width="100%" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td width="100%" align="center" bgcolor="#f5f5f5" style="font-family: Arial, sans-serif; line-height: 24px; color: #bbbbbb; font-size: 13px; font-weight: normal; text-align: center;';
											             $message.='padding: 9px; border-width: 1px 0px 0px; border-style: solid; border-color: #e3e3e3; background-color: #f5f5f5;" valign="top">';
											             $message.='<a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;">West Pokot County &copy; 2017</a>';
											             $message.='<br>';
											             $message.='<a href="https://twitter.com/WPCGovernment" style="color: #478fca; text-decoration: none; background-color: transparent;">Twitter</a>';
											             $message.='.';
											             $message.='<a href="https://www.facebook.com/westpokotcountygovernmentofficialpage/" style="color: #5b7a91; text-decoration: none; background-color: transparent;">Facebook</a>';
											             $message.='.';
											             $message.='<a href="http://google.com/westpokotcounty" style="color: #dd5a43; text-decoration: none; background-color: transparent;">Google+</a>';
											           $message.='</td></tr></tbody></table>';
											         $message.='</td></tr></tbody></table>';
											       $message.='</td></tr></tbody></table>';
											       $message.='<table class="table-space" height="1" style="height: 1px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="1" style="height:  ';$message.='1px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>';
											       $message.='<table class="table-space" height="36" style="height: 36px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="36" style="height: ';
											        $message.='36px; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table></td></tr></table>';
											       $message.='</td></tr>';
											        $message.='</table>';
											        $message.='</body>';
											        $message.='</html>';
						                $subject = "Password Reset";

						                $user->send_mail($email,$message,$subject);

						                $msg = "<div class='alert alert-success'>
						                      <button class='close' data-dismiss='alert'>&times;</button>
						                      We've sent an email to $email.
						                                Please click on the password reset link in the email to reset your password.
						                      </div>";
						              }
						              else
						              {
						                $msg = "<div class='alert alert-danger'>
						                      <button class='close' data-dismiss='alert'>&times;</button>
						                      <strong>Sorry!</strong>  this email not found.
						                      </div>";
						              }
						              if(isset($msg))
						              {
						                echo $msg;
						              }
						            }
						             ?>

											<form action="" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" name="txtemail" value='<?php if(isset($message)){ echo $_POST['txtemail'];}?>' required/>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="submit" name = "btn-submit" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Send Me!</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="login"  class="back-to-login-link">
												Back to login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->
									<!-- <div class="center"><h2> <a href="index"><i class="ace-icon fa fa-home"></i></a><h2> </div> -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
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

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});



		</script>
	</body>
</html>
