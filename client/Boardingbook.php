<?php
require_once('../config/db.php');

session_start();
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  //header("location:login.php");
  exit("You must log in to access this page.");
}


if (isset($_GET['uid'])) {
  $getUser = $_GET['uid'];
}


$sql = "SELECT * FROM user";
$result = mysqli_query($con, $sql);




?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cat_id']) && isset($_POST['qty'])) {
  $cat_id = $_POST['cat_id'];
  $qty = $_POST['qty'];

  // Replace this with the ID of the service provider
  // Retrieve the service provider ID for the selected category
  $sp_query = "SELECT `spid` FROM `cage_categories` WHERE `cat_id` = '$cat_id'";
  $sp_result = mysqli_query($con, $sp_query);
  $sp_row = mysqli_fetch_assoc($sp_result);
  $spid = $sp_row['spid'];

  // Selecting the available cages for the selected category
  $query = "SELECT * FROM `cage` WHERE `cat_id` = '$cat_id' AND `status` = 0 LIMIT $qty";
  $result = mysqli_query($con, $query);

  // Inserting the booking data into the database
  while ($row = mysqli_fetch_assoc($result)) {
    $cage_id = $row['cage_id'];
    $insert_query = "INSERT INTO `bookings` (`cage_id`, `cat_id`, `userid`, `spid`, `checkin_date`, `checkout_date`, `type`, `food_pref`, `med`, `name`, `status`)
        VALUES ('$cage_id', '$cat_id', '$userid', '$spid', '', '', '', '', '', '', '1')";
    if (mysqli_query($con, $insert_query)) {
      $book_id = mysqli_insert_id($con);
      echo "Data inserted successfully with booking ID: " . $book_id;
    } else {
      printf("Error: %s\n", mysqli_error($con));
    }

    // Updating the status of the booked cages
    $update_query = "UPDATE `cage` SET `status` = 1 WHERE `cage_id` = '$cage_id'";
    mysqli_query($con, $update_query);
  }

  if (isset($_GET['uid'])) {
    $getuser = $_GET['uid'];
    $url = 'Boardingbook.php?uid=' . $getUser;
    header('Location: ' . $url);
    exit();
  }


}


?>







<!-- <script>

    window.onload = function () {
        const element = document.getElementById('tablehead');
        console.log(element);
        element.scrollIntoView({ block: "end" });
    }

//   $(window).load(function(){ 
//     console.log("Test");
//     $('html,body').animate({ scrollTop: $('#').offset().top - 100 }, 'slow'); 
// });
</script> -->




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/boardingcageslot.css">
  <link rel="stylesheet" href="../css/boardingbook.css">

  <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

  <title>PetAssure</title>
  <style>
    .styled-table {
      border-collapse: collapse;
      margin: 25px 0;
      box-shadow: 0 0 20px rgba(0, 10, 0, 0.15);
    }

    .styled-table tr {
      background-color: #E0E0E0;
      color: #ffffff;
    }

    .styled-table tr {
      border-bottom: 1px solid #A6A6A6;
    }
  </style>


</head>

<body class="body-scroller">


  <nav>
    <div class="logo-name">
      <div class="logo-image">
        <img src="../images/logo.png" alt="">
      </div>

      <span class="logo_name">PetAssure</span>
    </div>

    <div class="menu-items">
      <ul class="nav-links">
        <li><a href="services1.php">
            <i class="uil uil-apps"></i>
            <span class="link-name">Services</span>
          </a></li>
        <li><a href="./userProfile.php">
            <i class="uil uil-user"></i>
            <span class="link-name">User Profile</span>
          </a></li>
        <!-- <li><a href="./notifications.php">
            <i class="uil uil-bell"></i>
            <span class="link-name">Notifications</span>
          </a></li> -->
        <li><a href="./history.php">
            <i class="uil uil-history"></i>
            <span class="link-name">my posts</span>
          </a></li>
        <li><a href="./clientappointments.php">
            <i class="uil uil-calender"></i>
            <span class="link-name">Appointments</span>
          </a></li>
        <!-- <li><a href="indexVet.php">
            <i class="uil uil-comments"></i>
            <span class="link-name">Feedbacks</span>
          </a></li> -->
        <!-- <li><a href="./freeConsultation.php">
                        <i class="uil uil-chat"></i>
                        <span class="link-name"></span>
                    </a></li> -->

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


      <?php

      $rows = mysqli_query($con, "SELECT * FROM `boardingimage` where uid='$getUser'")

        ?>




      <div class="container">
        <div class="profilepic">
          <div class="proimg">

            <?php
            if (mysqli_num_rows($rows) > 0) {
              // Loop through each image and display it
              while ($row = mysqli_fetch_assoc($rows)) {
                $image_path = "../pet_boarding/boarding_img/" . $row['image'];
                ?>
                <img src="<?php echo $image_path; ?>" onclick="myFunction(this)">


              <?php }
            } ?>
          </div>
          <div class="img-container">

            <?php
            // Execute the query to get images
            $rows = mysqli_query($con, "SELECT * FROM `boardingimage` WHERE uid='$getUser'");

            // Check if any images were found
            if (mysqli_num_rows($rows) > 0) {
              // Get the first image and display it
              $row = mysqli_fetch_assoc($rows);
              $image_path = "../pet_boarding/boarding_img/" . $row['image'];
              ?>
              <img id="imageBox" src="<?php echo $image_path; ?>">

              <?php
            } else {
              // No images found, display a default image or an error message
              ?>
              <img src="../images/cage.jpg">
              <?php
            }
            ?>


          </div>
        </div>

        <div class="details">
          <script>
            function myFunction(smallImg) {
              var fullImg = document.getElementById("imageBox");
              fullImg.src = smallImg.src;
            }
          </script>

          <?php

          $sql = "SELECT * FROM user where userid='$getUser'";

          if ($result = mysqli_query($con, $sql)) {


            if (mysqli_num_rows($result) > 0) {


              $row = mysqli_fetch_array($result);


              echo "<div class='info'><strong><i class='fa-solid fa-user'></i>   :</strong> <span>" . $row['uname'] . "</span></div>";
              echo "<div class='info'><strong><i class='fa-solid fa-phone-volume'></i>   :</strong> <span>" . $row['mobile'] . "</span></div>";
              echo "<div class='info'><strong><i class='fa-solid fa-envelope'></i>   :</strong> <span>" . $row['email'] . "</span></div>";
              echo "<div class='info'><strong><i class='fa-solid fa-location-dot'></i>   :</strong> <span>" . $row['address'] . "</span></div>";
              // echo "<div class='info'><strong><i class='fa-sharp fa-solid fa-folder-open'></i>   :</strong> <span>" . $row['details'] . "</span></div>";
          

            }

          }

          ?>
        </div>
      </div>

      </div>
    </center>






    <!-- packages and cage booking starting here -->

    <section class="container2">
      <section class="show-products">
        <div class="box-container2">

          <?php
          // Retrieving data from the database
          $show_products = mysqli_query($con, "SELECT * FROM `cage_categories`");

          if (mysqli_num_rows($show_products) > 0) {
            // Looping through the results and displaying each record
            while ($fetch_products = mysqli_fetch_assoc($show_products)) {
              $cat_id = $fetch_products['cat_id'];
              ?>

              <div class="box">
                <div class="price">RS.
                  <?= $fetch_products['price']; ?>.00 per day.
                </div>
                <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                <div class="label">Size:</div>
                <div class="name">
                  <?= $fetch_products['size']; ?>
                </div>
                <div class="label">Quantity:</div>


                <form method="post" action="boardingbook.php?uid=<?= $getUser ?>">
                  <input type="hidden" name="cat_id" value="<?= $fetch_products['cat_id']; ?>">
                  <input type="number" min="1" max="<?= $fetch_products['qty']; ?>" value="1" name="qty">
                  <input type="submit" value="+">
                </form>


                <div class="label">Food:</div>
                <div class="name">
                  <?= $fetch_products['food']; ?>
                </div>
                <div class="label">Description:</div>
                <div class="name">
                  <?= $fetch_products['description']; ?>
                </div>
              </div>


              <?php
            }
          } else {
            echo '<p class="empty">No products added yet!</p>';
          }

          // Closing the database connection
          ?>
          <table>
            <thead>
              <tr>
                <th>Size</th>
                <th>Number of Cages Booked</th>

              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_SESSION['userid'])) {
                $userid = $_SESSION['userid'];

                // Replace <your_spid> with the actual service provider ID
                $query = "SELECT cc.cat_id, cc.size, c.status, COUNT(*) AS total_bookings
    FROM bookings b
    JOIN cage c ON b.cage_id = c.cage_id
    JOIN cage_categories cc ON c.cat_id = cc.cat_id
    WHERE b.userid = '$userid'
    GROUP BY cc.cat_id, cc.size, c.status";

                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";

                  echo "<td>" . $row['size'] . "</td>";
                  echo "<td>" . $row['total_bookings'] . "</td>";
                  echo "</tr>";
                }
              }
              
              ?>

            </tbody>

          </table>
          <h1>To fill the details regarding pets click the proceed button. </h1>
          <form method="post" action="update_cages.php">

            <input type="submit" name="update_cages" value="proceed" class="optio-btn">
          </form>
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="
    width: 80px;
    margin: -76px -203px 0px 306px;
">Cancel</button>
        </div>
        
        </div>


        <script src="../js/script.js"></script>
        <script>
          // Get the modal
          var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        // window.onclick = function(event) {
        //     if (event.target == modal) {
        //         modal.style.display = "none";
        //     }
        // }
        </script>


      </section>




      </div>
      </div>
      


      <script src="../js/script.js"></script>
      <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        // window.onclick = function(event) {
        //     if (event.target == modal) {
        //         modal.style.display = "none";
        //     }
        // }
      </script>

      <script src="../js/script.js"></script>

    </section>




    <div class="footerr" style="position:absolute; z-index: -1; width: 100%;">
      <p> Telephone No: +94 11 233 5632
        Fax: +94 11 233 5632
        Email: petAssure@hotmail.com​</p>
    </div>

</body>


</html>