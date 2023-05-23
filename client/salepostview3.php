
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


    <link rel="stylesheet" href="../css/postview2.css">
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>
    <title>Schedule</title>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PetAssure</title>





</style>
</head>
<body>
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


            <li><a href="services1.php">
                        <i class="uil uil-apps"></i>
                        <span class="link-name">Services</span>
                    </a></li>
                <li><a href="userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
               
                <li><a href="history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">History</span>
                    </a></li>
                <li><a href="clientappointments.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Appointments</span>
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
      
      
       
              
        
        
        <div class="Banner">
        <?php   echo '<img src="images/'.$_GET['image'].'" alt="">';?>

        </div>
        <div class="p_1">
        <p>Name :</p>
        <?php   echo '<p class="word">'.$_GET['name'].' </p>';?>
        <!-- <p>Type of animal :</p>
           <?php   echo ' <p class="word">'.$_GET['variety'].'</p>';?> -->
        
            <p>Location :</p>
            <?php   echo '<p class="word">'.$_GET['district'].'</p>';?>
       
        
            <!-- <p>Contact :</p>
            <?php   echo '  <p class="word">'.$_GET['phone_number'].'</p>';?> -->

            <p>Description:</p>
            <?php   echo '  <p class="word">'.$_GET['description'].'</p>';?>

            
         </div>
        

  



        

                    



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

   
    <div class="footerr" style="position:absolute; z-index: -1;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>
 

</html>