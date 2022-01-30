<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $Id = base64_decode($_REQUEST['Id']);
  $SerialNumber = $_REQUEST['assetSerial'];
  $AssetNumber = $_REQUEST['assetNumber'];
  $Status = $_REQUEST['assetStatus'];
  $AssetCondition = $_REQUEST['assetCondition'];
  $Custodian = $_REQUEST['Custodian'];
  $Office = $_REQUEST['Office'];
  $Department = $_REQUEST['Department'];
  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');
  $Year =  date('Y');


  $stmt = $db->prepare('UPDATE new_inventory SET Status=:Status,AssetCondition=:AssetCondition,Custodian=:Custodian,Office=:Office,Department=:Department,AddedBy=:AddedBy WHERE Id=:Id') ;

  $stmt->execute(array(
   ':Id' => $Id,

   ':Status' => $Status,
   ':AssetCondition' => $AssetCondition,
   ':Custodian' => $Custodian,
   ':Office' => $Office,
   ':Department' => $Department,

   ':AddedBy' => $AddedBy

  ));

  if($stmt){
      echo "Thank you! Your information was successfully updated!";
    }else {
      echo "Failed to save";
    }

    $Desc ="Updated inventory for asset Serial number $SerialNumber, asset number $AssetNumber";

    $user->setActivity($Desc);
  ?>
