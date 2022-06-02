<?php
require("../Classes/DBHandler.php");

$DBHandler = new DBHandler();

date_default_timezone_set("Asia/Manila");


$senderID= $_POST['senderID'];
$recieverID= $_POST['recieverID'];
$messageBody= $_POST['messageBody'];
$messageDate = date("Y-m-d H:i:s",time());
$messageTime = time();

/*
echo $senderID= "11";
echo $recieverID= "11";
echo $messageBody= "body";
echo $messageDate = date("Y-m-d H:i:s",time());
echo $messageTime = date("H:i:s",time());
*/

if(isset($_FILES['messageFile'])){
    $messageFile = $_FILES['messageFile']['tmp_name'];
    $messageFiletype = $_FILES['messageFile']['type'];
    $result = $DBHandler->sendMessage($senderID,$recieverID,$messageBody,$messageDate,$messageTime,$messageFileType,$messageFile);
}

$result = $DBHandler->sendMessage($senderID,$recieverID,$messageBody,$messageDate,$messageTime);


if($result  != "failed to fetch"){

    $result = json_encode($result);
    
} else {

    echo $result;

}






   
    //echo json_last_error_msg();