<?php
require '../config/db.php';
session_start();
$spid ="";
$userid="";


if(isset($_SESSION["userid"]) ){
   $userid =$_SESSION["userid"];
}else{
   //header("location:login.php");
}
$query = "SELECT spid FROM serviceprovider WHERE userid = '$userid'";

$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $spid = $row['spid'];
} else {
    
}
$sql = "SELECT *
FROM cage_categories
INNER JOIN serviceprovider
ON cage_categories.spid = serviceprovider.spid
AND serviceprovider.spid = '$spid'";




($result = mysqli_query($con, $sql));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/petboarding_appointments.css">
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PetAssure</title>

    <script>
   function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
function openImage() {
  document.getElementById("myImage").style.display = "block";
}

function closeImage() {
  document.getElementById("myImage").style.display = "none";
}

</script>

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
            <h2> Add a cagae category</h2>
        </center>

        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr>
                    <td width="13%">
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
                        <button class="btn-label"
                            style="display: flex;justify-content: center;align-items: center;"><img src="calendar.svg"
                                width="40px"></button>
                    </td>


                </tr>

                <tr>
                    <td colspan="4">
                        <div style="display: flex;margin-top: 40px;">
                            <div class="heading-main12"
                                style="margin-left: 45px;font-size:23px;color:rgb(49, 49, 49);margin-top: -55px;">
                                Click here to add cage details.</div>
                            <button class="optio-btn"
                                style="margin-left:25px;margin-top: -55px;background-image: url('../img/icons/add.svg');"
                                onclick="openForm()" class="optio-btn" style="display: inline-block;">Add
                                a cage</button>

                            </a>
                        </div>
                      

                                

                        <?php
//add cage form
$spid = "";
$query = "SELECT spid FROM serviceprovider WHERE userid = '$userid'";

$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $spid = $row['spid'];
} else {

}     

// assume you already have the service provider ID in a variable called $spid
// you can modify the following code to match your table and column names
$sql = "SELECT size FROM cage_categories WHERE spid='$spid'";
$result = mysqli_query($con, $sql);
$sizes = array();
while($row = mysqli_fetch_assoc($result)) {
    $sizes[] = $row['size'];
}               
if ($_POST) {  
    $size= $_POST["size"];
    $price = $_POST["price"];
    $qty = $_POST["qty"];
    //image
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;
    //
    $description = $_POST["description"];
    $food = $_POST["food"];
    if (in_array($size, $sizes)) {
        // size already exists, display an error message
        echo "Error: size $size already exists for this service provider";
    } else {
        $sql = "INSERT INTO cage_categories (spid,size,price,qty,image,description,food) VALUES ('$spid','$size','$price','$qty','$image','$description','$food')";
    
        if (mysqli_query($con, $sql)) {
            $cat_id = mysqli_insert_id($con);
    
            if($image_size > 2000000){
                $message[] = 'image size is too large!';
            } else {
                for ($i = 0; $i < $qty; $i++) {
                    $insert_query = "INSERT INTO `cage` (`cat_id`) VALUES ('$cat_id')";
                    $result = mysqli_query($con, $insert_query);
                    if (!$result) {
                        // handle error if the query fails
                        echo "Error inserting cage: " . mysqli_error($con);
                    }
                }
                move_uploaded_file($image_tmp_name, $image_folder);
                echo '<script type="text/javascript"> alert("cage category was added.")</script>';
                echo "<meta http-equiv='refresh' content='0'>";
                exit();
            } 
        } else {
            echo '<script type="text/javascript"> alert(" Try again.")</script>';
        }
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    // Check if there are any upcoming bookings for the category
    $check_bookings = mysqli_query($con, "SELECT COUNT(*) FROM `cage` WHERE cat_id = '$delete_id' AND status='1'");
    $bookings_count = mysqli_fetch_row($check_bookings)[0];

    if ($bookings_count > 0) {
        // If there are upcoming bookings, display a message and don't delete the category
        echo '<p>Cannot delete this category. There are '.$bookings_count.' upcoming bookings for this category.</p>';
    } else {
        // If there are no upcoming bookings, delete the category
        $fetch_delete_image = mysqli_fetch_assoc(mysqli_query($con, "SELECT image FROM cage_categories WHERE cat_id = '$delete_id'"));
        unlink('uploaded_img/'.$fetch_delete_image['image']);
        mysqli_query($con, "DELETE FROM cage_categories WHERE cat_id= '$delete_id'");
    }
}

 
 ?>
 

<div class="popup-form" id="myForm">
  <form action="" method="POST" enctype="multipart/form-data">
  <span class="close-icon" onclick="closeForm()">&times;</span>

    <div class="flex">
  
     <div class="inputBox">
     <div class="fonts">Choose cage size</div>
<select name="size" class="box2" required>
    <option value="" selected disabled>Small</option>
    <option value="Meduim."<?php echo (in_array('Meduim.', $sizes)) ? ' disabled' : ''; ?>>Meduim.</option>
    <option value="Large."<?php echo (in_array('Large.', $sizes)) ? ' disabled' : ''; ?>>Large.</option>
    <option value="Small."<?php echo (in_array('Small.', $sizes)) ? ' disabled' : ''; ?>>Small.</option>
    <option value="Extra Large."<?php echo (in_array('Extra Large.', $sizes)) ? ' disabled' : ''; ?>>Extra Large.</option>
</select>

        
      <div class ="fonts"> Check Cage Sizes </div> 
    <button class="optio-btn" onclick="openImage()">Click here</button>
    </div>
<br>
<div class="popup-image" id="myImage">
     <img src="../images/cage-sizes.jpg" alt="Image">
  <span class="close-icon2" onclick="closeImage()">&times;</span>
 
</div>

<div class="inputBox">

  <div class="fonts">Choose cage price</div>
  <input type="number" min="0" name="price" class="box" required placeholder="Enter cage price">
  <div class="fonts">Choose cage quantity</div>
  <input type="number" min="0" name="qty" class="box" required placeholder="Enter cage quantity">
</div>

<div class="inputBox">
<label for="food" class="fonts">Food options:</label>
<select name="food" id="food" class="box" required>
    <option value="" selected disabled>Choose an option</option>
    <option value="Pet owners can bring their own food or home food is available.">Pet owners can bring their own food or home food is available.</option>
    <option value="Please specify your food preferences in the form.">Please specify your food preferences in the form.</option>
    <option value="No food is provided. Pet owners must bring their pet's food.">No food is provided. Pet owners must bring their pet's food.</option>
    <option value="Pet owners can bring their own food, home food also available, or please specify your food preferences in the form.">Pet owners can bring their own food, home food also available, or please specify your food preferences in the form.</option>
</select>
</div>
<label for="image" class="fonts">Upload a cage image:</label><br><br>
<div class="inputBox">
<input type="file" name="image" required class="box" accept="image/jpg, image/jpeg, image/png">

</div>
<div class="inputBox">
<label for="description" class="fonts">Add more details if available:</label><br><br>

    <textarea name="description" class="box" required placeholder="Enter cage details" cols="30" rows="10"></textarea>
    <input type="submit" class="btn" value="add cage" name="add_cage">
</div>
  </form>
</div>

</div>
<section class="container">
<section class="show-products">

<br>
   <div class="box-container">

   <?php
   // Retrieving data from the database
$show_products = mysqli_query($con, "SELECT * FROM `cage_categories` where spid='$spid'");

if (mysqli_num_rows($show_products) > 0) {
   // Looping through the results and displaying each record
   while ($fetch_products = mysqli_fetch_assoc($show_products)) {
?><div class="box">

   <div class="price">RS. <?= $fetch_products['price']; ?>.00 per day.</div>
   <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
   <div class="label">Size:</div>
   <div class="name"><?= $fetch_products['size']; ?></div>
   <div class="label">Quantity:</div>
   <div class="name"><?= $fetch_products['qty']; ?></div>
   <div class="label">Food:</div>
   <div class="name"><?= $fetch_products['food']; ?></div>
   <div class="label">Description:</div>
   <div class="name"><?= $fetch_products['description']; ?></div>
 
<a href="update_cages.php?update=<?= $fetch_products['cat_id']; ?>" class="optio-btn2" style="display: inline-block; margin-right: 2px;">update</a>
<a href="petboarding-Dashboard_shedule.php?delete=<?= $fetch_products['cat_id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');" style="display: inline-block;margin-top:-5px">delete</a>

   
</div>

<?php
   }
} else {
   echo '<p class="empty">Cages are not added yet!you can click the add a cage button and give details.</p>';
}

// Closing the database connection
mysqli_close($con);
?>


   </div>

 
<script src="js/script.js"></script>

</body>

</html>