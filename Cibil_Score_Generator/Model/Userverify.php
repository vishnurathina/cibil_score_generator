<?php
require_once('Admin.php');

//require _once('');
function userVerify($name,$num){
	$obj= new Admin();
	if($name==$obj->getAdminName() && $num==$obj->getAdminnum())
   	return 'admin';
  // else if()//check user in db
   //	return 'user';
   	else
   		return 'not a user';
}


?>
