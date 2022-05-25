<?php 
session_start();

    if(isset($_SESSION["Username"])){
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

    <link rel="manifest" href="manifest.json">
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <meta content='yes' name='mobile-web-app-capable'/>
    <title>Login</title>
</head>
<body>


<center>
<br/> <br/><br/> <br/><br/> <br/>   
    <form action="LoginBackend.php" method="post"> 

        <input type="email" name="email" placeholder="email"  required/> <br/> <br/>
        <input type="password" name="password" placeholder="password"  required/> <br/><br/>
        <input type="submit" value="Log In"/>
    </form>


</center>    
</body>
</html>