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
    <script src="Scripts/getRequest.js"> </script>

    <title> Request </title>
</head>
<body>
    <?php
        if(isset($_GET['requestID'])){

            $requestID = $_GET['requestID'];

            echo "<script> getRequest($requestID) </script>";
        }
    ?>

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


<div id="formBackground"> 
    <br/> <br/> <br/>  <br/> <br/> <br/>
    <div>
        <center>
        <h3> Are you sure you want to apply to this request?</h3> 
        <input type="Button" value="Yes"/>
        <input type="Button" value="No"/>
        </center>
    </div>


    <form> 
        <input type="hidden" name="requestID" value="<?php echo $requestID ?>"/>
        <input type="hidden" name="requestorID" id="requestorID"/>
        <input type="hidden" name="responderID" value="<?php echo $_SESSION['userID']?>"/>
        <input type="hidden" name="price" id="price"/>
        <input type="hidden" name="transactionStartDate" value="<?php 
            date_default_timezone_set("Asia/Manila");
            echo date("Y-m-d H:i:s",time());?>"/>
    </form>
</div>

    <div id="requestInfoContent">
    
    <!-- for sending the requestor a message -->
        <div id="messageMe">
            <center>
                <form action="Backend/insertMessage.php" method="post">
                <div id="requestorImageContainer"> </div> <br/>
                <a id="requestorName"> Requestor Name </a> <br/>
                <label> Send me a message </label> <br/>

                 <input type="hidden" name="recieverID" id="recieverID"/>
                 <input type="hidden" name="senderID" value='<?php echo $_SESSION['userID']; ?>'>
                 <input type="hidden" name="senderUserName" value='<?php echo $_SESSION['userName']; ?>'>
                 <input type="hidden" name="recieverUserName" id="recieverUserName">
                 
                <textarea name="messageBody" id="requestInfoMessageBody" oninput="checkText()"> </textarea> <br/>
                <input type="submit" value="SEND" id="send" disabled/>
                
                </form>
            </center>
        </div>

        <div id="requestInfoMain"> 

           <center> <h1 id="requestTitle">Title </h1> </center>

           <center>  <h3 id="category"> category </h3> </center>

           <br/> <br/> <br/> 
            <h3> Requestor's Location: <span id="requestorLocation"> location </span> </h3> <br/> <br/> <br/> 

            <h3> Date posted: <span id="datePosted">  </span> </h3>
            <h3> Due date: <span id="dueDate"> 01/01/2022 </span> </h3>
            <h3> Expected price: Php <span id="expectedPrice"> price </span> </h3>
            <h3> <span id="isNegotiable"> negotiable </span> </h3> <br/> <br/> 

            <h3> Notes: </h3> <br/>
            <center>
            <p id="requestNotes"> more details </p>
            </center>


            <br/> <br/> <br/>
            <center>
                <?php
                    if(isset($_SESSION["userType"])){
                        $usertype = $_SESSION["userType"];

                            if($usertype === "Responder"){
                                echo "<input type=button value=Apply id=applyButton class=button />";
                            }
                    }

                ?>
            </center>
        </div>


    <div>
    
</body>
</html>