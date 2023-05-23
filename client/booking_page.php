<?php
require_once('../config/db.php');



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
if (isset($_POST['uid'])) {
    $getUser = mysqli_real_escape_string($con, $_POST['uid']);
}
if (isset($_POST['spid'])) {
    $spid = mysqli_real_escape_string($con, $_POST['spid']);
}


if (isset($_POST['dateids'])) {
    $dateids = mysqli_real_escape_string($con, $_POST['dateids']);
    // Convert comma-separated list of date IDs to a quoted string for use in the SQL query
    $sitnos = "'" . str_replace(",", "','", $dateids) . "'";
}



// Check if the form has been submitted and the $_POST array is set
if (isset($_POST["breed"]) && isset($_POST["des"]) && !empty($dateids)) {
    // Update the rows with the user ID, breed, and description
    $breed = mysqli_real_escape_string($con, $_POST["breed"]);
    $des = mysqli_real_escape_string($con, $_POST["des"]);
    $age = mysqli_real_escape_string($con, $_POST["age"]);
    $type = mysqli_real_escape_string($con, $_POST["type"]);
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $sql = "UPDATE `pet-sitter-appointments` SET userid = '$userid', breed = '$breed', des = '$des', age = '$age',type = '$type',name = '$name',status = '1' WHERE sitno IN ($sitnos)";
    mysqli_query($con, $sql);

    // Display a message indicating success or failure
    if (mysqli_affected_rows($con) > 0) {
        echo "Booking successful.";
        header('Location: ../stripe/index.php');
        exit();
    } else {
        echo "Booking failed. Please try again.";
    }
}
?>

<form method="post" action="booking_page.php">
    <label for="breed">Breed:</label>
    <input type="text" id="breed" name="breed"><br><br>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age"><br><br>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br><br>

    <label for="type">Type:</label>
    <select id="type" name="type">
        <option value="cat">Cat</option>
        <option value="dog">Dog</option>
    </select><br><br>

    <label for="des">Description:</label>
    <textarea id="des" name="des"></textarea><br><br>

    <input type="hidden" name="dateids" value="<?php echo $dateids; ?>">
    <input type="submit" name="book_appointment" class="optio-btn" value="Book Appointment">
</form>


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