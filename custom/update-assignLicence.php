<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $AssetID = $_REQUEST['SerialNumber'];

  $Id = base64_decode($_REQUEST['Id']);

  $ActivationCode = strtoupper($_REQUEST['ActivationCode']);

  $LicenceSlots =  $_REQUEST['AvailableSlots'];

  $LicenceName =  $user->getLicenceName($_REQUEST['LicenceName']);
  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');

  $LicenceId = $_POST['LicenceName'];

  $stmt = $db->prepare('SELECT Slots, SlotsUsed  FROM new_licence WHERE Id = :Id');
  $stmt->execute(array('Id' => $LicenceId));
  $row = $stmt->fetch();

  //get slots

  $TotalLicenceSlots = $row['Slots'];
  $TotalUsedLicenceSlots = $row['SlotsUsed'];

  $NewTotalSlotsUsed = $TotalUsedLicenceSlots + 1;

  //update new value of slots

  $stmt = $db->prepare('UPDATE new_licence SET SlotsUsed=:SlotsUsed WHERE Id = :Id') ;
  $stmt->execute(array(
   ':SlotsUsed' => $NewTotalSlotsUsed,
   ':Id' => $LicenceId
  ));

    $stmt2 = $db->prepare('UPDATE assetlicences SET AssetID=:AssetID,LicenceName=:LicenceName,LicenceID=:LicenceID,DateInstalled=:DateInstalled,AddedBy=:AddedBy,DateAdded=:DateAdded WHERE Id=:Id') ;

    $stmt2->execute(array(
     ':Id' => $Id,
     ':AssetID' => $AssetID,
     ':LicenceName' => $LicenceName,
     ':LicenceID' => $ActivationCode,
     ':DateInstalled' => $DateAdded,
     ':AddedBy' => $AddedBy,
     ':DateAdded' => $DateAdded
    ));
      echo "Thank you! Your information was successfully saved!";

      $Desc ="Updated assigned licence $LicenceName record for, asset $AssetID";

      $user->setActivity($Desc);

  ?>
