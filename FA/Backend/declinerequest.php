<?php
require("../../Classes/DBHandler.php");

$DBHandler = new DBHandler();

if(isset($_POST['requestID'])){

    

$tablename = "requests_info";
$column = "IsApproved";
$data = "NOT APPROVED";
$condition = "requestID";
$userID = $_POST['requestID'];

$update = $DBHandler->updateColumn($tablename,$column,$data,$condition,$userID);
echo $update;


//echo $_POST['userID'];

} else {
    echo "userID not recieved";
}





