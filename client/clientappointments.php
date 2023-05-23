<?php
require_once('../config/db.php');
session_start();
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  //header("location:login.php");
  exit("You must log in to access this page.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/style_appointments1.css">
  <link rel="stylesheet" href="../css/groombooking.css">

  <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

  <title>PetAssure</title>
  <style>
    .styled-table {
      border-collapse: collapse;
      margin: 25px 0;
      box-shadow: 0 0 20px rgba(0, 10, 0, 0.15);
    }

    .styled-table tr {
      background-color: #E0E0E0;
      color: #ffffff;
    }

    .styled-table tr {
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
      <li><a href="services1.php">
                        <i class="uil uil-apps"></i>
                        <span class="link-name">Services</span>
                    </a></li>
        <li><a href="./userProfile.php">
            <i class="uil uil-user"></i>
            <span class="link-name">User Profile</span>
          </a></li>
        <!-- <li><a href="./notifications.php">
            <i class="uil uil-bell"></i>
            <span class="link-name">Notifications</span>
          </a></li> -->
        <li><a href="./history.php">
            <i class="uil uil-history"></i>
            <span class="link-name">My Posts</span>
          </a></li>
        <li><a href="./appointments.php">
            <i class="uil uil-calender"></i>
            <span class="link-name">Appointments</span>
          </a></li>
        <!-- <li><a href="indexVet.php">
            <i class="uil uil-comments"></i>
            <span class="link-name">Feedbacks</span>
          </a></li> -->
        <!-- <li><a href="./freeConsultation.php">
                        <i class="uil uil-chat"></i>
                        <span class="link-name"></span>
                    </a></li> -->

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
    <?php
// Retrieve the user ID from the session or from a query parameter
$userid = $_SESSION['userid'];

// Query to retrieve appointments and service provider details based on user ID
$sql = "SELECT a.*, s.*, u.uname, u.email, u.mobile
        FROM appointment a 
        INNER JOIN serviceprovider s 
        ON a.spid = s.spid 
        INNER JOIN user u
        ON s.userid = u.userid
        WHERE a.userid = '$userid'";


$result = mysqli_query($con, $sql);
?>

<!-- Display the results in a table -->
<table>
  <thead>
    <tr>
      <th>Appointment Number</th>
      <th>Appointment Date</th>
      <th>Start Time</th>
      <th>End Time</th>
      <th>Status</th>
   
      <th>Service Provider Name</th>
      <th>Service Provider Email</th>
      <th>Service Provider Phone</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php echo $row['appNo']; ?></td>
        <td><?php echo $row['appoDate']; ?></td>
        <td><?php echo $row['startTime']; ?></td>
        <td><?php echo $row['endTime']; ?></td>
        <td><?php echo $row['status'] == 0 ? 'Available' : 'Booked'; ?></td>
        <td><?php echo $row['uname']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['mobile']; ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
