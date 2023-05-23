<?php
require_once('../config/db.php');

if (isset($_POST['submit'])) {
  $sql = "UPDATE `appointment` SET `userid`= {$_POST['userID']}, `status`= 1 WHERE appNo={$_POST['appointment']};";

  $result = mysqli_query($con, $sql);

  /****  Payment gateway here ****/
  
  // Redirect to another URL after the query is executed
  header('Location: ../stripe/index.php');
  exit();
}

session_start();
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  //header("location:login.php");
  exit("You must log in to access this page.");
}
if (isset($_GET['id'])) {
  // print_r($_GET['id']);die();
  $ap_id = $_GET['id'];
  echo "<script> 
    window.onload = function() { 
    document.getElementById('id01').style.display='block';
    } </script>";
}


if (isset($_GET['uid'])) {
  $getUser = $_GET['uid'];
}


$sql = "SELECT * FROM user";
$result = mysqli_query($con, $sql);


?>


<!-- <script>

    window.onload = function () {
        const element = document.getElementById('tablehead');
        console.log(element);
        element.scrollIntoView({ block: "end" });
    }

//   $(window).load(function(){ 
//     console.log("Test");
//     $('html,body').animate({ scrollTop: $('#').offset().top - 100 }, 'slow'); 
// });
</script> -->


<?php
// session_start();
// require '../config/db.php';

$clientid = "";

$appNo = "";
//if(isset($_SESSION["clientid"]) ){
//  $clientid =$_SESSION["clientid"];
//}else{
//header("location:login.php");
//}
if (isset($_GET['scheduleDate'])) {
  $appdate = $_GET['scheduleDate'];
  $appid = $_GET['appNo'];
}

// $spid = "5";

// $sql = "SELECT *
// FROM appointment
// INNER JOIN serviceprovider
// ON appointment.spid = serviceprovider.spid
// AND serviceprovider.spid = '$'";

// $result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/style_appointments1.css">
  <link rel="stylesheet" href="../css/groombooking.css">

  <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

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
        <img src="../images/logo.png" alt="">
      </div>

      <span class="logo_name">PetAssure</span>
    </div>

    <div class="menu-items">
      <ul class="nav-links">
      <li><a href="services1.php">
                        <i class="uil uil-apps"></i>
                        <span class="link-name">Services</span>
                    </a></li>

        <li><a href="./userProfile.php">
            <i class="uil uil-user"></i>
            <span class="link-name">User Profile</span>
          </a></li>
        <!-- <li><a href="./notifications.php">
            <i class="uil uil-bell"></i>
            <span class="link-name">Notifications</span>
          </a></li> -->
        <li><a href="./history.php">
            <i class="uil uil-history"></i>
            <span class="link-name">posts History</span>
          </a></li>
        <li><a href="./clientappointments.php">
            <i class="uil uil-calender"></i>
            <span class="link-name">Appointments</span>
          </a></li>
        <!-- <li><a href="indexVet.php">
            <i class="uil uil-comments"></i>
            <span class="link-name">Feedbacks</span>
          </a></li> -->
        <!-- <li><a href="./freeConsultation.php">
                        <i class="uil uil-chat"></i>
                        <span class="link-name"></span>
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
  <section class="dashboard">
    <div class="top">
      <i class="uil uil-bars sidebar-toggle"></i>
    </div>
    <div style="padding-bottom: 20px;"></div>
    <center>


      <?php

      $rows = mysqli_query($con, "SELECT * FROM `groomerimage` where uid='$getUser'")

        ?>




      <div class="container">
        <div class="profilepic">
          <div class="proimg">

            <?php
            if (mysqli_num_rows($rows) > 0) {
              // Loop through each image and display it
              while ($row = mysqli_fetch_assoc($rows)) {
                $image_path = "../groomer/groomer_img/" . $row['image'];
                ?>
                <img src="<?php echo $image_path; ?>" onclick="myFunction(this)">


              <?php }
            } ?>
          </div>
          <div class="img-container">

            <?php
            // Execute the query to get images
            $rows = mysqli_query($con, "SELECT * FROM `groomerimage` WHERE uid='$getUser'");

            // Check if any images were found
            if (mysqli_num_rows($rows) > 0) {
              // Get the first image and display it
              $row = mysqli_fetch_assoc($rows);
              $image_path = "../groomer/groomer_img/" . $row['image'];
              ?>
              <img id="imageBox" src="<?php echo $image_path; ?>">

              <?php
            } else {
              // No images found, display a default image or an error message
              ?>
              <img src="../images/cage.jpg">
              <?php
            }
            ?>


          </div>
        </div>

        <div class="details">
          <script>
            function myFunction(smallImg) {
              var fullImg = document.getElementById("imageBox");
              fullImg.src = smallImg.src;
            }
          </script>

          <?php

          $sql = "SELECT * FROM user where userid='$getUser'";

          if ($result = mysqli_query($con, $sql)) {


            if (mysqli_num_rows($result) > 0) {


              $row = mysqli_fetch_array($result);


              echo "<div class='info'><strong><i class='fa-solid fa-user'></i>   :</strong> <span>" . $row['uname'] . "</span></div>";
              echo "<div class='info'><strong><i class='fa-solid fa-phone-volume'></i>   :</strong> <span>" . $row['mobile'] . "</span></div>";
              echo "<div class='info'><strong><i class='fa-solid fa-envelope'></i>   :</strong> <span>" . $row['email'] . "</span></div>";
              echo "<div class='info'><strong><i class='fa-solid fa-location-dot'></i>   :</strong> <span>" . $row['address'] . "</span></div>";
              // echo "<div class='info'><strong><i class='fa-sharp fa-solid fa-folder-open'></i>   :</strong> <span>" . $row['details'] . "</span></div>";
              echo "<button style='background-color: #bbb; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;' onclick=\"window.location.href='groomer_viewPoster.php?uid=" . $getUser . "'\">View Packages</button>";


            }

          }

          ?>
        </div>
      </div>

      </div>
    </center>


    <center>
      <div class="app-table">
        <div>
          <h2 class="appoi" id="1">My Appointments</h2>
        </div>

        <br><br>
        <table class="styled-table1">
          <thead>
            <tr>
              <th>Appointment No</th>

             
              <th>Appoinment Date</th>
              <th>Available Time - From</th>
              <th>Available Time - To</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $spid_query = mysqli_query($con, "SELECT spid
        FROM serviceprovider where serviceprovider.userid=$getUser
    ");
            $spid_result = mysqli_fetch_array($spid_query);
            $spid = $spid_result['spid'];
            ?>

            <?php
            $rows = mysqli_query($con, "SELECT *
        FROM appointment
        INNER JOIN serviceprovider ON appointment.spid = serviceprovider.spid
        WHERE appointment.spid = $spid && appointment.status='0'
    ");
            ?>





            <?php
            foreach ($rows as $row): ?>


              <tr class="active-row">
                <td>
                  <?php echo (isset($row['appNo']) ? $row['appNo'] : 'N/A'); ?>
                </td>

               

                <td>
                  <?php echo (isset($row['appoDate']) ? $row['appoDate'] : 'N/A'); ?>
                </td>

                <td>
                  <?php echo (isset($row['startTime']) ? $row['startTime'] : 'N/A'); ?>
                </td>

                <td>
                  <?php echo (isset($row['endTime']) ? $row['endTime'] : 'N/A'); ?>
                </td>

                <td><a href="?id=<?php echo $row['appNo'] ?>&uid=<?php echo $getUser ?>"><button type="button"
                      document.location='#id01' class="button">Get
                      Appointment</button></td></a>

              </tr>




            </tbody>
          <?php endforeach; ?>
        </table>
    </center>
    </div>





    </div>
    </div>
    <div id="id01" class="modal">

      <span onclick="document.getElementById('id01').style.display='none'" class="close"
        title="Close Modal">&times;</span>

      <form class="modal-content animate" action="" method="post">



        <div class="container1">
          <h2> Make Appointment </h2>
          <br>
          <h4> Client Details</h4>

          <table class="styled-table2" style="margin-bottom:20px">
            <tbody>

              <?php
$sql = "SELECT fname, mobile, address
FROM user
WHERE userid = $userid";


              $result = mysqli_query($con, $sql);

              ?>
              <?php while ($row = mysqli_fetch_assoc($result)):
                ?>

                <tr>
                  <td><b>Name</b></td>
                  <td>
                    <?php echo $row['fname']; ?>
                  </td>
                </tr>
                <tr>
                  <td><b>Contact Number</b></td>
                  <td>
                    <?php echo $row['mobile']; ?>
                  </td>
                </tr>
                <tr>
                  <td><b>Address</b></td>
                  <td>
                    <?php echo $row['address']; ?>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>

          <h4> Appointment Details</h4>
          <table class="styled-table3" style="margin-top:20px; margin-bottom:20px;">
            <tbody>
              <tr>
                <?php
 

                $rows = mysqli_query($con, "SELECT *
                FROM appointment
                INNER JOIN serviceprovider ON appointment.spid = serviceprovider.spid
                WHERE appointment.appNo = $ap_id AND serviceprovider.userid = $getUser
                ")
                  ?>

                <?php foreach ($rows as $row): ?>
                  
                </tr>
                <tr>
                  <td><b>Appointment Date</b></td>
                  <td>
                    <?php echo (isset($row['appoDate']) ? $row['appoDate'] : 'N/A'); ?>
                  </td>
                </tr>
                <tr>

                <tr>
                  <td><b>Available Time -From</b></td>
                  <td>
                    <?php echo (isset($row['startTime']) ? $row['startTime'] : 'N/A'); ?>
                  </td>
                </tr>
                <tr>
                  <td><b>Available Time -To</b></td>
                  <td>
                    <?php echo (isset($row['endTime']) ? $row['endTime'] : 'N/A'); ?>
                  </td>
                </tr>
              </tbody>
            <?php endforeach; ?>
          </table>




          <input type="text" name="appointment" value="<?php echo $_GET['id'] ?>" hidden>
          <input type="text" name="userID" id="" value="<?php echo $_SESSION['userid'] ?>" hidden>
          <button type="submit" name="submit">Book</button>


          <div class="container1" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'"
              class="cancelbtn">Cancel</button>
          </div>
        </div>
      </form>
    </div>
    </div>


    <script src="../js/script.js"></script>
    <script>
      // Get the modal
      var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        // window.onclick = function(event) {
        //     if (event.target == modal) {
        //         modal.style.display = "none";
        //     }
        // }
    </script>

    <script src="../js/script.js"></script>

  </section>




  <div class="footerr" style="position:absolute; z-index: -1; width: 100%;">
    <p> Telephone No: +94 11 233 5632
      Fax: +94 11 233 5632
      Email: petAssure@hotmail.com​</p>
  </div>

</body>


</html>