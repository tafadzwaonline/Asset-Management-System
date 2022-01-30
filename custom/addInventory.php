<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }


  $SerialNumber = $_POST['assetSerial'];
  $AssetNumber = $_POST['assetNumber'];
  $Status = $_POST['assetStatus'];
  $AssetCondition = $_POST['assetCondition'];
  $Custodian = $_POST['Custodian'];
  $Office = $_POST['Office'];
  $Department = $_POST['Department'];
  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');
  $Year =  date('Y');

  $soft = "Software";
  //if not exist, create new record..
 if($SerialNumber =="N/A"){
    $SerialNumber = $AssetNumber;
  }
  else
  {
    $SerialNumber = $_POST['assetSerial'];
  }


  $stmt = $db->prepare('INSERT INTO new_inventory (AssetNumber, AssetSerial,AssetType, Status, AssetCondition, Custodian, Office, Department, Year, DateAdded, AddedBy) VALUES (:AssetNumber, :AssetSerial, :AssetType, :Status, :AssetCondition, :Custodian, :Office, :Department, :Year, :DateAdded, :AddedBy)') ;

  $stmt->execute(array(
   ':AssetSerial' => strtoupper($SerialNumber),
   ':AssetNumber' => $AssetNumber,
   ':AssetType' => $user->getAssetType($SerialNumber),
  //':AssetType' => $soft,
   ':Status' => $Status,
   ':AssetCondition' => $AssetCondition,
   ':Custodian' => $Custodian,
   ':Office' => $Office,
   ':Department' => $Department,
   ':Year' => $Year,
   ':AddedBy' => $AddedBy,
   ':DateAdded' => $DateAdded
  ));
echo "Inventory taken successfully";

$stmt2 = $db->prepare("UPDATE new_item SET Status =:Status, AssetCondition =:AssetCondition WHERE SerialNumber =:SerialNumber AND AssetNumber =:AssetNumber") ;
$stmt2->execute(array(
  ':Status' => $Status,
  ':AssetCondition' => $AssetCondition,
  ':SerialNumber' => $SerialNumber,
  ':AssetNumber' => $AssetNumber
));

$Desc ="Took inventory of asset Serial number, $SerialNumber, Asset number $AssetNumber";

$user->setActivity($Desc);
  ?>
