
<?php
require_once('../config/db.php');

session_start();

$sql = "SELECT * FROM pet_crossing";
$result = mysqli_query($con, $sql);


    
         
 
 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/postview2.css">
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PetAssure</title>


</head>
<style>
    body {
        background-image: url("../images/bg2.png");
        position: relative;
        size: 110%;
      
    }
</style>
<body class="body-scroller">

    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../images/logo.png" alt="">
            </div>

            <span class="logo_name">PetAssure</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">

                <li><a href="./services.php">
                        <i class="uil uil-dashboard"></i>
                        <span class="link-name">Services</span> </a></li>
                <li><a href="./Profile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">MY Profile</span> </a></li>
                <li><a href="./mynotifications.php">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">My Notifications</span>
                    </a></li>
                <li><a href="./myhistory.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">My History</span>
                    </a></li>
                <li><a href="./myappointments.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">My Appointments</span>
                    </a></li>
                <!-- <li><a href="../vet_feedbacks/feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Feedbacks</span>
                    </a></li> -->
                <!-- <li><a href="../vet_freeConsultation/freeConsultation.php">
                        <i class="uil uil-chat"></i>
                        <span class="link-name">Free Consultation</span>
                    </a></li> -->

            </ul>

            <ul class="logout-mode">
                <li><a href="../login.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>


            </ul>
        </div>
    </nav>
    <!-- <div class="containe"> -->
        <!-- <img src="./../images/bg-1.png" alt=""> -->

        <?php
    
    echo '
        <div class="Banner">
            <img src="./../images/'.$_GET['image'].'" alt="">

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
            <img src="./../images/call.png" alt="">
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

    <div class="footerr" style="position:absolute; z-index: -1;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>


</html>