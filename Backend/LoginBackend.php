<?php
include '../Classes/DBHandler.php';
$DBHandler = new DBHandler();

$email =$_POST["email"];
$password = $_POST["password"];

$verify = $DBHandler->verifyuser($email,$password);

if($verify){
echo"welcome";
} else {
header("location: ../LoginForm.php?msg= Login Failed! Wrong Credentials");
}




