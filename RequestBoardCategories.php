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

    <script src="Scripts/createRequest.js"> </script>
    <title> Create Request </title>
</head>
<body onload="getServices()">
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
<h2> Create Request </h2>
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
    <h3 id="selectedCategory"> What kind of service will you request? </h3>


<div id="requestBoardNav"> 

<div class="serviceCard-main" onclick="selectCategory('Home Service')"> Home Services </div> 
<div class="serviceCard-main" onclick="selectCategory('Pasabuy')"> Pasabuy </div>
<div class="serviceCard-main" onclick="selectCategory('Computer related work')"> Computer Related</div>
<div class="serviceCard-main" onclick="selectCategory('Computer related work')"> Other </div>

</div>


<h4> Other Categories </h4>

    <div id="requestCategories">
        
    </div>

    








</body>
</html>