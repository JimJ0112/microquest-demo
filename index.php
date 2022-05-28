<?php 
session_start();

    if(isset($_SESSION["Useremail"])){
        header("location:User_Profile.php");
    }

    if(isset($_GET["msg"])){
        $msg = $_GET["msg"];

        echo "<script> alert('$msg')</script>";

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="manifest" href="manifest.json">
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <meta content='yes' name='mobile-web-app-capable'/>

    <title> microQuest - Home </title>
</head>
<body>
    <?php
    header("location:LoginForm.php");
    ?>
</body>
</html>