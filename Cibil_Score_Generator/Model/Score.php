<?php
require_once('Connect.php');
require_once('config.php');


//get db connection
$created_date=date("y-m-d");
$modified_date=date("y-m-d");

 class Score{

	public static function calculateScore($cl,$ccu,$ci,$plt,$plp,$hlt,$hlp,$inc,$emi){
   //score calculation

     $score=135;//credit repayment from salary account

     //check for new creditcard or not
     $ci=explode("-",$ci);
     $currentyear=date("y")+2000;
     if($ci[0]==$currentyear)
     	$score+=90;

     //credit utilization ratio
     $ratio=(($cl-$ccu)/$cl)*100;
      if($ratio>=50)
      	$score+=270;
      else if($ratio<=49 && $ratio >=30)
      	$score+=135;
      else if($ratio<=29 && $ratio>=11)
      	$score+=50;
      else
      	$score+=0;

      //mix of loan from same creditcard
      if($plt>0 && $hlt>0)
      	$score+=90;


      //repayment of loan and emi
      if(($hlt-$hlp)>($hlt/2))
      $score+=105;
      if(($plt-$plp)>($plt/2))
      $score+=105;
      if($emi<=($inc*0.3))
      $score+=105;

      //insert score to table
    $conn=Connect::getConnection();
    	GLOBAL $created_date;
    	GLOBAL $modified_date;
      $uid=User_details::getUserId();

      $stmt=$conn->prepare(insertscore);
      $stmt->bind_param("ssii",$created_date,$modified_date,$score,$uid);
      $stmt->execute();
      $stmt->close();
        mysqli_close($conn);

	}

public static function getUserScore(){
  $uid=User_details::getUserId();
  $conn=Connect::getConnection();
  $stmt=$conn->prepare(userscore);
  $stmt->bind_param("i",$uid);
  $stmt ->execute();
  $stmt -> bind_result($score);
  if($stmt->fetch())

  return $score;
}
}
//$o=Score::getUserScore(58);
//echo $o;
?>
