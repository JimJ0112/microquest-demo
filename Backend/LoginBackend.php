<?php
session_start();
include '../Classes/DBHandler.php';
$DBHandler = new DBHandler();

$email =$_POST["email"];
$password = $_POST["password"];

$verify = $DBHandler->verifyuser($email,$password);

if($verify){
    $userID = $DBHandler ->getData("userprofile","userEmail",$email,"UserID");
    $useremail = $DBHandler ->getData("userprofile","userEmail",$email,"userEmail");
    $usertype = $DBHandler ->getData("userprofile","userEmail",$email,"userType");
    $approvalstatus = $DBHandler ->getData("userprofile","userEmail",$email,"userStatus");
    $username = $DBHandler-> getData("userprofile","userEmail",$email,"userName");
    

    //$DBHandler-> updateColumn("userprofile","userStatus","online","userEmail",$email);
    //$userstatus = $DBHandler ->getData("userprofile","userEmail",$email,"userStatus");

    echo $useremail."<br>";
    echo $userstatus."<br>";
    echo $usertype."<br>";
    $_SESSION['userID'] = $userID;
    $_SESSION["userEmail"] = $useremail;
    $_SESSION['userName'] = $username;
    $_SESSION["userType"] = $usertype;
    $_SESSION["userStatus"] = $userstatus;
    $_SESSION["municipality"]
    $_SESSION["baranggay"]

    //$_SESSION["approvalstatus"] = $approvalstatus;
    header("location: ../User_Profile.php");

} else {
header("location: ../LoginForm.php?msg= Login Failed!");
}




