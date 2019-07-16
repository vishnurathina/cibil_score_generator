<?php
require_once 'Connect.php';
require_once 'config.php';
class User_details{


  public function __construct($name,$num,$gen,$dob,$add,$pin,$email){
    $this->name=$name;
    $this->num=$num;
    $this->gen=$gen;
    $this->dob=$dob;
    $this->add=$add;
    $this->pin=$pin;
    $this->email=$email;
  }
  public function insertUserData(){
      $conn=Connect::getConnection();
GLOBAL $created_date;
GLOBAL $modified_date;

      $stmt=$conn->prepare(insertuser);
       $stmt->bind_param("sssssisss",$this->num,$this->name,$this->dob,$this->gen,$this->add,$this->pin,$this->email,$created_date,$modified_date);
       $stmt->execute();
       $stmt->close();
       mysqli_close($conn);

  }
public static function getUserId(){
  $num=$_SESSION['num'];
  $conn=Connect::getConnection();
  //get userid
  $stmt=$conn->prepare(user_id);
  $stmt->bind_param("s",$num);
  $stmt ->execute();
  $stmt -> bind_result($uid);
  if($stmt->fetch()){
  	 $id=$uid;
  }
  $stmt->close();
  mysqli_close($conn);
  return $id;
}
public static function getUserDetails(){
  $id=self::getUserId();
  $conn=Connect::getConnection();
  //get details of user
  $stmt=$conn->prepare(user_details);
  $stmt->bind_param("i",$id);
  $stmt ->execute();
  $stmt -> bind_result($usname,$pan,$dob,$gender,$address,$pincode,$emailid);


  if($stmt->fetch()){
    if($gender=="f")
      $gender='Female';
      else if($gender=="m")
      $gender='Male';
      else
        $gender='Other';
        $user=array("Name"=>$usname,"PAN"=>$pan,"DOB"=>$dob,"Gender"=>$gender,"Address"=>$address,"Pincode"=>$pincode,"Email"=>$emailid);
  }
mysqli_close($conn);
return $user;
}

public static function getUserList($date){
  $conn=Connect::getConnection();
  $stmt=$conn->prepare(user_list);
  $stmt->bind_param("s",$date);
  $stmt ->execute();
  $stmt -> bind_result($usname,$gender,$emailid);
  if($stmt->fetch()){


   while($stmt->fetch()){
      $user=array("Name"=>$usname,"Gender"=>$gender,"Email"=>$emailid);

    }

  //return $list;
  }

  else {
    echo no_list;
  }


}

}
 ?>
