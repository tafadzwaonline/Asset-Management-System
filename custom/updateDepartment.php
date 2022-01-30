
<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

    $DepartmentId = base64_decode($_REQUEST['Id']);
    $DepartmentName = $_REQUEST['DepartmentName'];
    $ParentOffice = $_REQUEST['ParentOffice'];

    $AddedBy = $_SESSION['usersfullname'];
    $DateAdded = date('Y-m-d H:i:s');

    $stmt = $db->prepare('UPDATE officedepartments SET DepartmentName =:DepartmentName, ParentOffice =:ParentOffice, DateAdded =:DateAdded, AddedBy=:AddedBy WHERE Id=:DepartmentId') ;

    $stmt->execute(array(
     ':DepartmentId' => $DepartmentId,
     ':DepartmentName' => $DepartmentName,
     ':ParentOffice' => $ParentOffice,
     ':DateAdded' => $DateAdded,
     ':AddedBy' => $AddedBy
    ));
    if($stmt){
      echo "Thank you! Your information was successfully updated!";
    }else {
      echo "Failed to update";
    }

  ?>
