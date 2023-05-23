<?php
require '../config/db.php';
session_start();
$userid = "";

if (isset($_SESSION["userid"])) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 1cb1b5d35d8ba6a5b7f0a16f10af22c3a6cf5f9a
    $userid = $_SESSION["userid"];

    // Assuming you have a database connection established
    // Replace "your_table_name" with the actual table name in your database
    $sql = "SELECT appNo FROM appointment WHERE userid = '$userid'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the appNo value
        $row = mysqli_fetch_assoc($result);
        $appNo = $row["appNo"];

        // Now you have the appNo associated with the userid
        // You can use it as needed
    } else {
        // No matching appNo found for the userid
        // Handle the situation accordingly
    }
}

if (isset($_POST["submit"])) {
    $petName = $_POST["petName"];
    $petType = $_POST["petType"];
    $petAge = $_POST["Age"];
    $breed = $_POST["breed"];

    if (isset($appNo)) {
        $sql = "INSERT INTO petdetails (petName, petType, petAge, breed, ) VALUES ('$petName', '$petType', '$petAge', '$breed')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Pet details inserted successfully
            // Add your desired logic or redirect to another page
        } else {
            // Error occurred while inserting pet details
            echo "Error: " . mysqli_error($con);
        }
    } else {
        // Handle the case when $appNo is not set
    }
}

?>

<<<<<<< HEAD
=======
=======
  $userid = $_SESSION["userid"];
} else {
  //header("location:login.php");
}

// Check if form has been submitted
if (isset($_POST['submit'])) {
  // Initialize a counter to keep track of the number of successful inserts
  $successCount = 0;

  // Loop through each dynamically added field and insert into the database
  for ($i = 0; $i < count($_POST['package_type']); $i++) {
    $package_name = $_POST['package_name'][$i];
    $package_type = $_POST['package_type'][$i];
    $price = $_POST['price'][$i];
    $description = $_POST['description'][$i];

    $sql = "INSERT INTO groomer_posts (`package_name`, `package_type`, `price`, `description`, `date`, `userid`) VALUES ('" . mysqli_real_escape_string($con, $package_name) . "', '" . mysqli_real_escape_string($con, $package_type) . "', '" . mysqli_real_escape_string($con, $price) . "', '" . mysqli_real_escape_string($con, $description) . "', NOW(), '" . mysqli_real_escape_string($con, $_SESSION['userid']) . "')";

    if (mysqli_query($con, $sql)) {
      $successCount++;
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
  }

  // Check if any records were successfully inserted
  if ($successCount > 0) {
    echo "<script>alert('New record(s) created successfully');</script>";
  }
}

mysqli_close($con);
?>


>>>>>>> cd00ddc15620efcfc751e04b0ffc53311215f53b
>>>>>>> 1cb1b5d35d8ba6a5b7f0a16f10af22c3a6cf5f9a
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>Petassure</title>
    <link rel="stylesheet" href="../css/petDetails.css">
</head>

<body>
    <div class="nav" style="width: 100%;">
        <div class="left">
            <img src="../Images/logo.png" width="100px" height="100px">
            <p style="margin-left: 20px;">PetAssure</p>
        </div>

        <div class="right">
            <a href="../index.php" class="font">HOME</a>
            <a href="vetDashboard.php" class="font">DASHBOARD</a>
            <a href="../logout.php" class="font">BACK </a>
            <a href="../logout.php" class="font">LOG OUT </a>
        </div>
    </div>
    <div class="form-style-5">
    <form method="POST" action="">
    <fieldset>
        <h3>Pet Details</h3>

        <input type="text" name="petName" placeholder="Pet Name">
        <input type="text" name="Age" placeholder="Age">
        <div class="radio-container">
            <label for="petType">Pet Type</label>
            <br><br>
            <input type="radio" id="cat" name="petType" value="cat">
            <label for="cat">Cat</label>

            <input type="radio" id="dog" name="petType" value="dog">
            <label for="dog">Dog</label>
        </div>

        <input type="text" name="breed" placeholder="Breed">
    </fieldset>

    <input type="submit" name="submit" value="Submit" />
</form>
    </div>
    
    <div class="footerr">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>

</html>