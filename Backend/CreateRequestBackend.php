<?php
include "../Classes/DBHandler.php";

$DBHandler = new DBHandler();

$requestCategory =  $_POST["requestCategory"];
$requestTitle    =  $_POST["requestTitle"];
$requestDescription =  $_POST["requestDescription"];
$requestPrice    =  $_POST["requestPrice"];
$deadline        =  $_POST["deadline"];
$requestRequirement =  $_POST["requestRequirement"];
$requestDifficulty =  $_POST["requestDifficulty"];
$datePosted      =  $_POST["datePosted"];
$requestorID     =  $_POST["requestorID"];

$DBHandler-> registerRequest($requestCategory,$requestTitle,$requestDescription,$requestPrice,$deadline,$requestRequirement,$requestDifficulty,$datePosted,$requestorID);
echo"success!";
header("location: RequestBoard.php");  