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
    <title>Register</title>
</head>
<body>

<h1> Sign up as a Responder</h1>
<br> <br> <br> <br>


<center>    
<form action="Backend/RegisterBackend.php" method="post" enctype="multipart/form-data"> 

<!-- //$userType,$userName, $userEmail,$userPassword,$userPhoto,$firstName,$lastName,$userGender,$education,
     $birthDate,$houseNo,$street,$baranggay,$municipality,
     $idType,$idFile,$idNumber,$idExpiration,$otherIDType,$otherIDFile,
     $otherIDNumber,$otheridExpiration-->

         <input type="hidden" name="userType" value="Responder"/>
    <table>

        <tr>

            <td>Profile picture </td>
            <td> <input type="file" name="userPhoto" accept= "Image/*"capture required> </td>
        </tr>

        <tr>
            <td>Email address: </td>
            <td> <input type="email" name="userEmail" placeholder="email"  required/> </td>
        </tr>

        <tr>
            <td>Username:  </td>
            <td> <input type="username" name="userName" placeholder="username"  required/> </td>
        </tr>

        <tr>
            <td>Password: </td>
            <td> <input type="password" name="userPassword" placeholder="password"  required/> </td>
        </tr>

        <tr>
            <td>Confirm password: </td>
            <td> <input type="password" placeholder="password"  required/> </td>
        </tr>

        <tr>
            <td>First name:  </td>
            <td> <input type="text" name="firstName" placeholder="first name" required/> </td>
        </tr>

        <tr>
            <td>Last name:  </td>
            <td> <input type="text" name="lastName" placeholder="last name"  required/> </td>
        </tr>

        <tr>
            <td> Sex: </td>
            <td>
                <select name="userGender"> 
                    <option value="Male"> Male </option>
                    <option value="Female"> Female </option>
                    <option value="Other"> Other </option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Education: </td>
            <td> <input type="text" name="education" placeholder="education"/> </td>
        </tr>
        
        <tr>
            <td>Municipality </td>
            <td>
                <select name="municipality"> 
                    <option selected="" disabled="">Select City / Municipality</option>
                    <option value="Abucay">Abucay</option>
                    <option value="Bagac">Bagac</option>
                    <option value="Balanga">Balanga</option>
                    <option value="Dinalupihan">Dinalupihan</option>
                    <option value="Hermosa">Hermosa</option>
                    <option value="Limay">Limay</option>
                    <option value="Mariveles">Mariveles</option>
                    <option value="Morong">Morong</option>
                    <option value="Orani">Orani</option>
                    <option value="Orion">Orion</option>
                    <option value="Pilar">Pilar</option>
                    <option value="Samal">Samal</option>
                </select>
            </td>
        
        </tr>

        <tr>
            <td>Address: </td>
            <td>
                <input type="address" name="houseNumber" placeholder="house no."  required/> &nbsp;
            
                <input type="address" name="street" placeholder="street"  required/> &nbsp;
            
                <input type="address" name="baranggay" placeholder="baranggay"  required/> &nbsp;
            
            </td>


        </tr>

        <tr>
            <td>Birthdate:  </td>
            <td><input type="date" name="birthDate" placeholder="mm/dd/yyy"> </td>
        </tr>

        <tr>
            <td> Government provided id:</td>
            <td>
                <select name="idType">
                    <option value="Driver's License"> Driver's License</option>    
                    <option value="Philhealth"> Philhealth</option>    
                    <option value="Voter's ID"> Voter's ID</option>     
                </select>
            </td>
        </tr>

        <tr>
            <td> ID CARD: </td>
            <td><input type="file" name="idFile"  accept= "Image/*,application/pdf,.docx" required> </td>

        </tr>

        <tr>
            <td>ID number: </td> 
            <td><input type="text" name="idNumber" required> </td>
        </tr>
        <tr>
            <td>ID expiration </td>
            <td> <input type="date" name="idExpiration"> </td>
        </tr>

  
        <tr>
            <td> Other government provided id:</td>

            <td>
                <select name="otherIDType">
                    <option value="Driver's License"> Driver's License</option>    
                    <option value="Philhealth"> Philhealth</option>    
                    <option value="Voter's ID"> Voter's ID</option>     
                </select>
            </td>
        </tr>

        <tr>
            <td>Other Id card:</td> 
            <td><input type="file" name="otherIDFile"  accept= "Image/*,application/pdf,.docx" required> </td>
        </tr>

        <tr>
            <td>Other Id card number:</td>
            <td> <input type="text" name="otherIDNumber" required> </td>
        </tr>
        <tr>
            <td>Other id expiration </td>
            <td> <input type="date" name="otheridExpiration"> </td>
        </tr>
    
    </table>

    <br/>
    <br/>
    <input type="submit" value="Register"/>







</form>
</center>
    
</body>
</html>