<?php 
session_start();

    if(isset($_SESSION["userName"])){
        header("location:User_Profile.php");
    }

    if(isset($_GET["msg"])){
        $msg = $_GET["msg"];

        echo "<script> alert('$msg')</script>";

    }
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/80d3ebf6b6.js" crossorigin="anonymous"></script>
    <title>SIGN UP</title>
        <!-- other meta tags -->

    
        <link rel="manifest" href="manifest.json">
        <meta content='yes' name='apple-mobile-web-app-capable'/>
        <meta content='yes' name='mobile-web-app-capable'/>


        <style> 
.a{
    color: white;
    text-shadow: 2px 2px 4px #000000;
    font-family: Verdana, Geneva, Tahoma, sans-serif;            
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
.b , .ab{
    color: saddlebrown;
    text-shadow: 2px 2px 4px #000000;            
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    margin-top: 14px;
    margin-left: -10px;
}
.ab:hover{
    color: chocolate;
}
body{
    background-image: url("Images/p.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 40px, 30px;
    font-family: 'Courier New', Courier, monospace;
}

li{
    float: right;
    margin-top: 10px;
    margin-bottom: -15px;            
}        
li a{
    font-size: 22px;
    display: block;
    color:  rgb(255, 255, 255);
    text-align: center;
    padding: 16px 15px;
    text-decoration: none; 
}
li a:hover:not(.active) {
    color: rgb(230, 200, 178);
    font-style: italic;
}  
   
ul{
    list-style: none;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
    
input[type=text], input[type=password], input[type=date], input[type=address], input[type=file], select {
                width: 100%;
                padding: 5px 10px;
                margin: 5px 0;
                font-size: 15px;
                display: inline-block;
                background-color: rgba(95, 158, 160, 0);
                border: 0px;
                border-bottom : 3px solid rgb(22, 11, 1);
                border-radius: 4px;
                box-sizing: border-box;
                color: #000;
                
            }
            input[type=text]:hover, input[type=password]:hover, input[type=date]:hover, input[type=address]:hover, input[type=file]:hover{    
                    border-bottom: 3px solid rgb(138, 96, 56);
            }
            input[type=submit]{
                background-color: rgb(65, 50, 36);
                border-radius: 10px;
                height: 50px;
                width: 120px;
                float: right;
                color: white;
                margin-top: 30px;
                font-size: 20px;
            }
            input[type=submit]:hover{
                background-color: rgb(173, 131, 81);
            }
          
            .right-content{
                margin-top: -50px;
                margin-left: -350px;
                float: left;
                width: 900px;
                height: 900px;
                border-radius: 10px;
                filter: drop-shadow(10px 5px 4px #72593feb);
            
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;    
    
                
                background-image: url("Images/formbg.png");
                background-repeat: no-repeat;
                background-position:inherit;
                background-size: 100% 110%;        
            }
    
            .right-form-content{
                margin-top: -300px;
                height: 45%;
                width: 60%;
                position: relative;
                font-size: 20px;    
                color:white; 
            }
            label{
                color: saddlebrown;
                font-weight: bold;
            }
            select{
                color: saddlebrown;
            }
            option{
                background-color:rgb(108, 68, 34);
                color: white;
                font-style: italic;    
            }
    
            .fa-magnifying-glass{
                color: saddlebrown;
            }
            .h1{
                text-shadow: 2px 2px 4px #000000;
            }
     
    
            .left-content{
                        
                margin-left: -800px;
                margin-right: 40px;
                margin-top: 20px;
                float: right;
                width: 700px;
                height: 800px;
                border-radius: 10px;
                filter: drop-shadow(10px 5px 4px #72593feb);
            
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;    
    
                
                background-color: rgba(60, 40, 23, 0.46);
                background-size: 70% 90%;  
                        
            }
    
            .left-form-content{
                margin-top: -400px;
                height: 45%;
                width: 80%;
                color: white;
                position: relative;
                font-size: 20px;    
            }
    
</style>
</head>
<body>
    <!-- NAV -->
    
    <?php

      
            include_once "Includes/registrationNav.inc.php";
        
    ?>



<div class="container">
    <form action="Backend/RegisterBackend.php" method="post" enctype="multipart/form-data"> 
    
    <div class="right-content">
     
         <div class="right-form-content">
             <h1 class="h1">RE<i class="fa-solid fa-magnifying-glass">UEST</i>OR's PROFILE</h1>
             <!-- FORM -->
            
                 <BR>
                 <label for="email">Email</label>
                 <input type="text" name="userEmail" placeholder="Enter a valid email..."  required/>
 
                 <label for="username">Username</label>
                 <input type="text" name="userName" placeholder="Enter a username..."  required/>
 
                 <label for="password">Password</label>
                 <input type="password" name="userPassword" placeholder="Enter a password"  required/>
 
                 <label for="confirm">Confirm password:</label>
                 <input type="password" placeholder="Confirm password"  required/>
 
                 <label for="fname">First name:</label>
                 <input type="text" name="firstName" placeholder="Enter your First name" required/>
 
                 <label for="fname">Last name: </label>
                 <input type="text" name="lastName" placeholder="Enter your Last name"  required/>
 
                 <label for="sex">Sex: </label>
                 <select name="userGender"> 
                     <option value="Male"> Male </option>
                     <option value="Female"> Female </option>
                     <option value="Other"> Other </option>
                 </select>
 
                 <label for="education">Education Attainment </label>
                 <select name="education"> 
                     <option selected="" disabled="">Select City / Education</option>
                     <option value="Abucay">Elementary Graduate</option>
                     <option value="Bagac">Secondary Graduate</option>
                     <option value="Balanga">Junior High School Graduate</option>
                     <option value="Dinalupihan">Senior High School Graduate</option>
                     <option value="Hermosa">College/University Graduate</option>
                     <option value="Hermosa">Vocational Training Graduate</option>
                 </select>

                 <label for="bday">Birthdate</label>
                <input type="date" name="birthDate" placeholder="mm/dd/yyy">
 
            
         </div>

    </div>





       <div class="left-content">
            
        <div class="left-form-content">
            
    
            <!-- FORM -->
           
                <BR>

                <label style="color:rgb(191, 126, 70); font-weight: lighter;" for="address">Address</label>
                <input type="address" name="houseNumber" placeholder="House number"/> 
                <input type="address" name="street" placeholder="Street"  required/> 
                <input type="address" name="baranggay" placeholder="Barangay"  required/> 

                <label  style="color:rgb(191, 126, 70); font-weight: lighter" for="bday">Municipality</label>
                 <select name="municipality" required> 
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
 
    

                <label  style="color:rgb(191, 126, 70); font-weight: lighter" for="otherID"> Government provided ID </label>
                <select  style="color:rgb(191, 126, 70);" name="idType">
                    <option value="Driver's License"> Driver's License</option>    
                    <option value="Philhealth"> Philhealth</option>    
                    <option value="Voter's ID"> Voter's ID</option>     
                </select>

                <label  style="color:rgb(191, 126, 70); font-weight: lighter" for="provideID"> Government Provided ID</label>
                <input type="file" name="idFile"  accept= "Image/*,application/pdf,.docx" required>

                <label  style="color:rgb(191, 126, 70); font-weight: lighter" for="idnum">ID number</label>
                <input type="text" name="idNumber" required>

                <label  style="color:rgb(191, 126, 70); font-weight: lighter" for="idExpire">ID expiration</label>
                <input type="date" name="idExpiration">

                <label  style="color:rgb(191, 126, 70); font-weight: lighter;" for="displaypic">Profile picture</label>
                <input type="file" name="userPhoto" accept= "Image/*"capture required>



                
                <input type="hidden" name="userType" value="Requestor"/>

                <input type="submit" value="Register"/>

            </div>

        </div>
    </form>

   </div>

</body>
</html> 


