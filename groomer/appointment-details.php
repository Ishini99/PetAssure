<?php
require '../config/db.php';
session_start();
$spid = "";
$userid = "";

if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
} else {
    //header("location:login.php");
}
$query = "SELECT spid FROM serviceprovider WHERE userid = '$userid'";

$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $spid = $row['spid'];
} else {

}

$sql = "SELECT *
FROM appointment
INNER JOIN serviceprovider
ON appointment.spid = serviceprovider.spid
AND serviceprovider.spid = '$spid'";

($result = mysqli_query($con, $sql));
?>

<?php
if (isset($_GET['date'])) {
    $appointment_date = $_GET['date'];
} else {
    // Set a default date value
    $appointment_date = date('Y-m-d');
}

// Retrieve the appointment details for the specified date
$rows = mysqli_query(
    $con,
    $sql = "SELECT appointment.appNo, appointment.startTime, appointment.endTime, user.fname,user.mobile, appointment.userid
            FROM appointment
            LEFT JOIN user ON appointment.userid = user.userid
            INNER JOIN serviceprovider ON appointment.spid = serviceprovider.spid
            WHERE serviceprovider.spid = '$spid' AND appointment.appoDate = '$appointment_date'
            ORDER BY appointment.startTime ASC"
);
?>



<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/groomer_appointments.css">


    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PetAssure</title>



</head>

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
             

                <li><a href="appointments.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Appointments</span>
                    </a></li>
                <li><a href="packages.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">My packages</span>
                    </a></li>






            <ul class="logout-mode">
                <li><a href="../logout.php">
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
            <h2> Appointments </h2>
        </center>

        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr>
                    <td width="13%">
                    </td>

                    <td width="0.6%">
                        <p style="font-size: 16px;color: rgb(119, 119, 119);padding: 0;margin: 2;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;font-size: 16px;color: black ; margin-right: -60px;">
                            <?php

                            date_default_timezone_set('Asia/Kolkata');

                            $today = date('Y-m-d');
                            echo $today;

                            ?>
                        </p>
                    </td>
                    <td width="2%">
                        <button class="btn-label"
                            style="display: flex;justify-content: center;align-items: center;"><img src="calendar.svg"
                                width="40px"></button>
                    </td>


                </tr>
                <!-- Display the appointment details in a table -->
<!-- Display the appointment details in a table -->
<!-- Display the appointment details in a table -->
<!-- CSS styles for the status buttons -->
<style>
    .btn-green, .btn-orange, .btn-blue {
        color: white;
        height:30px;
        width: 90px;
        border-radius:10px;
    }

    .btn-green {
        background-color: #4CAF50;
    }

    .btn-orange {
        background-color: #FFA500;
    }

    .btn-blue {
        background-color: #2196F3;
    }

</style>

<table class="styled-table">
    <thead>
        <tr>
            <th>Starting Time</th>
            <th>Ending Time</th>
            <th>Client's Name</th>
            <th>Mobile Number</th>
            <th>Status</th>
            <th>Cancel</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row): ?>
            <?php
            // Determine the appointment status
            $current_time = time();
            $start_time = strtotime($row['startTime']);
            if ($row['userid'] == null) {
                $status = 'Not Booked';
                $status_class = 'btn-orange';
            } elseif ($current_time < $start_time) {
                $status = 'Upcoming';
                $status_class = 'btn-green';
            } else {
                $status = 'In Progress';
                $status_class = 'btn-blue';
            }
            ?>
            <tr data-userid="<?php echo $row['userid']; ?>">
                <td><?php echo $row['startTime'] ?></td>
                <td><?php echo $row['endTime'] ?></td>
                <td><?php echo $row['fname'] ?></td>
                <td><?php echo $row['mobile'] ?></td>
                <td><button class="<?php echo $status_class; ?>"><?php echo $status; ?></button></td>
                <td>
                    <?php if ($status !== 'In Progress') : ?>
                        <form method="post" action="appointment-details.php?date=<?=$appointment_date?>">
                            <input type="hidden" name="appNo" value="<?php echo $row['appNo']; ?>">
                            <input type="submit" name="delete" value="Delete" class="btn-delete">
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
if(isset($_POST["delete"])){
    $appNo = $_POST["appNo"];
    $sql = "DELETE FROM appointment WHERE appNo = '$appNo'";
    if(mysqli_query($con, $sql)){
        // Start output buffering to capture any output
        ob_start();
        // Redirect back to appointment-details.php with the same appointment date
        header("Location: appointment-details.php?date=$appointment_date");
        // End output buffering and discard any captured output
        ob_end_clean();
        exit();
    } else {
        echo "<script>alert('Error deleting appointment.');</script>";
    }
}
?>



        </div>

</body>

</html>