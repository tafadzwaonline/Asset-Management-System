<?php
 if($_SESSION['Role']!="1"){

    header('Location: ../error-404.php');
  }
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $pagetitle ?> - Asset Management System</title>

		<meta name="description" content="and Validation" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/select2.min.css" />
		<link rel="stylesheet" href="../assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="../assets/css/fullcalendar.min.css" />
		<link rel="stylesheet" href="../custom/styles.css" />
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="../assets/css/chosen.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-colorpicker.min.css" />



		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="../assets/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="../assets/css/select2.min.css" />

		<link rel="stylesheet" href="../assets/css/bootstrap-editable.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

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
							<i></i>
							<!-- <img src="../assets/images/county/footerr.png" class="msg-photo" /> &nbsp -->
						 Asset Management System
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="purple dropdown-modal">
							

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
											<a href="system-users">
												<div class="clearfix">
													<span class="pull-left">
														<i></i>
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
											<a href="view-assignedlicences">
												<div class="clearfix">
													<span class="pull-left">
														<i></i>
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
														<i></i>
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
														<i></i>
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

                    <li>
											<a href="view-requisitions">
												<div class="clearfix">
													<span class="pull-left">
														<i></i>
														Requisitions
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

						

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									<?php echo $user->countUnreadmessages($_SESSION['Id']); ?> Message(s)
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
									<?php
											$stmt = $db->prepare("SELECT * FROM private_msg WHERE Opened = 'No' AND UserTo = :UserTo ORDER BY Id DESC");
										  $stmt->execute(array(':UserTo' => $_SESSION["Id"]));
										  if($stmt->rowCount() > 0)
										  {
										 	 $stmt2 = $db->prepare("SELECT * FROM private_msg WHERE Opened = 'No' AND UserTo = :UserTo");
										 	 $stmt2->execute(array(':UserTo' => $_SESSION["Id"]));

										 	 while($row = $stmt2->fetch())
										 	 {
										 		 ?>
													<li>
														<a href="readmessage?id=<?php echo $row['Id'];?>&page=i" class="clearfix">
															<img src="../assets/images/avatars/avatar.png" class="msg-photo" />
															<span class="msg-body">
																<span class="msg-title">
																	<span class="blue"><?php echo $user->getUserName($row['UserFrom']); ?>:</span>

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
								
								<span class="user-info">
									<small>Welcome ,</small>
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
									<a href="../logout">
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
							<i></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="<?php if(isset($activeParent)){echo $activeParent;} ?>">
						<a href="#" class="dropdown-toggle">
							<i></i>
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

									Company Assets
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

									<li class="<?php if(isset($activeViewAsset)){echo $activeViewAsset;} ?>">
										<a href="#" class="dropdown-toggle">
										<i class="menu-icon fa fa-caret-right"></i>

										View Asset
										<b class="arrow fa fa-angle-down"></b>
									</a>

										<b class="arrow"></b>
										<ul class="submenu">
				 					<li class="<?php if(isset($active_ViewAsset)){echo $active_ViewAsset;} ?>">
										<a href="view-asset">
											All Assets
										</a>

										<b class="arrow"></b>
									</li>
									<!--<li class="<?php if(isset($activeReqItems)){echo $activeReqItems;} ?>">
										<a href="request-asset">
											<i class="menu-icon fa fa-caret-right"></i>
											Add Requested Asset
										</a>
										<b class="arrow"></b>
									</li>-->

									<!--<li class="<?php if(isset($activeMyItems)){echo $activeMyItems;} ?>">
										<a href="my-items">
											Mine
										</a>

										<b class="arrow"></b>
									</li>-->

									<li class="<?php if(isset($otherItems)){echo $otherItems;} ?>">
										<a href="#" class="dropdown-toggle">
											Other Assets
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="<?php if(isset($assigneditems)){echo $assigneditems;} ?>">
												<a href="view-assigned">
													Assigned Assets
													(long-term)
												</a>

												<b class="arrow"></b>
											</li>

											<li class="<?php if(isset($leaseditems)){echo $leaseditems;} ?>">
												<a href="view-leases">
													Assigned Assets 
													(short-term)
												</a>

												<b class="arrow"></b>
											</li>
                      						<!--<li class="<?php if(isset($reqitems)){echo $reqitems;} ?>">
												<a href="view-requisitions">
													Requested Assets
												</a>

												<b class="arrow"></b>
											</li>-->
											<li class="<?php if(isset($untraceableitems)){echo $untraceableitems;} ?>">
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
					<!--<li class="<?php if(isset($activereqParent)){echo $activereqParent;} ?>">
						<a href="#" class="dropdown-toggle">
							<i></i>
							<span class="menu-text"> Requisitions  </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activeAddreq)){echo $activeAddreq;} ?>">
								<a href="add-requested">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Requested
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
					</li>-->

					
					<!-- REMOVE VENDOR INFO<li class="<?php if(isset($activevendorParent)){echo $activevendorParent;} ?>">
						<a href="#" class="dropdown-toggle">
							<i></i>
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
					</li>-->

					<li class="<?php if(isset($activeEmpParent)){echo $activeEmpParent;} ?>">
						<a href="#" class="dropdown-toggle">
							<i></i>
							<span class="menu-text"> Employees  </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activeAddEmp)){echo $activeAddEmp;} ?>">
								<a href="add-employee">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Employee
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if(isset($activeviewEmp)){echo $activeviewEmp;} ?>">
								<a href="view-employee">
									<i class="menu-icon fa fa-caret-right"></i>
									View Employee
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					<li class="<?php if(isset($activeOff)){echo $activeOff;} ?>">
						<a href="#" class="dropdown-toggle">
							<i></i>
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
							<i></i>
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


					<!--<li class="<?php if(isset($activeReqItems)){echo $activeReqItems;} ?>">
								<a href="request-asset">
									<i class="menu-icon fa fa-caret-right"></i>
									Requisitions
								</a>

								<b class="arrow"></b>
							</li>-->

					
					<li class="<?php if(isset($activeReport)){echo $activeReport;} ?>">
						<!-- <a href="#" class="dropdown-toggle">
							<i></i>
							<span class="menu-text"> Reports </span>

							<b class="arrow fa fa-angle-down"></b>
						</a> -->

						<!-- <b class="arrow"></b> -->

						<ul class="submenu">

						<!-- <li class="<?php if(isset($activeInventoryReport)){echo $activeInventoryReport;} ?>">
								<a href="inventory_report">
									<i class="menu-icon fa fa-caret-right"></i>
									Single Day Inventory
								</a>

								<b class="arrow"></b>
							</li> -->
              <!-- <li class="<?php if(isset($activeInventory_Report)){echo $activeInventory_Report;} ?>">
								<a href="inventory-report">
									<i class="menu-icon fa fa-caret-right"></i>
									Multiple Days Inventory
								</a>

								<b class="arrow"></b>
	
							</li> -->
							<li class="<?php if(isset($activeAsset_Report)){echo $activeAsset_Report;} ?>">
							<!-- <a href="assets_report">
								<i class="menu-icon fa fa-caret-right"></i>
									Assets
							</a> -->
							<!-- <b class="arrow"></b> -->
							</li>

							<!-- <li class="<?php if(isset($activeEmployee_Report)){echo $activeEmployee_Report;} ?>">
								<a href="employee_report">
									<i class="menu-icon fa fa-caret-right"></i>
									Employees
								</a>

								<b class="arrow"></b>
							</li> -->
							<!-- <li class="<?php if(isset($activeOffice_Report)){echo $activeOffice_Report;} ?>">
								<a href="Office_report">
									<i class="menu-icon fa fa-caret-right"></i>
			                    Offices 
								</a>

								<b class="arrow"></b>
							</li> -->
						
							<!-- <li class="<?php if(isset($activeDepartment_Report)){echo $activeDepartment_Report;} ?>">
								<a href="department_report">
									<i class="menu-icon fa fa-caret-right"></i>
								Departments 
								</a>

								<b class="arrow"></b>
							</li> -->
								
						
							<!--</li>
							<li class="<?php if(isset($activeVendor_Report)){echo $activeVendor_Report;} ?>">
								<a href="vendor_report">
									<i class="menu-icon fa fa-caret-right"></i>
								Vendors
								</a>

								<b class="arrow"></b>
							</li>
							<!-- <li class="<?php if(isset($activeAssigned_Report)){echo $activeAssigned_Report;} ?>">
								<a href="assignedass_report">
									<i class="menu-icon fa fa-caret-right"></i>
								Assigned
								</a>

								<b class="arrow"></b>
							</li> -->

						</ul>
		
					<!--<li class="<?php if(isset($activeMessages)){echo $activeMessages;} ?>">
						<a href="#" class="dropdown-toggle">
							<i></i>
							<span class="menu-text"> Messages </span>
              <?php
                  if($user->countUnreadmessages($_SESSION['Id'])){
                    $msg =$user->countUnreadmessages($_SESSION['Id']);
                    echo "<span class='badge badge-success'>$msg</span>";
                  }
               ?>

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
					</li>-->

					<li class="<?php if(isset($activeregistrationusers)){echo $activeregistrationusers;} ?>">
						<a href="#" class="dropdown-toggle">
							<i></i>
							<span class="menu-text"> Users </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activereg)){echo $activereg;} ?>">
								<a href="system-users">
									<i class="menu-icon fa fa-caret-right"></i>
									View Users
								</a>

								<b class="arrow"></b>
							</li>
              <!--<li class="<?php if(isset($activeClearance)){echo $activeClearance;} ?>">
								<a href="system-log">
									<i class="menu-icon fa fa-caret-right"></i>
									System Log
								</a>

								<b class="arrow"></b>
							</li>-->

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

				<div class="sidebar-collapse" id="sidebar-collapse">
					
				</div>
			</div>
