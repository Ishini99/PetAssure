<?php
require_once('../config/db.php');

$spid="";

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


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/style_appointments1.css">
  <link rel="stylesheet" href="../css/groombooking4.css">

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
    .form
    {margin-top:100px}
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
        <li><a href="./userProfile.php">
            <i class="uil uil-user"></i>
            <span class="link-name">User Profile</span>
          </a></li>
        <li><a href="./notifications.php">
            <i class="uil uil-bell"></i>
            <span class="link-name">Notifications</span>
          </a></li>
        <li><a href="./history.php">
            <i class="uil uil-history"></i>
            <span class="link-name">Appointment History</span>
          </a></li>
        <li><a href="./appointments.php">
            <i class="uil uil-calender"></i>
            <span class="link-name">Appointments</span>
          </a></li>

        <li><a href="indexVet.php">
            <i class="uil uil-comments"></i>
            <span class="link-name">Feedbacks</span>
          </a></li>
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
if (isset($_GET['uid'])) {
    $getUser = mysqli_real_escape_string($con, $_GET['uid']);
    $rows = mysqli_query($con, "SELECT *
        FROM `pet-sitter-appointments`
        INNER JOIN serviceprovider
        ON `pet-sitter-appointments`.spid = serviceprovider.spid
        INNER JOIN user
        ON serviceprovider.userid = user.userid
        WHERE serviceprovider.userid = '$getUser'
    ");

    $spid_query = mysqli_query($con, "SELECT spid FROM serviceprovider WHERE serviceprovider.userid='$getUser'");
    $spid_result = mysqli_fetch_array($spid_query);

    if ($spid_result !== null) {
        $spid = $spid_result['spid'];
    } else {
        // handle the case where no spid is found
    }
}

$startdate = "";
$enddate = "";

if (isset($_POST["check_availability"])) {
    $startdate = mysqli_real_escape_string($con, $_POST["startdate"]);
    $enddate = mysqli_real_escape_string($con, $_POST["enddate"]);

    // Check availability for selected dates
    $query = "SELECT GROUP_CONCAT(sitno SEPARATOR ',') as sitnos FROM `pet-sitter-appointments` WHERE spid = '$spid' AND date >= '$startdate' AND date <= '$enddate' AND status = '0'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $dateids = $row['sitnos'];

    if (!empty($dateids)) {
        echo "Appointments available on selected dates. Date IDs: " . $dateids;
        // Show booking form here with dateids as hidden input field
    } else {
        echo "No appointments available on selected dates. Please try again.";
    }
}
?>

<body>
<form method="post" action="">
    <label for="startdate">Start Date:</label>
    <input type="date" id="startdate" name="startdate" value="<?php echo $startdate; ?>"><br><br>

    <label for="enddate">End Date:</label>
    <input type="date" id="enddate" name="enddate" value="<?php echo $enddate; ?>"><br><br>

    <input type="submit" name="check_availability" class="optio-btn" value="Check Availability">
</form>

<?php if (!empty($dateids)) { ?>
  <form method="post" action="booking_page.php?uid=<?php echo $getUser; ?>&spid=<?php echo $spid; ?>&dateids=<?php echo $dateids; ?>">
    <input type="hidden" name="dateids" value="<?php echo $dateids; ?>">
    <input type="hidden" name="uid" value="<?php echo $getUser; ?>">
    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
    <input type="submit" name="book_appointment" class="optio-btn" value="Book Appointment">
</form>
<?php } ?>
<?php
// Get the available dates for the user ID
$sql = "SELECT sitno, YEAR(date) as year, MONTH(date) as month, DAY(date) as day FROM `pet-sitter-appointments` WHERE spid = '$spid' AND status = 0";
$result = mysqli_query($con, $sql);

// Store the available dates in an array
$available_dates = array();
while ($row = mysqli_fetch_assoc($result)) {
    $available_dates[] = $row;
}
?>

<!-- HTML code -->
<html>
<head>
    <title>Available Dates</title>
</head>
<body>
    <h1>Available Dates</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Sit No</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the available dates
            foreach ($available_dates as $date) {
            ?>
            <tr>
                <td><?php echo "{$date['day']}-{$date['month']}-{$date['year']}"; ?></td>
                <td><?php echo $date['sitno']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

</body> 



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