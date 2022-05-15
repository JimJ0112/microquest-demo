<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="manifest" href="manifest.json">
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <meta content='yes' name='mobile-web-app-capable'/>
    <title>Register</title>
</head>
<body>

<form action="Backend/RegisterBackend.php" method="post" enctype="multipart/form-data"> 


    <input type="hidden" name="usertype" value="Requestor"/>

    <input type="text" name="firstname" placeholder="first name" required/> <br/>
    <input type="text" name="lastname" placeholder="last name"  required/> <br/>
    <input type="text" name="middlename" placeholder="middle name"  required/> <br/>
    <input type="email" name="email" placeholder="email"  required/> <br/>
    <input type="password" name="password" placeholder="password"  required/> <br/>
    <input type="text" name="occupation" placeholder="occupation" /> <br/>
    <input type="address" name="address" placeholder="address"  required/> <br/>
    <input type="date" name="Birthdate"> <br/><br/>

    ID CARD: <input type="file" name="idcard"  required> <br/>
    SIGNATURE: <input type="file" name="signature"  required> <br/>
    SNAPSHOT: <input type="file" name="snapshot"  required> <br/>
    
 
    <input type="submit"/>







</form>
    
</body>
</html>