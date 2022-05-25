<?php
require("../../Classes/DBHandler.php");

$DBHandler = new DBHandler();


$tablename = "services_info";
$column = "isApproved";
$condition = " ";
$accounts = $DBHandler->getServiceRow($tablename,$column,$condition);


    echo json_encode($accounts);




/*
    foreach($accounts as $account){
        echo "<img src='".$account."' />";

    }
*/

//echo json_last_error_msg(); // Print out the error if any
