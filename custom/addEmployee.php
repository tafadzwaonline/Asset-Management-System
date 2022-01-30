<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $EmployeeeId = strtoupper($_POST['EmployeeNumber']);
  $EmployeeName = $_POST['EmployeeName'];
  $EmployeePhone =  $_POST['EmployeePhone'];
  $EmployeeEmail =  $_POST['EmployeeEmail'];
  $EmployeeTown =  $_POST['EmployeeTown'];
  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');
  $Office = $_POST['Office'];
  $Department = $_POST['Department'];

  


  if(!$user->EmployeeExists($EmployeeeId) == $EmployeeeId){
    $stmt = $db->prepare('INSERT INTO new_technicianr (EmployeeNumber, EmployeeName, EmployeePhone, EmployeeEmail, EmployeeTown, DateAdded, AddedBy, Office, Department) VALUES (:EmployeeNumber, :EmployeeName, :EmployeePhone, :EmployeeEmail, :EmployeeTown, :DateAdded, :AddedBy, :Office, :Department) ') ;
    $stmt->execute(array(
     ':EmployeeNumber' => $EmployeeeId,
     ':EmployeeName' => $EmployeeName,
     ':EmployeePhone' => $EmployeePhone,
     ':EmployeeEmail' => $EmployeeEmail,
     ':EmployeeTown' => $EmployeeTown,
     ':DateAdded' => $DateAdded,
     ':AddedBy' => $AddedBy,
     ':Office' => $Office,
     ':Department' => $Department
    ));

      echo "Thank you! Your information was successfully saved!";
  }else {
    echo "Employee with a similar Employee number already exists ";
  }

  $Desc ="Added new Employee, $EmployeeName";

  $user->setActivity($Desc);
  ?>
