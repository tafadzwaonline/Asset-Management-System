<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $EmployeeeId = base64_decode($_REQUEST['Id']);
  $EmployeeName = $_REQUEST['EmployeeName'];
  $EmployeePhone =  $_REQUEST['EmployeePhone'];
  $EmployeeEmail =  $_REQUEST['EmployeeEmail'];
  $EmployeeTown =  $_REQUEST['EmployeeTown'];
  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');
  


    $stmt = $db->prepare('UPDATE new_technicianr SET EmployeeName =:EmployeeName, EmployeePhone =:EmployeePhone ,EmployeeEmail =:EmployeeEmail, EmployeeTown =:EmployeeTown, DateAdded =:DateAdded, AddedBy =:AddedBy WHERE Id =:Id') ;
    $stmt->bindParam(':Id',$EmployeeeId);
    $stmt->bindParam(':EmployeeName',$EmployeeName);
    $stmt->bindParam(':EmployeePhone',$EmployeePhone);
    $stmt->bindParam(':EmployeeEmail',$EmployeeEmail);
    $stmt->bindParam(':EmployeeTown',$EmployeeTown);
    $stmt->bindParam(':DateAdded',$DateAdded);
    $stmt->bindParam(':AddedBy',$AddedBy);
    


    if($stmt->execute()){
      echo "Thank you! Your information was successfully updated!";
    }else {
      echo "Failed to update";
    }


  ?>
