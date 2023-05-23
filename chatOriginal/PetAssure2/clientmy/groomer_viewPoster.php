<?php
require '../config/db.php';
session_start();
$userid = isset($_SESSION["userid"]) ? $_SESSION["userid"] : "";

if (!empty($userid)) {
   // Retrieve data from the groomer_posts table for the logged-in user
   $sql = "SELECT package_name, price, description FROM groomer_posts WHERE userid='$userid'";
   $result = mysqli_query($con, $sql);
   
   // Process the result set as needed
   
   mysqli_close($con);
} else {
   echo "Please log in to view this page.";
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
<title>PetAssure</title>
<link rel="stylesheet" href="../css/groomer_viewPoster.css">
<body>
   <div class="nav" style="width: 100%;">
            <div class="left">
                <img src="../Images/logo.png" width="100px" height="100px">
                <p style="margin-left: 20px;">PetAssure</p>
            </div>

            <div class="right">
                <a href="../index.php" class="font">HOME</a>
                <a href="groomerDashboard.php" class="font">DASHBOARD</a>
                <a href="groomerDashboard.php" class="font">BACK</a>

                <a href="../logout.php" class="font">LOG OUT </a>
            </div>
        </div>
<div class="container2">
  
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="box">
      <div class="box-text">
        <h2>Package : <?= $row['package_name'] ?><hr></h2>
        <h3>Price : Rs <?= $row['price'] ?><hr></h3>
        <p>Services : <br><br>
            <?= $row['description'] ?></p>
      </div>
    </div>
  <?php endwhile; ?>
</div>

<div class="footerr">
                        <p> Telephone No: +94 11 233 5632
                            Fax: +94 11 233 5632
                            Email: petAssure@hotmail.com​</p>
                    </div>

</body>
</html>