<?php
session_start();
if(!isset($_SESSION["userEmail"])){
    header("location:LoginForm.php?msg=Please Login First");
}

if(!isset($_SESSION["userType"])){
    header("location:LoginForm.php?msg=Please Login First");
} else {
    $usertype = $_SESSION["userType"];
    if($usertype != "Responder"){
        header("location:User_Profile.php?msg=Not a Responder!");
    }
}

if(!isset($_SESSION["userID"])){
    header("location:LoginForm.php?msg=Please Login First");
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

    <script src="Scripts/servicesForms.js"> </script>
    <title>Create Request</title>
</head>
<body onload="getCategories()">
    <?php
            if(isset($_SESSION["userType"])){
                $usertype = $_SESSION["userType"];
                    if($usertype === "Responder"){
                        require("Includes/Responder_Navbar.inc.php");
                    }
            }
    ?>
<center> 
<br> <br> <br> <br>
<!-- serviceID	serviceCategory	servicePosition	rate	responderID	certification	certificateFile	 -->
                <select id="categoryPicker" onchange="changeForm()">
                    <option value= "Home Service"> Home Service </option>
                    <option value= "Pasabuy"> Pasabuy      </option>
                    <option value= "Computer related work"> Computer related work </option>
                    <option value= "Other"> Other </option>
                </select>

 <!-- For Regular services -->               
<form action="Backend/CreateServiceBackend.php" method="post" enctype="multipart/form-data" id="regularServicesForm"> 
<input type="hidden" name="formType" value="regularServices">
        <input type="hidden" name="responderID" value="<?php echo $_SESSION["userID"];?>"> 
        <input type="hidden" name="serviceCategory" id="serviceCategoryRegular">

        <table>
            <tr>
                <td> Service Position </td>
                <td> 
                    <select name="servicePosition">
                    <option value="Delivery"> Delivery </option>
                    </select>
                </td>
            </tr>

            <tr>
                <td> Rate </td>
                <td>
                    <input type="number" name="rate">
                </td> 
            </tr>

            <tr>
                <td>Training/Certificate</td>
                <td> <input type="text" name="certification"> </td> 
            </tr>

            <tr>
                <td>Training/Certificate File </td>
                <td> <input type="file" name="certificateFile"> </td>
            </tr>
        
        </table>


   
 
    <input type="submit"/>
</form>


<!-- For Pasabuy -->

<form action="Backend/CreateServiceBackend.php" method="post" enctype="multipart/form-data" id="pasabuyForm"> 
<input type="hidden" name="formType" value="pasabuy">
<input type="hidden" name="responderID" value="<?php echo $_SESSION["userID"];?>"> 

        <input type="hidden" name="serviceCategory" id="serviceCategory" value="Pasabuy">

        <table>
            <tr>
                <td> Service Position </td>
                <td> 
                    <select name="servicePosition">
                        <option value="Grocery"> Grocery </option>
                        <option value="FastFood"> FastFood </option>
                    </select>
                </td>
            </tr>

            <tr>
                <td> Rate </td>
                <td>
                    <input type="number" name="rate">
                </td> 
            </tr>

            <tr>
                <td>Training/Certificate</td>
                <td> <input type="text" name="certification"> </td> 
            </tr>

            <tr>
                <td>Training/Certificate File </td>
                <td> <input type="file" name="certificateFile"> </td>
            </tr>
            
        
        </table>

        <br/>

        <table>
            <tr>
                <td> Add Item </td>
            </tr>

            <tr> 
                
                <td> Category </td>
                <td>
                    <select name="itemCategory">
                        <option value= "Groceries"> Groceries </option>
                        <option value= "FastFood"> FastFood </option>
                        <option value= "Computer related work"> Computer related work </option>
                        <option value= "Other"> Other </option>
                    </select>
                 </td>

            </tr>
            <tr>
                <td> Product Name </td>
                <td> <input name="productName" type="text"/></td>
            </tr>

            <tr>
                <td> Product Brand </td>
                <td> <input name="productBrand" type="text"/></td>
            </tr>

            <tr>
                <td> Product Description </td>
                <td> <input name="productDescription" type="text"/></td>
            </tr>
            <tr>
                <td> Product Price </td>
                <td> Php <input name="productPrice" type="number"/></td>
            </tr>
            <tr>
                <td> Product Picture </td>
                <td> <input name="productImage" type="file"/></td>
            </tr>

            <tr>
                <td> Store </td>
                <td> <input name="productStore" type="text"/></td>
            </tr>
            <tr>
                <td> Store Location </td>
                <td> <input name="storeLocation" type="text"/></td>
            </tr>



        </table>

        <input type="submit">
</form>

<!-- For other categories -->

<form action="Backend/CreateServiceBackend.php" method="post" enctype="multipart/form-data" id="otherCategoriesForm"> 

        <input type="hidden" name="responderID" value="<?php echo $_SESSION["userID"];?>"> 
        <input type="hidden" name="formType" value="otherCategories">

        <table>
            <tr>
                <td> Category </td>
                <td> <input type="text" name="serviceCategory" id="serviceCategory"> </td>
            </tr>
            <tr>
                <td> Service Position </td>
                <td> 
                    <input type="text" name="servicePosition"/>
                    
                </td>
            </tr>

            <tr>
                <td> Rate </td>
                <td>
                    <input type="number" name="rate">
                </td> 
            </tr>

            <tr>
                <td>Training/Certificate</td>
                <td> <input type="text" name="certification"> </td> 
            </tr>

            <tr>
                <td>Training/Certificate File </td>
                <td> <input type="file" name="certificateFile"> </td>
            </tr>
        
        </table>


   
 
    <input type="submit"/>
</form>
<script src="Scripts/servicesForms.js"> </script>
</center>

</body>
</html>