<?php
require('func/config.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login'); }
//
$UserId = $_REQUEST['user_id'];

// if(!isset($UserId)){ header('Location: registration-applications'); }

$stmt = $db->prepare("SELECT * FROM profilemaster WHERE Id=:uID LIMIT 1");
$stmt->execute(array(":uID"=>$UserId));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if($stmt->rowCount() > 0)
{
    $user_email =  $row['Email'];
  //  $code = md5(uniqid(rand()));
    $blank = "";
    if($row['Status']=="S"){
      $statusN = "Y";
    }else if($row['Status']=="P"){
      $statusN = "S";
    }else {
      $statusN = "S";
    }

    $DateAdded = date('Y-m-d H:i:s');
    //insert to db

    $stmt = $db->prepare('UPDATE profilemaster SET Status=:Status WHERE Email = :Email');
    $stmt->bindParam(':Email',$user_email);
    $stmt->bindParam(':Status',$statusN);
  
    if($stmt->execute())
    {

      //last id inserted
      $id = $UserId;

      $key = base64_encode($id);

    //  $id = $key;
      //send mail
      ///email isht
      $message = '<!doctype html>';
       $message.= '<html xmlns="http://www.w3.org/1999/xhtml">';
        $message.='<head>';
         $message.='<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
         $message.='<meta name="viewport" content="initial-scale=1.0" />';
         $message.='<meta name="format-detection" content="telephone=no" />';
         $message.='<title></title>';
         $message.='<style type="text/css">';
         $message.='body {';
         $message.='	width: 100%;';
           $message.='margin: 0;';
           $message.='padding: 0;';
           $message.='-webkit-font-smoothing: antialiased;';
         $message.='}';
         $message.='@media only screen and (max-width: 600px) {';
           $message.='table[class="table-row"] {';
             $message.='float: none !important;';
             $message.='width: 98% !important;';
             $message.='padding-left: 20px !important;';
             $message.='padding-right: 20px !important;';
           $message.='}';
         $message.='	table[class="table-row-fixed"] {';
             $message.='float: none !important;';
             $message.='width: 98% !important;';
         $message.='	}';
           $message.='table[class="table-col"], table[class="table-col-border"] {';
             $message.='float: none !important;';
             $message.='width: 100% !important;';
             $message.='padding-left: 0 !important;';
             $message.='padding-right: 0 !important;';
             $message.='table-layout: fixed;';
           $message.='}';
           $message.='td[class="table-col-td"] {';
             $message.='width: 100% !important;';
           $message.='}';
           $message.='table[class="table-col-border"] + table[class="table-col-border"] {';
             $message.='padding-top: 12px;';
             $message.='margin-top: 12px;';
             $message.='border-top: 1px solid #E8E8E8;';
           $message.='}';
           $message.='table[class="table-col"] + table[class="table-col"] {';
             $message.='margin-top: 15px;';
           $message.='}';
           $message.='td[class="table-row-td"] {';
             $message.='padding-left: 0 !important;';
             $message.='padding-right: 0 !important;';
           $message.='}';
           $message.='table[class="navbar-row"] , td[class="navbar-row-td"] {';
             $message.='width: 100% !important;';
           $message.='}';
           $message.='img {';
             $message.='max-width: 100% !important;';
             $message.='display: inline !important;';
           $message.='}';
           $message.='img[class="pull-right"] {';
             $message.='float: right;';
             $message.='margin-left: 11px;';
                   $message.='max-width: 125px !important;';
             $message.='padding-bottom: 0 !important;';
           $message.='}';
           $message.='img[class="pull-left"] {';
             $message.='float: left;';
             $message.='margin-right: 11px;';
             $message.='max-width: 125px !important;';
             $message.='padding-bottom: 0 !important;';
           $message.='}';
           $message.='table[class="table-space"], table[class="header-row"] {';
             $message.='float: none !important;';
             $message.='width: 98% !important;';
           $message.='}';
           $message.='td[class="header-row-td"] {';
             $message.='width: 100% !important;';
           $message.='}';
         $message.='}';
         $message.='@media only screen and (max-width: 480px) {';
           $message.='table[class="table-row"] {';
             $message.='padding-left: 16px !important;';
             $message.='padding-right: 16px !important;';
           $message.='}';
         $message.='}';
         $message.='@media only screen and (max-width: 320px) {';
           $message.='table[class="table-row"] {';
             $message.='padding-left: 12px !important;';
             $message.='padding-right: 12px !important;';
           $message.='}';
         $message.='}';
         $message.='@media only screen and (max-width: 458px) {';
           $message.='td[class="table-td-wrap"] {';
             $message.='width: 100% !important;';
           $message.='}';
         $message.='}';
         $message.='</style>';
        $message.='</head>';
        $message.='<body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">';
        $message.='<table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">';
        $message.='<tr><td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;">';
       $message.='<table><tr><td class="table-td-wrap" align="center" width="458"><table class="table-space" height="18" style="height: 18px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td';
       $message.='class="table-space-td" valign="middle" height="18" style="height: 18px; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table>';
       $message.='<table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="8" style="height: ';
       $message.='8px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>';

       $message.='<table class="table-row" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; ';
       $message.='font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">';
         $message.='<table class="table-col" align="left" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="378" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; ';
         $message.='width: 378px;" valign="top" align="left">';
          $message.=' <table class="header-row" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="378" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px';
          $message.='padding-bottom: 10px; padding-top: 15px;" valign="top" align="left">Oops.. We are sorry!</td></tr></tbody></table>';
           $message.='<div style="font-family: Arial, sans-serif; line-height: 20px; color: #444444; font-size: 13px;">';
             $message.='<b style="color: #777777;">We are sad that you wont be able to use county Asset Manager</b>';
             $message.='<br>';
             $message.='Please contact the admin for details';
           $message.='</div>';
         $message.='</td></tr></tbody></table>';
       $message.='</td></tr></tbody></table>';

       $message.='<table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height:';
       $message.='12px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>';
       $message.='<table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: ';
        $message.='12px; width: 450px; padding-left: 16px; padding-right: 16px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="center">&nbsp;<table bgcolor="#E8E8E8" height="0" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td bgcolor="#E8E8E8" height="1" ';
        $message.='width="100%" style="height: 1px; font-size:0;" valign="top" align="left">&nbsp;</td></tr></tbody></table></td></tr></tbody></table>';
       $message.='<table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: ';
        $message.='16px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>';

       $message.='<table class="table-row" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px;  ';
       $message.='font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">';
         $message.='<table class="table-col" align="left" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="378" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; ';
         $message.='width: 378px;" valign="top" align="left">';
           $message.='<table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 378px; background-color: #ffffff;" width="378" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16"  ';
           $message.='style="height: 16px; width: 378px; background-color: #ffffff;" width="378" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>';
         $message.='</td></tr></tbody></table>';
       $message.='</td></tr></tbody></table>';

       $message.='<table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="6" style="height: ';
       $message.='6px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>';

       $message.='<table class="table-row-fixed" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-fixed-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: ';
        $message.='13px; font-weight: normal; padding-left: 1px; padding-right: 1px;" valign="top" align="left">';
         $message.='<table class="table-col" align="left" width="448" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="448" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;"  ';
         $message.='valign="top" align="left">';
           $message.='<table width="100%" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td width="100%" align="center" bgcolor="#f5f5f5" style="font-family: Arial, sans-serif; line-height: 24px; color: #bbbbbb; font-size: 13px; font-weight: normal; text-align: center;';
             $message.='padding: 9px; border-width: 1px 0px 0px; border-style: solid; border-color: #e3e3e3; background-color: #f5f5f5;" valign="top">';
             $message.='<a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;">West Pokot County &copy; 2017</a>';
             $message.='<br>';
             $message.='<a href="https://twitter.com/WPCGovernment" style="color: #478fca; text-decoration: none; background-color: transparent;">Twitter</a>';
             $message.='.';
             $message.='<a href="https://www.facebook.com/westpokotcountygovernmentofficialpage/" style="color: #5b7a91; text-decoration: none; background-color: transparent;">Facebook</a>';
             $message.='.';
             $message.='<a href="http://google.com/westpokotcounty" style="color: #dd5a43; text-decoration: none; background-color: transparent;">Google+</a>';
           $message.='</td></tr></tbody></table>';
         $message.='</td></tr></tbody></table>';
       $message.='</td></tr></tbody></table>';
       $message.='<table class="table-space" height="1" style="height: 1px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="1" style="height:  ';$message.='1px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>';
       $message.='<table class="table-space" height="36" style="height: 36px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="36" style="height: ';
        $message.='36px; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table></td></tr></table>';
       $message.='</td></tr>';
        $message.='</table>';
        $message.='</body>';
        $message.='</html>';

       $subject = "Account suspension";

        $user->send_mail($user_email,$message,$subject);

        echo "The user has been Successfully suspended";
    }
    else
    {
      echo "Action Failed";
    }


}
else
{
echo "User not found!";
}

 ?>
