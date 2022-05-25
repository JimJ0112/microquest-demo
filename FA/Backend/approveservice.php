<?php
require("../../Classes/DBHandler.php");

$DBHandler = new DBHandler();

if(isset($_POST['serviceID'])){

    

$tablename = "services_info";
$column = "isApproved";
$data = "APPROVED";
$condition = "serviceID";
$userID = $_POST['serviceID'];

$update = $DBHandler->updateColumn($tablename,$column,$data,$condition,$userID);
echo $update;


//echo $_POST['userID'];

} else {
    echo "userID not recieved";
}





