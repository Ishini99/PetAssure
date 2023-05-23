
<?php
require_once('../config/db.php');

session_start();

$sql = "SELECT * FROM pet_selling";
$result = mysqli_query($con, $sql);


    
         
 
 
?>

<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="style_appointments.css">
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>
    <title>Schedule</title>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PetAssure</title>



</head>


<body>
<body class="body-scroller">

    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../../Images/logo.png" alt="">
            </div>

            <span class="logo_name">PetAssure</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">


            <li><a href="../petboarding-Dashboard/petboarding-Dashboard.php">
                        <i class="uil uil-dashboard"></i>
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li><a href="../updateProfile_petboarding/userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
                <li><a href="../petboarding_notifications/notifications.php">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">Notifications</span>
                    </a></li>
                <li><a href="../petboarding_history/history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">History</span>
                    </a></li>
                <li><a href="../petboarding_appointments/petboarding-Dashboard_shedule.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Appointments</span>
                    </a></li>
                <li><a href="../petboarding_feedbacks/feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Feedbacks</span>
                    </a></li>
                

            </ul>


            <ul class="logout-mode">
                <li><a href="../../login.php">
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
              
   
        <?php
    
    echo '
        <div class="Banner">
            <img src="../images/'.$_GET['image'].'" alt="">

        </div>
        <div class="p_1">
            <p>Name :'.$_GET['name'].' </p>
            <p>Type of Animal: '.$_GET['variety'].'</p>
        <div class=loca>
            <p>Location :</p>
            <p class="word">'.$_GET['district'].'</p>
        </DIV>
        </div>
        <div class="p_2">
            <img src="../images/call.png" alt="">
            <p class="p_3">Contact</p>
            <p class="p_4">'.$_GET['phone_number'].'</p>
        </div>

        <div class="des">
            <p>Description</p>
            <div class="descript">
                <p>'.$_GET['description'].'</p>
            </div>
        </div> ';

        ?>

    </div>
    <!-- <section class="dashboard">

        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>
        <div style="padding-bottom: 20px;"></div> -->


        

                    



        <script src="../js/script.js"></script>
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

    </section>     

 </body>

</html>