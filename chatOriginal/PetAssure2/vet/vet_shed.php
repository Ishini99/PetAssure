<?php
require '../config/db.php';
session_start();
$nic ="";
if(isset($_SESSION["userid"]) ){
    $spid =$_SESSION["userid"];
}else{
   //header("location:login.php");
}




$sql = "SELECT *
FROM appointment
INNER JOIN user 
ON appointment.userid = user.userid
AND user.userid = '$userid'
";
($result = mysqli_query($con, $sql));

?>
<style>
.overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    transition: opacity 500ms;
    opacity: 1;
  }
  .overlay:target {
    visibility: visible;
    opacity: 1;
    
  }
  .button-icon{
  
  background-position: 10px 50%;
  background-repeat: no-repeat;
  transition: 0.5s;
  padding: 8px 20px 8px 20px;
}
.btn-primary{
    background-color: gray ;
    border: 1px solid var(--primarycolor) ;
    color: white ;
    box-shadow: 0 3px 5px 0 rgba(57,108,240,0.3);
}

.btn{
    cursor: pointer;
    padding: 8px 55px;
    outline: none;
    text-decoration: none;
    font-size: 14px;
    height: 40px;
    letter-spacing: 0.5px;
    transition: all 0.3s;
    border-radius: 5px;
    font-family: 'Inter', sans-serif;
}

  .popup {
    margin: 70px auto;
    padding: 30px;
    background: #fff;
    border-radius: 5px;
    width: 38%;
    height: 65%;
    position: relative;
    transition: all 5s ease-in-out;
  }
  
  .popup h2 {
    margin-top: 0;
    color: #333;
  }
  .popup .close {
    position: absolute;
    top: 20px;
    right: 30px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
  }
  .popup .close:hover {
    color: var(--primarycolorhover);
  }
  .popup .content {
    max-height: 20%;
    overflow: auto;
  }
  
  @media screen and (max-width: 700px){
    .box{
      width: 60%;
    }
    .popup{
      width: 20%;
    }
  }
  @import url('font-inter.css');


body{
    margin: 0;
    padding: 0;
    border-spacing: 0;
    font-family: 'Inter', sans-serif;
    
}





.input-text{
    border-radius: 4px;
    border: 0.5px solid rgb(226, 226, 226);
    padding: 10px;
    width: 92%;
    transition: 0.2s;
    outline: none;
}

.input-text{
    border: 1px solid #e9ecef;
    font-size: 14px;
    line-height: 26px;
    background-color: #fff;
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-weight: 300;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.input-text:hover{
    background-color: rgb(250, 250, 250);
    transition: 0.2s;
    outline: none;
}

.input-text:focus{
    border: 1px solid rgb(10,118,216);
    transition: 0.2s;
}

.input-text::placeholder{
    font-family: 'Inter', sans-serif;
}

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

/* -----------Buttons---------------*/




.filter-container{
  width: 99.5%;
  border: 1px solid #ebebeb;
  border-radius: 8px;
  margin-bottom: 20px;
  border-spacing: 0;
  padding: 0;
}



.abc{
  width: 100%;
  height: 650px;
  overflow: auto;
}
</style>


<html>

<head>

    <link rel="stylesheet" href="../css/vet_appointments.css">

    <title>Schedule</title>





<body>
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


                <li><a href="../vetDashboard/vetDashboard.php">
                        <i class="uil uil-dashboard"></i>
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li><a href="../updateProfile_vet/userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
                <li><a href="../vet_notifications/notifications.php">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">Notifications</span>
                    </a></li>
                <li><a href="../vet_history/history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">History</span>
                    </a></li>
                <li><a href="../vet_appointments/appointments.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Appointments</span>
                    </a></li>
                <li><a href="../vet_feedbacks/feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Feedbacks</span>
                    </a></li>
                <li><a href="../vet_freeConsultation/freeConsultation.php">
                        <i class="uil uil-chat"></i>
                        <span class="link-name">Free Consultation</span>
                    </a></li>

            </ul>

            <ul class="logout-mode">
                <li><a href="../login.php">
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
        <center>
            <h2> Appointments </h2>
        </center>
    
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%" >
                    </td>
                   
                    <td width="0.6%">
                        <p style="font-size: 16px;color: rgb(119, 119, 119);padding: 0;margin: 2;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;font-size: 16px;color: black ; margin-right: -60px;">
                            <?php 

                        date_default_timezone_set('Asia/Kolkata');

                        $today = date('Y-m-d');
                        echo $today;


                        ?>
                        </p>
                    </td>
                    <td width="2%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="calendar.svg" width="40px"></button>
                    </td>


                </tr>
               
                <tr>
                    <td colspan="4" >
                        <div style="display: flex;margin-top: 40px;">
                        <div class="heading-main12" style="margin-left: 45px;font-size:23px;color:rgb(49, 49, 49);margin-top: -55px;">Schedule a Session</div>
                        <button  class="login-btn btn-primary btn button-icon"  style="margin-left:25px;margin-top: -55px;background-image: url('../img/icons/add.svg');"onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add a session</button>

                        </a>
                        </div>
        
                        <center>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Starting Time</th>
                        <th>Ending Time</th>
                        <th>Update</th>
                         <th>Cancel</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                    
   
                    $rows = mysqli_query($con,  "SELECT *
                    FROM appointment
                    INNER JOIN serviceprovider
                    ON appointment.spid = serviceprovider.spid
                    AND serviceprovider.spid = '$spid'

                   
                  "); ?>
                           <?php foreach ($rows as $row) : ?>
                
                    <tr>
                        
                    <td><?php echo $row['appoDate']?></td>
                    <td><?php echo $row['startTime']?></td>
                    <td><?php echo $row['endTime']?></td>
                            </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </center>

                       
                        <?php

                        
if($_POST)
{  
    $appoDate=$_POST["appoDate"];
    $startTime=$_POST["startTime"];
    $endTime=$_POST["endTime"];

    
    $userid =$_SESSION['userid'];
    
    $sql = "SELECT user.userid FROM user
    INNER JOIN appointment 
    ON appointment.userid = user.userid
    AND user.userid = 'userid'
";
    
   

    $sql="insert into appointment (userid,appoDate,startTime,endTime) values ('$userid','$appoDate','$startTime','$endTime')
    ;";

    
   




    if (mysqli_query($con, $sql))
     {
        echo '<script type="text/javascript"> alert("Session wad added.")</script>';
        echo "<meta http-equiv='refresh' content='0'>";

        exit();
     }
    else
     {
        echo '<script type="text/javascript"> alert(" Try again.")</script>';
            
    }

  
    mysqli_close($con);
}
?>

<div id="id01" class="modal">


<form action="" method="post" class="add-new-form" >
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
      
    <div id="popup1" class="overlay">
            <div class="popup">
            <center>
            
                <div style="display: flex;justify-content: center;">
                <div class="abc">
                <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                

                    <tr>
                        <td>
                            <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Add New Session.</p><br>
                        </td>
                    </tr>
                    

                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="date" class="form-label">Session Date: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="date" name="appoDate" class="input-text" min="' . date('Y-m-d') . '" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="time" class="form-label">Starting time: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="time" name="startTime" class="input-text" placeholder="Time" required><br>
                        </td>
                    </tr>
                    <td class="label-td" colspan="2">
                    <label for="time" class="form-label">Ending time: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="time" name="endTime" class="input-text" placeholder="Time" required><br>
                </td>
            </tr>
           
                    <tr>
                        <td colspan="2">
                        
                           <center> <input type="submit" value="Place this Session" class="login-btn btn-primary btn" name="submit" ></center>
                            <a class="close" href="vet_shed.php">&times;</a>

    </div>
                        </td>
        
                   

   
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>                          
        
</div>
 </body>

</html>