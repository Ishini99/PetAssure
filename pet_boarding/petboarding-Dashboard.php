<?php
require '../config/db.php';
session_start();
$spid ="";
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
    <link rel="stylesheet" href="../css/css/main.css">  
    <link rel="stylesheet" href="../css/css/main.css">  

    <link rel="stylesheet" href="../css/style_petboarding_Dashboard.css">
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

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
                <img src="../Images/logo.png" alt="">
            </div>

            <span class="logo_name">PetAssure</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">

            <li><a href="petboarding-Dashboard.php">
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
                <li><a href="petboarding-Dashboard_shedule.php">
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
            <h2> Dashboard </h2>
        </center>
        <br> <br> 
                        
                        <center>
                        <table class="filter-container doctor-header" style="border: none;width:95%" border="0" >
                        <tr>
                            <td >
                                <h3>Welcome!</h3><br>
                                <h1>Theekshani.</h1>
                                <p>Thanks for joinnig with us. We are always trying to get you a complete service<br>
                                You can view your dailly schedule, Reach Patients Appointment at home!<br><br>
                                </p>
                                <a href="appointment.php" class="non-style-link"><button class="btn-primary btn" style="width:30%">View My Appointments</button></a>
                               
                              
                            </td>
                        </tr>
                        </table>
                        </center>
                        
                    </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <table border="0" width="100%"">
                                <tr>
                                    <td width="50%">
    
                                        
    
    
    
    
                                        <center>
                                            <table class="filter-container" style="border: none;" border="0">
                                                <tr>
                                                    <td colspan="4">
                                                        <p style="font-size: 25px;font-weight:600;padding-left: 32px;">Status</p><br>  
                                                    </td>
                                                </tr>
                                                <br>
                                                <tr>
                                                    <td style="width: 25%;">
                                                        <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                                            <div>
                                                                    <div class="h1-dashboard">
                                                                        2
                                                                    </div><br><br>
                                                                    <div class="h3-dashboard">
                                                                        New Requests &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    </div>
                                                            </div>
                                                                    <div class="btn-icon-back dashboard-icons" style="background-image: url('img/icons/doctors-hover.svg');"></div>
                                                        </div>
                                                    </td>
                                                   
                                                    <td style="width: 25%;">
                                                        <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                                            <div>
                                                                    <div class="h1-dashboard">
                                                                       3
                                                                    </div><br>
                                                                    <div class="h3-dashboard">
                                                                        Upcoming bookings &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    </div>
                                                            </div>
                                                                    <div class="btn-icon-back dashboard-icons" style="background-image: url('img/icons/patients-hover.svg');"></div>
                                                        </div>
                                                    </td>
                                                   
                                                        <br>
                                                    <td style="width: 25%;">
                                                        <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex; ">
                                                            <div>
                                                                    <div class="h1-dashboard" >
                                                                    0
                                                                    </div><br>
                                                                    <div class="h3-dashboard" >
                                                                        Accepted bookings &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    </div>
                                                            </div>
                                                                    <div class="btn-icon-back dashboard-icons" style="background-image: url('img/icons/book-hover.svg');"></div>
                                                        </div>
                                                        
                                                    </td>
    
                                                    
                                                    
                                                </tr>
                                            </table>
                                        </center>
    
    
    
    
    
    
    
    
                                    
                
            </div>
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