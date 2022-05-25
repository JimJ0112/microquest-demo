<?php
require("../../Classes/DBHandler.php");

$DBHandler = new DBHandler();


$tablename = "requests_info";
$column = "isApproved";
$condition = " ";
$accounts = $DBHandler->getRequestRow($tablename,$column,$condition);


    echo json_encode($accounts);




/*
    foreach($accounts as $account){
        echo "<img src='".$account."' />";

    }
*/

//echo json_last_error_msg(); // Print out the error if any
