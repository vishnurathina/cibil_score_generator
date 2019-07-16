<?php
require_once'Connect.php';
require_once'config.php';
class Emi{
  public function __construct($emi){
    $this->emi=$emi;
  }
  public function insertEmi(){
    $uid=User_details::getUserId();
    $did=Credit_card_details::getDetailsId();
    $conn=Connect::getConnection();
  	GLOBAL $created_date;
  	GLOBAL $modified_date;
    $stmt=$conn->prepare(insertemi);
    $stmt->bind_param("ssiii",$created_date,$modified_date,$this->emi,$uid,$did);
    $stmt->execute();
    $stmt->close();
    mysqli_close($conn);
  }
}
 ?>
