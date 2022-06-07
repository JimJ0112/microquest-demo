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
    <script src="Scripts/requestBoard.js"> </script>

    <title> Request Board </title>
</head>
<body onload= 
    <?php
       if(isset($_SESSION['specialization'])){

            $specialization = $_SESSION['specialization'];
            echo "setCategory('$specialization')";

        } else{
            echo "getRequests()";
        }
    
    ?>
>

<!-- end of body -->
    <?php
        if(isset($_SESSION["userType"])){
            $usertype = $_SESSION["userType"];
            if($usertype === "Responder"){
                require("Includes/Responder_Navbar.inc.php");
            }else if($usertype === "Requestor"){
                require("Includes/Requestor_Navbar.inc.php");
            }
        }

    ?>


<center>
<h2> Request Board </h2>
    <?php
            if(isset($_SESSION["userType"])){
                $usertype = $_SESSION["userType"];
                 if($usertype === "Requestor"){
                    echo" <a href='CreateRequest.php'> <div class='createRequestButton'> Create a Request </div> <a/>";
                }
            }

    ?>


    <br/><br/><br/>
        <div>
            <form method="GET" action="Backend/Get_products.php"> 
                Search <input type="Search" name="q">
            </form>
        <div>
    <br/>


<div id="requestBoardNav"> 
    <?php
       if(isset($_SESSION['userType']) && isset($_SESSION['specialization'])){
            $usertype = $_SESSION['userType'];
            if($usertype === "Responder"){
                $specialization = $_SESSION['specialization'];
                echo "<div class='serviceCard-main' onclick= setCategory('$specialization')> Based on your specialization </div>";
                
            }
        }
    
    ?>




    <div class="serviceCard-main" onclick="getRequests()"> All requests </div>
    <div class="serviceCard-main" onclick="setCategory('Home Service')"> Home Services </div> 
    <div class="serviceCard-main" onclick="setCategory('Pasabuy')"> Pasabuy </div>
    <div class="serviceCard-main" onclick="setCategory('Computer related work')"> Computer Related</div>
    <div class="serviceCard-main" onclick="getRequests()"> Other</div>
</div>

</center>



<div id="RequestsContainer">
        
</div>



</body>
</html>