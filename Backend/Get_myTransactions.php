<?php
require("../Classes/DBHandler.php");

$DBHandler = new DBHandler();

$transactionType = $_POST['TransactionType'];
$column = "responderID";
$ID = $_POST['userID'];
//$condition = 14;
$transactions = $DBHandler->getMyTransactions($ID,$column,$transactionType);


    echo json_encode($transactions);


   

    


