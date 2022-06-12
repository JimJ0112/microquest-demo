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

    <script src="Scripts/myRequests.js"> </script>
    <title> My Services </title>
</head>

<body>

    <?php
        if(isset($_SESSION["userType"])){
            $usertype = $_SESSION["userType"];

            if($usertype === "Requestor"){
                require("Includes/Requestor_Navbar.inc.php");
            }else if($usertype === "Responder"){
                header("location:Responder_Home.php?Msg= Not a Responder");
            }
        }
    ?>

    <?php
        if(isset($_SESSION['userID'])){
            $userID = $_SESSION['userID'];
            echo"<script> getMyServices($userID) </script>";
            echo"<script> sessionStorage.setItem('myID',$userID)</script>";
        }
    ?>


    <div id="updateFormBackground">
        <center>
        <div id="closeButton" onclick="closeForms()"> X </div>
            <br/> 
            <form action="Backend/UpdateRequest.php" method="post" id="updateRequest"> 
            
              
                <input type="hidden" name="requestID" id="requestID"/> <br/> <br/>

                <label> Title  </label> <br/> <br/>
                <input type="text" name="updateTitle" id="updateTitle" /> <br/> <br/>


                <label> Due Date  </label> <br/> <br/>
                <input type="date" name="updateDueDate" id="updateDueDate" /> <br/> <br/>

                <label> Expected Price  </label> <br/> <br/>
                <input type="number" name="updatePrice" id="updatePrice" /> <br/> <br/>

                <label> Negotiable  </label> <br/> <br/>
                <select name="updateNegotiable" id="updateNegotiable">
                    <option value="Negotiable"> Negotiable </option>
                    <option value="Not Negotiable">Not Negotiable </option>
                </select> <br/> <br/>

                <label> Description  </label> <br/> <br/>
                <textarea name="updateDescription"  id="updateDescription" rows="15" cols="25" style="resize:none;"> </textarea> <br/> <br/>

 
                <input type="submit"/>
            </form>
        </center>
    </div>


     <div id="myRequestsNav">
        <center>
            <div id="MyRequestsButton">
                My Requests
            </div> 

        </center>
    </div>









  
    <center>


    <Table> 
        <thead class="requestsHeader">
            <td> Request ID </td>
            <td> Category</td>
            <td> Title</td>
            <td> Expected Price</td>
            <td> Negotiable</td>
            <td> Date Posted</td>
            <td> Due Date</td>
            <td> Description</td>
            <td> Status </td>
            <td> </td>
        </thead>

        <tbody id="myRequestsContent">

        </tbody>

    </table>

    </center>

   






</body>
</html>