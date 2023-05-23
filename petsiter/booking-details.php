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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/petboarding_feedbacks.css">
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PetAssure</title>



</head>
<style>

.card {
  background-color:#ffff;
  border-radius: 20px;
  border:grey 2px solid;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
  margin-bottom: 20px;
  width:700px;
  margin-left:240px;
  margin-top:150px;
}

.card img {
  float: right;
  margin-top:20px;
  margin-right: 20px;
  border-radius: 50%;
  width: 200px;
  height: 200px;
}

.card h2 {
  color: #333333;
  font-size: 28px;
  font-weight: bold;
  margin-bottom: 20px;
}

.card p {
  color: #666666;
  font-size: 17px;
  margin-bottom: 10px;
  padding-left:90px;
}

.card p strong {
  color: #333333;
  font-weight: bold;
  margin-right: 10px;
}


</style>




<body class="body-scroller">

    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../Images/logo.png" alt="">
            </div>

            <span class="logo_name">PetAssure</span>
        </div>

        <div class="menu-items">
        <ul class="nav-links">
                <li><a href="petsitterDashboard.php">
                        <i class="uil uil-dashboard"></i>
                        <span class="link-name">Dashboard</span> </a></li>
                <li><a href="userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
                    <li><a href="petsitter_shedule.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Availlable dates</span>
                    </a></li>
                
               
             
                <li><a href="history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">Past Bookings</span>
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
       
        </nav>
        <div class="card">
  

        <?php
if (isset($_GET['userid']) && isset($_GET['date'])) {
    // Get the user ID and date from the URL parameters
    $userid = $_GET['userid'];
    $date = $_GET['date'];

    // Prepare the query to retrieve the booking details
    $query = "SELECT p.userid, p.date, p.breed, p.age, p.type, p.des, u.fname, u.mobile 
    FROM `pet-sitter-appointments` p 
    JOIN `user` u ON p.userid = u.userid 
    WHERE p.userid = $userid AND p.date = '$date'";

    // Execute the query and check for errors
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Query Error: ' . mysqli_error($con));
    }

    // Check if the booking exists
    if (mysqli_num_rows($result) == 1) {
        // Get the booking details as an associative array
        $booking = mysqli_fetch_assoc($result);

        // Build the HTML code to display the booking details
        $html = "<h2>Booking Details</h2>";
        $html .= "<img src='../images/figma/homepage dog.png'>";

        $html .= "<p><strong>User Name:</strong> " . $booking['fname'] . "</p>";
$html .= "<p><strong>Mobile:</strong> " . $booking['mobile'] . "</p>";
        $html .= "<p><strong>User ID:</strong> " . $booking['userid'] . "</p>";
        $html .= "<p><strong>Date:</strong> " . $booking['date'] . "</p>";
        $html .= "<p><strong>Breed:</strong> " . $booking['breed'] . "</p>";
        $html .= "<p><strong>Age:</strong> " . $booking['age'] . "</p>";
        $html .= "<p><strong>Type:</strong> " . $booking['type'] . "</p>";
        $html .= "<p><strong>Description</strong> " . $booking['des'] . "</p>";

        echo $html;
    } else {
        echo "<p>No booking found for the selected user and date.</p>";
    }
} else {
    echo "<p>Please select a booking to view.</p>";
}
?>



</div> 





        <script src="script.js"></script>

      <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>


</html>