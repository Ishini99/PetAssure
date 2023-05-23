<?php
require_once('../config/db.php');

session_start();

$sql = "SELECT * FROM user WHERE role IN ( 'petsitter')";
$result = $con->query($sql);

?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vetposts.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <title>PetAssure</title>
</head>
<style>
    body {
        background-image: url("../images/bg2.png");
    }
</style>

<body>
    <div class="page">
        <div class="nav" style="width: 100%">
            <div class="left">
                <img src="../images/logo.png" width="100px" height="100px" />
                <p style="margin-left: 20px">PetAssure</p>
            </div>

            <div class="right">
                <a href="homepage.html" class="font">HOME</a>
                <a href="userProfile.php" class="font">PROFILE</a>
                <a href="services1.php" class="font">SERVICES</a>
                <a href="../login.php" class="font">LOG OUT </a>
            </div>
        </div>
    </div>
    <div class="content" style="margin-top: 70px">
        <div class="filter" style="margin-left: 10px">
            <div>
                <select style="
            margin-left: 10px;
            margin-top: 20px;
            width: 200px;
            height: 35px;
          " name="districts" id="districts">
                    <option value="Colombo">Colombo</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Kalutara">Kalutara</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Matale">Matale</option>
                    <option value="NuwaraEliya">Nuwara Eliya</option>
                    <option value="Galle">Galle</option>
                    <option value="Matara">Matara</option>
                    <option value="Hambantota">Hambantota</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Kilinochchi">Kilinochchi</option>
                    <option value="Mannar">Mannar</option>
                    <option value="Vavuniya">Vavuniya</option>
                    <option value="Mullaitivu">Mullaitivu</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Ampara">Ampara</option>
                    <option value="Trincomalee">Trincomalee</option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Puttalam">Puttalam</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Moneragala">Moneragala</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Kegalle">Kegalle</option>
                </select>
            </div>
            <div>
                <div>
                    <input style="
            margin-left: 10px;
            margin-top: 20px;
            width: 800px;
            height: 30px;
          " type="text" placeholder="Search Here" />
                    <button class="sbtn">Search</button>
                </div>
            </div>
        </div>
        <div style="display: flex; justify-content: center">
            <h1>Petsitter</h1>
        </div>
        <!-- <div style="display: flex; justify-content: center">
      <div style="display: flex; justify-content: space-around">
      <a href="adoptposts.php"><button class="btn">Adoption</button></a>
      <a href="saleposts.php"><button class="btn" >Sale</button></a>
      <a href="crossposts.php"> <button class="btn">Crossing</button></a>
      </div> -->
    </div>
    <div>

        <div class="posts">



            <?php
            $sql = "SELECT user.*, MIN(sitimage.imgId) AS first_image_id
 FROM user
 INNER JOIN sitimage ON user.role = 'petsitter ' AND user.userid = sitimage.uid
 GROUP BY user.userid";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row1 = $result->fetch_assoc()) {
                    // Use $row['first_image_id'] to retrieve only the first image for each user
                    $image_sql = "SELECT * FROM sitimage WHERE imgId = " . $row1['first_image_id'];
                    $image_result = $con->query($image_sql);
                    if ($image_result->num_rows > 0) {
                        $image_row = $image_result->fetch_assoc();
                    }


                    ?>


                    <div class="product-card" id="product-card">
                        <img src="./../petsiter/sitter_img/<?php echo $image_row['image'] ?>"
                            class="product-card-thumbnail-image">
                        <div class="swiper-container">
                        </div>
                        <div class="pagination"></div>

                        <div class="product-details">
                            <div id="hide_on_hover">
                                <p class="book-title">
                                    <?php echo "<h2>" . $row1['uname'] . "</h2>"; ?>
                                </p>
                                <!-- <p class="author"></p> -->

                                <?php $sql = "SELECT * FROM feedback WHERE feedback.spid= ('')"; ?>
                                <!-- <span class="rating"> <?php echo "<h2>" . $row1['uname'] . "</h2>"; ?></p> -->
                                <!-- <p class="fa fa-star"></p> -->
                                </span>
                            </div>
                            <div id="show_on_hover">
                                <!-- <i class="material-icons heart">favorite</i> -->
                                <!-- <button class="btn add-to-card">Add To Card</button> -->
                            </div>
                            <div class="not_change_on_hover">
                                <div class="product-quality">
                                    <!-- <div class="input-chip active"> -->
                                    <a href="petsitterbook2.php?uid=<?php echo $row1['userid'] ?>"> <button
                                            class="btn add-to-card">BOOK NOW</button></a>
                                </div>
                                <!-- <div class="input-chip">
                                <input type="radio">Good  -->
                            </div>
                            <div class="input-chip">
                                <!-- <input type="radio">Acceptable -->
                            </div>
                        </div>
                        <div class="price">
                            <!-- <span class="new-price"> </span> -->
                            <!-- <span> <del class="original-price"> ₹20 </del> </span> -->
                            <span class="discount">
                                <?php echo "<p>" . $row1['district'] . "</p>"; ?>
                            </span>
                        </div>
                    </div>
                    <?php
                }
            }
            $con->close();
            ?>

        </div>
    </div>

    </div>
    </div>

    </div>

    <!-- <div>
      <div style="display: flex; justify-content: right">
        <button onclick="location.href='addpost.php'" class="addbtn"><span>&#43;</span><b> Add your post</b></button>
      </div> -->
    </div>
    </div>
    <div class="footerr" style="z-index: -1; width: 100%; position: relative">
        <p>
            Telephone No: +94 11 233 5632&nbsp;&nbsp;&nbsp;&nbsp; Fax: +94 11 233
            5632 &nbsp;&nbsp;&nbsp;&nbsp;Email: petAssure@hotmail.com​
        </p>
    </div>
</body>

</html>