<?php
require '../config/db.php';
session_start();
$spid ="";


if(isset($_SESSION["userid"]) ){
  $userid =$_SESSION["userid"];
}else{
  //header("location:login.php");
}
$query = "SELECT * FROM groomer_posts WHERE userid = '$userid'";

$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
   $row = mysqli_fetch_assoc($result);
   $spid = $row['spid'];
} else {
   
}
$sql = "SELECT groomer_posts.appNo, groomer_posts.appoDate, groomer_posts.description, 
FROM groomer_posts
INNER JOIN user ON groomer_posts.userid = user.userid
INNER JOIN serviceprovider ON groomer_posts.spid = serviceprovider.spid
WHERE serviceprovider.spid = '$spid'";

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
      echo "<script>alert('Error deleting record: " . mysqli_error($con) . "');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/groomer_packages.css">
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
                <li><a href="groomerDashboard.php">
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
                <li><a href="appointments.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Appointments</span>
                    </a></li>
                    <li><a href="packages.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">My packages</span>
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
            <h2> Packages</h2>
            <br><br>
            <a href="groomer_makePoster.php" class="button">Add Packages</a>
        
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Names..">
    <table id="myTable" class="styled-table">
        <thead>
                    <tr>
                        <th>Package No</th>
                        <th>Package Name</th>
                        <th>Prices</th>
                        <th>Services</th>
                        <th>Date</th>
                        <th>Delete</th>
                       

                    </tr>
                </thead>
                <tbody>
                 <?php
      while($rows = mysqli_fetch_assoc($result)) {
      ?>
      <tr class="active-row">
        <td><?php echo $rows['id'];?></td>
        <td><?php echo $rows['package_name'];?></td>
        <td><?php echo $rows['price'];?></td>
      
        <td><?php echo $rows['description'];?></td>
        <td><?php echo $rows['date'];?></td>
        <td>
          <a href="?delete_id=<?php echo $rows['appNo']; ?>"
            onclick="return confirm('Are you sure you want to delete this  record?')">
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