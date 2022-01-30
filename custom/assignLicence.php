<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $AssetID = $_POST['SerialNumber'];

  $ActivationCode = strtoupper($_POST['ActivationCode']);

  $LicenceSlots =  $_POST['AvailableSlots'];

  $LicenceName =  $user->getLicenceName($_POST['LicenceName']);

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
  //add record to assigned LicenceS
  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');
  $State = "Active";

  $stmt2 = $db->prepare('INSERT INTO assetlicences (AssetID, LicenceName, LicenceID, DateInstalled, State, AddedBy, DateAdded) VALUES (:AssetID, :LicenceName, :LicenceID, :DateInstalled, :State, :AddedBy, :DateAdded)') ;
  $stmt2->execute(array(
   ':AssetID' => $AssetID,
   ':LicenceName' => $LicenceName,
   ':LicenceID' => $ActivationCode,
   ':DateInstalled' => $DateAdded,
   ':State' => $State,
   ':AddedBy' => $AddedBy,
   ':DateAdded' => $DateAdded
  ));
  //update assigned linces table.. remove old licences from notices

  $stmt3 = $db->prepare("UPDATE assetlicences SET State = 'Inactive' WHERE assetlicences.AssetID =:AssetID AND State = 'Active'") ;
  $stmt3->execute(array(
   ':AssetID' => $AssetID));

      echo "Thank you! Your information was successfully saved!";

      $Desc ="Assigned licence $LicenceName, activation code $ActivationCode to asset with serial number $AssetID";

      $user->setActivity($Desc);
  ?>
