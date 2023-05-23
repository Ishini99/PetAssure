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

    <title>Insights</title> 
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
     include "db.php";
       ?>



        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    
                    <?php include "incomechart.php"; ?>
                   
                   
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Payment Data</span>
                </div>

                <div class="activity-data">
           
         
                </div>
            </div>
        </div>
    </section>

    <!--<script src="script.js"></script>-->
</body>
</html>
