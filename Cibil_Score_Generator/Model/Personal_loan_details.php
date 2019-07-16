<?php
require_once'Connect.php';
require_once'config.php';

class Personal_loan_details{
  public function __construct($plt,$plp,$pls,$ple){
    $this->plt=$plt;
    $this->plp=$plp;
    $this->pls=$pls;
    $this->ple=$ple;
  }
  public function insertPersonalLoan(){
    $conn=Connect::getConnection();
    $uid=User_details::getUserId();
    $did=Credit_card_details::getDetailsId();
    	GLOBAL $created_date;
    	GLOBAL $modified_date;
      $stmt=$conn->prepare(insertploan);
      $stmt->bind_param("ssiissii",$created_date,$modified_date,$this->plt,$this->plp,$this->pls,$this->ple,$did,$uid);
      $stmt->execute();
      $stmt->close();
      mysqli_close($conn);
  }
}
 ?>
