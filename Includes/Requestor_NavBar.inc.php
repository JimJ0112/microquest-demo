
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Includes/navbarStyle.css">
</head>
<body>

<ul class="navbar">
    <li class="navitem"> <a href="Requestor_Home.php" class="navitem-content">Home </a> </li>
    <li class="navitem"> <a href="Messages.php" class="navitem-content">Messages </a> </li>
    <li class="navitem">
         <a href="User_Profile.php" class="navitem-content">
             <?php
             if(isset($_SESSION["userName"])){
                echo $_SESSION["userName"];

            } else {
                echo"User Profile";
            }
             
             ?>
        
         </a>
     </li>
    <li class="navitem"> <a href="Backend/Logout.php" class="navitem-content">LOG OUT</a> </li>
</ul>


<!-- Mobile responsive navbar -->

<ul class="mobile-navbar">

    <li id="hamburger-button" onclick="showmenu()">
        <div class="hamburger-buttonline"></div>
        <div class="hamburger-buttonline"></div>
        <div class="hamburger-buttonline"></div>
    </li>

    <div id="hamburger-menu">
        <li class="hamburger-item"> <a href="RequestBoard.php">REQUEST BOARD</a> </li>
        <li class="hamburger-item"> <a href="AboutUs.php">ABOUT US</a> </li>
        <li class="hamburger-item">
            <a href="User_Profile.php">
                <?php
                if(isset($_SESSION["Username"])){
                    echo $_SESSION["Username"];

                } else {
                    echo"User Profile";
                }
             
                ?>
        
            </a>
        </li>
        <li class="hamburger-item"> <a href="Backend/Logout.php">LOG OUT</a> </li>
    <div>
</ul>

<script src="Scripts/Hamburger-navbar.js"> </script>
</body>
</html>