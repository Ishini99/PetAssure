<?php
require '../config/db.php';
session_start();
$spid ="";
if(isset($_SESSION["spid"]) ){
    $spid =$_SESSION["spid"];
} else {
   //header("location:login.php");
}

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    
    // Update the bookings table to set check_out to 1
    $query = "UPDATE bookings SET check_out = 1, status = 0 WHERE book_id = $book_id";
    mysqli_query($con, $query);
    
    // Retrieve the cage ID and category ID for the booking
    $query = "SELECT c.cage_id, cc.cat_id FROM bookings b
              JOIN cage c ON b.cage_id = c.cage_id
              JOIN cage_categories cc ON c.cat_id = cc.cat_id
              WHERE book_id = $book_id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $cage_id = $row['cage_id'];
    $cat_id = $row['cat_id'];
    
    // Update the cage table to set status to 0
    $query = "UPDATE cage SET status = 0 WHERE cage_id = $cage_id";
    mysqli_query($con, $query);
    
    // Update the cage_categories table to increment qty by 1
    $query = "UPDATE cage_categories SET qty = qty + 1 WHERE cat_id = $cat_id";
    mysqli_query($con, $query);
}

// Redirect back to the previous page
header("Location: ".$_SERVER['HTTP_REFERER']);
?>
