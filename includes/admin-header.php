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
					<a href="index" class="navbar-brand">
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
								<?php if(($user->countUnapprovedRequests()+$user->countExpiredLicences()+ $user->countExpiredWarranties()+$user->countExpiredLeases())>0){
									$sumNotifications = $user->countUnapprovedRequests()+$user->countExpiredLicences()+ $user->countExpiredWarranties()+$user->countExpiredLeases();
									echo "<span class='badge badge-important'>$sumNotifications</span>";
								} ?>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<?php if(($user->countUnapprovedRequests()+$user->countExpiredLicences()+ $user->countExpiredWarranties()+$user->countExpiredLeases())>0){
										echo "<i class='ace-icon fa fa-exclamation-triangle'></i>";
									} ?>
									<?php echo $user->countUnapprovedRequests()+$user->countExpiredLicences()+ $user->countExpiredWarranties()+$user->countExpiredLeases(); ?> Notifications
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="registration-applications">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-users"></i>
														Unapproved sign up requests
													</span>
													<?php if($user->countUnapprovedRequests()>0){
														$requests = $user->countUnapprovedRequests();
														echo "<span class='pull-right badge badge-info'>+$requests</span>";
													} ?>
												</div>
											</a>
										</li>
										<li>
											<a href="view-licences">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-blue fa fa-key"></i>
														Expired licence keys
													</span>
													<?php if($user->countExpiredLicences()>0){
														$licences = $user->countExpiredLicences();
														echo "<span class='pull-right badge badge-warning'>+$licences</span>";
													} ?>
												</div>
											</a>
										</li>
										<li>
											<a href="view-leases">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-mail-reply"></i>
														Leased Items
													</span>
													<?php
														if( $user->countExpiredLeases()>0){
															$leases = $user->countExpiredLeases();
															echo "<span class='pull-right badge badge-warning'>+$leases</span>";
														}
													?>
												</div>
											</a>
										</li>
										<li>
											<a href="view-warranties">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-registered"></i>
														Expired warranties
													</span>
													<?php
														if( $user->countExpiredWarranties()>0){
															$warranties = $user->countExpiredWarranties();
															echo "<span class='pull-right badge badge-warning'>+$warranties</span>";
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
											echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No messages found";
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
						<a href="index">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="<?php if(isset($activeParent)){echo $activeParent;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Assets
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<!--Start assets-->
							<li class="<?php if(isset($activeAddAsset)){echo $activeAddAsset;} ?>">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									My Assets
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="<?php if(isset($activeAddasset)){echo $activeAddasset;} ?>">
										<a href="add-asset">
											<i class="menu-icon fa fa-caret-right"></i>
											Add Asset
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="#" class="dropdown-toggle">
										<i class="menu-icon fa fa-caret-right"></i>

										View Asset
										<b class="arrow fa fa-angle-down"></b>
									</a>

										<b class="arrow"></b>
										<ul class="submenu">
									<li class="<?php if(isset($activeViewAsset)){echo $activeViewAsset;} ?>">
										<a href="view-asset">
											All Assets
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="#" class="dropdown-toggle">
											Other Assets
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="view-assigned">
													Assigned Assets
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="view-leases">
													Loaned Assets
												</a>

												<b class="arrow"></b>
											</li>
											<li class="">
												<a href="view-untraceable">
													Untraceable Assets
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>
									</li>
								</ul>
							</li>
							<!--End Assets-->
							<!--Stert categories-->
							<li class="<?php if(isset($activeCatParent)){echo $activeCatParent;} ?>">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Categories
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="<?php if(isset($activeAddcategory)){echo $activeAddcategory;} ?>">
										<a href="add-category">
											<i class="menu-icon fa fa-caret-right"></i>
											Add category
										</a>

										<b class="arrow"></b>
									</li>

									<li class="<?php if(isset($activeViewcategory)){echo $activeViewcategory;} ?>">
										<a href="view-category">
											<i class="menu-icon fa fa-caret-right"></i>
											View category
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>
							<!--End Categories-->

						</ul>
					</li>
					<li class="<?php if(isset($activevendorParent)){echo $activevendorParent;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user-plus"></i>
							<span class="menu-text"> Vendors  </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activeAddvendor)){echo $activeAddvendor;} ?>">
								<a href="add-vendor">
									<i class="menu-icon fa fa-caret-right"></i>
									Add vendor
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if(isset($activeviewVendor)){echo $activeviewVendor;} ?>">
								<a href="view-vendor">
									<i class="menu-icon fa fa-caret-right"></i>
									View Vendor
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					<li class="<?php if(isset($activeTechniParent)){echo $activeTechniParent;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cogs"></i>
							<span class="menu-text"> Technicians  </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activeAddTechni)){echo $activeAddTechni;} ?>">
								<a href="add-technician">
									<i class="menu-icon fa fa-caret-right"></i>
									Add technician
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if(isset($activeviewTechni)){echo $activeviewTechni;} ?>">
								<a href="view-technician">
									<i class="menu-icon fa fa-caret-right"></i>
									View technicians
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					<li class="<?php if(isset($activeOff)){echo $activeOff;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> Offices </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activeAddOf)){echo $activeAddOf;} ?>">
								<a href="add-office">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Office
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if(isset($activeviewOf)){echo $activeviewOf;} ?>">
								<a href="view-office">
									<i class="menu-icon fa fa-caret-right"></i>
									View Office
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					<li class="<?php if(isset($activeDep)){echo $activeDep;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Departments </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activeAddDep)){echo $activeAddDep;} ?>">
								<a href="add-department">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Department
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if(isset($activeViewdepartmant)){echo $activeViewdepartmant;} ?>">
								<a href="view-department">
									<i class="menu-icon fa fa-caret-right"></i>
									View Departments
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					<li class="<?php if(isset($activeLicence)){echo $activeLicence;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-key"></i>
							<span class="menu-text"> Licenses </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activeAddLicence)){echo $activeAddLicence;} ?>">
								<a href="add-licence">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Licence
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if(isset($activeviewLicence)){echo $activeviewLicence;} ?>">
								<a href="view-licences">
									<i class="menu-icon fa fa-caret-right"></i>
									View Licences
								</a>

								<b class="arrow"></b>
							</li>
							<li class="<?php if(isset($activeviewWarranties)){echo $activeviewWarranties;} ?>">
								<a href="view-warranties">
									<i class="menu-icon fa fa-caret-right"></i>
									View Warranties
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					<!-- <li class="<?php if(isset($activeReport)){echo $activeReport;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-bar-chart-o "></i>
							<span class="menu-text"> Reports </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activeInventoryReport)){echo $activeInventoryReport;} ?>">
								<a href="inventory_report">
									<i class="menu-icon fa fa-caret-right"></i>
									Inventory Reports
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li> -->
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



					<li class="<?php if(isset($activeregistrationusers)){echo $activeregistrationusers;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Users </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activereg)){echo $activereg;} ?>">
								<a href="registration-applications">
									<i class="menu-icon fa fa-caret-right"></i>
									View Apllicants
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if(isset($activeMyProfile)){echo $activeMyProfile;} ?>">
								<a href="my-profile">
									<i class="menu-icon fa fa-caret-right"></i>
									My Profile
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
