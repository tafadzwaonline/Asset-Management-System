<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

	if(!isset($_GET['search'])){
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}

  $pagetitle ="Search Results";
	include('includes/header.php');
	?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li class="active">Search Results</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>Search Results </h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div>
									<div class="row search-page" id="search-page-2">
										<div class="col-xs-12 col-md-10 col-md-offset-1">
											<div class="search-area well no-margin-bottom">
												<form action="search" method="get">
													<div class="row">
														<div class="col-md-6">
															<div class="input-group">
																<input type="text" class="form-control" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>" />
																<div class="input-group-btn">
																	<button type="submit" class="btn btn-primary btn-sm" >
																		<i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
																	</button>
																</div>
															</div>
														</div>
													</div>
												</form>
												<?php
													//$word = trim($_GET['search']);

													$word = trim($_GET['search']);

													if(isset($_POST['searchTxt'])){$word  = $_POST['search'];}
													$item_per_page      = 10; //item to display per page
													$page_url           = "http://localhost/wpams/administrator/search?search=$word";
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

													$search = "%".$word."%";
													$search1 = $search;
													$search2 = $search;
													$search3 = $search;
													$search4 = $search;
													$search5 = $search;
													$search6 = $search;
													$search7 = $search;
													$stmt = $db->prepare("SELECT * FROM new_item WHERE Type LIKE :search1 OR Manufacturer LIKE :search2 OR Brand LIKE :search3 OR AssetName LIKE :search4 OR Model LIKE :search5 OR SerialNumber LIKE :search6 OR AssetNumber LIKE :search7 ");
													$stmt->bindValue(":search1", $search1, PDO::PARAM_STR);
													$stmt->bindValue(":search2", $search2, PDO::PARAM_STR);
													$stmt->bindValue(":search3", $search3, PDO::PARAM_STR);
													$stmt->bindValue(":search4", $search4, PDO::PARAM_STR);
													$stmt->bindValue(":search5", $search5, PDO::PARAM_STR);
													$stmt->bindValue(":search6", $search6, PDO::PARAM_STR);
													$stmt->bindValue(":search7", $search7, PDO::PARAM_STR);
													$stmt->execute();

													if($stmt->rowCount() > 0)
													{

														$get_total_rows = $stmt->rowCount(); //hold total records in variable  ,

														$total_pages = ceil($get_total_rows/$item_per_page); //break records into pages

														################# Display Records per page ############################COUNT(postTitle)
														$page_position = (($page_number-1) * $item_per_page);
														//

														$stmt2 = $db->prepare("SELECT * FROM new_item WHERE Type LIKE :search1 OR Manufacturer LIKE :search2 OR Brand LIKE :search3 OR AssetName LIKE :search4 OR Model LIKE :search5 OR SerialNumber LIKE :search6 OR AssetNumber LIKE :search7 ORDER BY Id DESC LIMIT $page_position, $item_per_page");
														$stmt2->bindValue(":search1", $search1, PDO::PARAM_STR);
														$stmt2->bindValue(":search2", $search2, PDO::PARAM_STR);
														$stmt2->bindValue(":search3", $search3, PDO::PARAM_STR);
														$stmt2->bindValue(":search4", $search4, PDO::PARAM_STR);
														$stmt2->bindValue(":search5", $search5, PDO::PARAM_STR);
														$stmt2->bindValue(":search6", $search6, PDO::PARAM_STR);
														$stmt2->bindValue(":search7", $search7, PDO::PARAM_STR);
														$stmt2->execute();



											 ?>
											<div class="space space-6"></div>
											<span class="grey"><?php if(isset($get_total_rows)){echo $get_total_rows;} ?> results found</span>
										</div>

										<div class="search-results">
											<?php

													while($row = $stmt2->fetch())
													{
														extract($row);
														?>
																			<div class="search-result">
																				<h5 class="search-title">
																					<a href="view-single-asset?id=<?php $key = base64_encode($row['Id']); echo $key; ?>"><?php echo $row['AssetName']; ?></a>
																				</h5>

																				<p class="search-content"> <b>Serial Number:</b>
																					<?php echo strtoupper($row['SerialNumber']); ?>
																				</p>
																				<p class="search-content"> <b>Type:</b>
																					<?php echo $row['Type']; ?>
																				</p>
																				<p class="search-content"> <b>Manufacturer:</b>
																					<?php echo $row['Manufacturer']; ?>
																				</p>
																				<p class="search-content"> <b>Status:</b>
																					<?php echo $row['Status']; ?>
																				</p>
																				<p class="search-content"> <b>Condition:</b>
																					<?php echo $row['AssetCondition']; ?>
																				</p>
																				<p class="search-content"> <b>Custodian:</b>
																					<?php if($row['SerialNumber']=="N/A"){echo $user->getCustodian($row['AssetNumber']);}else{echo $user->getCustodian($row['SerialNumber']);}  ?>
																				</p>
																				<p class="search-content"> <b>Warranty Exipry Date:</b>
																					<?php echo $row['WarrantyExpiry']; ?>
																				</p>
																			</div>
											<?php
													}
												}else
												{
													echo "No results found";
												}
												?>
										</div>

										<?php
										if(isset($get_total_rows)){
											if($get_total_rows > $item_per_page ){
												?>
												<div class='search-area well well-sm text-center'>

														<?php
														echo $user->paginateSearchResults($item_per_page, $page_number, $get_total_rows, $total_pages, $page_url);
														?>
												</div>
												<?php
											}
										}


										 ?>
									</div>
								</div>
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
	<script src="../assets/js/tree.min.js"></script>
	<script src="../assets/js/select2.min.js"></script>
	<script src="../assets/js/jquery-ui.custom.min.js"></script>
	<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="../assets/js/holder.min.js"></script>

	<!-- ace scripts -->
	<script src="../assets/js/ace-elements.min.js"></script>
	<script src="../assets/js/ace.min.js"></script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
		jQuery(function($) {


		});
	</script>
</body>
</html>
