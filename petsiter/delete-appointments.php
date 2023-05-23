<?php
require '../config/db.php';
session_start();
$spid = "";
$userid = "";

if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
} else {
    // redirect to login page if user is not logged in
    header("location: login.php");
}

$query = "SELECT spid FROM serviceprovider WHERE userid = '$userid'";

$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $spid = $row['spid'];
} else {
    // error message for service provider not found
    echo "Service provider not found";
    exit;
}

// check if sitno is set and not empty
if (isset($_GET['sitno']) && !empty($_GET['sitno'])) {
    // sanitize the sitno input
    $sitno = mysqli_real_escape_string($con, $_GET['sitno']);

    // delete appointment with the given sitno
    $delete_query = "DELETE FROM `pet-sitter-appointments` WHERE `sitno` = '$sitno'";
    if (mysqli_query($con, $delete_query)) {
        // success message
        echo "Appointment deleted successfully";
    } else {
        // error message
        echo "Error deleting appointment: " . mysqli_error($con);
    }
} else {
    // error message for missing or empty sitno parameter
    echo "Missing or empty sitno parameter";
}

// close database connection
mysqli_close($con);
