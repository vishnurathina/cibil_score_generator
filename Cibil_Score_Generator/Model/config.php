<?php
//get system date
  $created_date=date("y-m-d");
  $modified_date=date("y-m-d");

//query for data insert
 const insertuser="INSERT into user_details values(null,?,?,?,?,?,?,?,?,?)";
const insertcard="INSERT into credit_card_details values(null,?,?,?,?,?,?,?,?)";
const insertploan="INSERT into personal_loan_details values(null,?,?,?,?,?,?,?,?)";
const inserthloan="INSERT into home_loan_details values(null,?,?,?,?,?,?,?,?)";
const insertemi="INSERT into emi values(null,?,?,?,?,?)";
const insertscore="INSERT into credit_score values(null,?,?,?,?)";


//query for get id
const user_id="SELECT id from user_details where pan_num=?";
const details_id="SELECT id from credit_card_details where user_id=? order by id desc limit 1";


//database connection details
const local="localhost:3306";
const  dbuser="root";
const dbpass="aspire@123";
const db="cibil_score_generator";


//get user deatails
const user_details="SELECT user_name,pan_num,date_of_birth,gender,address,pincode,email_id from user_details where id=?";
const user_list="SELECT user_name,gender,email_id from user_details where created_date=?";

//get score of user
const userscore="SELECT score from credit_score where user_id=? order by id desc limit 1";
?>
