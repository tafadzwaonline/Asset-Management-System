
<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $DepartmentId = $_POST['DepartmentId'];

  //if(!$user->departmentExists($DepartmentId) == $DepartmentId){

    $DepartmentName = $_POST['DepartmentName'];
    $ParentOffice = $_POST['ParentOffice'];

    $AddedBy = $_SESSION['usersfullname'];
    $DateAdded = date('Y-m-d H:i:s');

    $stmt = $db->prepare('INSERT INTO officedepartments(DepartmentId, DepartmentName, ParentOffice, DateAdded, AddedBy) VALUES (:DepartmentId, :DepartmentName, :ParentOffice, :DateAdded, :AddedBy) ') ;

    $stmt->execute(array(
     ':DepartmentId' => $DepartmentId,
     ':DepartmentName' => $DepartmentName,
     ':ParentOffice' => $ParentOffice,
     ':DateAdded' => $DateAdded,
     ':AddedBy' => $AddedBy
    ));
    echo "Thank you! Your information was successfully saved";

    $Desc ="Added new department, $DepartmentName";

    $user->setActivity($Desc);
  ?>
