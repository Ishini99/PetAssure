<?php
session_start();

if(isset($_SESSION["userid"]) ){
   $userid =$_SESSION["userid"];
}else{
   //header("location:login.php");
   exit("You must log in to access this page.");
}

$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
$uname = isset($_POST['uname']) ? $_POST['uname'] : '';
$district = isset($_POST['district']) ? $_POST['district'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
// $details = isset($_POST['details']) ? $_POST['details'] : '';
require '../config/db.php';

// Updating user profile details
if (isset($_POST['update'])) {
    $query =  "UPDATE user SET fname='$fname', district='$district', email='$email', mobile='$mobile', uname='$uname' WHERE userid = '$userid'";
    $sql = mysqli_query($con, $query);
    if ($sql) {
        echo "<script>alert('Record update successfully')</script>";
        // header("Location:userProfile.php");
    } else {
        echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
    }
}

// Adding a new groomer image
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    if($_FILES["image"]["error"] == 4){
      echo "<script> alert('Image Does Not Exist'); </script>";
    }
    else{
      $fileName = $_FILES["image"]["name"];
      $fileSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];
  
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $fileName);
      $imageExtension = strtolower(end($imageExtension));
      if ( !in_array($imageExtension, $validImageExtension) ){
        echo "<script>alert('Invalid Image Extension');</script>";
      }
      else if($fileSize > 10000000){
        echo "<script>alert('Image Size Is Too Large');</script>";
      }
      else{
        $newImageName = uniqid() . '.' . $imageExtension;
  
        move_uploaded_file($tmpName, 'groomer_img/' . $newImageName);
        $query = "INSERT INTO groomerimage (name, image,uid) VALUES('$name', '$newImageName','$userid')";
        mysqli_query($con, $query);
        echo "<script>alert('Successfully Added');</script>";
      }
    }
}

// Deleting a groomer image
if(isset($_POST["delete"])){
    $imgId = $_POST["imgId"];
    $imageName = $_POST["imageName"];
    if (!isset($imgId) || !is_numeric($imgId)) {
        echo "<script>alert('Invalid ID');</script>";
    } else {
        $query = "DELETE FROM groomerimage WHERE imgId = $imgId";
        mysqli_query($con, $query);
        unlink("groomer_img/" . $imageName); // delete the image file from server
        echo "<script> alert('Successfully Deleted'); </script>";
    }
}

?>


<html>

<head>
    <link rel="stylesheet" href="../css/updateProfile_i.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <title>Update Profile</title>
    <style>
    </style>



</head>

<body class="profile-page">
    <div class="nav" style="width: 100%;">
        <div class=" left">
            <img src="../Images/logo.png" width="100px" height="100px">
            <p style="margin-left: 20px;">PetAssure</p>
        </div>

        <div class="right">
            <a href="../index.php" class="font">HOME</a>
            <a href="userProfile.php" class="font">PROFILE</a>

            <a href="groomerDashboard.php" class="font">DASHBOARD</a>
            <a href="../logout.php" class="font">LOG OUT </a>
        </div>
    </div><br><br>

    <div class="center">
        <div class="bodycontent">


            <center>
                <table class="styled-table1" cellspacing=0px cellpadding=5px>
                    <?php
      $rows = mysqli_query($con, "SELECT * FROM groomerimage WHERE uid ='$userid'");
      foreach ($rows as $row) :
        ?>
                    <td>
                        <img src="groomer_img/<?php echo $row["image"]; ?>" width=100 height=150
                            title="<?php echo $row['image']; ?>">

                        <form action="" method="post">
                            <input type="hidden" name="imgId" value="<?php echo $row['imgId']; ?>">
                            <input type="hidden" name="imageName" value="<?php echo $row['image']; ?>">
                            <button type="submit" name="delete" class="btnDel-icon"><i
                                    class="fas fa-trash-alt"></i></button>

                        </form>
                    </td>
                    <?php endforeach; ?>
                </table>
                <br>
               
            </center>





        </div>

    </div>


    <div class="clearfix">
  <div class="form-column">
    
    <form class="form-container" action="" method="post" autocomplete="off" enctype="multipart/form-data">
  <div class="form-group">
    <label class="form-label" for="name">Image Description:</label>
    <input class="form-input" type="text" name="name" id="name" required value="">
  </div>
  <div class="form-group">
    <label class="form-label" for="image">Select Image:</label>
    <input class="form-input" type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="">
  </div>
  <div class="form-group">
    <button class="form-btn" type="submit" name="submit">Insert Image</button>
  </div>
</form>
    
  </div>
  
  <div class="form-column">
   
    <form action="" method="post">
  <div class="form-container">
    <h2 class="form-header">Update Profile</h2>

    <div class="form-group">
      <label for="fname" class="form-label">Name:</label>
      <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>" required class="form-input">
    </div>

    <div class="form-group">
      <label for="mobile" class="form-label">Mobile Number:</label>
      <input type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>" required class="form-input">
    </div>

    <div class="form-group">
      <label for="district" class="form-label">Address:</label>
      <input type="text" name="district" id="district" value="<?php echo $district; ?>" class="form-input">
    </div>

    <div class="form-group">
      <label for="email" class="form-label">Email:</label>
      <input type="text" name="email" id="email" value="<?php echo $email; ?>" required class="form-input">
    </div>

    <div class="form-group">
      <label for="uname" class="form-label">User Name:</label>
      <input type="text" name="uname" id="uname" value="<?php echo $uname; ?>" required class="form-input">
    </div>

    <div class="form-group">
      <button type="submit" name="update" class="btn">Update Profile</button>
    </div>
  </div>
</form>
    
  </div>
</div>




    <div class="footerr">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>

</html>