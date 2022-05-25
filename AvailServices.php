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

    <script src="Scripts/getServicesScript.js"> </script>
    <title> Avail Service </title>
</head>
<body>
    <?php
        if(isset($_SESSION["userType"])){
            $usertype = $_SESSION["userType"];
            if($usertype === "Responder"){
                require("Includes/Responder_Navbar.inc.php");
            }else if($usertype === "Requestor"){
                require("Includes/Requestor_Navbar.inc.php");
            }
        }

            echo $_SESSION["userEmail"]."<br/>";
            echo $_SESSION["userType"]."<br/>"; 
            echo $_SESSION["userStatus"]."<br/>";
      



    ?>

    <center>
    <div id="AvailServiceContent"> 

         <div class="AvailServiceContent_Button" onclick="getPositions('Home Service')"> Home Services </div> 
         <div class="AvailServiceContent_Button" onclick=""> Pasabuy </div>
         <div class="AvailServiceContent_Button" onclick="getPositions('Computer related work')"> Computer Related</div>
         <div class="AvailServiceContent_Button" onclick="getOtherPositions()"> Other </div>
        


    </div>
    </center>





</body>
</html>