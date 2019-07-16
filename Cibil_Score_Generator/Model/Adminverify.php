<?php
require_once('Admin.php');

//require _once('');
function adminVerify($name,$num){
	$obj= new Admin();
	if($name==$obj->getAdminName() && $num==$obj->getAdminnum())
   	return 'admin';
  
   	else
   		return 'not a user';
}


?>
