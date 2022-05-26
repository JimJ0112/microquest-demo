<?php
require("../Classes/DBHandler.php");

$DBHandler = new DBHandler();

$_POST["position"];

$position = $_POST["position"];;
$municipality = $_POST["municipality"];;
$responders = $DBHandler-> getResponders($position,$municipality);


     echo json_encode($responders);

    if($responders === ""){
    echo json_last_error_msg();
    }


