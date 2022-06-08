<?php

session_start();
include "../Classes/DBHandler.php";

$DBHandler = new DBHandler();

$tablename = "servicesinfo";
$column = "rate";
$name = $_POST['rate'];
$condition = "serviceID";
$conditionvalue = $_POST['serviceID'];
echo $result = $DBHandler -> updateColumn($tablename,$column,$name,$condition,$conditionvalue);

// $query = "UPDATE $tablename SET $column = '$name' WHERE $condition = '$conditionvalue' ";