<?php
require_once'Connect.php';
require_once'config.php';

class Home_loan_details{
  public function __construct($hlt,$hlp,$hls,$hle){
    $this->hlt=$hlt;
    $this->hlp=$hlp;
    $this->hls=$hls;
    $this->hle=$hle;
  }

  public function insertHomeLoan(){
    $conn=Connect::getConnection();
    $uid=User_details::getUserId();
    $did=Credit_card_details::getDetailsId();
  	GLOBAL $created_date;
  	GLOBAL $modified_date;
    $stmt=$conn->prepare(inserthloan);
    $stmt->bind_param("ssiissii",$created_date,$modified_date,$this->hlt,$this->hlp,$this->hls,$this->hle,$did,$uid);
    $stmt->execute();
    $stmt->close();
    mysqli_close($conn);

  }
}
?>
