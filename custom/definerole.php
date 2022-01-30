
<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

    $UserId= base64_decode($_REQUEST['UserId']);
    $AdministrativeRole = $_REQUEST['AdministrativeRole'];

    $stmt = $db->prepare('UPDATE profilemaster SET Role =:AdministrativeRole WHERE Id=:UserId') ;

    $stmt->execute(array(
     ':UserId' => $UserId,
     ':AdministrativeRole' => $AdministrativeRole
    ));
    if($stmt){
      echo "Thank you! Your information was successfully updated!";
    }else {
      echo "Failed to update";
    }

  ?>
