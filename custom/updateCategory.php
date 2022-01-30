<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  //$pid = $_REQUEST['delete'];
  $Id = base64_decode($_REQUEST['Id']);
  $CategoryID = strtoupper($_REQUEST['CategoryID']);
  $CategoryName = $_REQUEST['CategoryName'];
  $CategoryDescription = $_REQUEST['CategoryDescription'];

   $stmt = $db->prepare('UPDATE availablecategory SET CategoryId=:CategoryId,CategoryName=:CategoryName,Description=:Description WHERE Id=:Id') ;
    $stmt->execute(array(
     ':CategoryId' => $CategoryID,
     ':CategoryName' => $CategoryName,
     ':Description' => $CategoryDescription,
     ':Id' => $Id
    ));
    if($stmt){
      echo "Thank you! Your information was successfully updated!";
    }else {
      echo "Failed to update";
    }



  ?>
