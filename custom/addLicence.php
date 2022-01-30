<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }


  $LicenceName = $_POST['LicenceName'];
  $LicenceVendor =  $_POST['LicenceVendor'];
  $ActivationCode = strtoupper($_POST['ActivationCode']);
  $SlotsUsed = 0;
  $LicenceSlots =  $_POST['LicenceSlots'];
  $LicenceValidity =  $_POST['LicenceValidity'];
  $reusable =  $_POST['reusable'];
  $url = $_POST['url'];

  //echo $reusable;

  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');



  if(!$user->LicenceExists($ActivationCode) == $ActivationCode){

    $stmt = $db->prepare('INSERT INTO new_licence (Name,Vendor, SerialNumber, ReUsable, Slots, SlotsUsed, Period, Link, DateAdded, AddedBy) VALUES (:Name, :Vendor, :SerialNumber, :ReUsable, :Slots, :SlotsUsed, :Period, :Link, :DateAdded, :AddedBy)') ;
    $stmt->execute(array(
     ':Name' => $LicenceName,
     ':Vendor' => $LicenceVendor,
     ':SerialNumber' => $ActivationCode,
     ':ReUsable' => $reusable,
     ':Slots' => $LicenceSlots,
     ':SlotsUsed' => $SlotsUsed,
     ':Period' => $LicenceValidity,
     ':Link' => $url,
     ':DateAdded' => $DateAdded,
     ':AddedBy' => $AddedBy
    ));

      echo "Thank you! Your information was successfully saved!";
  }else {
    echo "Licence with a similar Activation code already exists ";
  }

  $Desc ="Added new licence, $LicenceName, Activation code $ActivationCode";

  $user->setActivity($Desc);
  ?>
