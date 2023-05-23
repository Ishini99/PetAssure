<?php
require '../config/db.php';
session_start();
$userid = "";
$appNo = "";
$spid = "";


if (isset($_SESSION["userid"]))

{
    $userid = $_SESSION["userid"];

    // Retrieve the spid for the current userid from the serviceprovider table
    $spid_query = "SELECT spid FROM serviceprovider WHERE userid = '$userid'";
    $spid_result = mysqli_query($con, $spid_query);

    if ($spid_result && mysqli_num_rows($spid_result) > 0)
     {
        $row = mysqli_fetch_assoc($spid_result);
        $spid = $row['spid'];
    } else
     {
        // Unable to retrieve spid for the current user
        echo "Error retrieving spid for userid: $userid";
        exit;
    }


}
{


$appNo_query = "SELECT appNo FROM appointment WHERE spid = '$spid'";
    $appNo_result = mysqli_query($con, $appNo_query);

    if ($appNo_result && mysqli_num_rows($appNo_result) > 0)
     {
        $row = mysqli_fetch_assoc($appNo_result);
        $appNo = $row['appNo'];
    } else
     {
        // Unable to retrieve spid for the current user
        echo "No Appointments Booked";
        exit;
    }


}

// $sql = "SELECT appointment.appNo, appointment.appoDate, appointment.description, appointment.petName, appointment.petType, appointment.petAge, appointment.breed, user.fname, user.mobile
// FROM appointment
$sql = "SELECT appointment.appNo, appointment.appoDate,user.fname, user.mobile, appointment.description,appointment.completed
FROM appointment
INNER JOIN user ON appointment.userid = user.userid
INNER JOIN serviceprovider ON appointment.spid = serviceprovider.spid 
WHERE appointment.spid = '$spid' &&  appointment.completed='1' ";

$result = mysqli_query($con, $sql);

if (!$result)

{
    // Query execution failed
    echo "Error executing query: " . mysqli_error($con);
}

// Check if the trash icon is clicked
if (isset($_GET['delete_id']))

{
  // Get the appointment ID to be deleted
  $delete_id = $_GET['delete_id'];

  // Prepare the SQL statement to delete the record
  $delete_sql = "DELETE FROM appointment WHERE appNo = $delete_id";

  // Execute the SQL statement
  if (mysqli_query($con, $delete_sql)) {
    // Record deleted successfully
    header("Location: history.php");
  } else {
    // Error deleting record
    echo "<script>alert('Error deleting appointment: " . mysqli_error($con) . "');</script>";
  }
}


// Update description
if (isset($_POST['submit'])) 

{
  $description = $_POST['description']; // Get the description value from the form

  $update_sql = "UPDATE appointment SET description = '$description' WHERE  spid='$spid' && appNo='$appNo'";

  $update_result = mysqli_query($con, $update_sql);

  // Check if the query was successful
  if ($update_result) {
    // Update successful
    echo "Data saved successfully.";
     // Redirect to the same page
     header("Location: history.php");
  } else {
    // Update failed
    echo "Error updating description: " . mysqli_error($con);
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
<<<<<<< HEAD
        <li><a href="notifications.php">
            <i class="uil uil-bell"></i>
            <span class="link-name">Notifications</span>
          </a></li>
=======
       
>>>>>>> cd00ddc15620efcfc751e04b0ffc53311215f53b
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
          <li><a href="ChatIndex.php">
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
            <th style="width:5%">App No</th>
            <th>Appointment Date</th>
         
            <th>Client Name</th>
            <th>Mobile Number</th>
            <th>Any remarks</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($rows = mysqli_fetch_assoc($result)) {
            $appNo = $rows['appNo']; // Set the value of $appNo in the loop
            ?>
            <tr class="active-row">
              <td>
                <?php echo $rows['appNo']; ?>
              </td>
              <td>
              
                <?php echo $rows['appoDate']; ?>
              </td>
             
             
            
              <td>
                <?php echo $rows['fname']; ?>
              </td>
              <td>
                <?php echo $rows['mobile']; ?>
              </td>
              <td>
                <button onclick="document.getElementById('id01').style.display='block'" class="update-button"
                  style="width:auto;">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>

                <div id="id01" class="modal">
                  <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                  <form class="modal-content" action="history.php" method="POST">
                    <div class="container">
                      <h1>Remarks</h1>
                      <p>Please add any remarks.</p>
                      <hr>

                      <input type="text" placeholder="Enter Details" name="description" required>

                      <div class="clearfix">
                        <button type="submit" name="submit" class="btn">Save</button>
                        
                       
                      </div>
                    </div>
                  </form>
                </div>
               
                <?php echo $rows['description'];?>
              </td>
              <td>
                <a href="?delete_id=<?php echo $rows['appNo']; ?>"
                  onclick="return confirm('Are you sure you want to delete this record?')">
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


    <script>//search fuction
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
      // Get the modal
      var modal = document.getElementById('id01');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
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