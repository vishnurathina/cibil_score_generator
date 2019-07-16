<?php
require_once('Connect.php');
require_once('config.php');

$conn=Connect::getConnection();//get db connection
$created_date=date("y-m-d");
$modified_date=date("y-m-d");


  //table creation
  function createTables(){
  $user="CREATE table user_details(id int auto_increment,pan_num varchar(10) unique,user_name varchar(50),date_of_birth date,gender char,address varchar(80),pincode int,email_id varchar(60),created_date date,modified_date date,primary key(id))ENGINE = Innodb";
  $card="CREATE table credit_card_details(id int auto_increment,income int,credit_limit int,credit_utilize int,credit_issued date,credit_valid date,created_date date,modified_date date,user_id int,primary key(id),foreign key(user_id) references user_details(id))ENGINE = Innodb";
  $personal="CREATE table personal_loan_details(id int auto_increment,created_date date,modified_date date,personal_loan_total int,personal_loan_paid int,personal_loan_start date,personal_loan_end date,details_id int,user_id int,foreign key(details_id) references credit_card_details(id),foreign key(user_id) references user_details(id),primary key(id)) ENGINE = Innodb";

  $home="CREATE table home_loan_details(id int auto_increment,created_date date,modified_date date,home_loan_total int,home_loan_paid int,home_loan_start date,home_loan_end date,details_id int,user_id int,foreign key(details_id) references credit_card_details(id),foreign key(user_id) references user_details(id),primary key(id)) ENGINE = Innodb";

  $score="CREATE table credit_score(id int auto_increment,created_date date,modified_date date,score int,user_id int,foreign key(user_id)references user_details(id),primary key(id))ENGINE= Innodb";

  $emi="CREATE table emi(id int auto_increment,created_date date,modified_date date,amount int,user_id int,foreign key(user_id)references user_details(id),primary key(id),details_id int,foreign key(details_id)references credit_card_details(id))ENGINE= Innodb";
  /*GLOBAL $conn;
  if(mysqli_query($conn, $emi))
  	echo 'success';
  else
  	echo (mysqli_error($conn));*/
  }






?>
