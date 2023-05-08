
<head>
    <link rel="stylesheet" href="css/table.css">
    <!-- <link rel="stylesheet" href="css/profile.css"> -->

    </head>

    <script>
       function update(){
                   window.location.href=("updateprofile.php");
                   var cellValue = document.getElementById('uid').textContent;

                }
              
                </script>

<body>

<div class="container mt-5 px-2">
    
    <div class="mb-2 d-flex justify-content-between align-items-center">

        
    </div>
    <div class="table-responsive">
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
               $usname=$row['userid'];
               $_SESSION['userid'] = $usname;
               
           
        
            
  <tbody>
    <tr class="textal">
      <!-- <th scope="row"><input class="form-check-input" name="checkbox" type="checkbox"></th> -->
      <td id="uid"><?php echo $usname ?></td>
   
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
          </body>