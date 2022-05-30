<?php 
session_start();
    if(!isset($_SESSION["userEmail"])){
        header("location:LoginForm.php?msg=Please Login First");
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

<body>
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

<center>
<div class="HomeContainer">
        
    <!-- ROW -->
    <div class="row">
      
      <a href="RequestBoard.php">
        <div class="column">
          <div class="HomeCard">
            <h3 class="h3"> REQUEST BOARD</h3>
            <p> Hello <i> <?php echo $_SESSION['userName']?>  !</i></p>
            <p> Request board offers you different categories of jobs. </p>
           
          </div>
        </div>
      </a>
      
        <div class="column">
          <div class="HomeCard">
            <h3 class="h3">MY SERVICES</h3>
            <p> Hello <i> <?php echo $_SESSION['userName']?> !</i>  </p>
            <p> These will contain your services offer!</p>
    
          </div>
        </div>
      </div>
      
      <!-- ROW -->
      <div class="row">
        <div class="column">
          <div class="HomeCard">
            <h3 class="h3">REQUEST</h3>
            <p> Hello <i> <?php echo $_SESSION['userName']?> !</i> </p>
            <p> Tired of finding someone to hire you? Click me! I might contain a request from a client.</p>
           
          </div>
        </div>
      
        <a href="CreateService.php">
            <div class="column">
                <div class="HomeCard">
                    <h3 class="h3">OFFER SERVICE</h3>
                    <p> Hi   <i><?php echo $_SESSION['userName']?> !</i> </p>  
                    <p>Do you want to create instant service? Press me.</p>

                </div>
            </div>
        </a>
      </div>

</div>
</center>

</body>
</html> 


