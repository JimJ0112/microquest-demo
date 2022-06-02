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
    <script src="Scripts/getUser.js"> </script>

    <title> Profile -  </title>
</head>
<body>
    <?php
        if(isset($_GET['userID']) && isset($_GET['userType'])){

            $userID = $_GET['userID'];
            $userType = $_GET['userType'];

            echo "<script> getUser($userID,'$userType') </script>";
        }
    ?>

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


<div id="publicProfileContent">

            <div id="profilePic">
            </div>
            <div id="userPrimaryDetails"> 
             <b> Username: </b>   <p id="userName"> Username</p> <br/><br/>
             <b> Email: </b>   <p id="userEmail"> Email </p><br/><br/>
             <p id="userType"> User Type </p><br/><br/>

            </div>

            
            <div id="userOtherDetails"> 
            <h3>Other personal details</h3>
            <b> Name: </b>    <p id="fullName"> Username</p> <br/><br/>
            <b> Birth Date: </b>    <p id="Birth date"> Jan - 01 - 2001 </p><br/><br/>
            <b> Address: </b>    <p id="Address"> Abucay </p><br/><br/>
            <b> Education: </b>    <p id="Education"> College </p><br/><br/>
            </div>

            
            <div id="userReferenceDetails"> 
            <h3>Reference details</h3>
            <b>Government provided ID: </b>   <p id="userGovID"> Philhealth </p><br/><br/>
            <div id="userGovIDFile"> </div><br/><br/>
            <b>ID Number: </b>   <p id="userGovIDNumber"> 111222</p><br/><br/>
            </div>

            
            <div id="userServicesDetails"> 
            <h3>Services details</h3>

            </div>

<div>
</body>
</html>