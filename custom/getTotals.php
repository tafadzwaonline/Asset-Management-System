<?php
  require('../func/config.php');
  
    $Year = $_GET['year'];
    if($_GET['m']=="1"){
    	echo  $user->countTotalAssets($Year);
    }else
    if($_GET['m']=="2"){
    	echo $user->countTotalUntraceableAssets($Year);
    }else
    if($_GET['m']=="3"){
    	echo $user->countTotalStoreAssets($Year);
    }else{
      echo "0";
    }
    	//if(isset($_GET['year'])){}

?>
