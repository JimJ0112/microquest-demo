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

    <script src="Scripts/getServicesScript.js"> </script>
    <title> Avail Service </title>
</head>
<body onload="getServices()">

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

    ?>

<br/><br/><br/>
    <center> <h1 id="RequestOrdersTitle"> Available Services </h1> </center>
<br/><br/><br/>


<center>
    <br/>
        <div>
            <form method="GET" action="Backend/Get_products.php"> 
                Search <input type="Search" name="q">
            </form>
        <div>
    <br/>
</center>
    
<!--
    <div id="AvailServiceNav"> 

         <div class="AvailServiceNav_Button" onclick="getPositions('Home Service')"> Home Services </div> 
         <div class="AvailServiceNav_Button" onclick="getProducts()"> Pasabuy </div>
         <div class="AvailServiceNav_Button" onclick="getPositions('Computer related work')"> Computer Related</div>
         <div class="AvailServiceNav_Button" onclick="getOtherPositions()"> Other </div>
        

    </div>
-->
    <br/>
    <h3 id="selectedCategory"> What service do you need? </h3>


<div id="AvailServiceNav"> 

<div class="serviceCard-main" onclick="selectCategory('Home Service')">

<image src="Images/RequestBanners/HomeServices.jpg" class="bannerImage"> <br/>
        <center> <div class="categoryTitle"> Home Services </div> </center>
</div> 
<div class="serviceCard-main" onclick="selectCategory('Pasabuy')">
<image src="Images/RequestBanners/pasabuy.jpg" class="bannerImage"> 
    <center> <div class="categoryTitle"> Pasabuy </div> </center> 
</div>
<div class="serviceCard-main" onclick="selectCategory('Computer related work')">
<image src="Images/RequestBanners/ComputerRelated.jpeg" class="bannerImage"> <br/>
    <center> <div class="categoryTitle"> Computer Related </div> </center> 
</div>

</div>


<h4> Other Services </h4>

    <div id="AvailServiceContent">
        
    </div>

    








</body>
</html>