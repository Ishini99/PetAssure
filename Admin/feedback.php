<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/viewhotel.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <title>Feedback</title>
  </head>
  <style>
    body  {
      background-image:  url("assets/bg3.png");
      background-repeat: no-repeat;
    }
    </style>
<body>
  <?php include "adminnav.php" ?>
  <div class="page">
        <!-- <div class="navb" style="width: 100%;">
            <div class="left">
                <img src="assets/img4.png" width="100px" height="100px">
                <p style="margin-left: 20px;">PetAssure</p>
            </div>

            <div class="right">
                <a href="" class="font">HOME</a>
                <a href="addpost.php" class="font">ADD REVIEW</a>
                <a href="services.html" class="font">SERVICES</a>
                <a href="loginnew.php" class="font">LOG OUT </a>
            </div>
        </div> -->
  </div>
        <div class ="pager">
          <h3 class="subhead">We Appriciate You</h3>
        <table>
	<tr class="white_box">
	<th>Client Name</th><br>
	<th>Ratings</th>
  <th>District</th>
	<th>Recommondation</th>
  <th>Mobile</th>
	<th>Email</th>
  
	</tr>
	<?php
	include "connect.php";
    $sql = "SELECT `hotelname`, `rating`, `district`, `comments`, `mobile`, `email` FROM `feedback`;";
	$result = mysqli_query($conn,$sql);
	$resultcheck = mysqli_num_rows($result);
    ?>

		<?php while ($row = mysqli_fetch_array($result)){?>
			<tr class ="pagerr">
			<td><?php echo $row['hotelname']?></td>
			<td><?php echo $row['rating']?></td>
      <td><?php echo $row['district']?></td>
			<td><?php echo $row['comments']?></td>
      <td><?php echo $row['mobile']?></td>
      <td><?php echo $row['email']?></td>
			</tr>
			<?php } ?>
			
</table>
        </div>
        <div class="page">
        <div class="footerr" style=" z-index: 2; width: 100%;">
            <p> Telephone No: +94 11 233 5632&nbsp;&nbsp;&nbsp;&nbsp;
                Fax: +94 11 233 5632 &nbsp;&nbsp;&nbsp;&nbsp;Email: petAssure@hotmail.com​</p>
        </div>
    </div>
</body>
</html>