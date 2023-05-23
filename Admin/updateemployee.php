<?php
session_start();
include "db.php"; 
$uid=$_SESSION['uid'];
$sqls = "SELECT * FROM `users` WHERE `userid`='$uid'";
$results = mysqli_query($con, $sqls);
$row = mysqli_fetch_array($results);
$role = $row['role'];
?>
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
        
                   window.location.href=("facilities.html");
        }

        
              
                </script>

<body>

<nav>
    <?php include "navbar.php"; ?>
    </nav>

  <div class="wrapper">
    <h2>Update Employee</h2>
    <form name="addpost" action="updateemp.php" method="post">
      <div class="input-box">
      <input type="text" name="uid" placeholder="User Id" required />
      </div>
      <div class="input-box button">
        <input type="submit" name="but_search" id="but_search" value="Search">
      </div>
      <div >
      <button class="buttons" onclick="back()">Back</button>
      </div>
     
      </form>

          
 
</body>
</html>
