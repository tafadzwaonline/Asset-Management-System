<?php
  require('../func/config.php');

   $code = $_POST['code'];
   $Name = $_POST['Name'];
   $Email = $_POST['Email'];
   $Username = $_POST['Username'];
   $PhoneNumber = $_POST['PhoneNumber'];
   $Password = $_POST['Password'];
  //  $hashedpassword = $user->password_hash($Password, PASSWORD_BCRYPT);
   $Office = $_POST['Office'];
   $Department = $_POST['Department'];
   $OfficeTelephone = $_POST['OfficeTelephone'];
   $Role = "5";
   $uID = base64_decode($_POST['uID']);
   $code = $_POST['code'];
   //validate username
  if(!$user->UsernameExists($Username)){

   $stmt = $db->prepare("SELECT Id, Status FROM profilemaster WHERE Id=:uID AND tokenCode=:code LIMIT 1");
   $stmt->execute(array(":uID"=>$uID,":code"=>$code));
   $row=$stmt->fetch(PDO::FETCH_ASSOC);
   if($stmt->rowCount() > 0)
   {
      $statusY = "Y";
      $stmt = $db->prepare('UPDATE profilemaster SET Name=:Name,Email=:Email,Username=:Username,PhoneNumber=:PhoneNumber,Password=:Password,Office=:Office,Department=:Department,OfficeTelephone=:OfficeTelephone,Role=:Role,Status=:Status WHERE Id=:uID ');
      // $stmt = $db->prepare('UPDATE profilemaster SET Status=:Status, Photo=:photo WHERE Id=:uID AND tokenCode=:code');
      $stmt->bindParam(':Name',$Name);
      $stmt->bindParam(':Email',$Email);
      $stmt->bindParam(':Username',$Username);
      $stmt->bindParam(':PhoneNumber',$PhoneNumber);
      $stmt->bindParam(':Password',$Password);
      $stmt->bindParam(':Office',$Office);
      $stmt->bindParam(':Department',$Department);
      $stmt->bindParam(':OfficeTelephone',$OfficeTelephone);
      $stmt->bindParam(':Role',$Role);
      $stmt->bindParam(':uID', $uID);
      $stmt->bindParam(':Status', $statusY);

      if($stmt->execute())
      {
         echo "Your Information has been succesfully saved.";
         //start session
         $user->login($Email,$Password);
         //session variables
         $_SESSION["username"] = $Username;
         $_SESSION['usersfullname'] = $Name;
         $_SESSION["Role"] = $Role;

         header('Location: ../log');
      }else{
        echo "Failed to save";
      }
   }else {
     echo "Account Not Found";
   }
 }else {
   echo "The username you chose has already been taken. Choose another one ";
 }
 ?>
