<?php
session_start();
// $username=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/adminclientdash.css">
    <link rel="stylesheet" href="css/adminnotification.css">
    

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Notifications</title> 
</head>
<body>

<style>
        body {
            background-image: url("Images/bg2.png");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        </style>
    <nav>
    <?php include "adminnav.php"; ?>
    </nav>

    <section class="dashboard">
        <div class="top">
            
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">  
            <form action="" method="POST">
             
    <input  type="text" name="search" placeholder="Search...">
    </div>
    <button class="sbutton" type="submit" name="submit">Search</button>
  </form>
        </div>
        <?php
     include "connect.php";
     include "db.php";

       ?>


        <div class="dash-content">

            <div class="activity">
                <div class="title">
                    <i class="uil uil-bell"></i>
                    <span class="text">Notifications</span>
                </div>

                <div class="activity-data">
           <?php        
                if (isset($_POST['submit'])) {
      $search = $_POST['search'];
      if (!empty($search)) {
        // Perform search query
        $sql = "SELECT `message` FROM `inf` WHERE (`date` >= DATE_SUB(NOW(), INTERVAL 5 DAY)) && (`message` LIKE '%$search%')";
        $sql1 = "SELECT `message` FROM `inf` WHERE (`date` < DATE_SUB(NOW(), INTERVAL 5 DAY)) && (`message` LIKE '%$search%')";
    
      } else {
        // If search query is empty, show all records
        $sql = "SELECT `message` FROM `inf` WHERE `date` >= DATE_SUB(NOW(), INTERVAL 5 DAY);";
        $sql1 = "SELECT `message` FROM `inf` WHERE `date` < DATE_SUB(NOW(), INTERVAL 5 DAY);";
      }
    } else {
      // If search form has not been submitted, show all records
      $sql = "SELECT `message` FROM `inf` WHERE `date` >= DATE_SUB(NOW(), INTERVAL 5 DAY);";
      $sql1 = "SELECT `message` FROM `inf` WHERE `date` < DATE_SUB(NOW(), INTERVAL 5 DAY);";
    }
    ?>

      <?php

      $result = mysqli_query($con,$sql);
      $resultcheck = mysqli_num_rows($result);

      $result1 = mysqli_query($con,$sql1);
      $resultcheck1 = mysqli_num_rows($result1);
      ?>
  
        
                           <ul class="sortable-list">
              
                                    <h3>Active Notifications</h3>
                                    <?php while ($row = mysqli_fetch_array($result)){ ?>
                                <li class="item" draggable="true">
                                  
                                    <div class="details">
                                    <span><?php echo $row['message']?></span>                               
                                    </div>
                                    <i class="uil uil-draggabledots"></i>
                                </li>
                                
                              <?php } ?>
                        </ul>
                    
                </div>
            </div>
 
        </div>
        <ul class="sortable-list">
              
              <h3>Older Notifications</h3>
              <?php while ($row = mysqli_fetch_array($result1)){ ?>
          <li class="item" draggable="true">
         
              <div class="details">
              <span><?php echo $row['message']?></span>                               
              </div>
              <i class="uil uil-draggabledots"></i>
          </li>
          <?php } ?>
  </ul>
    </section>

    <!--<script src="script.js"></script>-->
</body>
</html>
