<?php
// deleteAccount.php

// Replace these values with your actual database credentials
$host = "localhost";
$username = "uname";
$password = "password";
$database = "petassure";

// Establish the database connection
$con = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  // Handle the connection error, redirect to an error page, or perform any other action
  exit();
}

// Check if the user ID is provided in the query parameter
if (isset($_GET['userid'])) {
  $userid = $_GET['userid'];

  // Write the SQL query to delete the user from the table
  $delete_query = "DELETE FROM `your_table_name` WHERE `userid` = '$userid'";

  // Execute the delete query
  if (mysqli_query($con, $delete_query)) {
    // Deletion successful
    echo "User account deleted successfully.";
    // Redirect to a success page or perform any other action
  } else {
    // Deletion failed
    echo "Error deleting user account: " . mysqli_error($con);
    // Redirect to an error page or perform any other action
  }
} else {
  // User ID not found in the query parameter
  echo "Invalid request. User ID not found.";
  // Redirect to an error page or perform any other action
}

// Close the database connection
mysqli_close($con);
?>
