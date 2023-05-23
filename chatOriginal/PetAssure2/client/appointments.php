<?php
session_start();
require_once('../config/db.php');

$clientid="";

$appNo="";
//if(isset($_SESSION["clientid"]) ){
//  $clientid =$_SESSION["clientid"];
//}else{
  //header("location:login.php");
//}
if (isset($_GET['scheduleDate']) ) {
	$appdate =$_GET['scheduleDate'];
	$appid = $_GET['appNo'];
}


$spid = "1";

$sql = "SELECT *
FROM appointment
INNER JOIN serviceprovider
ON appointment.spid = serviceprovider.spid
AND serviceprovider.spid = '$spid'


";


($result = mysqli_query($con, $sql));


?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/style_appointments.css">
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PetAssure</title>


</head>

<body class="body-scroller">

   

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
        
 

      $result = mysqli_query($con, "  SELECT fnameClient, mobileClient	,addressClient	
      FROM client    
      ");
    ?>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><b>Name</b></td>
        <td><?php echo $row['fnameClient']; ?></td>
      </tr>
      <tr>
        <td><b>Contact Number</b></td>
        <td><?php echo $row['mobileClient']; ?></td>
      </tr>
      <tr>
        <td><b>Address</b></td>
        <td><?php echo $row['addressClient']; ?></td>
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

    <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>


</html>