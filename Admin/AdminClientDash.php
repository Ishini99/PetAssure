<?php

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

  <script>
function updateUser(username) {
  window.location.href = "profilesingle.php?username=" + encodeURIComponent(username);
}
</script>
<style>
        body {
            background-image: url("Images/bg2.png");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        </style>
    
    <?php include "adminnav.php"; ?>
    

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
     include "db.php";
         
       ?>


        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    
                <?php include "clientchart.php"; ?>
                    
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
      <td><button onclick="updateUser('<?php echo $row['userid'];?>')">Update</button></td>
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
