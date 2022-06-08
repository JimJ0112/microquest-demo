<?php
require("../Classes/DBHandler.php");

$DBHandler = new DBHandler();

// $_POST['condition'];

$tablename = "servicesinfo";
$column = "responderID";
$condition = $_POST['userID'];
$categories = $DBHandler->getMyServices($tablename,$column,$condition);


    echo json_encode($categories);
 

   
    //echo json_last_error_msg();
    


