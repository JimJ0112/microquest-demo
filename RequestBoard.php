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
<body onload="<?php
       if(isset($_SESSION['specialization'])){

            $specialization = $_SESSION['specialization'];
            echo 'setCategory(\''.$specialization.'\')';
        } else{
            echo 'getRequests()';
        }
    
    ?>">

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
                echo "<div class='requestCat-main' onclick= setCategory('$specialization')> Specialization </div>";
                
            }
        }
        $municipality = $_SESSION["municipality"];
    ?>

  


    <div class="requestCat-main" onclick="getRequests()"> 
    <image src="Images/RequestBanners/AllRequest.jpg" class="bannerImage"> 
    <center> All requests </center> 
    </div>

    <?php if($_SESSION['userType']==="Responder"){

        echo "<div class='requestCat-main' onclick=getNearestRequest('$municipality')>
                <image src='Images/RequestBanners/Nearest.jpg' class='bannerImage'> <br/>
                <center> <div class='categoryTitle'>  Nearest Requests </div> </center> 
              </div>";
    }
    ?>
    <div class="requestCat-main" onclick="setCategory('Home Service')"> 
        <image src="Images/RequestBanners/HomeServices.jpg" class="bannerImage"> <br/>
        <center> <div class="categoryTitle"> Home Services </div> </center> 
    </div> 

    <div class="requestCat-main" onclick="setCategory('Pasabuy')">
        <image src="Images/RequestBanners/pasabuy.jpg" class="bannerImage"> 
        <center> <div class="categoryTitle"> Pasabuy </div> </center> 
    </div>

    <div class="requestCat-main" onclick="setCategory('Computer related work')"> 
    <image src="Images/RequestBanners/ComputerRelated.jpeg" class="bannerImage"> <br/>
    <center> <div class="categoryTitle"> Computer Related </div> </center> 
    </div>


    <div class="requestCat-main" onclick="getRequests()"> 
        <image src="Images/RequestBanners/others.jpg" class="bannerImage"> <br/>
        <center> <div class="categoryTitle"> Other </div> </center> 
    </div>
</div>

</center>



<div id="RequestsContainer">
        
</div>



</body>
</html>