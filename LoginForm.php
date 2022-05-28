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



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/80d3ebf6b6.js" crossorigin="anonymous"></script>
    <title>Log In</title>


    <!-- other meta tags -->

    
    <link rel="manifest" href="manifest.json">
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <meta content='yes' name='mobile-web-app-capable'/>





    <style> 
.a{
    color: white;
    text-shadow: 2px 2px 4px #000000;
    font-family: Verdana, Geneva, Tahoma, sans-serif;            
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
.b , .ab{
    color: saddlebrown;
    text-shadow: 2px 2px 4px #000000;            
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    margin-top: 14px;
    margin-left: -10px;
}
.ab:hover{
    color: chocolate;
}
body{
    background-image: url("Images/p.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 40px, 30px;
    font-family: 'Courier New', Courier, monospace;
}
.card{
    margin-left: -100px;
    margin-top: 50px;
    float: left;
    width: 500px;
    height: 650px;
}
.container{
    margin-top: 20px;
    margin-right: 120px;
    float: right;
    width: 570px;
    height: 760px;
    border-radius: 10px;
    filter: drop-shadow(10px 5px 4px #72593feb);
   
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;    

    
    background-image: url("Images/formbg.png");
    background-repeat: no-repeat;
    background-position:inherit;
    background-size: 150% 120%;    
}
.form-content{
    height: 45%;
    width: 70%;
    color: white;
    position: relative;
    font-size: 20px;    
    color:white; 
}
img{   
filter: drop-shadow(10px 5px 4px #bd9976eb);
}
img:hover{
    filter: drop-shadow(10px 5px 4px #f9c794eb);
}
input[type=text], input[type=password], select {
  width: 100%;
  padding: 15px 20px;
  margin: 5px 0;
  font-size: 20px;
  display: inline-block;
  background-color: rgba(95, 158, 160, 0);
  border: 0px;
  border-bottom : 3px solid rgb(22, 11, 1);
  border-radius: 4px;
  box-sizing: border-box;
  color: #000;
  
}
input[type=text]:hover, input[type=password]:hover{    
    border-bottom: 3px solid rgb(138, 96, 56);
}
input[type=submit] {
  width: 100%;
  background-color: saddlebrown;
  color: white;
  padding: 14px 20px;
  margin: 40px 0;
  border: none;
  font-size: 20px;
  border-radius: 10px;
  cursor: pointer;
}
input[type=submit]:hover {
  background-color: chocolate;
}

label{
    font-size: 20px;
    color: rgb(63, 29, 3);
    font-weight: bold;
}
.left-container{
    color: white;
    font-size: 30px;
    text-align: center;
}
li{
    float: right;
    margin-top: 10px;
    margin-bottom: -15px;            
}        
li a{
    font-size: 22px;
    display: block;
    color:  rgb(255, 255, 255);
    text-align: center;
    padding: 16px 15px;
    text-decoration: none; 
}
li a:hover:not(.active) {
    color: rgb(230, 200, 178);
    font-style: italic;
}  
.p1{
    color: rgb(163, 98, 48) ;
    text-shadow: 2px 2px 4px #000000;
}      
ul{
    list-style: none;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
</style>
</head>
<body>
    
    <!-- NAV -->
    <?php
        if(!isset($_SESSION["Username"])){
            include_once "Includes/guestNav.inc.php";
        }
    ?>

    <!-- Container -->
 
    
    <div class="container">

        <div class="form-content">
            <br/>
            <br/>
            
            <h1 style="float: left; font-size: 40px; margin-right: 9px; margin-top: -100px;;" class="a">micro</h1>
            <h1  style="float: left; font-size: 45px; margin-right: 9px; margin-top: -105px; margin-left: 100px" class="ab"><i class="fa-solid fa-magnifying-glass"></i>uest</h1>
            
            <form action="Backend/LoginBackend.php" method="post" id="loginForm"> 
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="" required>
            
                <label for="pass">Password</label>
                <input type="password" id="pass" name="password"  placeholder="" required>
                <!-- to be implemented soon <a href="#" style="color:brown;"> <u> Forgot Password? </u> </a> <br/> -->
              
                <input type="submit" value="Log in">

                

                <p style="text-align: center; color: #000;"> Doesn't have an account? <a href="SignUp.php" style="text-decoration: none; color: saddlebrown;"> SIGN UP</a></p>
                

              </form>
        </div>

    </div>

    <div class="card">
        <img src="Images/ban.png" style="height: 280px; width: 500px; margin-top: 50px;"> 
        <div class="left-container"> 
            <h1> <i class="p1">REQUEST</i> OR <i class="p1">RESPOND</i></h1> 
            <p class ="p1"> QUEST CLICK AGREE</p>
        </div> 
        
    </div>
  

</body>
</html> 


