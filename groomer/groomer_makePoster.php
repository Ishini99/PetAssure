<?php
require '../config/db.php';
session_start();
$userid = "";

if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  //header("location:login.php");
}

// Check if form has been submitted
if (isset($_POST['submit'])) {
  // Initialize a counter to keep track of the number of successful inserts
  $successCount = 0;

  // Loop through each dynamically added field and insert into the database
  foreach ($_POST['package_name'] as $key => $value) {
    $package_name = $_POST['package_name'][$key];
    // Correct the variable name from package_name to price
    $price = $_POST['price'][$key];
    $description = $_POST['description'][$key];

    // Insert data into the groomer_posts table
    // Enclose the $description variable in single quotes
    $sql = "INSERT INTO groomer_posts (package_name, price, description, date, userid) VALUES ('$package_name','$price','$description', NOW(), '{$_SESSION['userid']}')";

    if (mysqli_query($con, $sql)) {
      $successCount++;
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
  }

  // Check if any records were successfully inserted
  if ($successCount > 0) {
    echo "<script>alert('New record created successfully');</script>";
  }
}

mysqli_close($con);
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
              <textarea class="form-control" name="description[]" rows="3"
                placeholder="Enter your package details"></textarea>
            </div>
          </div>

          <div id="additional-fields">
            <!-- Additional fields will be added here -->
          </div>

          <div class="input-group">
            <button type="button" class="btn btn-primary" onclick="addFields()">Add More Packages</button>
            <button type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit">Submit</button>
          </div>

        </div>
      </div>
    </form>

    </div>
    </div>
    <script>
      function addFields() {
        // Clone the package container and its contents
        var packageContainer = document.getElementById("package-container");
        var newContainer = packageContainer.cloneNode(true);

        // Clear the input fields
        var inputs = newContainer.getElementsByTagName("input");
        for (var i = 0; i < inputs.length; i++) {
          inputs[i].value = "";
        }

        // Clear the textarea field
        var textarea = newContainer.getElementsByTagName("textarea")[0];
        textarea.value = "";

        // Append the new container to the form
        var additionalFields = document.getElementById("additional-fields");
        additionalFields.appendChild(newContainer);
      }
    </script>
    <script src="../js/script.js"></script>

  </section>

  <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
    <p> Telephone No: +94 11 233 5632
      Fax: +94 11 233 5632
      Email: petAssure@hotmail.com​</p>
  </div>
</body>


</html>