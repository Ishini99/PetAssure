<?php
require '../config/db.php';
session_start();

$spid = "";
if(isset($_SESSION["spid"]) ){
   $spid =$_SESSION["spid"];
}else{
   //header("location:login.php");
}





?>


<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/petboarding_appointments.css">
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>
    <title>Schedule</title>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PetAssure</title>



</head>


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

            <li><a href="petboarding-Dashboard.php">
                        <i class="uil uil-dashboard"></i>
                        <span class="link-name">Dashboard</span>
                    </a></li>
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
                        <span class="link-name">History</span>
                    </a></li>
                <li><a href="petboarding-Dashboard_shedule.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Appointments</span>
                    </a></li>
                <li><a href="feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Feedbacks</span>
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
               
               
                        <center>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Appointment NO:</th>
                        
                        <th>Client's Name</th>
                        <th>Client's mobile number</th>
                        <th><center>View</center></th>
                        <th><center>Status</center></th>
                        <th><center>Accept/not</center></th>
                        <th><center>Completed</center></th>
                         <th>Update</th>
                         <th>Cancel</th>
                    </tr>
                </thead>
                <tbody>
             
                            <tr> <td>2023.2.1</td>
                    <td>2</td>
                    <td>Sangeerthan</td>
                    <td>0772232323</td>
                    <td>                        <button  class="login-btn btn-primary btn button-icon"  style="margin-left:25px;height:30px;margin-top: 0px;background-image: url('../img/icons/add.svg');"onclick="document.getElementById('id01').style.display='block'" style="width:auto;">View</button>
</td>
                    <td><center><button class="login-btn btn-primary btn button-icon"" style="height:30px;width:20px;border-radius:30px;" ><center style="margin-left:-30px;">Accepted</center><button></td>
                    <td>
                 

                    <center><input type='checkbox' name='foo' value='bar' checked=''/> </center>
  
</td>
<td>
                 <center>

<input type='checkbox' class='inputUncheck' name='foo' value='bar' /> 
   <script>$('input.inputUncheck').prop('checked', false)
;</script></center>
</td>
                    <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</td>
                    <td> <i class="fa fa-trash-o" aria-hidden="true"></i></td>
</tr>

                </tbody>
            </table>
        </center>

                       
                        <?php

                        
if($_POST)
{  
    $appoDate=$_POST["appoDate"];
    $startTime=$_POST["startTime"];
    $endTime=$_POST["endTime"];

    
    $spid =$_SESSION['spid'];
    
    $sql = "SELECT serviceprovider.spid FROM serviceprovider
    INNER JOIN appointment 
    ON appointment.spid = serviceprovider.spid
    AND serviceprovider.spid = '$spid'
";
    
   

    $sql="insert into appointment (spid,appoDate,startTime,endTime) values ('$spid','$appoDate','$startTime','$endTime')
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
                            <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">More details.</p><br>
                        </td>
                    </tr>
                    

                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="date" class="form-label">Client's name </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="appoDate" class="input-text" value="Sangeerthan"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="date" class="form-label">Client's phone number </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="appoDate" class="input-text" value="0772232323"><br>
                        </td>
                    </tr> <tr>
                        <td class="label-td" colspan="2">
                            <label for="date" class="form-label">Client's Address </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="appoDate" class="input-text" value="No-1/216,Rathnehera,Kanaththagoda,Matara"><br>
                        </td>
                    </tr> <tr>
                        <td class="label-td" colspan="2">
                            <label for="date" class="form-label">Dog's breed</label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="appoDate" class="input-text" value="dobermann"><br>
                        </td>
                    </tr> <tr>
                        <td class="label-td" colspan="2">
                            <label for="date" class="form-label">Food </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="appoDate" class="input-text" value="Happy Dog NaturCroq Puppy-100mg"><br>
                        </td>
                    </tr>
                    <td class="label-td" colspan="2">
                            <label for="date" class="form-label">Size of the dog </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="appoDate" class="input-text" value="Small"><br>
                        </td>
                    </tr>
                    <td class="label-td" colspan="2">
                            <label for="date" class="form-label">Age </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="appoDate" class="input-text" value="4"><br>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                        
                            <a class="close" href="petboarding-Dashboard_shedule.php">&times;</a>

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