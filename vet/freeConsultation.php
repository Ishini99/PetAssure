<?php
require '../config/db.php';
session_start();
$nic ="";
if(isset($_SESSION["spid"]) ){
   $nic =$_SESSION["spid"];
}else{
   //header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/vet_freeConsultation.css">
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PetAssure</title>
   


</head>

<body class="body-scroller">

    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../Images/logo.png" alt="">
            </div>

            <span class="logo_name">PetAssure</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="vetDashboard.php">
                        <i class="uil uil-dashboard"></i>
                        <span class="link-name">Dashboard</span> </a></li>
                <li><a href="userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
                <li><a href="notifications.php">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">Notifications</span>
                    </a></li>
                <li><a href="history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">Records</span>
                    </a></li>
                <li><a href="appointments.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Appointments</span>
                    </a></li>
                    <li><a href="feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Feedbacks</span>
                    </a></li>
                
                <li><a href="freeConsultation.php">
                        <i class="uil uil-chat"></i>
                        <span class="link-name">Free Consultation</span>
                    </a></li>



            </ul>

            <ul class="logout-mode">
            <li><a href="../logout.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>


            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>
        <div style="padding-bottom: 20px;"></div>
      
        <div class="leftdiv">
	
		<div class="topnav">
 
  
</div>
		<h2>Chats</h2>
        <div class="container">
        
        <p><img src="../Images/ac6a54982743c47a9058f815cf4cda26.jpg" alt="Dr.A.Rathnayake" style="float: left;
  max-width: 60px;width: 10%;margin-right: 20px;
  border-radius: 50%;">A.B.C Rathanayake &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="time-right">11:02</span> </p>
  </div>
  <div class="container">
  <p><img src="../Images/4c7692f63ca8cb54040b5fc1f7b4dd64.jpg" alt="Dr.A.Rathnayake" style="float: left;
  max-width: 60px;width: 10%;margin-right: 20px;
  border-radius: 50%;">A.B.C Ekanayake &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="time-right">11:02</span> </>
    </div>
    <div class="container">
    <p><img src="../Images/1faf2f7100fb5ba211f9c58b81c17260.jpg" alt="Dr.A.Rathnayake" style="float: left;
  max-width: 60px;width: 10%;margin-right: 20px;
  border-radius: 50%;">A.B.C Wikaramasinghe&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="time-right">11:02</span> </p>
    </div>
    <div class="container">
    <p><img src="../Images/1faf2f7100fb5ba211f9c58b81c17260.jpg" alt="Dr.A.Rathnayake" style="float: left;
  max-width: 60px;width: 10%;margin-right: 20px;
  border-radius: 50%;">A.B.C Bandara  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="time-right">11:02</span> </p>
    </div>
        
  
	</div>
    
    <div class="rightdiv">
    <h1> <i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Mr.A.B.C Rathnayake</h1>
        <br>
      
        <input class="container darker" type="text" style ="width:703px;" placeholder="Search.."> </i>
        <br><br>
         <img src="../Images/1faf2f7100fb5ba211f9c58b81c17260.jpg" alt="Dr.A.Rathnayake" style="float: left;
  max-width: 60px;width: 100%;margin-right: 20px;
  border-radius: 50%;"> 
         <div class="container">
      <p>
        hfhgfdbgkdd
      </p>
        
    </div>
 
    <img src="../Images/1faf2f7100fb5ba211f9c58b81c17260.jpg" alt="Dr.A.Rathnayake" style="float: left;
  max-width: 60px;width: 100%;margin-right: 20px;
  border-radius: 50%;">
   
    <div class="container">
        
        <p>Sweet! So, what do you wanna do today?</p>
        
    </div>
    <span class="time-right">11:02</span>
   
    <br><br><br><br>
    <img src="../Images/3cd740f30b362de2caef8b24a36c24dd.jpg" alt="Dr.A.Rathnayake" style="float: right;
  max-width: 60px;width: 100%;margin-right: 20px;
  border-radius: 50%;">
    <div class="container darker">
       
        <p><i class="fa fa-plus-circle" aria-hidden="true"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </i>    or learn more coding perhaps? &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
        <i class="fa fa-paper-plane" aria-hidden="true"></i> </p>
       
    </div>




    <script src="../js/script.js"></script>

    </section>

<div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
    <p> Telephone No: +94 11 233 5632
        Fax: +94 11 233 5632
        Email: petAssure@hotmail.com​</p>
</div>
</body>


</html>