<?php
require("../Classes/DBHandler.php");

$DBHandler = new DBHandler();


$accounts = $DBHandler->getOtherRequests();

    echo json_encode($accounts);





