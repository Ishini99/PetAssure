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
                        <span class="link-name">Dashboard</span> </a></li>
                <li><a href="userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
                <li><a href="notifications.php">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">Notifications</span>
                    </a></li>
                <li><a href="history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">History</span>
                    </a></li>
                <li><a href="appointments.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Appointments</span>
                    </a></li>
                <li><a href="feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Feedbacks</span>
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
                        <!-- appointment table-->
                        <center>
                            <table class="styled-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Starting Time</th>
                                        <th>Ending Time</th>
                                        <th>Client's Name</th>
                                        <th>Mobile Number</th>
                                        <th>
                                            <center>View</center>
                                        </th>
                                        <th>
                                            <center>Status</center>
                                        </th>
                                        <th>
                                            <center>Completed</center>
                                        </th>
                                        <th>Update</th>
                                        <th>Cancel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    
                    
   
                    $rows = mysqli_query($con,   
                    $sql = "SELECT appointment.appoDate, appointment.startTime, appointment.endTime, user.fname,user.mobile
                    FROM appointment
                    LEFT JOIN user ON appointment.userid = user.userid
                    INNER JOIN serviceprovider ON appointment.spid = serviceprovider.spid
                    WHERE serviceprovider.spid = '$spid'
                    ORDER BY appointment.appoDate DESC, appointment.startTime DESC"
                    ); ?>
                                    <?php foreach ($rows as $row) : ?>

                                    <tr>

                                        <td><?php echo $row['appoDate']?></td>
                                        <td><?php echo $row['startTime']?></td>
                                        <td><?php echo $row['endTime']?></td>
                                        <td><?php echo $row['fname']?></td>
                                        <td><?php echo $row['mobile']?></td>
                                        <td><button class="login-btn btn-primary btn button-icon"" style="
                                                height:30px;">View<button></td>
                                        <td></td>
                                        <td>
                                            <center>

                                                <input type='checkbox' class='inputUncheck' name='foo' value='bar' />
                                                <script>
                                                $('input.inputUncheck').prop('checked', false);
                                                </script>
                                            </center>
                                        </td>
                                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </td>
                                        <td> <i class="fa fa-trash-o" aria-hidden="true"></i></td>


                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </center>
                        <!--END OF APPOINTMENT TABLE-->

                        <?php
//add shedule form
$userid = $_SESSION['userid'];
$spid = "";
$query = "SELECT spid FROM serviceprovider WHERE userid = '$userid'";

$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $spid = $row['spid'];
} else {

}                    
if ($_POST) {  
    $appoDate = $_POST["appoDate"];
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];

    $sql = "INSERT INTO appointment (userid,spid,appoDate,startTime,endTime) VALUES ('$userid','$spid','$appoDate','$startTime','$endTime');";
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
                                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                                    title="Close Modal">&times;</span>


                                <div id="popup1" class="overlay">
                                    <div class="popup">
                                        <center>

                                            <div style="display: flex;justify-content: center;">
                                                <div class="abc">
                                                    <table width="80%"
                                                        class="sub-table scrolldown add-doc-form-container" border="0">


                                                        <tr>
                                                            <td>
                                                                <p
                                                                    style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">
                                                                    Add New Session.</p><br>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td class="label-td" colspan="2">
                                                                <label for="date" class="form-label">Session Date:
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="label-td" colspan="2">
                                                                <input type="date" name="appoDate" class="input-text"
                                                                    min="' . date('Y-m-d') . '" required><br>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="label-td" colspan="2">
                                                                <label for="time" class="form-label">Starting time:
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="label-td" colspan="2">
                                                                <input type="time" name="startTime" class="input-text"
                                                                    placeholder="Time" required><br>
                                                            </td>
                                                        </tr>
                                                        <td class="label-td" colspan="2">
                                                            <label for="time" class="form-label">Ending time:
                                                            </label>
                                                        </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="time" name="endTime" class="input-text" placeholder="Time" required><br>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">

                        <center> <input type="submit" value="Place this Session" class="login-btn btn-primary btn"
                                name="submit"></center>
                        <a class="close" href="petsitter_shedule.php">&times;</a>

        </div>
        </td>


        </form>
        </div>

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

        </div>
</body>

</html>