<?php
session_start();
include "../Classes/DBHandler.php";

$DBHandler = new DBHandler();


$userEmail = $_POST['userEmail'];

$exists = $DBHandler->exists("userprofile","userEmail",$userEmail);

if($exists){
    
        header("location: ../LoginForm.php?msg=User $email already exists!");
} else {

        $userType = $_POST['userType'];


        $userPhoto = file_get_contents($_FILES['userPhoto']["tmp_name"]);
    
       
       

        $userName = $_POST['userName'];
        $userPassword = $_POST['userPassword'];

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $userGender= $_POST['userGender'];

        $education = $_POST['education'];
        $municipality= $_POST['municipality'];
                    

        $houseNumber = $_POST['houseNumber'];
            
        $street = $_POST['street'];
            
        $baranggay= $_POST['baranggay'];
        $birthDate = $_POST['birthDate'];
        $idType= $_POST['idType'];

        $idFile  = file_get_contents($_FILES['idFile']["tmp_name"]);
        $idNumber = $_POST['idNumber'];
        $idExpiration= $_POST['idExpiration'];

        //$otherIDType= $_POST['otherIDType'];
        //$otherIDFile= file_get_contents($_FILES['otherIDFile']["tmp_name"]);
        //$otherIDNumber  = $_POST['otherIDNumber'];
        //$otheridExpiration= $_POST['otheridExpiration'];

        $otherIDType= " ";
        $otherIDFile= " ";
        $otherIDNumber  = " ";
        $otheridExpiration= " ";


        if($_FILES['userPhoto']["size"] > 1500000){
            header("location: ../LoginForm.php?msg=profile image file size too big!");
        } else if($_FILES['idFile']["size"] > 1500000 ){
            header("location: ../LoginForm.php?msg=id image file size too big!");
        } else{
            echo $result = $DBHandler->registerUser($userType,$userName, $userEmail,$userPassword,$userPhoto,$firstName,$lastName,$userGender,$education,$birthDate,$houseNumber,$street,$baranggay,$municipality,$idType,$idFile,$idNumber,$idExpiration,$otherIDType,$otherIDFile,$otherIDNumber,$otheridExpiration);

            if($userType === "Responder"){
                
                $_SESSION["userEmail"] = $userEmail;
                $_SESSION["userType"] = $userType; 
                $_SESSION["userName"] = $userName;
                $_SESSION["municipality"] = $municipality;
                $userStatus = $DBHandler-> getData("userprofile","userEmail",$userEmail,"userStatus");
                $userID = $DBHandler-> getData("userprofile","userEmail",$userEmail,"userID");
                $_SESSION["userStatus"]=$userStatus;
                $_SESSION["userID"]=$userID;

                header("location:../CreateService_Form.php");

            } else {
                
                $_SESSION["userEmail"] = $userEmail;
                $_SESSION["userType"] = $userType; 
                $_SESSION["userName"] = $userName;
                $_SESSION["municipality"] = $municipality;
                $userStatus = $DBHandler-> getData("userprofile","userEmail",$userEmail,"userStatus");
                $_SESSION["userStatus"] =$userStatus;

                header("location:../User_Profile.php");
            }
        }
}