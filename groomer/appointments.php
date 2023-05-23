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
                        <span class="link-name">Dashboard</span>
                    </a></li>
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

                <tr>
                    <td colspan="4">
                        <div style="display: flex;margin-top: 40px;">
                            <div class="heading-main12"
                                style="margin-left: 45px;font-size:23px;color:rgb(49, 49, 49);margin-top: -55px;">
                                Schedule a Session</div>
                            <button class="login-btn btn-primary btn button-icon"
                                style="margin-left:25px;margin-top: -55px;background-image: url('../img/icons/add.svg');"
                                onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add
                                a session</button>

                            </a>
                        </div>
<!-- card view of appointments -->
<!-- date available slots and  -->
<div class="card-deck">
    <?php
    $prev_date = null;
    $rows = mysqli_query($con,   
        $sql = "SELECT appointment.appoDate, COUNT(*) AS num_slots,
                SUM(CASE WHEN appointment.status = 0 THEN 1 ELSE 0 END) AS num_available_slots,
                SUM(CASE WHEN appointment.status = 1 THEN 1 ELSE 0 END) AS num_notavailable_slots
                FROM appointment
                INNER JOIN serviceprovider ON appointment.spid = serviceprovider.spid
                WHERE serviceprovider.spid = '$spid'
                GROUP BY appointment.appoDate
                HAVING appointment.appoDate >= CURDATE() 
                ORDER BY appointment.appoDate ASC"
    );
    foreach ($rows as $row) :
        $date_str = date('l, d F Y', strtotime($row['appoDate']));
        $num_slots = $row['num_slots'];
        $num_available_slots = $row['num_available_slots'];
        $num_notavailable_slots = $row['num_notavailable_slots'];
    ?>
        <div class="card" data-date="<?php echo $row['appoDate']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $date_str; ?></h5>
                <p class="card-text">Available Slots = <?php echo $num_available_slots; ?> <br>Already Booked Slots=<?php echo $num_notavailable_slots; ?> </p><br><br>
                <a href="appointment-details.php?date=<?php echo $row['appoDate']; ?>" class="btn2 btn2-primary">Show Table</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>



<!-- form details-->
<?php
$spid = "";
$query = "SELECT spid FROM serviceprovider WHERE userid = '$userid'";

$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $spid = $row['spid'];
}

if ($_POST) {
    $appoDate = $_POST["appoDate"];
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];
    $numSlots = $_POST["numSlots"];

    $duration = strtotime($endTime) - strtotime($startTime);
    $slotDuration = $duration / $numSlots;

    $slots = array();
    $time = strtotime($startTime);
    for ($i = 0; $i < $numSlots; $i++) {
        $slots[] = date("H:i:s", $time);
        $time += $slotDuration;
    }

    $sql = "INSERT INTO appointment (spid, appoDate, startTime, endTime,status) VALUES ";
    $values = array();
    foreach ($slots as $slot) {
        $endTime = date("H:i:s", strtotime($slot) + $slotDuration);
        $values[] = "('$spid', '$appoDate', '$slot', '$endTime','0' )";
    }
    $sql .= implode(", ", $values);

    if (mysqli_query($con, $sql)) {
        echo '<script type="text/javascript"> alert("Session was added.")</script>';
        echo "<meta http-equiv='refresh' content='0'>";
        exit();
    } else {
        echo '<script type="text/javascript"> alert(" Try again.")</script>';
    }
    mysqli_close($con);
}
?>


<div id="id01" class="modal">
    <form action="" method="post" class="add-new-form">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

        <div id="popup1" class="overlay">
            <div class="popup">
                <center>
                    <div style="display: flex;justify-content: center;">
                        <div class="abc">
                            <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                                <tr>
                                    <td>
                                        <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Add New Session.</p><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="date" class="form-label">Session Date:</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                    <input type="date" name="appoDate" class="input-text" min="<?php echo date('Y-m-d'); ?>" required>
                                    </td>
                                    <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="startTime" class="form-label">Session Start Time:</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="time" name="startTime" class="input-text" required><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="endTime" class="form-label">Session End Time:</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="time" name="endTime" class="input-text" required><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="numSlots" class="form-label">Number of Slots:</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="number" name="numSlots" class="input-text" min="1" required><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="submit" value="Add Session" class="btn btn-primary">
                                        <a class="close" href="appointments.php">&times;</a>
</td>
                                </tr>
                                </table>
                                </div>
                                </div>
                                </center>
                                </form>
                                </div> 


<!-- remember to add this code in js file-->
<script>
                               
   var today = new Date();
    var dateInput = document.querySelector('input[name="appoDate"]');
    var startTimeInput = document.querySelector('input[name="startTime"]');
    var endTimeInput = document.querySelector('input[name="endTime"]');

    function updateTimeRange() {
        var selectedDate = new Date(dateInput.value);
        var startDate = new Date(selectedDate.getFullYear(), selectedDate.getMonth(), selectedDate.getDate(), 0, 0, 0);
        var endDate = new Date(selectedDate.getFullYear(), selectedDate.getMonth(), selectedDate.getDate(), 23, 59, 59);

        if (selectedDate.getTime() === today.getTime()) {
            // Today: disable options before the current time
            var currentHour = today.getHours();
            var currentMinute = today.getMinutes();
            startTimeInput.min = (currentHour < 10 ? "0" : "") + currentHour + ":" + (currentMinute < 10 ? "0" : "") + currentMinute;
        } else {
            // Other days: enable all options
            startTimeInput.min = "00:00";
        }
        startTimeInput.max = "23:59";

        endTimeInput.min = startTimeInput.value;
        endTimeInput.max = "23:59";
        if (selectedDate.getTime() === endDate.getTime()) {
            // End of day: disable options after the end of the day
            var currentHour = today.getHours();
            var currentMinute = today.getMinutes();
            endTimeInput.max = (currentHour < 10 ? "0" : "") + currentHour + ":" + (currentMinute < 10 ? "0" : "") + currentMinute;
        }
    }

    dateInput.addEventListener("change", updateTimeRange);
    startTimeInput.addEventListener("change", updateTimeRange);

    updateTimeRange(); //
    </script>
        </div>


</div>
</body>

</html>