<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $VendorId = base64_decode($_REQUEST['Id']);
  $VendorName = $_REQUEST['VendorName'];
  $VendorPhone =  $_REQUEST['VendorPhone'];
  $VendorEmail =  $_REQUEST['VendorEmail'];
  $VendorTown =  $_REQUEST['VendorTown'];
  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');

    $stmt = $db->prepare('UPDATE new_vendor SET VendorName =:VendorName, VendorPhone =:VendorPhone ,VendorEmail =:VendorEmail, VendorTown =:VendorTown, DateAdded =:DateAdded, AddedBy =:AddedBy WHERE Id =:Id') ;
    $stmt->bindParam(':Id',$VendorId);
    $stmt->bindParam(':VendorName',$VendorName);
    $stmt->bindParam(':VendorPhone',$VendorPhone);
    $stmt->bindParam(':VendorEmail',$VendorEmail);
    $stmt->bindParam(':VendorTown',$VendorTown);
    $stmt->bindParam(':DateAdded',$DateAdded);
    $stmt->bindParam(':AddedBy',$AddedBy);
    if($stmt->execute()){
      echo "Thank you! Your information was successfully updated!";
    }else {
      echo "Failed to update";
    }

  ?>
