
<?php
require '../config.php';
session_start();

$clientid ="";
$spid="1";
if(isset($_SESSION["clientid"])) {
   $clientid =$_SESSION["clientid"];
} else {
//    header("location: login.php");
   exit();
}



$sql = "SELECT *
FROM appointment
INNER JOIN serviceprovider
ON appointment.spid = serviceprovider.spid
AND serviceprovider.spid = '$spid'

INNER JOIN client
ON appointment.clientid = client.clientid
AND client.clientid = '$clientid'";


($result = mysqli_query($con, $sql));


?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="style_appointments.css">
    <link rel="stylesheet" href="../css/groombooking.css">
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

                <li><a href="../vetDashboard/vetDashboard.php">
                        <i class="uil uil-dashboard"></i>
                        <span class="link-name">Dashboard</span> </a></li>
                <li><a href="../updateProfile_vet/userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span> </a></li>
                <li><a href="../vet_notifications/notifications.php">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">Notifications</span>
                    </a></li>
                <li><a href="../vet_history/history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">History</span>
                    </a></li>
                <li><a href="../vet_appointments/appointments.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Appointments</span>
                    </a></li>
                <li><a href="../vet_feedbacks/feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Feedbacks</span>
                    </a></li>
                <li><a href="../vet_freeConsultation/freeConsultation.php">
                        <i class="uil uil-chat"></i>
                        <span class="link-name">Free Consultation</span>
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
        <div style="padding-bottom: 40px;"></div>

        <?php
    
    //$rows = mysqli_query($con, "SELECT * FROM vetimage ")
    ?>

   
  
   
     <div class="container">
     <div class="profilepic">
           <div class="proimg">
              <img src="../images/cat1.jpg" onclick="myFunction(this)">
              <img src="../images/Dog1.jpg" onclick="myFunction(this)">
              <img src="../images/dog2.jpg" onclick="myFunction(this)">
              <img src="../images/dog3.jpg" onclick="myFunction(this)">
              <img src="../images/cat1.jpg"  onclick="myFunction(this)">


           </div>
           <div class="img-container">
             <img id="imageBox" src="../images/cat1.jpg"> 

           </div>
    </div>

    <div class="details">
    <script>
      function myFunction(smallImg)
      {
        var fullImg = document.getElementById("imageBox");
         fullImg.src = smallImg.src; 
      }
    </script>

  <?php

$sql = "SELECT * FROM user where userid=2" ;

if ($result = mysqli_query($con, $sql))
{
 

  if (mysqli_num_rows($result) > 0) {


          $row = mysqli_fetch_array($result);
         

         echo "<div class='info'><strong><i class='fa-solid fa-user'></i>   :</strong> <span>" . $row['fname'] . "</span></div>";
          echo "<div class='info'><strong><i class='fa-solid fa-phone-volume'></i>   :</strong> <span>" . $row['mobile'] . "</span></div>";
          echo "<div class='info'><strong><i class='fa-solid fa-envelope'></i>   :</strong> <span>" . $row['email'] . "</span></div>";
          echo "<div class='info'><strong><i class='fa-solid fa-location-dot'></i>   :</strong> <span>" . $row['address'] . "</span></div>";
          echo "<div class='info'><strong><i class='fa-sharp fa-solid fa-folder-open'></i>   :</strong> <span>" . $row['details'] . "</span></div>";
      
      
  }
 
}
          
          ?>
          </div>
</div>



        <center>
            <h2>My Appointments</h2>
<br><br>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Appointment No</th>

                        <th>Doctor Name</th>
                        <th>Appoinment Date</th>
                        <th>Avaialbe Time - From</th>
                        <th>Avaialbe Time - To</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  
                    <?php

                    
   
                    $rows = mysqli_query($con,  "SELECT *
                    FROM appointment
                    INNER JOIN serviceprovider
                    ON appointment.spid = serviceprovider.spid
                    AND serviceprovider.spid = '$spid'

                   
                  "); ?>
                           <?php foreach ($rows as $row) : ?>


                    <tr class="active-row">
                      
                        <td><?php echo (isset($row['appNo']) ? $row['appNo'] : 'N/A'); ?></td>

                        <td><?php echo (isset($row['fname']) ? $row['fname'] : 'N/A'); ?></td>

                        <td><?php echo (isset($row['appoDate']) ? $row['appoDate'] : 'N/A'); ?></td>

                        <td><?php echo (isset($row['startTime']) ? $row['startTime'] : 'N/A'); ?></td>

                        <td><?php echo (isset($row['endTime']) ? $row['endTime'] : 'N/A'); ?></td>

                        <td><button onclick="document.getElementById('id01').style.display='block'" type="button"
                                document.location='#id01' class="button">Get
                                Appointment</button></td>

                    </tr>




                </tbody>
                <?php endforeach; ?>
            </table>
        </center>





        </div>
        </div>
        <div id="id01" class="modal">
            <span onclick="document.getElementById(' id01').style.display='none'" class=" close"
                title="Close Modal">&times;</span>

            <form class="modal-content animate" action="">
              


                <div class="container">
                    <h2> Make Appointment </h2>
                    <br>
                    <h4> Client Details</h4>

                    <table class="styled-table" style="margin-bottom:20px">
  <tbody>
    <?php
        $result = mysqli_query($con, "SELECT *
        FROM appointment
       
        INNER JOIN client
        ON appointment.clientid = client.clientid");
    ?>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><b>Name</b></td>
        <td><?php echo $row['fname']; ?></td>
      </tr>
      <tr>
        <td><b>Contact Number</b></td>
        <td><?php echo $row['mobile']; ?></td>
      </tr>
      <tr>
        <td><b>Address</b></td>
        <td><?php echo $row['address']; ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<h4> Appointment Details</h4>
<table class="styled-table" style="margin-top:20px; margin-bottom:20px;">
  <tbody>
    <tr>
    <?php
   
   $rows = mysqli_query($con,  "SELECT *
   FROM appointment
   INNER JOIN serviceprovider
   ON appointment.spid = serviceprovider.spid
   AND serviceprovider.spid = '$spid'

  
 ")
   ?>

                         <?php foreach ($rows as $row) : ?>
      <td><b>Doctor Name</b></td>
      <td><?php echo (isset($row['fname']) ? $row['fname'] : 'N/A'); ?></td>
    </tr>
    <tr>
      <td><b>Appointment Date</b></td>
      <td><?php echo (isset($row['appoDate']) ? $row['appoDate'] : 'N/A'); ?></td>
    </tr>
    <tr>
    
    <tr>
      <td><b>Available Time -From</b></td>
      <td><?php echo (isset($row['startTime']) ? $row['startTime'] : 'N/A'); ?></td>
    </tr>
    <tr>
      <td><b>Available Time -To</b></td>
      <td><?php echo (isset($row['endTime']) ? $row['endTime'] : 'N/A'); ?></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>





                <button type="submit">Book</button>

        </div>
        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'"
                class="cancelbtn">Cancel</button>

        </div>
        </form>
        </div>



        <script src="script.js"></script>
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

    <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>


</html>