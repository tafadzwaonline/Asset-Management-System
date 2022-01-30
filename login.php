<?php
	require('func/config.php');

	if($user->is_logged_in()){
		header('Location: log');
  }
	$expiredAttachees = $user->getExpiredAttacheeAccount();
	if ( empty($expiredAttachees) ){
	} else{
		foreach ($expiredAttachees as $item) {
			$user->deleteUser($item['Id']);
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login - Asset Management System</title>

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
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
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
									<span class="grey" id="id-text2">Asset Management System</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Tafadzwa Kahwai</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i></i>
												Enter Your Information Here
											</h4>

											<div class="space-6"></div>
											<?php
												//process login form if submitted
					            	if(isset($_POST['submit'])){

					            		$user_email = trim($_POST['user_email']);
					            		$password = trim($_POST['password']);

					            		if($user->login($user_email,$password))
					                {
					                  //check if account is activated
					                  $stmt = $db->prepare('SELECT * FROM profilemaster WHERE Email = :user_email');
					                  $stmt->execute(array(
					                		':user_email' => $user_email
					                	));
					                  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					    		          {
					                    $status = $row['Status'];
															$_SESSION["username"] = $row['Username'];
															$_SESSION['usersfullname'] = $row['Name'];
															$_SESSION["Role"] = $row['Role'];
															$_SESSION["Id"] = $row['Id'];
					                  }
					                  if( $status=="Y")
					                  {
															header('Location: log');
															exit;

					                  }else if ( $status=="N") {
					                    $user->logout();
					                    $message = '
					                      <div class="alert alert-danger">
					                        Your account is not activated. Kindly visit your email address to activate it.
					                      </div>
					                    ';
					                  }else if ( $status=="P") {
					                    $user->logout();
					                    $message = '
					                      <div class="alert alert-danger">
					                        Your account is not approved. Kindly be patient till the procces is complete. You will recieve an email with a confirmation
					                      </div>
					                    ';
					                  }else if ( $status=="S") {
					                    $user->logout();
					                    $message = '
					                      <div class="alert alert-danger">
					                        Your account is suspended. Kindly contact the admin for details
					                      </div>
					                    ';
					                  }

					            		} else {
					            			$message = '
					                  <div class="alert alert-danger">
					                      Invalid username or password.
					                  </div>
					                  ';
					            		}

					            	}//end of submit

					            	if(isset($message)){ echo $message; }
				            	?>
											<form action="" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Your email" name="user_email" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } else if(isset($message)) { echo $_POST['user_email'];}?>" required=""/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Your password" name="password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; }else if(isset($message)) { echo $_POST['password'];} ?>" required="" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">


														<button type="submit" name="submit" class="width-100 pull-center btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>

															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
											<div class="center"><h2> <a href="index"><i class="ace-icon fa fa-home"></i></a><h2> </div>


										</div><!-- /.widget-main -->

										
											<div>
												
											</div>

											<div>

											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
								<!-- <div class="center"><h2> <a href="index"><i class="ace-icon fa fa-home"></i></a><h2> </div> -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
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
