<?php
require("../Classes/DBHandler.php");

$DBHandler = new DBHandler();


$tablename = "requestsinfo";
$column = "requestStatus";
$condition = "";
$accounts = $DBHandler->getRequests($tablename,$column,$condition,'requestID');

    echo json_encode($accounts);





