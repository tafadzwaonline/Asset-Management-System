<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $Id = base64_decode($_REQUEST['Id']);
  $AssetNumber = $_REQUEST['AssetNumber'];
  $SerialNumber = $_REQUEST['SerialNumber'];

  if($AssetNumber =="N/A"){
    $ass = $SerialNumber;
  }else if($SerialNumber=="N/A"){
    $ass = $AssetNumber;
  }

  $AssPeriod = $_REQUEST['AssignmentPeriod'];

  if($AssPeriod=="1"){
    $AssignmentPeriod = 1;
  }else if($AssPeriod=="2"){
    $AssignmentPeriod = 2;
  }

  $AssignedUser =  $_REQUEST['AssignedUser'];

  $NumberOfDays =  $_REQUEST['NumberOfDays'];

//  $SlotsUsed = $LicenceSlots - 1;

  $AssignedBy = $_SESSION['usersfullname'];
  $DateAssigned = date('Y-m-d');

    $stmt = $db->prepare('UPDATE assigneditems SET AssignedUser=:AssignedUser,OfficeName=:OfficeName,DepartmentName=:DepartmentName,AssignmentPeriod=:AssignmentPeriod,NumberOfDays=:NumberOfDays,DateAssigned=:DateAssigned,AssignedBy=:AssignedBy,Returned=:Returned WHERE Id=:Id') ;
    $stmt->execute(array(
     ':Id' => $Id,
     ':AssignedUser' => $AssignedUser,
     ':OfficeName' => $user->getUserOffice($AssignedUser),
     ':DepartmentName' => $user->getUserDepartment($AssignedUser),
     ':AssignmentPeriod' => $AssignmentPeriod,
     ':NumberOfDays' => $NumberOfDays,
     ':DateAssigned' => $DateAssigned,
     ':AssignedBy' => $AssignedBy,
     ':Returned' => "NO"
    ));

    if($stmt){
      echo "Thank you! Your information was successfully updated!";
    }else {
      echo "Failed to update";
    }

    $Desc ="Updated assigned items record for, asset $ass";

    $user->setActivity($Desc);
  ?>
