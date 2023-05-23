<?php
// Connect to the database
include_once("config/db.php");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Get the current date and time
$currentDateTime = date('Y-m-d H:i:s');

// Get the appointments that have passed and have no user assigned
$query = "SELECT * FROM appointment WHERE appoDate < '$currentDateTime' AND userid IS NULL";
$result = mysqli_query($con, $query);

// Delete the appointments
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['appoNO'];
    $deleteQuery = "DELETE FROM appointment WHERE appointmentid = '$id'";
    mysqli_query($con, $deleteQuery);
}

// Close the database connection
mysqli_close($con);
?>
