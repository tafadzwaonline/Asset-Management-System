<?php

  require('func/config.php');

  if(!$user->is_logged_in())
  {
     header('Location: login');

  } else if($user->is_logged_in()){

    //give access levels

    if($_SESSION["Role"] =="1"){
      header('Location: administrator/index');
    }else if($_SESSION["Role"] =="2"){
      header('Location: admin/index');
    }else if($_SESSION["Role"] =="3"){
      header('Location: technician/index');
    }else if($_SESSION["Role"] =="4"){
      header('Location: attachee/index');
    }else if($_SESSION["Role"] =="5"){
      header('Location: user/index');
    }

  }

?>
