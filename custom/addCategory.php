<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $CategoryID = strtoupper($_POST['CategoryID']);
  $CategoryName = $_POST['CategoryName'];
  $CategoryDescription = $_POST['CategoryDescription'];
  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');



  if(!$user->categoryExists($CategoryID) == $CategoryID){
    $stmt = $db->prepare('INSERT INTO availablecategory(CategoryId, CategoryName,Description, DateAdded, AddedBy) VALUES (:CategoryId, :CategoryName,:Description, :DateAdded, :AddedBy)') ;
    $stmt->execute(array(
     ':CategoryId' => $CategoryID,
     ':CategoryName' => $CategoryName,
     ':Description' => $CategoryDescription,
     ':DateAdded' => $DateAdded,
     ':AddedBy' => $AddedBy
    ));

        echo "Thank you! Your information was successfully saved!";
  }else {
    echo "A category with the category id $CategoryID already exists.";
  }

  $Desc ="Added new category, $CategoryName";

  $user->setActivity($Desc);
  ?>
