<?php
	if($_SESSION["Role"]=="1"){
		include('includes/admin-header.php');
	}else if($_SESSION["Role"]=="2"){
		include('includes/user-header.php');
	}

 ?>
