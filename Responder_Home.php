<?php 
session_start();
    if(!isset($_SESSION["userEmail"])){
        header("location:LoginForm.php?msg=Please Login First");
    }

    if(isset($_SESSION["municipality"])){
      $municipality = $_SESSION["municipality"];

      echo"<script> sessionStorage.setItem('municipality','$municipality')</script>";
  }

  if(isset($_SESSION["userName"])){
    $userName = $_SESSION["userName"];

    echo"<script> sessionStorage.setItem('myUserName',' $userName ')</script>";
  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/80d3ebf6b6.js" crossorigin="anonymous"></script>


    <link rel="manifest" href="manifest.json">
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <meta content='yes' name='mobile-web-app-capable'/>

    <link rel="stylesheet" href="design.css">
    <title>Homepage - <?php echo $_SESSION["userEmail"]; ?> </title>
</head>

<body style="background-image: url('Images/p.jpg');">
    <!-- NAV -->
    <?php
        if(isset($_SESSION["userType"])){
            $usertype = $_SESSION["userType"];
            if($usertype === "Responder"){
                require("Includes/responderNav.inc.php");
            } else {
                header("location:User_Profile.php?msg= not a Responder");
            }
        }


    ?>
<br/>
    <center> <h1 id="RequestOrdersTitle"> Responder </h1> </center>


<center>

<div class="HomeContainer">
        


    <!-- ROW -->
    <div class="row">
      
      <a href="RequestBoard.php">
        <div class="column">
          <div class="HomeCard">
            <h3 class="h3"> REQUEST BOARD</h3>
         
            <p> Request board offers you different categories of jobs. </p>
           
          </div>
        </div>
      </a>
      
      <a href="MyServices.php">
        <div class="column">
          <div class="HomeCard">
            <h3 class="h3">MY SERVICES</h3>
          
            <p> These will contain your services offer!</p>
    
          </div>
        </div>
      </div>
      </a>
      
      <!-- ROW -->
      <a href="Requests-Orders.php">
      <div class="row">
        <div class="column">
          <div class="HomeCard">
            <h3 class="h3">ORDERS/REQUESTS</h3>
         
            <p> Tired of finding someone to hire you? Click me! I might contain a request from a client.</p>
           
          </div>
        </div>
      </a>


        <a href="CreateService.php">
            <div class="column">
                <div class="HomeCard">
                    <h3 class="h3">OFFER SERVICE</h3>
                    
                    <p>Do you want to create instant service? Press me.</p>

                </div>
            </div>
        </a>
      </div>

</div>
</center>

</body>
</html> 


