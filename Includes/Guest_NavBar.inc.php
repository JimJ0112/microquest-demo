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
    <li class="navitem"> <a href="index.php" class="navitem-content">HOME</a> </li>
    <li class="navitem"> <a href="Aboutus.php" class="navitem-content">ABOUT US</a> </li>
    <li class="navitem"> <a href="LoginForm.php" class="navitem-content">LOGIN</a> </li>

    </ul>    


<!-- Mobile responsive navbar -->
    <ul class="mobile-navbar"> 

    <li id="hamburger-button" onclick="showmenu()">
        <div class="hamburger-buttonline"></div>
        <div class="hamburger-buttonline"></div>
        <div class="hamburger-buttonline"></div>
    </li>

    
    <div id="hamburger-menu">
        <p> </p>
        <ul>
            <li class="hamburger-item"> <a href="index.php">HOME</a> </li>
            <li class="hamburger-item"> <a href="Aboutus.php">ABOUT US</a> </li>
            <li class="hamburger-item"> <a href="LoginForm.php">LOGIN</a> </li>
        </ul>
    <div>
    
    </ul>  


    <script src="Scripts/Hamburger-navbar.js"> </script>

</body>
</html>