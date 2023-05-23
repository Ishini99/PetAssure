<?php
require_once('../config/db.php');

session_start();
$spid ="";
$userid="";


if(isset($_SESSION["userid"]) ){
   $userid =$_SESSION["userid"];
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

if (isset($_GET['id'])) {
    $ap_id = $_GET['id'];
    echo "<script> 
    window.onload = function() { 
    document.getElementById('id01').style.display='block';
    } </script>";
}

?>
 


<script>



window.onload = function (){
  const element = document.getElementById('tablehead');
  console.log(element);
  element.scrollIntoView({block:"end"});
}

//   $(window).load(function(){ 
//     console.log("Test");
//     $('html,body').animate({ scrollTop: $('#').offset().top - 100 }, 'slow'); 
// });
</script>
<!DOCTYPE html>
<html lang="en">
 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/vetDashboard.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
  
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

  
    
    <title>PetAssure</title>
    <style>
    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    box-shadow: 0 0 20px rgba(0, 10, 0, 0.15);
}
.styled-table  tr {
    background-color: #E0E0E0;
    color: #ffffff; 
}
.styled-table  tr {
    border-bottom: 1px solid #A6A6A6;
}
.slider {
  overflow-x: scroll;
  white-space: nowrap;
}

.form-container {
  display: inline-block;
  width: 400px;
  margin-right: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.form-container h2 {
  margin-top: 0;
}

.form-container input[type=text],
.form-container input[type=email] {
  display: block;
  width: 100%;
  margin-bottom: 10px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.form-container input[type=submit] {
  display: block;
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #4CAF50;
  color: #fff;
  cursor: pointer;
}

.form-container input[type=submit]:hover {
  background-color: #3e8e41;
}

.bookings-slider {
  display: flex;
  flex-wrap: nowrap;
  overflow-x: auto;
  scrollbar-width: none; /* For Firefox */
  -ms-overflow-style: none; /* For Internet Explorer and Edge */
}

.bookings-slider::-webkit-scrollbar {
  display: none; /* For Chrome, Safari, and Opera */
}

.booking-slide {
  flex: 0 0 auto;
  margin-right: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  width: 400px;
}

.booking-slide p {
  margin: 0;
  margin-bottom: 10px;
}

.booking-slide form {
  margin-top: 20px;
}

.booking-slide input[type=text] {
  margin-bottom: 10px;
}

.booking-slide button {
  display: block;
  width: 50%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color:gray;
  color: #fff;
  cursor: pointer;
}

.booking-slide button:hover {
  background-color: #3e8e41;
}
input[type="text"], textarea {
    width: 100%;
    padding: 1px 18px;
    margin: 4px 0;
    box-sizing: border-box;
    border: 2px solid #877878;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
}

label {
  display: block;
  margin-bottom: 6px;
}

select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='%23000' stroke='%232a2a2a' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 8px center;
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
                        <span class="link-name">My Appointments</span>
                    </a></li>
                    <li><a href="./feedbacks.php">
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


if (isset($_POST['update'])) {
    $book_id = $_POST['book_id'];
    $type = $_POST['type'];
    $food_pref = $_POST['food_pref'];
    $med = $_POST['med'];
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
$name=$_POST['name'];
    $query = "UPDATE `bookings` SET `type`='$type', `food_pref`='$food_pref', `med`='$med', `checkin_date`='$checkin_date', `checkout_date`='$checkout_date',`name`='$name' WHERE `book_id`='$book_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Booking details updated successfully.";
    } else {
        echo "Error updating booking details: " . mysqli_error($con);
    }
}

// Selecting the bookings for the logged in user
$query = "SELECT * FROM `bookings` WHERE `userid` = '$userid' ";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Displaying the bookings in a slider
    echo '<div class="bookings-slider">';
    while ($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['book_id'];
        $cage_id = $row['cage_id'];
        $cat_id = $row['cat_id'];
        $checkin_date = $row['checkin_date'];
        $checkout_date = $row['checkout_date'];
        $type = $row['type'];
        $food_pref = $row['food_pref'];
        $med = $row['med'];
        $name = $row['name'];
        
        echo '<div class="booking-slide">';
        echo "<p>Name: $name</p>";
        echo "<form method='post' action='update_cages.php'>";
        echo "<input type='hidden' name='book_id' value='$book_id'>";
        echo "<label for='name'>Pet's name:</label>";
        echo "<textarea name='name' placeholder='Enter pet's name'>$name</textarea>";
       
        echo "<label for='type'>Type of Pet:</label>";
        echo "<select name='type' id='type'>";
        echo "<option value='Dog' ".(($type == 'Dog') ? 'selected' : '').">Dog</option>";
        echo "<option value='Cat' ".(($type == 'Cat') ? 'selected' : '').">Cat</option>";
        echo "</select>";
        echo "<label for='food_pref'>Food Preferences:</label>";
        echo "<textarea name='food_pref' placeholder='Enter food preferences'>$food_pref</textarea>";
        echo "<label for='med'>Any medicines given (please mention the doese)</label>";
        echo "<textarea name='med' placeholder='Enter medications'>$med</textarea>";
        echo "<label for='checkin_date'>Check-In Date:</label>";
        echo "<input type='date' name='checkin_date' value='$checkin_date'>";
        echo "<label for='checkout_date'>Check-Out Date:</label>";
        echo "<input type='date' name='checkout_date' value='$checkout_date'>";
        echo "<br><br>";
        echo "<button type='submit' name='update'>Update Booking</button>";
        echo "</form>";
        echo '</div>';
        
        

    }
    echo '</div>';
} else {
    echo 'No bookings found for this user.';
    }
    ?>


    
     
   
<script src="js/script.js"></script>

</body>

</html>