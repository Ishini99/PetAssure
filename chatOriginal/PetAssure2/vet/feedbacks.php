<?php
require '../config/db.php';
session_start();
$spid ="";
$userid="";
if(isset($_SESSION["userid"]) ){
   $userid = $_SESSION["userid"];
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

$sql = "SELECT feedback.submit_date, feedback.name, feedback.rating, feedback.content
FROM feedback
INNER JOIN user ON feedback.userid = user.userid
INNER JOIN serviceprovider ON feedback.spid = serviceprovider.spid
WHERE serviceprovider.spid = '$spid'";

$result = mysqli_query($con, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link rel="stylesheet" href="../css/vet_feedbacks.css">
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

                    <li><a href="chat/register.php">
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


        </nav>


        <center>
    <h2>Feedbacks</h2>
    <br><br>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Names..">
    <table id="myTable" class="styled-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Client Name</th>
                <th>Rating</th>
                <th>Message</th>
                <!-- <th>Cancel</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
        while($rows = $result->fetch_assoc()) {
        ?>
            <tr class="active-row">
                <td><?php echo $rows['submit_date'];?></td>
                <td><?php echo $rows['name'];?></td>
                <td>
                    <ul style="list-style: none; display: flex;">
                        <?php
                    $rating = $rows['rating'];
                    $starNumber = intval($rating);

                    for ($x = 1; $x <= $starNumber; $x++) {
                        echo '<li><i class="fa fa-star"></i></li>';
                    }

                    if (strpos($rating, '.') !== false) {
                        echo '<li><i class="fa fa-star-half-o"></i></li>';
                        $x++;
                    }

                    while ($x <= 5) {
                        echo '<li><i class="fa fa-star-o"></i></li>';
                        $x++;
                    }
                    ?>
                    </ul>
                </td>
                <td><?php echo $rows['content'];?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</center>






        </div>
        </div>




        <script src="script.js"></script>
        <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        </script>
    </section>

    <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>


</html>