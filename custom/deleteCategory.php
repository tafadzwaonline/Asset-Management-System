<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  if ($_REQUEST['delete']) {

		$pid = $_REQUEST['delete'];
		$query = "DELETE FROM availablecategory WHERE Id=:pid";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));

		if ($stmt) {
			echo "Category Deleted Successfully ...";
		}

    $Desc ="Deleted category, id $pid";

    $user->setActivity($Desc);

	}

  ?>
