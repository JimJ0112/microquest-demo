<?php

session_start();
include "../Classes/DBHandler.php";

$DBHandler = new DBHandler();

$tablename = "transactions";

$column = "transactionStatus";
$condition = "transactionID";

$name = $_POST['update'];
$conditionvalue = $_POST['transactionID'];


echo $result = $DBHandler -> updateColumn($tablename,$column,$name,$condition,$conditionvalue);

// $query = "UPDATE $tablename SET $column = '$name' WHERE $condition = '$conditionvalue' ";

//header("location:../MyRequests.php");