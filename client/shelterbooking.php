<?php
require_once('../config/db.php');
session_start();


$sql = "SELECT * FROM serviceprovider";
$result = mysqli_query($con, $sql);
?> 

<?php
// session_start();
require 'config.php';

$clientid="";

$appNo="";
//if(isset($_SESSION["clientid"]) ){
//  $clientid =$_SESSION["clientid"];
//}else{
  //header("location:login.php");
//}
if (isset($_GET['scheduleDate']) ) {
	$appdate =$_GET['scheduleDate'];
	$appid = $_GET['appNo'];
}

$spid = "1";

$sql = "SELECT *
FROM appointment
INNER JOIN serviceprovider
ON appointment.spid = serviceprovider.spid
AND serviceprovider.spid = '$spid'";
($result = mysqli_query($con, $sql));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style_appointments.css">
    <link rel="stylesheet" href="css/groombooking.css">
    
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PetAssure</title>
    <style>
    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    box-shadow: 0 0 20px rgba(0, 10, 0, 0.15);
}
.styled-table  tr {
    background-color: #E0E0E0;
    color: #ffffff; 
}
.styled-table  tr {
    border-bottom: 1px solid #A6A6A6;
}

 

   </style>


</head>

<body class="body-scroller">

    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../images/logo.png" alt="">
            </div>

            <span class="logo_name">PetAssure</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
            <li><a href="./userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
                    <li><a href="./notifications.php">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">Notifications</span>
                    </a></li>
                    <li><a href="./history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">History</span>
                    </a></li>
                    <li><a href="./appointments.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Appointments</span>
                    </a></li>
                    <li><a href="./feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Feedbacks</span>
                    </a></li>
                    <li><a href="./freeConsultation.php">
                        <i class="uil uil-chat"></i>
                        <span class="link-name">Get Free Consultation</span>
                    </a></li>

            </ul>

            <ul class="logout-mode">
                <li><a href="../login.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>
        <div style="padding-bottom: 20px;"></div>
        <center>
        <table class="styled-table" cellspacing=0 cellpadding=30>
      
      <?php
    
      //$rows = mysqli_query($con, "SELECT * FROM vetimage ")
      ?>

     
    
     
       <div class="container">
       <div class="profilepic">
             <div class="proimg">
                <img src="./Images/cat1.jpg" onclick="myFunction(this)">
                <img src="./Images/Dog1.jpg" onclick="myFunction(this)">
                <img src="./Images/dog2.jpg" onclick="myFunction(this)">
                <img src="./Images/dog3.jpg" onclick="myFunction(this)">
                <img src="./Images/cat1.jpg"  onclick="myFunction(this)">


             </div>
             <div class="img-container">
               <img id="imageBox" src="./Images/cat1.jpg"> 

             </div>
      </div>

      <div class="details">
      <script>
        function myFunction(smallImg)
        {
          var fullImg = document.getElementById("imageBox");
           fullImg.src = smallImg.src; 
        }
      </script>

    <?php

$sql = "SELECT * FROM serviceprovider";

if ($result = mysqli_query($con, $sql))
 {
   
  
    if (mysqli_num_rows($result) > 0) {


            $row = mysqli_fetch_array($result);
           

            echo "<div class='info'><strong>  <i class='fa-solid fa-user'></i>   :</strong> <span>" . $row['fname'] . "</span></div>";
            echo "<div class='info'><strong><i class='fa-solid fa-phone-volume'></i>   :</strong> <span>" . $row['mobile'] . "</span></div>";
            echo "<div class='info'><strong><i class='fa-solid fa-envelope'></i>   :</strong> <span>" . $row['email'] . "</span></div>";
            echo "<div class='info'><strong><i class='fa-solid fa-location-dot'></i>   :</strong> <span>" . $row['address'] . "</span></div>";
            echo "<div class='info'><strong><i class='fa-sharp fa-solid fa-folder-open'></i>   :</strong> <span>" . $row['details'] . "</span></div>";
        
        
    }
   
}

            
            ?>
            </div>
</div>
<div class="bookbtn">
<a href="./shelterbookingform.html"> <button style="color: #E0E0E0;" type="submit">Book</button></a>
</div>
        <!-- </div>
        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'"
                class="cancelbtn">Cancel</button>

        </div>
        </form>
        </div> -->



        <script src="script.js"></script>
        <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>

        <script src="script.js"></script>

    </section>

    
            

<div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
    <p> Telephone No: +94 11 233 5632
        Fax: +94 11 233 5632
        Email: petAssure@hotmail.com​</p>
</div>

</body>


</html>