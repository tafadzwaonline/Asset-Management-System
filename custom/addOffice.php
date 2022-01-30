<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $OfficeId = strtoupper($_POST['OfficeId']);
  $OfficeName = $_POST['OfficeName'];
  $OfficeLocation =  $_POST['OfficeLocation'];


  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');



//  if(!$user->officeExists($OfficeId) == $OfficeId){
    $stmt = $db->prepare('INSERT INTO officestable(OfficeId, OfficeName, OfficeLocation, DateAdded, AddedBy) VALUES (:OfficeId, :OfficeName, :OfficeLocation, :DateAdded, :AddedBy)') ;
    $stmt->execute(array(
     ':OfficeId' => $OfficeId,
     ':OfficeName' => $OfficeName,
     ':OfficeLocation' => $OfficeLocation,
     ':DateAdded' => $DateAdded,
     ':AddedBy' => $AddedBy
    ));

      echo "Thank you! Your information was successfully saved!";

      $Desc ="Added new office, $OfficeName in $OfficeLocation";

      $user->setActivity($Desc);
  ?>
