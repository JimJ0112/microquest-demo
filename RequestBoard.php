<?php 
session_start();
    if(!isset($_SESSION["Useremail"])){
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
        if(isset($_SESSION["usertype"])){
            $usertype = $_SESSION["usertype"];
            if($usertype === "Responder"){
                require("Includes/Responder_Navbar.inc.php");
            }else if($usertype === "Requestor"){
                require("Includes/Requestor_Navbar.inc.php");
            }
        }

            echo $_SESSION["Useremail"]."<br/>";
            echo $_SESSION["usertype"]."<br/>"; 
            echo $_SESSION["userstatus"]."<br/>";
            echo $_SESSION["approvalstatus"]."<br/>";



    ?>

</body>
</html>