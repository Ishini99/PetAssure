<?php
session_start();
// $userid=$_SESSION['userid']
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update Details </title>
    <link rel="stylesheet" href="css/updateprofile.css">
   </head>
   <!-- <script type="text/javascript">
        var nic = document.getElementById("mobile");
        nic.addEventListener('input',()=>
        {
            nic.setCustomValidity('');
            nic.checkValidity();
        });
       
   
    nic.addEventListener('invalid',()=>{
        if (nic.value ==''){
            nic.setCustomValidity('Enter  NIC');
        }
        else{
            nic.setCustomValidity('Enter NIC in123456789V or 200256789123 format')
        }
    });
    
    </script> -->

<body>
<?php

     include "db.php";
    //  $clientid = $_SESSION['clientid'];
$sql = "SELECT `fname`, `uname`, `email`, `mobile` FROM `user` WHERE `userid`='1'";

// $result = $conn->query($sql);
$result = mysqli_query($con,$sql);
 $resultcheck = mysqli_num_rows($result);

// if ($result->num_rows > 0){

// $row = $result->fetch_assoc();

// $name = $row['fname'];
// $uname = $row['uname'];
// $email = $row['email'];
// $mobile = $row['mobile'];
?>

 <?php while ($row = mysqli_fetch_array($result)){?>
  <div class="flexx">
  <div class="nav" style="width: 100%;">
            <div class="left">
                <img src="assets/img4.png" width="100px" height="100px">
                <p style="margin-left: 20px;">PetAssure</p>
            </div>

            <div class="right">
                <a href="#" class="font">HOME</a>
                <a href="#" class="font">PROFILE</a>
                <a href="#" class="font">SERVICES</a>

                <a href="#" class="font">LOG OUT </a>
            </div>
        </div>

  <div class="wrapper">
    <h2>Registration</h2>
    <form name="addpost" action="updateprofile.php" method="post">
      <div class="input-box">
        <input type="text" name='fname' value ='<?php echo $row['fname']?>' required>
      </div>
      <div class="input-box">
        <input type="text" name='uname' value='<?php echo $row['uname']?>' required>
      </div>
      <div class="input-box">
      <input type="text" name='email' value='<?php echo $row['email']?>' required>
      </div>
      <div class="input-box">
      <input type="text" name='mobile' value='<?php echo $row['mobile']?>' required>
      </div>
     
      <div class="input-box button">
        <input type="Submit" value="Update">
      </div>

    </form>
  </div>
 </div>
  <?php } ?>
</body>
</html>
