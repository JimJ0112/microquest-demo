<?php
require("../Classes/DBHandler.php");

$DBHandler = new DBHandler();


$tablename = "categories";
$column = "categoryStatus";
$condition = "";
$categories = $DBHandler->getRow($tablename,$column,$condition,'categoryName');


     echo json_encode($categories);

    if($categories === ""){
    echo json_last_error_msg();
    }


