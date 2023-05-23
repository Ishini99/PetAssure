<?php
require '../config/db.php';
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
$sql = "SELECT *
FROM cage_categories
INNER JOIN serviceprovider
ON cage_categories.spid = serviceprovider.spid
AND serviceprovider.spid = '$spid'";




($result = mysqli_query($con, $sql));

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


    <script>
</script>

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
                <li><a href="petboarding-Dashboard.php">
                        <i class="uil uil-dashboard"></i>
                        <span class="link-name">Dashboard</span> </a></li>
                <li><a href="userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
                    <li><a href="petboarding-Dashboard_shedule.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Add a cage category </span>
                    </a></li>
                <li><a href="feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Booking details</span>
                    </a></li>
                    <li><a href="cages.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Cage availability</span>
                    </a></li>
                
                <li><a href="history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">History</span>
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
  <h2>Cage availability</h2>
  <br><br>
  <div class="table-container">
    <table class="styled-table table-left">
      <thead>
        <tr>
          <th>Size</th>
          <th>Total Cages</th>
          <th>Booked Cages</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT cc.size, COUNT(c.cage_id) AS total_cages, SUM(c.status = 1) AS booked_cages
                  FROM cage_categories cc
                  LEFT JOIN cage c ON cc.cat_id = c.cat_id
                  WHERE cc.spid = '$spid'
                  GROUP BY cc.size";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['size'] . "</td>";
          echo "<td>" . $row['total_cages'] . "</td>";
          echo "<td>" . $row['booked_cages'] . "</td>";
          echo "</tr>";
        }
        ?>
        <tr class="total-row">
          <td>Total</td>
          <td><?php echo array_sum(array_column(mysqli_fetch_all($result, MYSQLI_ASSOC), 'total_cages')); ?></td>
          <td><?php echo array_sum(array_column(mysqli_fetch_all($result, MYSQLI_ASSOC), 'booked_cages')); ?></td>
        </tr>
      </tbody>
    </table>

    <table class="styled-table table-right">
      <thead>
        <tr>
          <th>Cage ID</th>
          <th>Cage Size</th>
          <th>Image</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT c.cage_id, cc.size, c.status, cc.image
        FROM cage c 
        JOIN cage_categories cc ON c.cat_id = cc.cat_id
        WHERE cc.spid = '$spid'";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['cage_id'] . "</td>";
          echo "<td>" . $row['size'] . "</td>";
          echo "<td><img src='uploaded_img/" . $row['image'] . "' alt='' style='width: 50px; height: 50px;'></td>";
          echo "<td class='status-btn " . ($row['status'] == 0 ? 'available' : 'unavailable') . "'>" . ($row['status'] == 0 ? 'Available' : 'Unavailable') . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</center>

        
        </center>






        <script src="script.js"></script>

    </section>

    <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>


</html>