<?php

session_start();
include "../Classes/DBHandler.php";

$DBHandler = new DBHandler();


/*
$tablename = "transactions";

$column = "transactionStatus";
$condition = "transactionID";

$name = $_POST['update'];
$conditionvalue = $_POST['transactionID'];


echo $result = $DBHandler -> updateColumn($tablename,$column,$name,$condition,$conditionvalue);

*/

// $query = "UPDATE $tablename SET $column = '$name' WHERE $condition = '$conditionvalue' ";

if(isset($_POST['requestID']) && !isset($_POST['cancelled'])){

    $tablename = "transactions";

    $column = "transactionStatus";
    $condition = "transactionID";
    
    $name = $_POST['update'];
    $conditionvalue = $_POST['transactionID'];
    
    
    echo $result = $DBHandler -> updateColumn($tablename,$column,$name,$condition,$conditionvalue);





    $tablename = "requestsinfo";

    $column = "requestStatus";
    $condition = "requestID";

    $name = "Working";
    $conditionvalue = $_POST['requestID'];


    echo $result = $DBHandler -> updateColumn($tablename,$column,$name,$condition,$conditionvalue);
    echo $conditionvalue;

} else if(isset($_POST['cancelled']) && isset($_POST['requestID'])){

    $tablename = "transactions";

    $column = "transactionStatus";
    $condition = "transactionID";
    
    $name = $_POST['update'];
    $conditionvalue = $_POST['transactionID'];
    
    
    echo $result = $DBHandler -> updateColumn($tablename,$column,$name,$condition,$conditionvalue);





    $tablename = "requestsinfo";

    $column = "requestStatus";
    $condition = "requestID";

    $name = "Active";
    $conditionvalue = $_POST['requestID'];

    $query = "UPDATE $tablename SET $column = '$name' WHERE $condition = '$conditionvalue' ";

    echo $result = $DBHandler -> updateColumn($tablename,$column,$name,$condition,$conditionvalue);
    echo $query;

} else {

    $tablename = "transactions";

    $column = "transactionStatus";
    $condition = "transactionID";

    $name = $_POST['update'];
    $conditionvalue = $_POST['transactionID'];


    echo $result = $DBHandler -> updateColumn($tablename,$column,$name,$condition,$conditionvalue);
}


//header("location:../MyRequests.php");