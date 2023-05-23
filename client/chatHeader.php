<?php
require '../config/db.php';
include("ChatUser.php");
include("ChatMessage.php");
ob_start(); // Turns on output buffering
session_start(); // allow as to store the values on sessions

$userid = "";
if (isset($_SESSION["userid"]) && isset($_SESSION["uname"])) {
  $userid = $_SESSION["userid"];
} else {
  //header("location:login.php");
}


if (isset($_SESSION['uname'])){
    $userLoggedIn = $_SESSION['uname'];
    $user_details_query = mysqli_query($con, "SELECT * FROM user WHERE uname='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}else{
    // header("Location: register.php");
}

?>

<html lang="en">
<head>
    <title>PetAssure</title>


  
    <script src="../js/chatjquery.min.js"></script>
   
    <!-- CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/chatstyle.css">

    
</head>

<body>









    <div class="nav" style="width: 100%;">
        <div class="left">
            <img src=../images/logo.png width="100px" height="100px">
            <p style="margin-left: 20px;">PetAssure</p>
        </div>

        <div class="right">
           <b>  
         <?php echo $user['fname'] . "  " . $user['lname']; ?></b>
            <a href="services1.php" class="font">SERVICES</a>
             
       
            <a href="chatmessages.php" class="font">CHAT</a>
           
        </div>
    </div>

    <div class="wrapper">




    </body>
    </html>