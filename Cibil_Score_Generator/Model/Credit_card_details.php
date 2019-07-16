<?php
require_once'Connect.php';
require_once'config.php';
class Credit_card_details{
  public function __construct($inc,$li,$ci,$ex,$ccu){
    $this->inc=$inc;
    $this->li=$li;
    $this->ci=$ci;
    $this->ex=$ex;
    $this->ccu=$ccu;

  }
  public function insertCardDetails(){
    $conn=Connect::getConnection();
    $uid=User_details::getUserId();
    	GLOBAL $created_date;
    	GLOBAL $modified_date;

       //insert card details
      $stmt=$conn->prepare(insertcard);
      $stmt->bind_param("iiissssi",$this->inc,$this->li,$this->ccu,$this->ci,$this->ex,$created_date,$modified_date,$uid);
      $stmt->execute();
      mysqli_close($conn);
  }
  public static function getDetailsId(){
    $uid=User_details::getUserId();
    $conn=Connect::getConnection();
    $stmt=$conn->prepare(details_id);
    $stmt->bind_param("i",$uid);
    $stmt->execute();
    $stmt -> bind_result($ude);
    if($stmt->fetch()){
    	$de=$ude;
    }
    $stmt->close();
    mysqli_close($conn);
  //  echo $de;
    return $de;
  }
}
 ?>
