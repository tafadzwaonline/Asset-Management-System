<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $Id = base64_decode($_REQUEST['Id']);
  $Type = $_REQUEST['assetType'];
  //$Manufacturer = $_REQUEST['assetManufacturer'];

  $Brand ="N/A";
  $Model = $_REQUEST['assetModel'];



  $SerialNumber = $_REQUEST['assetSerial'];
  $AssetNumber = $_REQUEST['assetNumber'];

  $AssetName = $_REQUEST['assetName'];
  $Status = $_REQUEST['assetStatus'];

  $AssetCondition = $_REQUEST['assetCondition'];
  //$WarrantyExpiry = $_REQUEST['warrantyExpiry'];



  //$Vendor = $_REQUEST['assetVendor'];
  $PurchasePrice = $_REQUEST['assetPurchasePrice'];

  $ExpectedAssetLife = $_REQUEST['ExpectedAssetLife'];
  $ScrapValue = $_REQUEST['assetScrapValue'];

  $PurchaseDate = $_REQUEST['purchaseDate'];

  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');


  $stmt = $db->prepare('UPDATE new_item SET Type=:Type,Brand=:Brand,Model=:Model,SerialNumber=:SerialNumber,AssetNumber=:AssetNumber,AssetName=:AssetName,Status=:Status,AssetCondition=:AssetCondition,PurchasePrice=:PurchasePrice,ExpectedAssetLife=:ExpectedAssetLife,ScrapValue=:ScrapValue,PurchaseDate=:PurchaseDate,AddedBy=:AddedBy,DateAdded =:DateAdded WHERE Id=:Id') ;

  $stmt->execute(array(
           ':Id' => $Id,
           ':Type' => $Type,
           //':Manufacturer' => $Manufacturer,
           ':Brand' => $Brand,
           ':Model' => $Model,
           ':SerialNumber' => strtoupper($SerialNumber),
           ':AssetNumber' => $AssetNumber,
           ':AssetName' => $AssetName,
           ':Status' => $Status,
           ':AssetCondition' => $AssetCondition,
           //':WarrantyExpiry' => $WarrantyExpiry,
          // ':Vendor' => $Vendor,
           ':PurchasePrice' => $PurchasePrice,
           ':ExpectedAssetLife' => $ExpectedAssetLife,
           ':ScrapValue' => $ScrapValue,
           ':PurchaseDate' => $PurchaseDate,
           ':AddedBy' => $AddedBy,
           ':DateAdded' => $DateAdded
  ));


if($stmt){
    echo "Thank you! Your information was successfully updated!";
  }else {
    echo "Failed to update";
  }
  ?>
