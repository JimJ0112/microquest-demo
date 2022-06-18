<?php 
session_start();
    if(!isset($_SESSION["userEmail"])){
        header("location:LoginForm.php?msg=Please Login First");
    }


    if(isset($_SESSION["userType"])){
        $usertype = $_SESSION["userType"];
        if($usertype != "Requestor"){
            header("location: User_Profile.php?msg= Not a Requestor");
        }
    }


    
    date_default_timezone_set("Asia/Manila");
    $today = date("Y-m-d");
  

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
                if($usertype === "Requestor"){
                    require("Includes/requestorNav.inc.php");
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
            date_default_timezone_set("Asia/Manila");
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
    <input type="date" name="dueDate" min="<?php echo $today; ?>" max="" value="<?php echo $today;?>"> <br/>

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
            date_default_timezone_set("Asia/Manila");
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
    <input type="date" name="dueDate" min="<?php echo $today; ?>" max="" value="<?php echo $today;?>"> <br/>

  <input type="submit"> <br/>



</form>

<!-- other category of requests --> 

<form method="post" action="Backend/CreateRequestBackend.php" id="otherCategoriesRequestForm" class="requestForm">
<div id="closeButton" onclick="closeForms()"> X </div>
    <input type="hidden" name="formType"> 

    <h2 id="selectedCategory"> </h2>
    <input type="hidden" name="requestorID" value="<?php echo $_SESSION['userID']?>"> 
    <input type="hidden" name="requestorMunicipality" value="<?php echo $_SESSION['municipality']?>">
    <input type="hidden" name="datePosted" value="<?php 
            date_default_timezone_set("Asia/Manila");
            echo date("Y-m-d H:i:s",time());?>">

    <label> What category does your request fit in? </label>
    <input type="text" name="requestCategory"> <br/>
    <label> Title of your request </label>
    <input type="text" name="requestTitle"> <br/>
    <label> How much do you offer for this request </label>
    <input type="number" name="requestExpectedPrice"> <br/>

    <label> Is your offer negotiable?  </label>
    <select name="isNegotiable">
        <option value="Negotiable"> Negotiable </option> 
        <option value="Not-negotiable"> Not-negotiable </option> 
    </select>   <br/>

    <label> Until when is your request available? </label>

    <input type="date" name="dueDate" min="<?php echo $today; ?>" max="" value="<?php echo $today;?>"> <br/>

    <label> More details about your request </label>
    <textarea name="requestDescription"></textarea> <br/>


    <input type="submit"><br/>

</form>

<!-- display contents  -->
<center>
<br/><br/><br/>
    <center> <h1 id="RequestOrdersTitle"> Create a Request</h1> </center>
<br/><br/><br/>
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

<div class="requestCat-main" onclick="createRequest('Home Service')"> 

        <image src="Images/RequestBanners/HomeServices.jpg" class="bannerImage"> <br/>
        <center> <div class="categoryTitle"> Home Services </div> </center>

</div> 

<div class="requestCat-main" onclick="createRequest('Pasabuy')">
    <image src="Images/RequestBanners/pasabuy.jpg" class="bannerImage"> 
    <center> <div class="categoryTitle"> Pasabuy </div> </center> 

</div>
<div class="requestCat-main" onclick="createRequest('Computer related work')"> 

    <image src="Images/RequestBanners/ComputerRelated.jpeg" class="bannerImage"> <br/>
    <center> <div class="categoryTitle"> Computer Related </div> </center> 

</div>

<div class="requestCat-main" onclick="createRequest('Other')"> 
        <image src="Images/RequestBanners/others.jpg" class="bannerImage"> <br/>
        <center> <div class="categoryTitle"> Other </div> </center> 

</div>

</div>


<h4> Other Categories </h4>

    <div id="requestCategories">
        
    </div>

    





    <script src="Scripts/createRequest.js"> </script>
</body>
</html>