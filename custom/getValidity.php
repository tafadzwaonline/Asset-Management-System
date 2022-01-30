<?php
    require('../func/config.php');
  $stmt = $db->prepare('SELECT Period  FROM new_licence WHERE Id = :Id');
  $stmt->execute(array('Id' => $_GET['LicenceId']));
  $row = $stmt->fetch();

  if( $row['Period']=="1"){
      echo"ReUsable";
  }else {
        echo $row['Period'];
  }

 ?>
