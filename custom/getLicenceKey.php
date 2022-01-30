<?php
    require('../func/config.php');
  $stmt = $db->prepare('SELECT SerialNumber FROM new_licence WHERE Id = :Id');
  $stmt->execute(array('Id' => $_GET['LicenceId']));
  $row = $stmt->fetch();

  echo $row['SerialNumber'];

 ?>
