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
                        <span class="link-name">Dashboard</span> </a></li>
                <li><a href="userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
               
                <li><a href="history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">History</span>
                    </a></li>
                <li><a href="petboarding-Dashboard_shedule.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Add a cagae category </span>
                    </a></li>
                <li><a href="feedbacks.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Booking details</span>
                    </a></li>
                    <li><a href="cages.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Cage availability</span>
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




  

                                
<?php

if(isset($_POST['update_product'])){

   $cat_id = $_POST['cat_id'];
   $qty = $_POST['qty'];
 
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description= filter_var($description, FILTER_SANITIZE_STRING);
   $food = $_POST['food'];
   $food = filter_var($food, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;
   $old_image = $_POST['old_image'];

   $update_product = $con->prepare("UPDATE `cage_categories` SET qty = ?, description = ?, food = ?, price = ? WHERE cat_id = ?");
   $update_product->execute([$qty, $description, $food, $price, $cat_id]);
   
   $message[] = 'cage updated successfully!';
   
   // Get the number of existing cages for this category
   $get_existing_cages = $con->prepare("SELECT COUNT(*) FROM `cage` WHERE cat_id = ?");
   $get_existing_cages->execute([$cat_id]);
   $result = $get_existing_cages->get_result();
   $existing_cages_count = mysqli_fetch_row($result)[0];
   
   // If the updated qty is greater than the number of existing cages, insert new cages
   if ($qty > $existing_cages_count) {
       $new_cages_count = $qty - $existing_cages_count;
       for ($i = 0; $i < $new_cages_count; $i++) {
           $insert_query = "INSERT INTO `cage` (`cat_id`) VALUES ('$cat_id')";
           $result = mysqli_query($con, $insert_query);
           if (!$result) {
               // handle error if the query fails
               echo "Error inserting cage: " . mysqli_error($con);
           }
       }
   }
   // If the updated qty is less than the number of existing cages, delete the extra cages
   elseif ($qty < $existing_cages_count) {
       $extra_cages_count = $existing_cages_count - $qty;
       $delete_query = "DELETE FROM `cage` WHERE cat_id = '$cat_id' LIMIT $extra_cages_count";
       $result = mysqli_query($con, $delete_query);
       if (!$result) {
           // handle error if the query fails
           echo "Error deleting cages: " . mysqli_error($con);
       }
   }
   
   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
   
         $update_image = $con->prepare("UPDATE `cage_categories` SET image = ? WHERE cat_id = ?");
         $update_image->execute([$image, $cat_id]);
   
         if($update_image){
            move_uploaded_file($image_tmp_name, $image_folder);
            unlink('uploaded_img/'.$old_image);
            $message[] = 'image updated successfully!';
         }
      }
   }
   
}

?>



<section class="update-product">

   <h1 class="title">Update Cage Details</h1>   

   <?php
      $update_id = $_GET['update'];
   
      $select_products = mysqli_prepare($con, "SELECT * FROM `cage_categories` WHERE cat_id= ?");
      mysqli_stmt_bind_param($select_products, 'i', $update_id);
      mysqli_stmt_execute($select_products);
      $result = mysqli_stmt_get_result($select_products);
      if(mysqli_num_rows($result) > 0){
         while($fetch_products = mysqli_fetch_assoc($result)){ 
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="old_image" value="<?= $fetch_products['image']; ?>">
      <input type="hidden" name="cat_id" value="<?= $fetch_products['cat_id']; ?>">

      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div style="font-size: 17px; color: #333;">Cage Size   :   <?= $fetch_products['size']; ?></div><br>

      <lable for="qty"> Quantity of the available cages : </lable><br>
      <input type="number" name="qty" placeholder="Enter available cages" required class="box" value="<?= $fetch_products['qty']; ?>">
      <lable for="price"> Price of a cage : </lable><br>

      <input type="number" name="price" min="0" placeholder="Enter cage price" required class="box" value="<?= $fetch_products['price']; ?>">
      <lable for="food"> If you changing the food type : </lable><br>

      <select name="food" class="box" required>
         <option selected><?= $fetch_products['food']; ?></option>
    <option value="Pet owners can bring their own food or home food is available.">Pet owners can bring their own food or home food is available.</option>
    <option value="Please specify your food preferences in the form.">Please specify your food preferences in the form.</option>
    <option value="No food is provided. Pet owners must bring their pet's food.">No food is provided. Pet owners must bring their pet's food.</option>
    <option value="Pet owners can bring their own food, home food also available, or please specify your food preferences in the form.">Pet owners can bring their own food, home food also available, or please specify your food preferences in the form.</option>
</select>
 
<lable for="description"> If there are more details about the cages </lable><br>

      <textarea name="description" required placeholder="Enter cage details" class="box" cols="30" rows="10"><?= $fetch_products['description']; ?></textarea>
      <lable for="image">Update the new image here: </lable><br>

      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <div class="flex-btn">
         <input type="submit" class="btn" value="update product" name="update_product">
         <a href="petboarding-Dashboard_shedule.php" class="option-btn">go back</a>
      </div>
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">no products found!</p>';
      }
      mysqli_close($con);
   ?>

</section>



<script src="js/script.js"></script>


</body></section>
</html>