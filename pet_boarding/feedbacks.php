<?php
require '../config/db.php';
session_start();
$spid ="";
$book_id="";
if(isset($_SESSION["spid"]) ){
    $spid =$_SESSION["spid"];
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


    <link rel="stylesheet" href="../css/petboarding_feedbacks.css">
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PetAssure</title>



</head>
<style>

  /* Popup container */

  .optio-btn{
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
   
    background-color: gray ;
    border: 1px solid var(--primarycolor) ;
    color: white ;
    box-shadow: 0 3px 5px 0 rgba(57,108,240,0.3);
  }

 



  button.view-btn {
    background-color: gray;
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }

  button.view-btn:hover {
    background-color: #3e8e41;
  }
  

    </style>


<script>
function cancelBooking(book_id) {
  if (confirm('Are you sure you want to cancel this booking?')) {
    fetch("cancel_booking.php?book_id=" + book_id)
      .then(response => response.text())
      .then(data => {
        // reload the page to see the updated bookings
        location.reload();
      })
      .catch(error => {
        console.error(error);
      });
  }
}
function confirmCheckout(book_id) {
  if (confirm('Are you sure you want to checkout this booking?')) {
    fetch("checkout_booking.php?book_id=" + book_id)
      .then(response => response.text())
      .then(data => {
        // reload the page to see the updated bookings
        location.reload();
      })
      .catch(error => {
        console.error(error);
      });
  }
}
</script>

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
                        <span class="link-name">Dashboard</span> </a></li>
                <li><a href="userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
                    <li><a href="petboarding-Dashboard_shedule.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Add a cage category </span>
                    </a></li>
                <li><a href="feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Booking details</span>
                    </a></li>
                    <li><a href="cages.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Cage availability</span>
                    </a></li>
                
                <li><a href="history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">History</span>
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
       
           
        </nav>
        
      
        <br><br>
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Names..">
        <center>
            <h2>Booking details</h2>
            <br><br>
            <table class="styled-table">
  <thead>
    <tr>  
        <th>User Name</th>
      <th>Mobile</th>
      <th>Cage Size</th>
    
      <th>Check-in Date</th>
      <th>Check-out Date</th>
      <th>Type</th>
      <th>More Details</th>
      <th>Cancel booking </th>
      <th>Checked out </th>
  
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php
  $query = "SELECT b.book_id, cc.size, u.uname, u.mobile, b.checkin_date, b.checkout_date, b.type, b.food_pref, b.med, b.name, b.status,b.check_out
            FROM bookings b 
            JOIN cage c ON b.cage_id = c.cage_id
            JOIN cage_categories cc ON c.cat_id = cc.cat_id
            JOIN user u ON b.userid = u.userid
            where b.status='1' && b.check_out='0'
            ORDER BY u.uname, u.mobile"; // order by name and mobile number
  $result = mysqli_query($con, $query);

  $prev_name = '';
  $prev_mobile = '';
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row['uname'] != $prev_name || $row['mobile'] != $prev_mobile) {
      // new name and mobile number, start a new row
      if ($prev_name != '') {
        // close previous row
        echo "</td></tr>";
      }
      echo "<tr>";
      echo "<td>" . $row['uname'] . "</td>";
      echo "<td>" . $row['mobile'] . "</td>";
      $prev_name = $row['uname'];
      $prev_mobile = $row['mobile'];
    }
    // display other details in separate rows
    echo "<tr>";
    echo "<td>" ;
    echo "<td>" ;
    echo "<td>" . $row['size'] . "</td>";
    echo "<td>" . $row['checkin_date'] . "</td>";
    echo "<td>" . $row['checkout_date'] . "</td>";
    echo "<td>" . $row['type'] . "</td>"; 
       echo "<td><a href='view_booking.php?book_id=" . $row['book_id'] . "' class='optio-btn'>View</a></td>";

    echo "<td><button onclick='cancelBooking(" . $row['book_id'] . ")'>Cancel</button></td>";

  
    echo "<td><button onclick='confirmCheckout(" . $row['book_id'] . ")'>Check Out</button></td>";

    echo "</tr>";
  }
  if ($prev_name != '') {
    // close last row
    echo "</td></tr>";
  }
?>

    </table>





</div>


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





        <script src="script.js"></script>

      <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>


</html>