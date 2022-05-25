<?php
require("../../Classes/DBHandler.php");

$DBHandler = new DBHandler();

if(isset($_POST['userID'])){

    

$tablename = "Users";
$column = "ISAPPROVED";
$data = "APPROVED";
$condition = "UserID";
$userID = $_POST['userID'];

$update = $DBHandler->updateColumn($tablename,$column,$data,$condition,$userID);
echo $update;


//echo $_POST['userID'];

} else {
    echo "userID not recieved";
}





