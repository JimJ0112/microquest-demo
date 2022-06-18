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

    <script src="Scripts/myServices.js"> </script>
    <title> My Services </title>
</head>

<body>

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

                header("location:Requestor_Home.php?msg=not a responder");
            }
            

        }

    ?>

    <?php
        if(isset($_SESSION['userID'])){
            $userID = $_SESSION['userID'];
            echo"<script> getMyServices($userID) </script>";
            echo"<script> sessionStorage.setItem('myID',$userID)</script>";
        }
    ?>


    <div id="updateFormBackground">
        <center>
        <div id="closeButton" onclick="closeForms()"> X </div>
            <br/> <br/> <br/> <br/> <br/> <br/>
            <form action="Backend/UpdateService.php" method="post" id="updateService"> 
                
                <br/> <br/>
                <input type="hidden" name="serviceID" id="serviceID"/>

                <label> Change Rate </label><br/><br/>
                <input type= "number" name="rate" id="rate" placeholder="Php 0.00"/> <br/><br/>
                <input type="submit"/>
            </form>
        </center>
    </div>


    <div id="activateDelistFormBackground">
        <center>
        <div id="closeButton" onclick="hideActivateDelist()" ><span style="color:red;"> X </span></div>
            <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> 
            <div id="activateDelistForm">
                
                <h3> Are you sure you want to continue with this change?</h3> 
                <input type="Button" value="Yes" id="activateDelistYes"/>
                <input type="Button" value="No" onclick="hideActivateDelist()"/>
            </div>
        
        </center>
    </div>

    <div id="certificateViewBackground">
        <center>
        <div id="closeButton" onclick="hideImageView()"> X </div>
            <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> 
           
                <image id="certificateView"/> 
           
        
        </center>
    </div>



    <br/><br/><br/>
    <center> <h1 id="RequestOrdersTitle"> Responder's Services </h1> </center>

     <div id="myServicesNav">
        <center>
            <div id="MyProducts">
            </div> 
        </center>
    </div>









  
    <div id="myServicesContent"> 

    </div>

   






</body>
</html>