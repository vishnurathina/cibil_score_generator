<?php
require_once('config.php');
 class Connect{
 public static function getConnection(){

	$connect=mysqli_connect(local,dbuser,dbpass,db);
	if(!$connect){
		die("Error in connection".mysqli_error());
	}
	else
	//echo 'success';
//  print_r ($connect);
	return $connect;
}

}
//$r=Connect::getConnection();
//print_r($r);
?>
