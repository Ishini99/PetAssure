<?php
require '../config/db.php';
session_start();
$spid ="";
$userid="";


if(isset($_SESSION["userid"]) ){
   $userid =$_SESSION["userid"];
}else{
   //header("location:login.php");
}
$query = "SELECT spid FROM serviceprovider WHERE userid = '$userid'";

$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $spid = $row['spid'];
} else {
    
}

$date="";

$sql = "SELECT *
        FROM `pet-sitter-appointments`
        LEFT JOIN `serviceprovider` ON `pet-sitter-appointments`.`spid` = `serviceprovider`.`spid`
        WHERE `pet-sitter-appointments`.`date` = '$date'
        AND `serviceprovider`.`spid` = '$spid'";

$result = mysqli_query($con, $sql);
?>
<?php
if (isset($_POST['delete'])) {
    $sitno = $_POST['delete'];
    // Check if the appointment has a userid
    $sql = "SELECT userid FROM `pet-sitter-appointments` WHERE `sitno` = '$sitno'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    if (empty($row['userid'])) {
        // Delete the record from the database
        $sql = "DELETE FROM `pet-sitter-appointments` WHERE `sitno` = '$sitno'";
        mysqli_query($con, $sql);
    } else {
        // Display an error message if the appointment has a userid
        echo "<div class='alert alert-danger'>Cannot delete booked appointments.</div>";
    }
}
?>

<?php
if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
} else {
    // Redirect to an error page if the dates are not set
    exit();
}


// Retrieve the appointment details for the specified date
$rows = mysqli_query($con, "
    SELECT `pet-sitter-appointments`.`sitno`, `pet-sitter-appointments`.`date`, `user`.`fname`, `user`.`mobile`, `pet-sitter-appointments`.`userid`
    FROM `pet-sitter-appointments`
    LEFT JOIN user ON `pet-sitter-appointments`.userid = user.userid
    INNER JOIN serviceprovider ON `pet-sitter-appointments`.spid = serviceprovider.spid
    WHERE serviceprovider.spid = '$spid'
    AND `pet-sitter-appointments`.`date` BETWEEN '$start_date' AND '$end_date'
    ORDER BY `pet-sitter-appointments`.`date` ASC"
);

?>
<!DOCTYPE html>
<html lang="en">
<style>
    .upcoming {
  background-color: #ffc107;
  color: #fff;
}

.in-progress {
  background-color: #007bff;
  color: #fff;
}

.completed {
  background-color: #28a745;
  color: #fff;
}

.not-booked {
  background-color: #6c757d;
  color: #fff;
}


    </style>
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
<table class="styled-table">
  
    <thead>
        <tr>
            <th>Date</th>
            <th>Client's Name</th>
            <th>Mobile Number</th>
            <th>
                <center>View</center>
            </th>
            <th>
                <center>Status</center>
            </th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $row) : ?>
    <tr data-userid="<?php echo $row['userid']; ?>">
        <td><?php echo $row['date'] ?></td>
        <td><?php echo $row['fname'] ?></td>
        <td><?php echo $row['mobile'] ?></td>
        <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-userid="<?php echo $row['userid']; ?>">
                View
            </button>
        </td>
        <td>
            <?php
            $status = '';
            if (empty($row['userid'])) {
                $status = 'Not booked';
            } else if (strtotime($row['date']) < strtotime('today')) {
                $status = 'Completed';
                // update `completed` column in `pet-sitter-appointments` table by adding 1 for this appointment
                mysqli_query($con, "UPDATE `pet-sitter-appointments` SET `completed` = `completed` + 1 WHERE `sitno` = '".$row['sitno']."'");
            } else {
                $status = 'In Progress';
            }
            ?>
            <button type="button" class="btn <?php echo ($status == 'Upcoming' || !$userid) ? 'upcoming' : ($status == 'In Progress' ? 'in-progress' : 'completed'); ?>" data-toggle="modal" data-target="#exampleModal" data-userid="<?php echo $row['userid']; ?>">
                <?php echo ($status == 'Upcoming' || !$userid) ? 'Upcoming/Not Booked' : $status; ?>
            </button>
        </td>
        <td>
            <?php if (empty($row['userid'])) : ?>
                <form method="POST" action="">
                    <input type="hidden" name="delete" value="<?php echo $row['sitno']; ?>">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                </form>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>



</html>
