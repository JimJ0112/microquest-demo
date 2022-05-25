<?php
include "../Classes/DBHandler.php";

$DBHandler = new DBHandler();


$email = $_POST["adminemail"];
$exists = $DBHandler->exists("admins","adminEmail",$email);

if($exists){
    header("location: index.php?msg=User $email already exists!");
} else {


    $adminusername = $_POST["adminusername"];
    $adminpassword = $_POST["adminpassword"];
    $admintype = $_POST["admintype"];
 

        if($DBHandler-> registerAdmin($adminusername,$email,$adminpassword,$admintype)){
            echo"Success";
          

        } else {
            echo "failed";
        }
    
}