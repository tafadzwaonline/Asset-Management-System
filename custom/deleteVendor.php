<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  if ($_REQUEST['delete']) {

		$pid = $_REQUEST['delete'];
		$query = "DELETE FROM new_vendor WHERE Id=:pid";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));

		if ($stmt) {
			echo "Vendor Deleted Successfully ...";
		}

    $Desc ="Deleted vendor, id $pid";

    $user->setActivity($Desc);
	}

  ?>
