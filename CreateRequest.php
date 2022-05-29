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

    <script src="Scripts/createRequest.js"> </script>
    <title> Create Request </title>
</head>
<body onload="getServices()">
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


<!-- Forms for creating request -->

<!-- regular requests --> 


<form method="post" action="Backend/CreateRequestBackend.php" id="regularRequestForm" class="requestForm">
<div id="closeButton" onclick="closeForms()"> X </div>

<h2 id="selectedCategory"> </h2>
    <input type="hidden" name="formType" value="regularRequest"/> 
    <input type="hidden" name="requestorID" value="<?php echo $_SESSION['userID']?>">
    <input type="hidden" name="requestorMunicipality" value="<?php echo $_SESSION['municipality']?>">
    <input type="hidden" name="requestCategory" id="requestCategory">
    <input type="hidden" name="datePosted" value="<?php 
            echo date_default_timezone_set("Asia/Manila");
            echo date("Y-m-d H:i:s",time());?>">

    <label> Title of your request </label>
    <input type="text" name="requestTitle" > <br/>
    <label> How much do you offer for your request </label>
    <input type="number" name="requestExpectedPrice"><br/>

    <label> Is your expected price negotiable? </label>
    <select name="isNegotiable"> 
        <option> Negotiable </option> 
        <option> Not-negotiable </option> 
    </select>  <br/>

    <label> Until when is your request available? </label>
    <input type="date" name="dueDate"> <br/>

    <label> More details about your request </label>
    <textarea name="requestDescription"> </textarea> <br/>


    <input type="submit">
</form>

<!-- pasabuy requests --> 

<form method="post" action="Backend/CreateRequestBackend.php" id="pasabuyRequestForm" class="requestForm">
<div id="closeButton" onclick="closeForms()"> X </div>
    <input type="hidden" name="formType" value="Pasabuy"> 

    <h2 id="selectedCategory"> </h2>
    <input type="hidden" name="requestorID" value="<?php echo $_SESSION['userID']?>">
    <input type="hidden" name="requestorMunicipality" value="<?php echo $_SESSION['municipality']?>">
    <input type="hidden" name="requestCategory" value="pasabuy">
    <input type="hidden" name="datePosted" value="<?php 
            echo date_default_timezone_set("Asia/Manila");
            echo date("Y-m-d H:i:s",time());?>">

    <label> Sample picture of your requested product </label>
    <input type="file" name="productImage"> <br/>

    <label> Product name </label>
    <input type="text" name="productName"><br/>
    <label> Product Brand </label>
    <input type="text" name="productBrand"><br/>

    <label> How much do you offer for your request </label>
    <input type="number" name="requestExpectedPrice"><br/>

    <label> Is your expected price negotiable </label>
    <select name="isNegotiable">
        <option> Negotiable </option> 
        <option> Not-negotiable </option> 
    </select>  <br/>

    <label> Until when is your request available? </label>
    <input type="date" name="dueDate"> <br/>

  <input type="submit"> <br/>



</form>

<!-- other category of requests --> 

<form method="post" action="Backend/CreateRequestBackend.php" id="otherCategoriesRequestForm" class="requestForm">
<div id="closeButton" onclick="closeForms()"> X </div>
    <input type="hidden" name="formType"> 

    <h2 id="selectedCategory"> </h2>
    <input type="hidden" name="requestorID"> 
    <input type="hidden" name="requestorMunicipality">
    <input type="hidden" name="datePosted">

    <label> What category does your request fit in? </label>
    <input type="text" name="requestCategory"> <br/>
    <label> Title of your request </label>
    <input type="text" name="requestTitle"> <br/>
    <label> How much do you offer for this request </label>
    <input type="number" name="requestExpectedPrice"> <br/>

    <label> Is your offer negotiable?  </label>
    <select name="isNegotiable">
        <option> Negotiable </option> 
        <option> Not-negotiable </option> 
    </select>   <br/>

    <label> Until when is your request available? </label>
    <input type="date" name="dueDate"> <br/>

    <label> More details about your request </label>
    <textarea name="requestDescription"> </textarea> <br/>


    <input type="submit"><br/>

</form>

<!-- display contents  -->
<center>
<h2> Create Request </h2>
    <br/>
        <div>
            <form method="GET" action="Backend/Get_products.php"> 
                Search <input type="Search" name="q">
            </form>
        <div>
    <br/>
</center>
    

    <br/>
    <h3 id="selectedCategory"> What kind of service will you request? </h3>


<div id="requestBoardNav"> 

<div class="serviceCard-main" onclick="createRequest('Home Service')"> Home Services </div> 
<div class="serviceCard-main" onclick="createRequest('Pasabuy')"> Pasabuy </div>
<div class="serviceCard-main" onclick="createRequest('Computer related work')"> Computer Related</div>
<div class="serviceCard-main" onclick="createRequest('Other')"> Other </div>

</div>


<h4> Other Categories </h4>

    <div id="requestCategories">
        
    </div>

    






</body>
</html>