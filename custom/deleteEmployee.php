<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  if ($_REQUEST['delete']) {

		$pid = $_REQUEST['delete'];
		$query = "DELETE FROM new_technicianr WHERE Id=:pid";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));

		if ($stmt) {
			echo "Employee Deleted Successfully ...";
		}

    $Desc ="Deleted employee, id $pid";

    $user->setActivity($Desc);

	}

  ?>
