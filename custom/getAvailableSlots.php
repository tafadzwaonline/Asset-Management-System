<?php
    require('../func/config.php');
  $stmt = $db->prepare('SELECT (Slots - SlotsUsed) as SlotsRemaining, ReUsable  FROM new_licence WHERE Id = :Id');
  $stmt->execute(array('Id' => $_GET['LicenceId']));
  $row = $stmt->fetch();

  if( $row['ReUsable']=="1"){
      echo"ReUsable";
  }else {
      echo $row['SlotsRemaining'];
  }


 ?>
