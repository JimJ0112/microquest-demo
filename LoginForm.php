<?php 
session_start();

    if(isset($_SESSION["userName"])){
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

    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<?php
    if(!isset($_SESSION["Username"])){
        include_once "Includes/Guest_Navbar.inc.php";
    }
?>


<br/> <br/><br/> <br/><br/> <br/>

    <form action="Backend/LoginBackend.php" method="post" id="loginForm"> 
    <br/> <br/><br/> <br/><br/> <br/>

        <input type="email" name="email" placeholder="email" id="emailTB" class="textbox" required/> <br/> <br/>
        <input type="password" name="password" placeholder="password" id="passwordTB" class="textbox" required/> <br/>
        
        <a href="#"> <u> Forgot Password? </u> </a> <br/>

        <br/><br/>
        <input type="submit" value="Log In" class="Button"/>

        <br/>
        <input type="button" value="Create Account" class="Button"/> <br/>
    </form>

    <br/><br/> <br/> 
    <hr/>
   

</body>
</html>