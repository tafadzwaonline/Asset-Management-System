<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  if ($_REQUEST['UserId']) {

		$pid = $_REQUEST['UserId'];
		$query = "select `assigneditems`.`SerialNumber`,
                   `assigneditems`.`DateAssigned`,
                   `assigneditems`.`AssignedBy`,
                   `assigneditems`.`AssignmentPeriod`,
                   `assigneditems`.`Returned`,
                   `new_technicianr`.`EmployeeName`
              from (`assigneditems` `assigneditems`
              inner join `new_technicianr` `new_technicianr`
                   on (`new_technicianr`.`EmployeeName` = `assigneditems`.`AssignedUser`))
             where ((`assigneditems`.`Returned` = 'NO')
                   and (`assigneditems`.`AssignedUser` = '$pid'))
            ";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0)
    {
			echo "User Cannot be cleared. He/she has assets yet to be returned.\n";
      while($row=$stmt->fetch(PDO::FETCH_ASSOC))
      {
        echo "\n";
        echo "Serial Number: ".$row['SerialNumber']."\n";
      }
		}else if($stmt->rowCount() == 0){

      $query = "DELETE FROM new_technicianr WHERE Id=:pid";
      $stmt = $db->prepare( $query );
      $stmt->execute(array(':pid'=>$pid));

      if ($stmt) {
        echo "User has been successfully cleared";
      }
		}

    $custodian = $user->getUserName($pid);
    $assetid = $row['SerialNumber'];

    $Desc ="Cleared user, $custodian in possesion of asset $assetid";

    $user->setActivity($Desc);

	}

  ?>
