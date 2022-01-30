<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $LicenceId = base64_decode($_REQUEST['Id']);
  $LicenceName = $_REQUEST['LicenceName'];
  $LicenceVendor =  $_REQUEST['LicenceVendor'];
  $ActivationCode = strtoupper($_REQUEST['ActivationCode']);
  $SlotsUsed = 0;
  $LicenceSlots =  $_REQUEST['LicenceSlots'];
  $LicenceValidity =  $_REQUEST['LicenceValidity'];
  $reusable =  $_REQUEST['reusable'];

  //echo $reusable;

  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');


    $stmt = $db->prepare('UPDATE new_licence SET Name=:Name,Vendor=:Vendor,SerialNumber=:SerialNumber,ReUsable=:ReUsable,Slots=:Slots,SlotsUsed=:SlotsUsed,Period=:Period,DateAdded=:DateAdded,AddedBy=:AddedBy WHERE  Id=:Id') ;
    $stmt->execute(array(
     ':Id' => $LicenceId,
     ':Name' => $LicenceName,
     ':Vendor' => $LicenceVendor,
     ':SerialNumber' => $ActivationCode,
     ':ReUsable' => $reusable,
     ':Slots' => $LicenceSlots,
     ':SlotsUsed' => $SlotsUsed,
     ':Period' => $LicenceValidity,
     ':DateAdded' => $DateAdded,
     ':AddedBy' => $AddedBy
    ));

    if($stmt){
      echo "Thank you! Your licence information was successfully updated!";
    }else {
      echo "Failed to update";
    }
  ?>
