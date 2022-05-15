<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="manifest" href="manifest.json">
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <meta content='yes' name='mobile-web-app-capable'/>
    <title>Login</title>
</head>
<body>

<form action="Backend/LoginBackend.php" method="post"> 

    <input type="email" name="email" placeholder="email"  required/> <br/>
    <input type="password" name="password" placeholder="password"  required/> <br/>
    
 
    <input type="submit"/>







</form>

<a href="Requester_RegistrationForm.php"> Sign Up as a Requestor </a> &nbsp; or &nbsp; 
<a href="Responder_RegistrationForm.php"> Sign Up as a Responder </a>
    
</body>
</html>