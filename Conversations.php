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
    <meta name="viewport" content="width=device-width, initial-scale=2.0">

    <link rel="manifest" href="manifest.json">
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <meta content='yes' name='mobile-web-app-capable'/>
    
    <link rel="stylesheet" href="style.css">
    
    <script src="Scripts/conversations.js">  </script>

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

            /*
            if($usertype === "Responder"){
                require("Includes/Responder_Navbar.inc.php");
            }else if($usertype === "Requestor"){
                require("Includes/Requestor_Navbar.inc.php");
            }
            */

            
            if($usertype === "Responder"){

                require("Includes/responderNav.inc.php");
            }else if($usertype === "Requestor"){

                require("Includes/requestorNav.inc.php");
            }
            

        }

    ?>  

<audio controls id="messageNotification" autoplay>
  <source src="../Sfx/NewMessage.mp3" type="audio/ogg">
  <source src="../Sfx/NewMessage.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>


<br/> <br/>

<div id="conversationsContent">

    <div id="conversationSearchDiv">
    <h1 id="Chats"> Chats</h1>
        <input type="search" name="search" id="conversationSearch" placeholder="Search Conversation..."/> 
        <input type="button" value="🔍" id="conversationSearchButton"/>
        <!--<input type="button" value="📝" id="conversationCreateNewMessage"/> -->
        <br/>
        <br/>
        <hr/>
        <br/>
    </div>

    <div id="conversationsList">

    </div>

</div>



<script src="Scripts/conversations.js">  </script>
</body>
</html>