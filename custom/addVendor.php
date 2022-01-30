<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $VendorId = strtoupper($_POST['VendorNumber']);
  $VendorName = $_POST['VendorName'];
  $VendorPhone =  $_POST['VendorPhone'];
  $VendorEmail =  $_POST['VendorEmail'];
  $VendorTown =  $_POST['VendorTown'];
  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');



  if(!$user->VendorExists($VendorId) == $VendorId){
    $stmt = $db->prepare('INSERT INTO new_vendor (VendorNumber, VendorName, VendorPhone, VendorEmail, VendorTown, DateAdded, AddedBy) VALUES (:VendorNumber, :VendorName, :VendorPhone, :VendorEmail, :VendorTown, :DateAdded, :AddedBy) ') ;
    $stmt->execute(array(
     ':VendorNumber' => $VendorId,
     ':VendorName' => $VendorName,
     ':VendorPhone' => $VendorPhone,
     ':VendorEmail' => $VendorEmail,
     ':VendorTown' => $VendorTown,
     ':DateAdded' => $DateAdded,
     ':AddedBy' => $AddedBy
    ));

      echo "Thank you! Your information was successfully saved!";
  }else {
    echo "Vendor with a similar vendor number already exists ";
  }

  $Desc ="Added new vendor, $VendorName";

  $user->setActivity($Desc);
  ?>
