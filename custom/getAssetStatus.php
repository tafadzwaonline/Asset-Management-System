<?php
    require('../func/config.php');
  $stmt = $db->prepare('SELECT Status FROM new_item WHERE Id = :Id');
  $stmt->execute(array('Id' => $_GET['AssetId']));
  $row = $stmt->fetch();

  echo $row['Status'];

 ?>
