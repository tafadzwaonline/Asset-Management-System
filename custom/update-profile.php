<?php
  require('../func/config.php');


   $Name = $_REQUEST['Name'];
   $Email = $_REQUEST['Email'];
   $Username = $_REQUEST['Username'];
   $PhoneNumber = $_REQUEST['PhoneNumber'];
   $Password = $_REQUEST['Password'];
   $hashedpassword = $user->password_hash($Password, PASSWORD_BCRYPT);
   $Office = $_REQUEST['Office'];
   $Department = $_REQUEST['Department'];
   $OfficeTelephone = $_REQUEST['OfficeTelephone'];
   $uID = $_REQUEST['uID'];

   //validate username  allow if username chosen is current username

  $stmt = $db->prepare('UPDATE profilemaster SET Name=:Name,Email=:Email,Username=:Username,PhoneNumber=:PhoneNumber,Password=:Password,Office=:Office,Department=:Department,OfficeTelephone=:OfficeTelephone WHERE Id=:uID ');
  $stmt->bindParam(':Name',$Name);
  $stmt->bindParam(':Email',$Email);
  $stmt->bindParam(':Username',$Username);
  $stmt->bindParam(':PhoneNumber',$PhoneNumber);
  $stmt->bindParam(':Password',$hashedpassword);
  $stmt->bindParam(':Office',$Office);
  $stmt->bindParam(':Department',$Department);
  $stmt->bindParam(':OfficeTelephone',$OfficeTelephone);
  $stmt->bindParam(':uID',$uID);


  if($stmt->execute())
  {
     echo "Thank you! Your information was successfully updated!";
     //start session
     $user->login($Email,$Password);
     //session variables
     $_SESSION["username"] = $Username;
     $_SESSION['usersfullname'] = $Name;
    // $_SESSION["profilephoto"] = $_SESSION["temp_photo"];
  }else{
    echo "Failed to save";
  }
 ?>
