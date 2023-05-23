<?php
require '../config/db.php';
session_start();
$spid ="";
$book_id="";
if(isset($_SESSION["spid"]) ){
    $spid =$_SESSION["spid"];
}else{
   //header("location:login.php");
}
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/petboarding_feedbacks.css">
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PetAssure</title>



</head>
<style>

  /* Popup container */

  .optio-btn{
    cursor: pointer;
    padding: 8px 55px;
    outline: none;
    text-decoration: none;
    font-size: 14px;
    height: 40px;
    letter-spacing: 0.5px;
    transition: all 0.3s;
    border-radius: 5px;
    font-family: 'Inter', sans-serif;
   
    background-color: gray ;
    border: 1px solid var(--primarycolor) ;
    color: white ;
    box-shadow: 0 3px 5px 0 rgba(57,108,240,0.3);
  }
span
{
    font-size:15px;
}
 



  button.view-btn {
    background-color: gray;
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }

  button.view-btn:hover {
    background-color: #3e8e41;
  }
  

    </style>




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
                <li><a href="petsitterDashboard.php">
                        <i class="uil uil-dashboard"></i>
                        <span class="link-name">Dashboard</span> </a></li>
                <li><a href="userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
                    <li><a href="petsitter_shedule.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Availlable dates</span>
                    </a></li>
                
              
                <li><a href="history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">Past Bookings</span>
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
        <div style="padding-bottom: 20px;"></div>
       
           
        </nav>
        
      

        <center>
    <h2>Booking History<br> <span>(Details regarding the past bookings)</span></h2>

            <br><br>
            <table class="styled-table">
  <thead>
    <tr>  
        <th>User Name</th>
      <th>Mobile</th>
      <th>Date</th>
    
      <th>Breed</th>
      <th>Age</th>
      <th>Type</th>
      <th>More Details</th>

  
      
    </tr>
  </thead>
  <tbody>
  <?php
    // 2. Prepare and execute the query
    $query = "SELECT p.userid, p.date, p.breed, p.age, p.type, u.fname, u.mobile FROM `pet-sitter-appointments` p JOIN `user` u ON p.userid = u.userid WHERE p.completed = 1 AND p.status = 1";
    $query_run = mysqli_query($con, $query);

    // 3. Check for errors
    if (!$query_run) {
        die('Query Error: ' . mysqli_error($con));
    }

    // 4. Retrieve the results and display them in the table
    while ($row = mysqli_fetch_assoc($query_run)) {
        echo '<tr>';
        echo '<td>' . $row['fname'] . '</td>';
        echo '<td>' . $row['mobile'] . '</td>';
        echo '<td>' . $row['date'] . '</td>';
        echo '<td>' . $row['breed'] . '</td>';
        echo '<td>' . $row['age'] . '</td>';
        echo '<td>' . $row['type'] . '</td>';
        echo '<td><a href="booking-details.php?userid=' . $row['userid'] . '&date=' . $row['date'] . '">View Details</a></td>';
        echo '</tr>';
    }
?>

    </table>





</div>


      





        <script src="script.js"></script>

      <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>


</html>