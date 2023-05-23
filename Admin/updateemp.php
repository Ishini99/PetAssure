<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update Details </title>
    <link rel="stylesheet" href="css/updateemp.css">
   </head>
   <script>
       function back(){
                   window.location.href=("updateprofile.php");
                   var cellValue = document.getElementById("myTable").textContent

                }
              
                </script>
   <body>

   <nav>
    <?php include "adminnav.php"; ?>
    </nav>
<?php
     include "db.php";
     
    $sql = "SELECT `fname`, `nic`, `uname`, `email`, `mobile`, `district`, `lname` FROM `user` WHERE `userid`='14'";
    
    $result = mysqli_query($con,$sql);
    
    
 while ($row = mysqli_fetch_array($result)){?>
 <div class="wrapper">
<form name="addpost" action="" method="post">
<div class="input-box">
<img class="logo" src="Images/logo.png">
<input type="hidden" name='empid' value='<?php echo $row['userid']?>' required>
</div>
<div class="input-box">
  <input type="text" name='uname' value='<?php echo $row['fname']?>' required>
</div>
<div class="input-box">
<input type="text" name='nic' value='<?php echo $row['nic']?>' required>
</div>
<div class="input-box">
<input type="text" name='mobile' value='<?php echo $row['mobile']?>' required>
</div>
<div class="input-box">
<input type="text" name='address' value='<?php echo $row['district']?>' required>
</div>

<div class="input-box button">
  <input type="submit" name="but_submit" id="but_submit" value="Update">
</div>

</form>
</div>
<?php }  ?>



</body>
</html>
