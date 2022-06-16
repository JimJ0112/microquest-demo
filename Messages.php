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
</head>
 <body onload="init()"> 


<?php 
if(isset($_SESSION['userID'])){
    $userID = $_SESSION['userID'];
    echo "<script> getMessages($userID); </script>";
    echo "<script> sessionStorage.setItem('myID','$userID')</script>";
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
<div id="messagesContent">

<div id="searchDiv">
<h1 id="Chats"> Chats</h1>

    <input type="search" name="search" id="messageSearch"/> 
    <input type="button" src="Images/search.png" value="🔍" id="messageSearchButton"/>
    <input type="button" src="Images/write.png" value="📝" id="createNewMessage"/>

</div>

<div id="inbox">
</div>

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


                
                
                <div id="file">

                <svg viewBox="0 0 36 36" height="50px" width="50px" class="a8c37x1j muag1w35 dlv3wnog enqfppq2 rl04r1d5 ms05siws hr662l2t b7h9ocf4 crt8y2ji">
                    <path d="M13.5 16.5a2 2 0 100-4 2 2 0 000 4z" fill="#0084ff">

                    </path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12v12a4 4 0 004 4h14a4 4 0 004-4V12a4 4 0 00-4-4H11a4 4 0 00-4 4zm18-1.5H11A1.5 1.5 0 009.5 12v9.546a.25.25 0 00.375.217L15 18.803a6 6 0 016 0l5.125 2.96a.25.25 0 00.375-.217V12a1.5 1.5 0 00-1.5-1.5z" fill="#0084ff">

                    </path>
                </svg>
                
                </div>


                <input type="text" id="messageBody" oninput="checkText()" placeholder="Send Message.."> 
                <input type="button" id="send" value="SEND" onclick="sendMessage()" disabled> 
                
                
        </div>

        <form action="Backend/" method="post" enctype="multipart/form-data" id="fileForm">
            <div id="closeButton" onclick="closeForms()"> X </div>
            <input type="hidden" name="senderID">
            <input type="hidden" name="recieverID">

            <input type="hidden" name="senderUserName" value='<?php echo $_SESSION['userName']; ?>'>
            <input type="hidden" name="recieverUserName" id="recieverUserName">

            <input type="file" name="messageFile"/> <br/>
            <input type="submit" value="SEND"/>
        </form>

    </div>

</div>


<script src="Scripts/messages.js">  </script>
</body>
</html>