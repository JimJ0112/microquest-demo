<?php 
session_start();
    if(!isset($_SESSION["userEmail"])){
        header("location:LoginForm.php?msg=Please Login First");
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

    <title> Home - <?php echo $_SESSION["Useremail"]; ?> </title>
</head>
<body>
    <?php
        if(isset($_SESSION["userType"])){
            $usertype = $_SESSION["userType"];
            if($usertype === "Responder"){
                require("Includes/Responder_Navbar.inc.php");
            } else {
                header("location:User_Profile.php?msg= not a Responder");
            }
        }

             $_SESSION["userEmail"]."<br/>";
             $_SESSION["userName"]."<br/>";
             $_SESSION["userType"]."<br/>"; 
             $_SESSION["userStatus"]."<br/>";




    ?>

    <center>
    <div id="HomeContent"> 
        <div id="RequestBoard" class="HomeContent_Button"> Request Board</div>
        <div id="MyServices" class="HomeContent_Button"> My Services </div>
        <div id="ServiceRequests" class="HomeContent_Button"> Service Requests </div>
        <div id="RequestBoard" class="HomeContent_Button"> Other</div>
        <div id="MyServices" class="HomeContent_Button"> My Services </div>
        <div id="ServiceRequests" class="HomeContent_Button"> Service Requests </div>


    </div>
    </center>

</body>
</html>