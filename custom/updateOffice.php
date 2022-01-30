<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $Id = base64_decode($_REQUEST['Id']);
  $OfficeId = $_REQUEST['OfficeId'];
  $OfficeName = $_REQUEST['OfficeName'];
  $OfficeLocation =  $_REQUEST['OfficeLocation'];

  $stmt = $db->prepare('UPDATE officestable SET OfficeId =:OfficeId, OfficeName=:OfficeName, OfficeLocation =:OfficeLocation WHERE Id =:Id') ;

  $stmt->execute(array(
   ':OfficeId' => $OfficeId,
   ':OfficeName' => $OfficeName,
   ':OfficeLocation' => $OfficeLocation,
   ':Id' => $Id
  ));
  if($stmt){
  //  echo $Id;
    echo "Thank you! Your information was successfully updated!";
  }else {
    echo "Failed to update";
  }
  ?>
