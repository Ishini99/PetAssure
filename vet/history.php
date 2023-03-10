<?php
require '../config/db.php';
session_start();
$nic ="";
if(isset($_SESSION["spid"]) ){
   $nic =$_SESSION["spid"];
}else{
   //header("location:login.php");
}
$sql = "SELECT *
FROM appointment

INNER JOIN user
ON appointment.userid = user.userid";


($result = mysqli_query($con, $sql));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/vet_history.css">
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
                <li><a href="vetDashboard.php">
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
                        <span class="link-name">Records</span>
                    </a></li>
                <li><a href="appointments.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Appointments</span>
                    </a></li>
                    <li><a href="feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Feedbacks</span>
                    </a></li>
                
                <li><a href="freeConsultation.php">
                        <i class="uil uil-chat"></i>
                        <span class="link-name">Free Consultation</span>
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
            <h2> Consulted Pets</h2>
            <br><br>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Appointment No</th>
                        <th>Appoinment Date</th>
                        <th>Client Name</th>
                        <th>Mobile Number</th>

                        <th>Description</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                while($rows=$result->fetch_assoc())
                {
            ?>
                    <tr class="active-row">
                        <td><?php echo $rows['appNo'];?></td>
                        <td><?php echo $rows['appoDate'];?></td>
                        <td><?php echo $rows['fname'];?></td>
                        <td><?php echo $rows['mobile'];?></td>



                        <td><?php echo $rows['description'];?></td>



                    </tr>
                    <?php
                }
            ?>


                </tbody>
            </table>
        </center>



        </div>
        </div>




        <script src="../js/script.js"></script>

    </section>

    <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com???</p>
    </div>
</body>


</html>