<?php


if($_POST['userEmail'] && $_POST['code']){

$recepient = $_POST['userEmail'];
$subject = "microQuest verification code";
$code = $_POST['code'];
$message = "Hello $recepient, /n your verification code is /n <center> <b> $code </b> </center> <br/> <i> /n Note: Please ignore this if you did not signup to microQuest.com </i>";
$sender = "microQuest";
// mail(recepient,'subject','message','sender')
mail($recepient,$subject,$message,$sender);
echo $code;
echo"success!";


} else{
    echo "failed";
}