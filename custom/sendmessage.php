<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $To = $_POST['Reciepient'];

  $message = $_POST['Message'];

  $Opened = "No";
  $From = $_SESSION['Id'];
  $Time = date('Y-m-d H:i:s');

//if user exists..
  if($To!=$From){

      $stmt = $db->prepare('INSERT INTO private_msg(UserFrom, UserTo, MessageBody, Date, Opened) VALUES (:UserFrom, :UserTo, :MessageBody, :Date, :Opened)') ;
      $stmt->execute(array(
       ':UserFrom' => $From,
       ':UserTo' => $To,
       ':MessageBody' => $message,
       ':Date' => $Time,
       ':Opened' => $Opened
      ));

        echo "success";
    }else {
      echo "Sending message failed. You cannot send message to yourself";
    }




  ?>
