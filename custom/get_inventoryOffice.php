<?php
    require('../func/config.php');

    $stmt = $db->prepare('SELECT Office  FROM new_technicianr  WHERE Id = :Id');
    $stmt->execute(array('Id' => $_GET['UserId']));
    $row = $stmt->fetch();

    return $row['Office'];



 ?>
