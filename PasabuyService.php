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

    <script src="Scripts/pasabuy.js"> </script>
    <title> Pasabuy </title>
</head>

<body onload="getProductCategories()">
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

<!-- responders -->

<center>
    <div id="pasabuyFormContainer"> 
    <div id="closeButton" onclick="closeConfirmationForm()"> X </div><br/> <br/> <br/>
     <div id="AvailServiceForm"> 
        
        <form>

            <h3> Confirm Transaction </h3> <br/><br/><br/>
      
                <label> Product Category </label> <br/>
                <input type="text" name="productCategory" id="productCategory" readonly> <br/> 
        
        
                <label> Product ID </label> <br/>
                <input type="text" name="productID" id="productID" readonly> <br/>

                
                <label> Quantity </label> <br/>
                <input type="number" name="orderQuantity" id="orderQuantity"> <br/>

                <label> Product Price </label> <br/>
                <input type="text" name="productPrice" id="productPrice" readonly> <br/>

            

    
                <label> Responder ID </label> <br/>
                <input type="text" name="responderID" id="responderID" readonly> <br/>
  

                <label> Delivery Price  </label> <br/>
                Php <input type="number" name="deliveryPrice" id="deliveryPrice" readonly> <br/>
  

         
                <label> Due Date </label> <br/>
                <input type = "datetime-local" name="dueDate" required> <br/>



                <label> Additional Notes </label> <br/>

                        <textarea name="additionalNotes">
                        </textarea> <br/><br/>

                <input type="button" onclick="getsuggestedResponders(' ')" value="Select Responder">
 
            <input type="submit" value="Confirm">

        </form>


     </div>
    </div>
</center>







<div id="pasabuyResponders">
    <div id="closeButton" onclick="closeForms()"> X </div>

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

        <h5> Nearest Responders  </h5>
        <div id="productSuggestedResponders">

        </div> 

        <h5> Other Responders  </h5>
        <div id="productAllResponders">
        </div> 

</div>






<!-- products -->
<center>
    <h2 id="selectedCategory" onload="">  </h2>
    <br/>

            <form method="GET" action="Backend/Get_products.php"> 
                Search <input type="Search" name="q">
            </form>

    <br/>
</center>
    

    <br/>
    <h3> Products From </h3>

    <div id="productCategories">
        
    </div>
    <h5> Products </h5>
    <div id="products">
 
        
    </div>




















</body>
</html>