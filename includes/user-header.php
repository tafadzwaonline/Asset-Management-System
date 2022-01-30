<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $pagetitle ?> - Asset Manager</title>

		<meta name="description" content="and Validation" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/select2.min.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/fullcalendar.min.css" />
		<link rel="stylesheet" href="custom/styles.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />

		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="assets/css/select2.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-editable.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

	</head>

	<body class="no-skin">

		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="dashboard" class="navbar-brand">
						<small>
							<i class="fa fa-desktop"></i>
							Asset Register
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<?php if(($user->myExpiredLeases())>0){
									$sumNotifications = $user->myExpiredLeases();
									echo "<span class='badge badge-important'>$sumNotifications</span>";
								} ?>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<?php if(($user->myExpiredLeases())>0){
										echo "<i class='ace-icon fa fa-exclamation-triangle'></i>";
									} ?>
									<?php echo $user->myExpiredLeases(); ?> Notifications
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="my-items">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-mail-reply"></i>
														Assigned Items
													</span>
													<?php
														if( $user->myExpiredLeases()>0){
															$leases = $user->myExpiredLeases();
															echo "<span class='pull-right badge badge-warning'>+$leases</span>";
														}
													?>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">

								</li>
							</ul>
						</li>
						<li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<?php
										if($user->countUnreadmessages($_SESSION['username'])){
											$msg =$user->countUnreadmessages($_SESSION['username']);
											echo "<span class='badge badge-success'>$msg</span>";
										}
								 ?>

							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									<?php echo $user->countUnreadmessages($_SESSION['username']); ?> Message(s)
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
									<?php
											$stmt = $db->prepare("SELECT * FROM private_msg WHERE Opened = 'No' AND UserTo = :UserTo ORDER BY Id DESC");
										  $stmt->execute(array(':UserTo' => $_SESSION["username"]));
										  if($stmt->rowCount() > 0)
										  {
										 	 $stmt2 = $db->prepare("SELECT * FROM private_msg WHERE Opened = 'No' AND UserTo = :UserTo");
										 	 $stmt2->execute(array(':UserTo' => $_SESSION["username"]));

										 	 while($row = $stmt2->fetch())
										 	 {
										 		 ?>
													<li>
														<a href="readmessage?id=<?php echo $row['Id'];?>&page=i" class="clearfix">
															<img src="assets/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
															<span class="msg-body">
																<span class="msg-title">
																	<span class="blue"><?php echo $row['UserFrom']; ?>:</span>

																	<?php
																	if(strlen($row['MessageBody'])> 20){
																		$msg_body = substr($row['MessageBody'], 0, 20). "...";
																		echo $msg_body;
																	}
																	?>

																</span>

																<span class="msg-time">
																	<i class="ace-icon fa fa-clock-o"></i>
																	<span><?php echo  date('jS M Y', strtotime($row['Date'])); ?></span>
																</span>
															</span>
														</a>
													</li>
													<?php
											}
										}else {
											echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No new messages found";
										}
										 ?>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<?php
									 echo '<img class="nav-user-photo"src="data:image/jpeg;base64,'.base64_encode( $_SESSION["profilephoto"] ).'" />';?>
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION["username"]; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li>
									<a href="my-profile">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="dashboard">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?php if(isset($activeAssets)){echo $activeAssets;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Assets </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activeMyItems)){echo $activeMyItems;} ?>">
								<a href="my-items">
									<i class="menu-icon fa fa-caret-right"></i>
									My Assets
								</a>

								<b class="arrow"></b>
							</li>


						</ul>
					</li>
					<li class="<?php if(isset($activeMessages)){echo $activeMessages;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-envelope"></i>
							<span class="menu-text"> Messages </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activeInbox)){echo $activeInbox;} ?>">
								<a href="inbox">
									<i class="menu-icon fa fa-caret-right"></i>
									Inbox
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if(isset($activeSent)){echo $activeSent;} ?>">
								<a href="sent-messages">
									<i class="menu-icon fa fa-caret-right"></i>
									Sent
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

					<li class="<?php if(isset($activecalendar)){echo $activecalendar;} ?>">
						<a href="calendar">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Calendar

								<span class="badge badge-transparent tooltip-error" title="2 Important Events">

								</span>
							</span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="<?php if(isset($activeQueries)){echo $activeQueries;} ?>">
						<a href="sendQuery">
							<i class="menu-icon fa fa-bullhorn"></i>

							<span class="menu-text">
								Queries

								<span class="badge badge-transparent tooltip-error" title="2 Important Events">

								</span>
							</span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?php if(isset($activeMyProfile)){echo $activeMyProfile;} ?>">
						<a href="my-profile">
							<i class="menu-icon fa fa-user"></i>

							<span class="menu-text">
								My Profile



								</span>
							</span>
						</a>

						<b class="arrow"></b>
					</li>

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
