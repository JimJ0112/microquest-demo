<?php
session_start();
include "../Classes/DBHandler.php";

$DBHandler = new DBHandler();

	



if(isset($_POST["formType"])){
    $formType = $_POST["formType"];

    $responderID = $_POST["responderID"];
    $serviceCategory= $_POST["serviceCategory"]; 
    $servicePosition=$_POST["servicePosition"];
    $rate = $_POST["rate"];
    $certification=$_POST["certification"];
    $certificateFile=file_get_contents($_FILES["certificateFile"]["tmp_name"]);

    
    if($servicePosition ==="Other"){
            
           
        $servicePosition = $_POST['otherServicePosition'];
        
        //echo $DBHandler-> registerService($serviceCategory,$servicePosition,$rate,$responderID,$certification,$certificateFile);
        
    }else{

        $servicePosition=$_POST["servicePosition"];
        
        
        //echo $DBHandler-> registerService($serviceCategory,$servicePosition,$rate,$responderID,$certification,$certificateFile);
    }

    
    if($formType === "regularServices"){

        /*
        if(isset($_POST['otherServicePosition'])){
            
           
            $servicePosition = $_POST['otherServicePosition'];
            
            echo $DBHandler-> registerService($serviceCategory,$servicePosition,$rate,$responderID,$certification,$certificateFile);
            
        }else{

            $servicePosition=$_POST["servicePosition"];
            
            
            echo $DBHandler-> registerService($serviceCategory,$servicePosition,$rate,$responderID,$certification,$certificateFile);
        }
        */

    
        echo $DBHandler-> registerService($serviceCategory,$servicePosition,$rate,$responderID,$certification,$certificateFile);

        //echo $serviceCategory,$servicePosition,$rate,$responderID,$certification;

    } else if($formType === "pasabuy"){
        
        $servicePosition=" ";
        $certification=" ";
        $certificateFile=" ";

        $itemCategory=$_POST["itemCategory"];
 
        $productName=$_POST["productName"];
        $productBrand=$_POST["productBrand"];
        $productDescription=$_POST["productDescription"]; 
        $productPrice=$_POST["productPrice"];
        $productImage=file_get_contents($_FILES["productImage"]["tmp_name"]);
        $rate = $_POST['rate'];
       // $productStore=$_POST["productStore"];
       // $storeLocation=$_POST["storeLocation"];

         $productStore=" ";
         $storeLocation=" ";

        echo $DBHandler-> registerService($serviceCategory,$servicePosition,$rate,$responderID,$certification,$certificateFile);
        echo $serviceInfoID = $DBHandler ->getData('servicesinfo','responderID',$responderID,'serviceID');
        echo $DBHandler-> registerProduct($serviceInfoID,$itemCategory,$productName,$productBrand,$productDescription,$productPrice,$productImage,$responderID,$productStore,$storeLocation,$rate);      


    } else if($formType === "otherCategories"){
        echo $DBHandler-> registerService($serviceCategory,$servicePosition,$rate,$responderID,$certification,$certificateFile);
        echo $DBHandler-> registerCategory($serviceCategory,$servicePosition);

    }

        header("location:../Responder_Home.php");


}


 
/*

//<!-- For Pasabuy -->
$responderID = $_POST["responderID"];

$serviceCategory= $_POST["serviceCategory"]; 

$servicePosition=$_POST["servicePosition"];
$rate = $_POST["rate"];
$certification=$_POST["certification"];
$certificateFile=$_POST["certificateFile"];
  



  

//for other categories


$responderID = $_POST["responderID"];

$serviceCategory= $_POST["serviceCategory"]; 

$servicePosition=$_POST["servicePosition"];
$rate = $_POST["rate"];
$certification=$_POST["certification"];
$certificateFile=$_POST["certificateFile"];
*/