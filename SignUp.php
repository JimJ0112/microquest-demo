<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/80d3ebf6b6.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="design.css">
    <title>SIGN UP NOW!</title>
</head>


<body style="background-image: url(images/p.jpg);">
    <!-- NAV -->
  <?php
    include "Includes/registrationNav.inc.php";


  ?>



    <div class="card" style="margin-left: -80px;">
        <div class="container">
            <img src="images/requestor.png" alt="John" style="width:100%">
            <h1 class="h_request">Do you want to hire someone for your request?</h1>
            <p > Sign in as <a href="Requestor_SignUp.php" class="req">  Requestor</a></p>
        </div>
        
    </div>

      <div class="card">
        <div class="container">
            <img src="images/responder.png" alt="John" style="width:100%">
            <h1 class="h_request">Do you want to find additional income?</h1>
            <p > Sign in as <a href="Responder_SignUp.php" class="resp">  Responder</a></p>
        </div>   
      </div>


</body>
</html> 


