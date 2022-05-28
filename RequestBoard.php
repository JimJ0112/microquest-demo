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

    <title> Request Board </title>
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

    ?>


<center>
<h2> Request Board </h2>
    <?php
            if(isset($_SESSION["userType"])){
                $usertype = $_SESSION["userType"];
                 if($usertype === "Requestor"){
                    echo" <a href='RequestBoardCategories.php'> <div class='createRequestButton'> Create a Request </div> <a/>";
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
    <div class="serviceCard-main" onclick="createRequest('Home Service')"> Home Services </div> 
    <div class="serviceCard-main" onclick="createRequest('Pasabuy')"> Pasabuy </div>
    <div class="serviceCard-main" onclick="createRequest('Computer related work')"> Computer Related</div>
    <div class="serviceCard-main" onclick="createRequest('Other')"> Other</div>
</div>

</center>



<div id="RequestsContainer">
        
</div>

</body>
</html>