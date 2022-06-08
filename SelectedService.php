<?php 
session_start();
    if(!isset($_SESSION["userEmail"])){
        header("location:LoginForm.php?msg=Please Login First");
    }

    if(isset($_SESSION["municipality"])){
        $municipality = $_SESSION["municipality"];

        echo"<script> sessionStorage.setItem('municipality','$municipality')</script>";
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
    <div id="AvailServiceFormContainer"> 
    <div id="closeButton" onclick="closeForms()"> X </div><br/> <br/> <br/>
     <div id="AvailServiceForm"> 
        
        <form>
            <table>

                <tr>
                <td> <input type="text" name="category" id="Category" readonly> </td>
                </tr>

                <tr>
                <input type="text" name="position" id="Position" readonly> </td>
                </tr>

                <tr>
                <td> <input type="text" name="responderID" id="responderID" readonly> </td>
                </tr>

                <tr>
                <td> <input type="text" name="servicePrice" id="servicePrice" readonly> </td>
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

            <input type="submit">

        </form>


     </div>
    </div>
    </center>


<center>
<h2 id="selectedCategory">  </h2>
    <br/>

            <form method="GET"> 
                Search <input type="Search" name="q">
            </form>

    <br/>
</center>
    

    <br/>
    <h3> What service do you need? </h3>

    <div id="AvailServiceContent">
        
    </div>


    <center>
    <div id="Responders">

                <table>
                <tr>
                    <td>Search for Responder </td>
                    <td><input type="Search" name="q"></td>
                </tr>
                <tr>
                    <td>My Location </td>
                    <td><input type="text" name="myLocation" id="myLocation"> </td>
                </tr>
                </table>

        <h5> Nearest Responders </h5>
        <div id="SuggestedResponders">
        </div> 

        <h5> Other available responders </h5>
        <div id="AllResponders">
            
        </div> 

    </div>
    </center>









    








</body>
</html>