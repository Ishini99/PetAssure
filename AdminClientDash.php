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
    <link rel="stylesheet" href="css/table.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Clients Dashboard</title> 
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
         
       $sql = "SELECT `clientid` FROM `client` ORDER BY `clientid` DESC LIMIT 1;";
       $result = mysqli_query($conn,$sql);
     $resultcheck = mysqli_num_rows($result);

     $sql2 = "SELECT `id` FROM `serviceprovider` ORDER BY `id` DESC LIMIT 1;";
       $result2 = mysqli_query($conn,$sql2);
     $resultcheck2 = mysqli_num_rows($result2);
       ?>

<?php while ($row = mysqli_fetch_array($result)){?>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-users-alt"></i>
                        <span class="text">Total Clients</span>
                        <span class="number"><?php echo $row['clientid']?></span>
                        <?php } ?>
                    </div>
                    <?php while ($row = mysqli_fetch_array($result2)){?>
                    <div class="box box2">
                        <i class="uil uil-user-md"></i>
                        <span class="text">Total Service Providers</span>
                        <span class="number"><?php echo $row['id']?></span>
                        <?php } ?>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-shield-plus"></i>
                        <span class="text">Total Veterinarians</span>
                        <span class="number">120</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Clients Data</span>
                </div>

                <div class="activity-data">
           <?php        
                if (isset($_POST['submit'])) {
      $search = $_POST['search'];
      if (!empty($search)) {
        // Perform search query
        $sql = "SELECT `fname`, `nic`, `email`, `mobile`, `address`,`userid` FROM `user` WHERE `fname` LIKE '%$search%'";
      } else {
        // If search query is empty, show all records
        $sql = "SELECT `fname`, `nic`, `email`, `mobile`, `address`,`userid` FROM `user`;";
      }
    } else {
      // If search form has not been submitted, show all records
      $sql = "SELECT `fname`, `nic`, `email`, `mobile`, `address`,`userid` FROM `user`;";
    }
    ?>
    <table class="table">
        
      <thead>
        <tr class="bg-light">
          <!-- <th scope="col" width="5%"><input class="form-check-input" type="checkbox"></th> -->
          <th scope="col" width="5%">#</th>
          <th scope="col" width="20%">Full Name</th>
          <th scope="col" width="10%">NIC</th>
          <th scope="col" width="20%">Email</th>
          <th scope="col" width="20%">Address</th>
          <th scope="col" width="20%">Mobile</th>
          <th scope="col" width="20%">Update</th>
        </tr>
      </thead>
      <?php

      $result = mysqli_query($con,$sql);
      $resultcheck = mysqli_num_rows($result);
      ?>
  
          <?php while ($row = mysqli_fetch_array($result)){ ?>
        
            
  <tbody>
    <tr class="textal">
      <!-- <th scope="row"><input class="form-check-input" name="checkbox" type="checkbox"></th> -->
      <td><?php echo $row['userid']?></td>
      <td><?php echo $row['fname']?></td>
      <td><?php echo $row['nic']?></td>
      <td><?php echo $row['email']?></td>
      <td> <?php echo $row['address']?></td>
      <td><?php echo $row['mobile']?></td>
      <td><button onclick="update()">Update</button></td>
    </tr>
    <?php } ?>
    </tbody>
</table>      
                   
                </div>
            </div>
        </div>
    </section>

    <!--<script src="script.js"></script>-->
</body>
</html>
