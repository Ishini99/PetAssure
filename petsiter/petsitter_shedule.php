<?php
require '../config/db.php';
session_start();
$spid ="";
$userid="";

$date="";
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
        FROM `pet-sitter-appointments`
        LEFT JOIN `serviceprovider` ON `pet-sitter-appointments`.`spid` = `serviceprovider`.`spid`
        WHERE `pet-sitter-appointments`.`date` = '$date'
        AND `serviceprovider`.`spid` = '$spid'";

$result = mysqli_query($con, $sql);
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
            <h2> Schedule Management for prt sitters. </h2>
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
                                style="margin-left: 45px;font-size:19px;color:rgb(50, 49, 49);margin-top: -55px;">
                                To add available dates, please click on the 'Add Dates' button.<br></div>
                            <button class="login-btn btn-primary btn button-icon"
                                style="margin-left:-430px;background-image: url('../img/icons/add.svg');"
                                onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add Dates
                                </button>
<br><br>
                            </a>
                        </div>
                        <div class="card-deck">
    <?php
    $prev_date = null;
    $sql = "SELECT startdate, endate FROM petsitterappdates WHERE spid = '$spid'";
    $date_result = mysqli_query($con, $sql);
    while ($date_row = mysqli_fetch_assoc($date_result)) {
        $start_date = $date_row['startdate'];
        $end_date = $date_row['endate'];
        $dates = array();
        $time = strtotime($start_date);
        while ($time <= strtotime($end_date)) {
            $dates[] = date("Y-m-d", $time);
            $time += 24 * 60 * 60;
        }
        $date_str = date('l, d F Y', strtotime($start_date)) . " - " . date('l, d F Y', strtotime($end_date));
        $num_slots = count($dates);
        $sql = "SELECT COUNT(*) AS num_notavailable_slots FROM `pet-sitter-appointments`
                WHERE spid = '$spid' AND date IN ('" . implode("', '", $dates) . "') AND status = 1";
        $not_available_result = mysqli_query($con, $sql);
        $num_notavailable_slots_row = mysqli_fetch_assoc($not_available_result);
        $num_notavailable_slots = $num_notavailable_slots_row['num_notavailable_slots'];
        $num_available_slots = $num_slots - $num_notavailable_slots;
    ?>
<div class="card" data-date="<?php echo $start_date . '|' . $end_date; ?>"> 
        
            <div class="card-body">
                <h5 class="card-title"><?php echo $date_str; ?></h5>
                <p class="card-text">To view more details about bookings click the button below.</p><br><br>
                <a href="appointment-details.php?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" class="btn2 btn2-primary">Show Details</a>
            </div>
        </div>
    <?php } ?>
</div>



<!-- form starts here -->

<?php
$spid = "";
$query = "SELECT spid FROM serviceprovider WHERE userid = '$userid'";

$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $spid = $row['spid'];
}

$startDate = "";
$endDate = "";

if ($_POST) {
    $startDate = $_POST["startdate"];
    $endDate = $_POST["endate"];

    // Insert start date, end date, and spid into petsitterappdates table
    $sql = "INSERT INTO petsitterappdates (spid, startdate, endate) VALUES ('$spid', '$startDate', '$endDate')";

    if (mysqli_query($con, $sql)) {
        // Retrieve the newly inserted row's ID
        $appDatesId = mysqli_insert_id($con);

        // Generate the appointments for the specified dates
        $numDays = (strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24) + 1;

        $dates = array();
        $time = strtotime($startDate);
        for ($i = 0; $i < $numDays; $i++) {
            $dates[] = date("Y-m-d", $time);
            $time += 24 * 60 * 60;
        }

        $sql = "INSERT INTO `pet-sitter-appointments` (spid, date, breed,des,status,dateid) VALUES ";
        $values = array();
        foreach ($dates as $date) {
            $values[] = "('$spid', '$date', '','','0','$appDatesId')";
        }
        $sql .= implode(", ", $values);

        if (mysqli_query($con, $sql)) {
            echo '<script type="text/javascript"> alert("Sessions were added.")</script>';
            echo "<meta http-equiv='refresh' content='0'>";
            exit();
        } else {
            echo '<script type="text/javascript"> alert("Try again.")</script>';
        }
    } else {
        echo '<script type="text/javascript"> alert("Try again.")</script>';
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
                                        <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Add New Sessions.</p><br>
                                    </td>
                                </tr>


                                <tr>
                                <tr>
    <td class="label-td" colspan="2">
        <label for="startdate" class="form-label">Start Date:</label>
    </td>
</tr>
<tr>
    <td class="label-td" colspan="2">
        <input type="date" name="startdate" class="input-text" min="<?php echo date('Y-m-d'); ?>" required>
    </td>
</tr>
<tr>
    <td class="label-td" colspan="2">
        <label for="endate" class="form-label">End Date:</label>
    </td>
</tr>
<tr>
    <td class="label-td" colspan="2">
        <input type="date" name="endate" class="input-text" min="<?php echo date('Y-m-d'); ?>" >
    </td>
</tr>
<tr>
    <td class="label-td" colspan="2">
        <label for="status" class="form-label">Status:</label>
    </td>
</tr>
<tr>
    <td class="label-td" colspan="2">
        <select name="status" class="input-text">
            <option value="0">Available</option>
            <option value="1">Unavailable</option>
        </select>
    </td>
</tr>
<tr>
<tr>
                                    <td colspan="2">
                                        <input type="submit" value="Add Session" class="btn btn-primary">
                                        <a class="close" href="petsitter_shedule.php">&times;</a>
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
              var day = new Date().toLocaleDateString('en-US', { weekday: 'long' });
                 
    var dateInput = document.querySelector('input[name="date"]');
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