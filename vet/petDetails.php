<?php
require '../config/db.php';
session_start();
$userid = "";

if (isset($_SESSION["userid"])) {
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