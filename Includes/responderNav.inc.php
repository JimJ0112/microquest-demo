<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav.css">
    
</head>
<body>
        <!-- NAV -->
        <div style="color: white">
    <h1 style="float: left; font-size: 37px; margin-right: 9px" class="a">micro</h1>
    <h1  style="float: left; font-size: 44px; margin-right: 9px" class="b">Quest</h1>

          <ul> 
            <li><a href="Backend/Logout.php">LOG OUT</a> </li>
            <li>
              <a href="User_Profile.php" style="margin-right: 450px;">
                  <?php
                        if(isset($_SESSION["userName"])){
                            echo $_SESSION["userName"];
                        } else {
                            echo"User Profile";
                        }
                  ?>
            
                </a>
            </li>
            
            <li><a href="Responder_Home.php">Home</a></li>
            <li><a href="Messages.php">Message</a></li>    
            
          </ul>
          <hr style="border: 1px solid rgb(230, 200, 178)" />

    </div>
</body>
</html>