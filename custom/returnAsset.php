<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }


  $SerialNumber = $_POST['assetSerial'];
  $AssetNumber = $_POST['assetNumber'];
  $Status = $_POST['assetStatus'];
  $AssetCondition = $_POST['assetCondition'];
  $Custodian = $_POST['Custodian'];

  //optional
  if(isset($_POST['DescriptionBox'])){
    $DescriptionBox = $_POST['DescriptionBox'];
  }
  if(isset($_POST['CostOfDamages'])){
    $CostOfDamages = $_POST['CostOfDamages'];
  }

  //if not exist, create new record..
  if($AssetNumber =="N/A"){
    $ass = $SerialNumber;
  }else if($SerialNumber=="N/A"){
    $ass = $AssetNumber;
  }

  //delete from assigned items
  $stmt = $db->prepare("DELETE FROM assigneditems WHERE SerialNumber = :SerialNumber") ;
  $stmt->execute(array(
   ':SerialNumber' => $ass
  ));

  //update tatus in new_item table
 $stmt2 = $db->prepare("UPDATE new_item SET Status =:Status, AssetCondition =:AssetCondition WHERE SerialNumber =:SerialNumber AND AssetNumber =:AssetNumber") ;
 $stmt2->execute(array(
   ':Status' => $Status,
   ':AssetCondition' => $AssetCondition,
   ':SerialNumber' => $SerialNumber,
   ':AssetNumber' => $AssetNumber
 ));
 $usr = $user->getUserName($Custodian);
 $Desc ="Assigned asset $ass returned in $AssetCondition condition by $usr";

 $user->setActivity($Desc);

 if(isset($CostOfDamages)&& isset($DescriptionBox)){

  $stmt3 = $db->prepare("INSERT INTO assetdamages(SerialNumber, UserId, Description, Cost) VALUES (:SerialNumber, :UserId, :Description, :Cost)") ;
  $stmt3->execute(array(
    ':SerialNumber' => $ass,
    ':UserId' => $Custodian,
    ':Description' => $DescriptionBox,
    ':Cost' => $CostOfDamages
  ));

  $Desc ="Assigned asset $ass returned in $AssetCondition condition by $Custodian Cost of damages $CostOfDamages ";

  $user->setActivity($Desc);
 }
 echo "Thank you! Your information was successfully updated!";

  ?>
