<?php 
session_start();
    if(!isset($_SESSION["userEmail"])){
        header("location:LoginForm.php?msg=Please Login First");
    }

    if(isset($_SESSION["municipality"])){
        $municipality = $_SESSION["municipality"];

        echo"<script> sessionStorage.setItem('municipality','$municipality')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="manifest" href="manifest.json">
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <meta content='yes' name='mobile-web-app-capable'/>
    
    <link rel="stylesheet" href="style.css">

    <title> Profile - <?php echo $_SESSION["userEmail"]; ?> </title>
</head>
<body>
    <?php
        if(isset($_SESSION["userType"])){
            $usertype = $_SESSION["userType"];

            /*
            if($usertype === "Responder"){
                require("Includes/Responder_Navbar.inc.php");
            }else if($usertype === "Requestor"){
                require("Includes/Requestor_Navbar.inc.php");
            }
            */

            
            if($usertype === "Responder"){

                require("Includes/responderNav.inc.php");
            }else if($usertype === "Requestor"){

                require("Includes/requestorNav.inc.php");
            }
            

        }

            echo $_SESSION["userEmail"]."<br/>";
            echo $_SESSION["userName"]."<br/>";
            echo $_SESSION["userType"]."<br/>"; 
            echo $_SESSION["municipality"]."<br/>";




    ?>

</body>
</html>