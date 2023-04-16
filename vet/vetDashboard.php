<?php
require '../config/db.php';
session_start();
$userid ="";
if(isset($_SESSION["userid"]) ){
    $userid =$_SESSION["userid"];
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


    <link rel="stylesheet" href="../css/vetDashboard.css">
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

                <li><a href="chat/Main/Index.php">
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
            <h2> Dashboard </h2>
        </center>



        <!-- <div class="container">
           

        </div>
        </div> -->

        <br><br>
        <center>


            <div class="container">
                <div class="row">
                    <div class="col-md-8" style="text-align: left;">
                        <h3 class="txt1">Welcome!</h3>
                        <p class="txt2">Thanks for joining with us. We are always trying to provide you with complete
                            service. You can view your daily schedule and make appointments from the comfort of your own
                            home!</p>
                        <a href="appointments.php" class="non-style-link"><button class="btn">View My
                                Appointments</button></a>
                    </div>
                    <div class="col-md-4">
                        <img src="../Images/vet.PNG">
                    </div>
                </div>
            </div>

        </center>
        </td>
        </tr>
        <tr>
            <td colspan="4">
                <table border="0" width="100%"">
                                <tr>
                                    <td width=" 50%">




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
                                    <div class="dashboard-items"
                                        style="padding:20px;margin:auto;width:95%;display: flex">
                                        <div>
                                            <div class="h1-dashboard">
                                                <?php
    // 1. Establish a database connection
    require '../config/db.php';
    
    // 2. Prepare and execute the query
    $query = "SELECT COUNT(*) AS row_count FROM notification";
    $query_run = mysqli_query($con, $query);

    // 3. Check for errors
    if (!$query_run) {
        die('Query Error: ' . mysqli_error($con));
    }

    // 4. Retrieve the result
    $result = mysqli_fetch_assoc($query_run);
    $row_count = $result['row_count'];

    // 5. Display the result
    echo '<h1>' . $row_count . '</h1>';
?>
                                            </div><br>

                                            <div class="h3-dashboard">
                                                Notifications &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="btn-icon-back dashboard-icons" style="background-image: url('');">
                                        </div>
                                    </div>
                                </td>

                                <td style="width: 25%;">
                                    <div class="dashboard-items"
                                        style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div>
                                            <div class="h1-dashboard">

                                                <?php
    // 1. Establish a database connection
    require '../config/db.php';
    
    // 2. Prepare and execute the query
    $query = "SELECT COUNT(*) AS row_count FROM appointment";
    $query_run = mysqli_query($con, $query);

    // 3. Check for errors
    if (!$query_run) {
        die('Query Error: ' . mysqli_error($con));
    }

    // 4. Retrieve the result
    $result = mysqli_fetch_assoc($query_run);
    $row_count = $result['row_count'];

    // 5. Display the result
    echo '<h1>' . $row_count . '</h1>';
?>
                                            </div><br>
                                            <div class="h3-dashboard">
                                                Consulted Pets &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="btn-icon-back dashboard-icons" style="background-image: url('');">
                                        </div>
                                    </div>
                                </td>

                                <br>
                                <td style="width: 25%;">
                                    <div class="dashboard-items"
                                        style="padding:20px;margin:auto;width:95%;display: flex; ">
                                        <div>
                                            <div class="h1-dashboard">

                                                <?php
    // 1. Establish a database connection
    require '../config/db.php';
    
    // 2. Prepare and execute the query
    $query = "SELECT COUNT(*) AS row_count FROM appointment";
    $query_run = mysqli_query($con, $query);

    // 3. Check for errors
    if (!$query_run) {
        die('Query Error: ' . mysqli_error($con));
    }

    // 4. Retrieve the result
    $result = mysqli_fetch_assoc($query_run);
    $row_count = $result['row_count'];

    // 5. Display the result
    echo '<h1>' . $row_count . '</h1>';
?>

                                            </div><br>
                                            <div class="h3-dashboard">
                                                Appointments
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="btn-icon-back dashboard-icons"
                                            style="margin-left: 0px;background-image: url('/images/0567c66917061177a7df6c35c0028444.jpg');">
                                        </div>
                                    </div>

                                </td>

                                <td style="width: 25%;">
                                    <div class="dashboard-items"
                                        style="padding:16px;margin:auto;width:95%;display: flex;">
                                        <div>
                                            <div class="h1-dashboard_avg">

                                                <div class="star-list">
                                                    <?php
        // 1. Establish a database connection
        require '../config/db.php';
        
        // 2. Prepare and execute the query
        $query = "SELECT AVG(rating) AS average_value FROM feedback";
        $query_run = mysqli_query($con, $query);

        // 3. Check for errors
        if (!$query_run) {
            die('Query Error: ' . mysqli_error($con));
        }

        // 4. Retrieve the result
        $result = mysqli_fetch_assoc($query_run);
        $average_value = $result['average_value'];
        $starNumber = intval($average_value);

        // 5. Display the result
        for ($x = 1; $x <= $starNumber; $x++) {
            echo '<li><i class="fa fa-star"></i></li>';
        }
        if ($average_value - $starNumber >= 0.5) {
            echo '<li><i class="fa fa-star-half-o"></i></li>';
            $x++;
        }
        while ($x <= 5) {
            echo '<li><i class="fa fa-star-o"></i></li>';
            $x++;
        }
    ?>
                                                </div>


                                            </div><br>
                                            <div class="h3-dashboard">
                                                Current Rate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="btn-icon-back dashboard-icons"
                                            style="margin-left: 0px;background-image: url();">
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        </table>
                    </center>











                    </div>
                    </div>

                    <script src="../js/script.js"></script>

    </section>

    <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>


</html>