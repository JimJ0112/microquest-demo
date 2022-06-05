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
    <title>Homepage - <?php echo $_SESSION["userEmail"]; ?></title>
</head>

<body>
    <!-- NAV -->
    <?php
        if(isset($_SESSION["userType"])){
            $usertype = $_SESSION["userType"];
            if($usertype === "Requestor"){
                require("Includes/requestorNav.inc.php");
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
         
            <p> Request board offers you to create request and browse different categories.  </p>
          </div>
        </div>
      </a>
      
      <a href="AvailServices.php">
        <div class="column">
          <div class="HomeCard">
            <h3 class="h3">AVAILABLE SERVICES</h3>
           
            <p>This contains the available services that is offer.</p>
    
          </div>
        </div>
      </a>
    </div>
    

      <!-- ROW -->
      <div class="row">

        <div class="column">
          <div class="HomeCard">
            <h3 class="h3" >MY REQUESTS</h3>
            
            <p>This will view your requests and requests status.   </p>
    
          </div>
        </div>  
      
        <div class="column">
          <div class="HomeCard">
            <h3 class="h3">AVAILED SERVICES</h3>
      
            <p> This will view your availed services in <i>AVAILABLE SERVICES</i> </p>

          </div>
        </div>
      </div>

</div>
</center>

</body>
</html> 


