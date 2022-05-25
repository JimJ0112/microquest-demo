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
    <title>Admin Registration </title>
</head>
<body>

<center> 
<br> <br> <br> <br>
<form action="RegisterBackend.php" method="post" enctype="multipart/form-data"> 


    <input type="hidden" name="admintype" value="admin"/>
    <input type="text" name="adminusername" placeholder="admin username" required/> <br/> <br>
    <input type="email" name="adminemail" placeholder="admin email"  required/> <br/> <br>
    <input type="password" name="adminpassword" placeholder="password"  required/> <br/> <br>


    
 
    <input type="submit"/>







</form>
</center>

</body>
</html>