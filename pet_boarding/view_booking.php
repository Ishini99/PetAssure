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
                <li><a href="groomerDashboard.php">
                        <i class="uil uil-dashboard"></i>
                        <span class="link-name">Dashboard</span> </a></li>
                <li><a href="userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
             
                <li><a href="history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">History</span>
                    </a></li>
                <li><a href="petboarding-Dashboard_shedule.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Add a cagae category </span>
                    </a></li>
                <li><a href="feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Booking details</span>
                    </a></li>
                    <li><a href="cages.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Cage availability</span>
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
if (isset($_GET['book_id'])) {
  $book_id = $_GET['book_id'];
  // Query the database to get the booking details
  $query = "SELECT b.book_id, cc.size, u.uname, u.mobile, b.checkin_date, b.checkout_date, b.type, b.food_pref, b.med, b.name, b.status
            FROM bookings b
            JOIN cage c ON b.cage_id = c.cage_id
            JOIN cage_categories cc ON c.cat_id = cc.cat_id
            JOIN user u ON b.userid = u.userid
            WHERE b.book_id = $book_id";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Build the HTML code for the booking details
    $html = "<center><h2>Booking Details</h2></center>";
    $html .= "<img src='../images/figma/homepage dog.png'>";

    $html .= "<p><strong>Size:</strong> " . $row['size'] . "</p>";
    $html .= "<p><strong>User Name:</strong> " . $row['uname'] . "</p>";
    $html .= "<p><strong>Mobile:</strong> " . $row['mobile'] . "</p>";
    $html .= "<p><strong>Checkin Date:</strong> " . $row['checkin_date'] . "</p>";
    $html .= "<p><strong>Checkout Date:</strong> " . $row['checkout_date'] . "</p>";
    $html .= "<p><strong>Type:</strong> " . $row['type'] . "</p>";
    $html .= "<p><strong>Food Preference:</strong> " . $row['food_pref'] . "</p>";
    $html .= "<p><strong>Medication:</strong> " . $row['med'] . "</p>";
    $html .= "<p><strong>Status:</strong> " . $row['status'] . "</p>";

    echo $html;
  } else {
    echo "<p>No booking found for book_id=$book_id.</p>";
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