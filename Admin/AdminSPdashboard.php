
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/adminspdash.css">
    <link rel="stylesheet" href="css/table.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<!-- 
    <script src="list.js"></script> -->

    <title>Serviceprovider Dashboard</title> 
</head>
<body>
<script>
function deleteUser(deleteid) {
  window.location.href = "delete.php?deleteid=" + encodeURIComponent(deleteid);
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
         
       $sql = "SELECT user.userid, user.fname, serviceprovider.status FROM `serviceprovider` INNER JOIN `user` ON serviceprovider.userid = user.userid  WHERE `status`='active';";
       $result = mysqli_query($con,$sql);
     $resultcheck = mysqli_num_rows($result);

     $sql2 = "SELECT user.userid, user.fname, serviceprovider.status FROM `serviceprovider` INNER JOIN `user` ON serviceprovider.userid = user.userid  WHERE `status`='pending';";
       $result2 = mysqli_query($con,$sql2);
     $resultcheck2 = mysqli_num_rows($result2);
       ?>



        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
               
                <div class="boxes">
                   
                  
                    <div class="box box2">
                          
                                <ul class="sortable-list">
                                    <h3>Pending Service Providers</h3>
                                    <?php while ($row = mysqli_fetch_array($result2)){ ?>
                                <li class="item" draggable="true">
                                    <div class="details">
                                    <img src="images/propic.png">
                                    <span><b><?php echo $row['fname']?></b><br> Status = <?php echo $row['status']?> </span>
                                    
                                 
                                    </div>
                                   
                                    <button onclick="deleteUser('<?php echo $row['userid'];?>')" class="sbutton">Approve</button>
                                    
                                </li>
                                <?php } ?>
                        </ul>
                               
                               
                
                    </div>
                    <div class="box box3">
                    
                                <ul class="sortable-list">
                                    <h3>Active Service Providers</h3>
                                    <?php while ($row = mysqli_fetch_array($result)){ ?>
                                <li class="item" draggable="true">
                                    <div class="details">
                                    <img src="images/propic.png">
                                    <span class="text"><?php echo $row['fname']?></span>
                                    
                                 
                                    </div>
                                    
                                </li>
                                <?php } ?>
                        </ul>
                        
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Service Provider Data</span>
                </div>
              
                <div class="activity-data">
                <?php include "gchart.php"; ?>
                                    </div>
                                    </div>

                <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Service Provider Data</span>
                </div>

                <div class="activity-data">
           <?php        
                if (isset($_POST['submit'])) {
      $search = $_POST['search'];
      if (!empty($search)) {
        // Perform search query
        $sql = "SELECT user.userid, user.fname, user.email, user.mobile FROM `serviceprovider` INNER JOIN `user` ON serviceprovider.userid = user.userid  WHERE `fname` LIKE '%$search%'";
      } else {
        // If search query is empty, show all records
        $sql = "SELECT user.userid, user.fname, user.email, user.mobile FROM `serviceprovider` INNER JOIN `user` ON serviceprovider.userid = user.userid;";
      }
    } else {
      // If search form has not been submitted, show all records
      $sql = "SELECT user.userid, user.fname, user.email, user.mobile FROM `serviceprovider` INNER JOIN `user` ON serviceprovider.userid = user.userid;";
    }
    ?>
    <table class="table">
        
      <thead>
        <tr class="bg-light">
          <!-- <th scope="col" width="5%"><input class="form-check-input" type="checkbox"></th> -->
          <th scope="col" width="5%">#</th>
          <th scope="col" width="30%">Full Name</th>
          <th scope="col" width="20%">Email</th>
          <th scope="col" width="20%">Mobile</th>
          <th scope="col" width="10%">Update</th>
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
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['mobile']?></td>
      <td><button onclick="update()">Update</button></td>
    </tr>
    <?php } ?>
    </tbody>
</table>      
                   
                </div>
            </div>
            
          </div>
        </div>
    </section>

    <!--<script src="script.js"></script>-->
</body>
</html>
