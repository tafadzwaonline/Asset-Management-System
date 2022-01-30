<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $AssetId = base64_decode($_REQUEST['Id']);

  $RepairType = $_REQUEST['RepairType'];
  //$ItemSerialNumber =  $_REQUEST['OfficeLocation'];
  $DateOfRepair = $_REQUEST['RepairDate'];
  $RepairedBy =  $_REQUEST['RepairedBy'];
  $RepairsMade = $_REQUEST['RepairDerscription'];
  $Cost =  $_REQUEST['RepairCost'];


  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');



    $stmt = $db->prepare('UPDATE itemrepairs SET RepairType=:RepairType,DateOfRepair=:DateOfRepair,RepairedBy=:RepairedBy,RepairsMade=:RepairsMade,Cost=:Cost,AddedBy=:AddedBy,DateAdded=:DateAdded WHERE Id= :Id');
    $stmt->execute(array(
     ':Id' => $AssetId,
     ':RepairType' => $RepairType,
     ':DateOfRepair' => $DateOfRepair,
     ':RepairedBy' => $RepairedBy,
     ':RepairsMade' => $RepairsMade,
     ':Cost' => $Cost,
     ':DateAdded' => $DateAdded,
     ':AddedBy' => $AddedBy
    ));

    if($stmt){
        echo "Thank you! Your information was successfully updated!";
      }else {
        echo "Failed to update";
      }
  ?>
