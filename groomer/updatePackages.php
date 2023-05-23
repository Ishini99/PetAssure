<?php

session_start();
require '../config/db.php';
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  exit("You must log in to access this page.");
}

// if (isset($_GET["id"])) {

//   $id = $_GET["id"]; // get the package id from the URL parameter
// }

$id = isset($_POST["id"]) ? $_POST["id"] : '';
$package_name = isset($_POST["package_name"]) ? $_POST["package_name"] : '';
$price = isset($_POST["price"]) ? $_POST["price"] : '';
$description = isset($_POST["description"]) ? $_POST["description"] : '';


if (isset($_POST["update"])) {

  $query = "UPDATE `groomer_posts` SET package_name='$package_name', price='$price', description='$description', date=NOW() WHERE id= '$id'";
  $sql = mysqli_query($con, $query);

  if ($sql) {
    echo "<script>alert('Record updated successfully')</script>";
    // header("Location:updatePackages.php");
  } else {
    echo "ERROR: Could not execute $query. " . mysqli_error($con);
  }
}
// Fetch the existing data for pre-populating the form
$query = "SELECT * FROM `groomer_posts` WHERE id='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$existing_package_name = $row['package_name'];
$existing_price = $row['price'];
$existing_description = $row['description'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="../css/groomer_makePoster.css">
  <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <title>PetAssure</title>
  <style>
    .styled-table {
      border-collapse: collapse;
      margin: 25px 0;
      box-shadow: 0 0 20px rgba(0, 10, 0, 0.15);
    }

    .styled-table tr {
      background-color: #E0E0E0;
      color: #ffffff;

    }

    .styled-table tr {
      border-bottom: 1px solid #A6A6A6;
    }
  </style>


</head>

<body class="body-scroller">

  <nav>
    <div class="logo-name">
      <div class="logo-image">
        <img src="../Images/logo.png" alt="">
      </div>

      <span class="logo_name">PetAssure</span>
    </div>

    <div class="menu-items">
      <ul class="nav-links">
        <li><a href="groomerDashboard.php">
            <i class="uil uil-dashboard"></i>
            <span class="link-name">Dashboard</span> </a></li>
        <li><a href="userProfile.php">
            <i class="uil uil-user"></i>
            <span class="link-name">User Profile</span>
          </a></li>
       

        <li><a href="appointments.php">
            <i class="uil uil-calender"></i>
            <span class="link-name">Appointments</span>
          </a></li>
        <li><a href="packages.php">
            <i class="uil uil-calender"></i>
            <span class="link-name">My packages</span>
          </a></li>




      </ul>

      <ul class="logout-mode">
        <li><a href="../logout.php">
            <i class="uil uil-signout"></i>
            <span class="link-name">Logout</span>
          </a></li>


      </ul>
    </div>
  </nav>

  <section class="dashboard">
    <div class="top">
      <i class="uil uil-bars sidebar-toggle"></i>
    </div>
    <div style="padding-bottom: 20px;"></div>
    <form method="POST" action="">
  <div class="row">
    <div class="container">
      <h4>Update My Packages</h4>

      <div id="package-container">
        <div class="input-group">
          <h5>Package Name</h5>
          <input type="text" class="form-control" name="package_name" value="<?php echo $existing_package_name; ?>">
        </div>

        <div class="input-group">
          <h5>Price</h5>
          <input type="text" class="form-control" name="price" value="<?php echo $existing_price; ?>">
        </div>

        <div class="input-group">
          <h5>Description</h5>
          <textarea class="form-control" name="description" rows="3"><?php echo $existing_description; ?></textarea>
        </div>
      </div>

      <div class="input-group">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-primary btn-user btn-block" name="update">Update</button>
      </div>

    </div>
  </div>
</form>




    </div>
    </div>

    <script src="../js/script.js"></script>

  </section>

  <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
    <p> Telephone No: +94 11 233 5632
      Fax: +94 11 233 5632
      Email: petAssure@hotmail.com​</p>
  </div>
</body>


</html>