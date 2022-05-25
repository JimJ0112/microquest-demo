<?php
session_start();


if(!isset($_SESSION["adminname"]) && !isset($_SESSION["admintype"])){

    header("location:index.php?msg= Please Login First!");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard </title>
    <script src="adminscripts.js"> </script>
</head>
<body onload="createElements(15)">
<ul> 
<li> <a href="Logout.php"> Log Out </a>  </li>
 
</ul>

<ul> 
 <li> Users </li>
 <li> Requests </li>
 <li> Services </li>
 <li> Reports </li>
    
</ul>

<div id="dashboardcontents">

<table id="dashboardtable">
    
</table>
    

</div>

    
</body>
</html>