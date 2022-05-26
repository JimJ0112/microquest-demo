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

    <script src="Scripts/selectService.js"> </script>
    <title> Avail Service </title>
</head>
<body onload="setSelectedCategory()">
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



<center>
<h2 id="selectedCategory">  </h2>
    <br/>

            <form method="GET" action="Backend/Get_products.php"> 
                Search <input type="Search" name="q">
            </form>

    <br/>
</center>
    

    <br/>
    <h3> What service do you need? </h3>

    <div id="AvailServiceContent">
        
    </div>

    <div id="Responders">

            
                Search for Responder <input type="Search" name="q">
                <input type="text" name="myLocation">


        <div id="RespondersContent">
        </div> 

    </div>








    <center>
    <div id="AvailServiceForm"> 
        
        <form>
            <table>

                <tr>
                <td> <input type="text" name="category" id="Category"> </td>
                </tr>

                <tr>
                <input type="text" name="position" id="Position"> </td>
                </tr>

                <tr>
                <td> <input type="text" name="responderID" id="responderID"> </td>
                </tr>

                <tr>
                <td> <input type="text" name="servicePrice" id="servicePrice"> </td>
                </tr>

                <tr>
                <td> <input type = "datetime-local" name="dueDate"> </td>
                </tr>

                <tr>
                    <td>
                        <textarea name="additionalNotes">
                        </textarea> 
                    </td>
                </tr>

            </table>

        </form>


    </div>
    </center>








</body>
</html>