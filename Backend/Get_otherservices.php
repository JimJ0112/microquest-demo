<?php
require("../Classes/DBHandler.php");

$DBHandler = new DBHandler();

// $_POST['condition'];

$categories = $DBHandler->getOtherServices();


    echo json_encode($categories);
 

   
    //echo json_last_error_msg();
    


