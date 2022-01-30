<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $AssetId = base64_decode($_POST['Id']);

  $RepairType = $_POST['RepairType'];
  //$ItemSerialNumber =  $_POST['OfficeLocation'];
  $DateOfRepair = $_POST['RepairDate'];
  $RepairedBy =  $_POST['RepairedBy'];
  $RepairsMade = $_POST['RepairDerscription'];
  $Cost =  $_POST['RepairCost'];


  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');



    $stmt = $db->prepare('INSERT INTO itemrepairs(RepairType, ItemSerialNumber, DateOfRepair, RepairedBy, RepairsMade, Cost, AddedBy, DateAdded) VALUES (:RepairType, :ItemSerialNumber, :DateOfRepair, :RepairedBy, :RepairsMade, :Cost, :AddedBy, :DateAdded)');
    $stmt->execute(array(
     ':RepairType' => $RepairType,
     ':ItemSerialNumber' => $AssetId,
     ':DateOfRepair' => $DateOfRepair,
     ':RepairedBy' => $RepairedBy,
     ':RepairsMade' => $RepairsMade,
     ':Cost' => $Cost,
     ':DateAdded' => $DateAdded,
     ':AddedBy' => $AddedBy
    ));

    if($stmt){
        echo "Thank you! Your information was successfully added!";
      }else {
        echo "Failed to update";
      }
      $Desc ="Recorded new service on asset serial number $AssetId";

      $user->setActivity($Desc);
  ?>
