
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/adminclientdash.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/updateemp.css">
 
	<script>

const urlParams = new URLSearchParams(window.location.search);
		const username = urlParams.get('username');
        document.getElementById('username').textContent = username;

	</script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Update User Details</title> 
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
    
        <?php
     include "connect.php";
     include "db.php";
         
    ?>

        <div class="dash-content">
            <div class="overview">
                
    <?php
   
      $username = $_GET['username'];

    $sql = "SELECT `fname`, `nic`, `uname`, `email`, `mobile`, `district`, `lname` FROM `user` WHERE `userid`='$username'";
    
    $result = mysqli_query($con,$sql);
    
    
 while ($row = mysqli_fetch_array($result)){?>
 <div class="wrapper">
<form name="addpost" action="update.php" method="post">
<h2>Update Details</h2>
<div class="input-box">
<input type="text" name='userid' value= '<?php echo $username?>' required>
</div>
<div class="input-box">
  <input type="text" name='fname' value='<?php echo $row['fname']?>' required>
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

<div class="input-box button">
<a href="javascript:history.back()" class="back-button"><button class="buttons">Back</button></a>
</div>
</form>
</div>
<?php }  ?>
               
            </div>

            <div class="activity">
                <div class="title">
                  
                </div>

                <div class="activity-data">
          
                   
                </div>
            </div>
        </div>
    </section>

    <!--<script src="script.js"></script>-->
</body>
</html>
