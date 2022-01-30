<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  if ($_REQUEST['delete']) {

		$pid = $_REQUEST['delete'];
		$query = "DELETE FROM new_item WHERE Id=:pid";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));

    $assetid = $user->getAssetSerialNumber($pid);

		if ($stmt) {
			echo "Asset $assetid Deleted Successfully ...";
		}

    $assetid = $user->getAssetSerialNumber($pid);

    $Desc ="Deleted asset $assetid";

    $user->setActivity($Desc);

	}

  ?>
