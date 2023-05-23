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
 
?>
<?php
$query = "SELECT cat_id FROM cage WHERE cage_id = $cage_id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$cat_id = $row['cat_id'];

// Update the status of the selected cage in the cage table to 1 (unavailable)
$query = "UPDATE cage SET status = 1 WHERE cage_id = $cage_id";
mysqli_query($con, $query);

// Decrement the qty of the corresponding cat_id in the cage_categories table by 1
$query = "UPDATE cage_categories SET qty = qty - 1 WHERE cat_id = $cat_id";
mysqli_query($con, $query);
?>