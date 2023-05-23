<?php
require '../config/db.php';
session_start();
$spid ="";
$userid="";

if(isset($_SESSION["userid"]) ){
   $userid = $_SESSION["userid"];
} else {
   //header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetAssure</title>
    <link rel="stylesheet" href="../css/groomer_makePoster.css">
</head>
<body>
<body class="profile-page">
        <div class="nav" style="width: 100%;">
            <div class="left">
                <img src="../Images/logo.png" width="100px" height="100px">
                <p style="margin-left: 20px;">PetAssure</p>
            </div>

            <div class="right">
                <a href="../index.php" class="font">HOME</a>
                <a href="groomerDashboard.php" class="font">DASHBOARD</a>
                <a href="packages.php" class="font">BACK</a>

                <a href="../logout.php" class="font">LOG OUT </a>
            </div>
        </div>
<form method="POST">  
      <div class="row">
        <div class="container">
          <h4>My packages</h4>
          
          <div id="package-container">
            <div class="input-group">
              <h5>Package Name</h5>
              <input type="text" class="form-control" name="package_name[]" placeholder="Enter your package name">
            </div>
            <!-- Correct the name of the input field from package_name to price -->
            <div class="input-group">
              <h5>Price</h5>
              <input type="text" class="form-control" name="price[]" placeholder="Enter your package price">
            </div>
            
            <div class="input-group">
              <h5>Description</h5>
              <textarea class="form-control" name="description[]" rows="3" placeholder="Enter your package details"></textarea>
            </div>
          </div>
          
         
          
          <div class="input-group">
  
  <button type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit">Submit</button>
</div>

        </div>
      </div>
    </form>
    
    
    <script>
     
    </script>
    <div class="footerr">
                        <p> Telephone No: +94 11 233 5632
                            Fax: +94 11 233 5632
                            Email: petAssure@hotmail.com​</p>
                    </div>
  </body>
  
</html>