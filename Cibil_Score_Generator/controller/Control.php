<?php
require_once('../Model/Error.php');
require_once('../Model/Adminverify.php');
require_once '../Model/User_details.php';
require_once '../Model/Credit_card_details.php';
require_once '../Model/Personal_loan_details.php';
require_once '../Model/Home_loan_details.php';
require_once '../Model/Emi.php';
require_once '../Model/Score.php';

//for admin validation
if(isset($_POST['Admin'])){
 $name=$_POST['user_name'];
$num=$_POST['pan_num'];
$pattern='/^[a-zA-Z]+$/';
$alpha='/^[a-zA-Z0-9]+$/';
if(preg_match($pattern, $name) && preg_match($alpha, $num)){
//to verify user/admin
  $val=adminVerify($name,$num);
	if($val=='admin'){
		//report of users/list of users
     include '../view/Select.html';



	}
	else
		echo $notadmin;
}
 else
echo $logerror;
}

if(isset($_POST['getlist'])){//user list
$date=$_POST['date'];

$list=User_details::getUserList($date);

}
//user entered details
if(isset($_POST['submitdetails'])){
$name=$_POST['user_name'];
$num=$_POST['pan_num'];
$gen=$_POST['gender'];
$dob=$_POST['dob'];
$add=$_POST['address'];
$pin=$_POST['pincode'];
$email=$_POST['email'];
$inc=$_POST['income'];
$emi=$_POST['emi'];
$ci=$_POST['cardissue'];
$ex=$_POST['cardexpire'];
$li=$_POST['cclimit'];
$ccu=$_POST['ccutilize'];
$plt=$_POST['plamount'];
$plp=$_POST['plapaid'];
$pls=$_POST['plstart'];
$ple=$_POST['plend'];
$hlt=$_POST['hlamount'];
$hlp=$_POST['hlapaid'];
$hls=$_POST['hlstart'];
$hle=$_POST['hlend'];
if($gen=='male')
$gen='m';
else if($gen=='female')
$gen='f';
else
$gen='o';
$pattern='/^[a-zA-Z]+$/';
$alpha='/^[a-zA-Z0-9]+$/';
if(preg_match($pattern, $name) && preg_match($alpha, $num)){
session_start();
$_SESSION['num']=$num;
$obj=new User_details($name,$num,$gen,$dob,$add,$pin,$email);
$obj->insertUserData();
$obj2=new Credit_card_details($inc,$li,$ci,$ex,$ccu);
$obj2->insertCardDetails();
$obj3=new Personal_loan_details($plt,$plp,$pls,$ple);
$obj3->insertPersonalLoan();
$obj4=new Home_loan_details($hlt,$hlp,$hls,$hle);
$obj4->insertHomeLoan();
$obj5=new Emi($emi);
$obj5->insertEmi();
Score::calculateScore($li,$ccu,$ci,$plt,$plp,$hlt,$hlp,$inc,$emi);
$score=Score::getUserScore();
$user=User_details::getUserDetails();
//header('Location: ../view/Report.php');
require_once '../view/Report.php';
// $s=$score;
 //echo $s;
}

else
echo $logerror;
}

?>
