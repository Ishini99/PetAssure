<html>

<head>
    <link rel="stylesheet" href="css/profile.css">

    <title>Client Profiles</title>
   

    <style>
        body {
            background-image: url("Images/bg2.png");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        </style>
       
</head>
<body>

<div class="flex">
    <!-- <div class="brdr">
    <div class="card">

     <div class="upper">

       <img src="images/cover.jpg" class="img-fluid">
       
     </div>

     <div class="user text-center">

       <div class="profile">

         <img src="images/propic.png" class="rounded-circle" width="100">
         
       </div>

     </div>


     <div class="mt-5 text-center">

        <div class="title">
            <br>
       <h4 class="mb-0">Benjamin Tims</h4>
       <span class="text-muted align-items-center d-block mb-2">Los Angles</span>
            <br>
       <button class="btn btn-primary btn-sm follow">Follow</button>
    </div>

      

         <div class="stats">
           <h6 class="mb-0">Followers</h6>
           <span>8,797</span>

         </div>


         <div class="stats">
           <h6 class="mb-0">Projects</h6>
           <span>142</span>

         </div>


         <div class="stats">
           <h6 class="mb-0">Ranks</h6>
           <span>129</span>

         </div>
         
  
       
     </div>
      
    </div> -->
<!-- </div> -->
<?php
     include "connect.php";
       $sql = "SELECT `hotelname`, `rating`, `district`, `comments`, `mobile`, `email` FROM `feedback`;";
     $result = mysqli_query($conn,$sql);
     $resultcheck = mysqli_num_rows($result);
       ?>
   
       <?php while ($row = mysqli_fetch_array($result)){?>

<div class="brdr">
    <div class="card">
     <div class="upper">
       <img src="images/cover.jpg" class="img-fluid">
     </div>
     <div class="user text-center">
       <div class="profile">
         <img src="images/propic.png" class="rounded-circle" width="100">
       </div>
     </div>        
     <div class="mt-5 text-center">
        <div class="title">
            <br>
       <h4><?php echo $row['hotelname']?></h4>
       <span class="text-muted align-items-center d-block mb-2"><?php echo $row['district']?></span>
            <br>
       <button class="btn btn-primary btn-sm follow">Follow</button>
    </div>
         <div class="stats">
           <h6 class="mb-0">Rating</h6>
           <span><?php echo $row['rating']?></span>

         </div>


         <div class="stats">
           <h4
           >Email</h4>
           <h3><?php echo $row['email']?></h3>

         </div>


         <div class="stats">
           <h4>Mobile</h4>
           <h4><?php echo $row['mobile']?></h4>

         </div>
      
         
  
       
     </div>
      
    </div>
</div>
<div>
</div>
<?php } ?>

</body>
</html>