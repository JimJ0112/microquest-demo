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
    

    <title> Messages  </title>
    <script src="Scripts/getMessages.js">  </script>
</head>
 <body onload="init()"> 


<?php 
if(isset($_SESSION['userID'])){
    $userID = $_SESSION['userID'];

    echo "<script> sessionStorage.setItem('myID','$userID')</script>";
}

if(isset($_GET['selectedConversationID']) && isset($_GET['selectedConversationUsername'])){
    $selectedID = $_GET['selectedConversationID'];
    $selectedUsername = $_GET['selectedConversationUsername'];
    echo"<script> selectConversation($selectedID,'$selectedUsername') </script>";
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


            /*
            if($usertype === "Responder"){

                require("Includes/responderNav.inc.php");
            }else if($usertype === "Requestor"){

                require("Includes/requestorNav.inc.php");
            }
            */

        }

    ?>

<form action="Backend/" method="post" enctype="multipart/form-data" id="fileForm">
            <div id="closeButton" onclick="closeForms()"> X </div>
            <input type="hidden" name="senderID">
            <input type="hidden" name="recieverID">

            <input type="hidden" name="senderUserName" value='<?php echo $_SESSION['userName']; ?>'>
            <input type="hidden" name="recieverUserName" id="recieverUserName">

            <input type="file" name="messageFile"/> <br/>
            <input type="submit" value="SEND"/>
        </form>



 
<div id="messagesContent">
<br/>
    <div id="messagesMain"> 
        <div id="conversationHeader">
            <image id="conversationImage"/>
            <p id="conversationUserName">  </p>
            <p id="conversationUserID" style="display:none"> conversation ID </p>
        </div>

        <div id="conversation"> </div>
        <div id="messageForm">
                <input type="hidden" name="senderID" id="senderID">
                <input type="hidden" name="recieverID" id="recieverID">
                <input type="hidden" name="senderUserName" value='<?php echo $_SESSION['userName']; ?>'>
                <input type="hidden" name="recieverUserName" id="recieverUserName">


                
                
                <input type="button" id="file" value="📎">



                <input type="text" id="messageBody" oninput="checkText()" placeholder="Send Message.."> 
                <input type="button" id="send" value="SEND" onclick="sendMessage()" disabled> 
                
                
        </div>



    </div>

</div>





</body>
</html>