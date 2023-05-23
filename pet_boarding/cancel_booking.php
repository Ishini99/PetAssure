<?php
require '../config/db.php';
session_start();
$spid ="";
$book_id="";
if(isset($_SESSION["spid"]) ){
    $spid =$_SESSION["spid"];
}else{
   //header("location:login.php");
}
// real dM
?>
<?php
// get booking ID from query parameter
$book_id = $_GET['book_id'];

// update bookings table
$query = "UPDATE bookings SET status = 0 WHERE book_id = $book_id";
mysqli_query($con, $query);

// get cage ID and category ID
$query = "SELECT c.cage_id, cc.cat_id FROM bookings b
          JOIN cage c ON b.cage_id = c.cage_id
          JOIN cage_categories cc ON c.cat_id = cc.cat_id
          WHERE book_id = $book_id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$cage_id = $row['cage_id'];
$cat_id = $row['cat_id'];

// update cage table
$query = "UPDATE cage SET status = 0 WHERE cage_id = $cage_id";
mysqli_query($con, $query);

// update cage_categories table
$query = "UPDATE cage_categories SET qty = qty + 1 WHERE cat_id = $cat_id";
mysqli_query($con, $query);

// redirect back to the previous page
header("Location: ".$_SERVER['HTTP_REFERER']);
?>
