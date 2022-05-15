<?php
include "../Classes/DBHandler.php";

$DBHandler = new DBHandler();



$usertype = $_POST["usertype"];
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$mdlname = $_POST["middlename"];
$email =$_POST["email"];
$password = $_POST["password"];
$occupation = $_POST["occupation"];
$address = $_POST["address"];
$birthdate = $_POST["Birthdate"];

$idcard= file_get_contents($_FILES["idcard"]["tmp_name"]);
$signature = file_get_contents($_FILES["signature"]["tmp_name"]);
$snapshot = file_get_contents($_FILES["snapshot"]["tmp_name"]);

if($DBHandler-> registerUser($fname,$usertype,$lname,$mdlname,$email,$password,$idcard,$signature,$snapshot,$birthdate,$occupation,$address)){
    echo"Success";
    header("location: ../LoginForm.php?msg=Registration Success!");

} else {
    echo"Failed";
    header("location: ../LoginForm.php?msg=Registration Failed!");
}