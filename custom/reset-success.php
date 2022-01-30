<?php
   require('../func/config.php');

   $Password = $_POST['Password'];
   $hashedpassword = $user->password_hash($Password, PASSWORD_BCRYPT);
   
   $uID = base64_decode($_POST['uID']);

   $code = $_POST['code'];

   $stmt = $db->prepare("SELECT * FROM profilemaster WHERE Id=:uID AND tokenCode=:code LIMIT 1");
   $stmt->execute(array(":uID"=>$uID,":code"=>$code));
   $row=$stmt->fetch(PDO::FETCH_ASSOC);
   if($stmt->rowCount() > 0)
   {
     //password not same as old
     if($hashedpassword==$row['Password'])
     {
       echo "The password you chose is same as the old password. Please choose a different Password";

     }else {
       $stmt = $db->prepare('UPDATE profilemaster SET Password=:Password WHERE Id=:uID ');

        $stmt->bindParam(':Password',$hashedpassword);
        $stmt->bindParam(':uID', $uID);
        if($stmt->execute())
        {
           echo "success";
           //start session
           $user->login($row['Email'],$Password);
           //session variables
           $_SESSION["username"] = $row['Username'];
           $_SESSION['usersfullname'] = $row['Name'];
           $_SESSION["profilephoto"] = $row['Photo'];
        }else{
          echo "Failed to save";
        }
     }

   }else {
     echo "Account Not Found";
   }
 ?>
