<?php
require '../config/db.php';
session_start();
$nic ="";
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


    <link rel="stylesheet" href="../css/petsitter_notifications.css">
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
                        <span class="link-name">Dashboard</span>
                    </a></li>
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
                <li><a href="petsitter_shedule.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Appointments</span>
                    </a></li>
                <li><a href="feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Feedbacks</span>
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
            <h2>Notifications</h2>
            <table class="styled-table">

                <tbody>
                    <tr>
                        <td>2023.09.02</td>
                        <td>Ishini booked the time slot </td>

                        <td> <i class="fa fa-envelope-o" aria-hidden="true"></i></td>
                        <td> <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                        <td>2023.09.01</td>
                        <td>Ishini booked the time slot </td>

                        <td> <i class="fa fa-envelope-o" aria-hidden="true"></i></td>
                        <td> <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                    </tr><tr>
                        <td>2023.09.01</td>
                        <td>Nippi@123 booked the time slot  </td>

                        <td> <i class="fa fa-envelope-o" aria-hidden="true"></i></td>
                        <td> <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                    </tr><tr>
                        <td>2023.08.31</td>
                        <td>Sangeerthan booked the time slot</td>

                        <td> <i class="fa fa-envelope-o" aria-hidden="true"></i></td>
                        <td> <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                    </tr><tr>
                        <td>2023.08.01</td>
                        <td> Ishini booked the time slot </td>

                        <td> <i class="fa fa-envelope-o" aria-hidden="true"></i></td>
                        <td> <i class="fa fa-trash-o" aria-hidden="true"></i></td>
                    </tr>
                </tbody>
            </table>
        </center>


        </div>





        <script src="script.js"></script>

    </section>

    <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>


</html>