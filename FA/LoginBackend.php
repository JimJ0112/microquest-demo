<?php
session_start();
include '../Classes/DBHandler.php';
$DBHandler = new DBHandler();

$email =$_POST["email"];
$password = $_POST["password"];

$verify = $DBHandler->verifyadmin($email,$password);

if($verify){

    //$tablename,$column,$condition,$name

    $adminUsername = $DBHandler ->getData("admins","adminEmail",$email,"adminUsername");
    $adminType = $DBHandler ->getData("admins","adminEmail",$email,"admintype");
    echo $adminUsername;
    echo $adminType;

    $_SESSION["adminname"] = $adminUsername;
    $_SESSION["admintype"] = $adminType;
    
    if($adminType === "Superadmin"){
        header("location: SuperAdminDashboard.php");
    } else if($adminType === "admin"){
        header("location: AdminDashboard.php");
    }

} else {
//header("location: ../LoginForm.php?msg= Login Failed!");
echo "Login failed";
}




