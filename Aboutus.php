<?php 
session_start();
    if(!isset($_SESSION["Useremail"])){
        require("Includes/Guest_Navbar.inc.php");
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

    <title> microQuest - About Us </title>
</head>
<body>
    
    <?php
    
   
            if(isset($_SESSION["usertype"]) == "Responder"){
                require("Includes/Responder_Navbar.inc.php");
            }else if(isset($_SESSION["usertype"]) == "Requestor"){
                require("Includes/Requestor_Navbar.inc.php");
            }

    ?>
</body>
</html>