<?php
session_start();
if(!isset($_SESSION["Useremail"])){
    header("location:LoginForm.php?msg=Please Login First");
}

if(!isset($_SESSION["usertype"])){
    header("location:LoginForm.php?msg=Please Login First");
} else {
    $usertype = $_SESSION["usertype"];
    if($usertype != "Requestor"){
        header("location:User_Profile.php?msg=Not a Requestor!");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <link rel="manifest" href="manifest.json">
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <meta content='yes' name='mobile-web-app-capable'/>
    <title>Create Request</title>
</head>
<body>
    <?php
            if(isset($_SESSION["usertype"])){
                $usertype = $_SESSION["usertype"];
                    if($usertype === "Responder"){
                        require("Includes/Responder_Navbar.inc.php");
                    }else if($usertype === "Requestor"){
                        require("Includes/Requestor_Navbar.inc.php");
                    }
            }
    ?>
<center> 
<br> <br> <br> <br>
<form action="Backend/CreateRequestBackend.php" method="post"> 

            <table>
            <tr>
                <td> Category: </td>
                <td>
                <select name="requestCategory">
                    <option value= "Home Service"> Home Service </option>
                    <option value= "Pasabuy"> Pasabuy      </option>
                    <option value= "Computer related work"> Computer related work </option>
                    <option value= "Computer related work"> Other </option>
                    
                </select>
                </td>
            </tr>

            <tr>
                <td> TITLE: </td>
                <td> <input type="text" name="requestTitle"> </td> 
            </tr>

            <tr>
                <td> Description: </td>
                <td> 
                    <textarea type="text" name="requestDescription"> 
                    </textarea> 
                </td>
            </tr>

            <tr>
                <td> Price: </td>
                <td> <input type="number" name="requestPrice"><br/> </td>
            </tr>

            <tr>
                <td> Deadline: </td>
                <td> <input type="datetime-local" name="deadline"><br/> </td>
            </tr>

            <tr>
                <td> Requirement: </td>
                <td> <input type="text" name="requestRequirement"><br/> </td>
            </tr>
            
            <tr>
                <td> Difficulty: </td>
                <td>
                    <select name="requestDifficulty">
                    <option value="easy"> Easy </option>
                    </select>
                </td>
            </tr>



            </table>

            <!-- hidden inputs -->
            <input type="hidden" name="datePosted"
            value= "<?php 
            echo date_default_timezone_set("Asia/Manila");
            echo date("Y-m-d H:i:s",time());?>"><br/>


            <input type="hidden" name="requestorID" value="<?php
             echo $_SESSION["userID"];
            ?>"> 

 
    <input type="submit"/>







</form>
</center>

</body>
</html>