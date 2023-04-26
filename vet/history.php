<?php
require '../config/db.php';
session_start();
$nic ="";
if(isset($_SESSION["spid"]) ){
   $nic =$_SESSION["spid"];
}else{
   //header("location:login.php");
}

$sql = "SELECT appointment.appNo, appointment.appoDate, appointment.description ,user.fname, user.mobile
FROM appointment
INNER JOIN user
ON appointment.userid = user.userid";

$result = mysqli_query($con, $sql);

// check if the trash icon is clicked
if(isset($_GET['delete_id'])) {
    // get the feedback ID to be deleted
    $delete_id = $_GET['delete_id'];

    // prepare the SQL statement to delete the feedback record
    $delete_sql = "DELETE FROM appointment WHERE appNo = $delete_id";

    // execute the SQL statement
    if (mysqli_query($con, $delete_sql)) {
        // feedback record deleted successfully
       
        header("Location: history.php");
    } else {
        // error deleting feedback record
        echo "<script>alert('Error deleting feedback: " . mysqli_error($con) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/vet_history.css">
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

        <center>
  <h2> Consulted Pets</h2>
  <br><br>
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Names..">
  <table class="styled-table" id="myTable">
    <thead>
      <tr>
        <th>Appointment No</th>
        <th>Appointment Date</th>
        <th>Client Name</th>
        <th>Mobile Number</th>
        <th>Description</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($rows = mysqli_fetch_assoc($result)) {
      ?>
      <tr class="active-row">
        <td><?php echo $rows['appNo'];?></td>
        <td><?php echo $rows['appoDate'];?></td>
        <td><?php echo $rows['fname'];?></td>
        <td><?php echo $rows['mobile'];?></td>
        <td><?php echo $rows['description'];?></td>
        <td>
          <a href="?delete_id=<?php echo $rows['appNo']; ?>"
            onclick="return confirm('Are you sure you want to delete this feedback record?')">
            <i class="fa fa-trash-o" aria-hidden="true"></i>
          </a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</center>

<script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      if (tr[i].getElementsByTagName("td").length > 0) {
        var match = false;
        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
          if (td[j]) {
            txtValue = td[j].textContent || td[j].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              match = true;
              break;
            }
          }
        }
        if (match) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>


    </section>

    <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>


</html>