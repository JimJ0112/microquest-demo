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

    <script src="Scripts/Requests-Orders.js"> </script>
    <title> My Services </title>
</head>

<body>

    <?php
        if(isset($_SESSION["userType"])){
            $usertype = $_SESSION["userType"];

            if($usertype === "Responder"){
                require("Includes/responderNav.inc.php");
            }else if($usertype === "Requestor"){
                header("location:Requestor_Home.php?Msg= Not a Responder");
            }
        }
    ?>

    <?php
        if(isset($_SESSION['userID'])){
            $userID = $_SESSION['userID'];
            echo"<script> getRequestApplications($userID); </script>";
            echo"<script> sessionStorage.setItem('myID',$userID)</script>";
        }
    ?>



<br/> <br/>
<center> <h1 id="RequestOrdersTitle"> Responder's Transactions</h1> </center>
<br/> <br/>

     <div id="orderRequestsNav">
        <center>
            <div class="orderRequestsButton" onclick='<?php echo"getRequestApplications($userID)"?>'>
                 Applied Requests
            </div> 

            <div class="orderRequestsButton" onclick='<?php echo"getAcceptedRequestApplications($userID)"?>'>
                 Accepted Requests
            </div> 

            <div class="orderRequestsButton" onclick='<?php echo"getCompletedRequests($userID)"?>'>
                 Completed Requests
            </div> 

            <div class="orderRequestsButton" onclick='<?php echo"getCancelledRequests($userID)"?>'>
                 Cancelled Requests
            </div> 


            <div class="orderRequestsButton" onclick='<?php echo"getServiceOrders($userID)"?>'>
                 Services
            </div> 



            <div class="orderRequestsButton" onclick='<?php echo"getAcceptedServices($userID)"?>'>
                 Accepted Services
            </div> 

            <div class="orderRequestsButton" onclick='<?php echo"getCompletedService($userID)"?>'>
                 Completed Services
            </div> 

            <div class="orderRequestsButton" onclick='<?php echo"getCancelledServices($userID)"?>'>
                 Cancelled Services
            </div>

        </center>
    </div>









    <br/> <br/>
    <center>
    <Table> 

        <tbody id="requestsOrdersContent">

        </tbody>

    </table>

    </center>

   






</body>
</html>