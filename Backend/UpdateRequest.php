<?php

session_start();
include "../Classes/DBHandler.php";

$DBHandler = new DBHandler();

$tablename = "requestsinfo";

//$column = "requestStatus";
//$name = $_POST["status"];
$condition = "requestID";
$conditionvalue = $_POST['requestID'];
//echo $result = $DBHandler -> updateColumn($tablename,$column,$name,$condition,$conditionvalue);



$column = "dueDate";
$name = $_POST['updateDueDate'];

echo $result = $DBHandler -> updateColumn($tablename,$column,$name,$condition,$conditionvalue);

$column = "requestExpectedPrice";
$name = $_POST['updatePrice'];

echo $result = $DBHandler -> updateColumn($tablename,$column,$name,$condition,$conditionvalue);

$column = "isNegotiable";
$name = $_POST['updateNegotiable'];

echo $result = $DBHandler -> updateColumn($tablename,$column,$name,$condition,$conditionvalue);


$column = "requestDescription";
$name = $_POST['updateDescription'];

echo $result = $DBHandler -> updateColumn($tablename,$column,$name,$condition,$conditionvalue);
/*

document.getElementById("updateTitle").value = title;
document.getElementById("updateDueDate").value = dueDate;
document.getElementById("updatePrice").value = price;
document.getElementById("updateNegotiable").value = isNegotiable;
document.getElementById("updateDescription").value = Description;


        
                name="updateTitle"
                name="updateDueDate" 
                name="updatePrice" 
                name="updateNegotiable" 
                name="updateDescription"  
*/

// $query = "UPDATE $tablename SET $column = '$name' WHERE $condition = '$conditionvalue' ";

header("location:../MyRequests.php");