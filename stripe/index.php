<?php
require_once('../config/db.php');
session_start();
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  //header("location:login.php");
  exit("You must log in to access this page.");
}
if (isset($_GET['id'])) {
  // print_r($_GET['id']);die();
  $ap_id = $_GET['id'];
  echo "<script> 
    window.onload = function() { 
    document.getElementById('id01').style.display='block';
    } </script>";
}


if (isset($_GET['uid'])) {
  $getUser = $_GET['uid'];
}


$sql = "SELECT * FROM user";
$result = mysqli_query($con, $sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/updateprofile.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

  <title>Pay Page</title>
</head>
<body>
  <div class="wrapper">
    <h2>Invoice</h2>
    <form action="./charge.php" method="post" id="payment-form">
      <!-- <div class="form-row"> -->
          <div class="input-box">
          <input type="text" name="first_name" placeholder="Full Name">
          </div>

          <div class="input-box">
          <input type="text" name="amount"  placeholder="20$">
          </div>

          <div class="input-box">
          <input type="email" name="email" placeholder="Email Address">
          </div>
          
          <div class="input-box">
              <div id="card-element" class="form-control">
              <!-- a Stripe Element will be inserted here. -->
            </div>
          </div>

        <!-- Used to display form errors -->
        <div class="input-box">
        <div id="card-errors" role="alert"></div>
        </div>
        <div  class="paybutton">
      <button>Submit Payment</button>
        </div>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/charge.js"></script>
</body>
</html>