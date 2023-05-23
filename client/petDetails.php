<?php
require '../config/db.php';
session_start();
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  //header("location:login.php");
  exit("You must log in to access this page.");
}
$userid = "";
$getUser="";

if (isset($_GET['uid'])) {
    $getUser = $_GET['uid'];
}

$sql = "SELECT spid FROM serviceprovider WHERE userid = '$getUser'";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $spid = $row['spid'];
    // do something with $spid
} else {
    // handle case where spid is not found for given userid
}

if (isset($_POST["bsubmit"])) {
    $appNo = $_GET['id'];
    $petName = $_POST["petName"];
    $petType = $_POST["petType"];
    $petAge = $_POST["Age"];
    $breed = $_POST["breed"];

    if (!empty($appNo)) {
        $sql = "INSERT INTO petdetails (appNo, petName, petType, petAge, breed, userid, spid,description) VALUES ('$appNo', '$petName', '$petType', '$petAge', '$breed', '$userid', '$spid','')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            header("Location: payment.php");
            exit();
        } else {
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