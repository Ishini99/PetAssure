<?php
session_start();
$nic ="";
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

// Adding a new vet image
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
  
        move_uploaded_file($tmpName, 'vet_img/' . $newImageName);
        $query = "INSERT INTO vetimage (name, image) VALUES('$name', '$newImageName')";
        mysqli_query($con, $query);
        echo "<script>alert('Successfully Added');</script>";
      }
    }
}

// Deleting a vet image
if(isset($_POST["delete"])){
    $imgId = $_POST["imgId"];
    $imageName = $_POST["imageName"];
    if (!isset($imgId) || !is_numeric($imgId)) {
        echo "<script>alert('Invalid ID');</script>";
    } else {
        $query = "DELETE FROM vetimage WHERE imgId = $imgId";
        mysqli_query($con, $query);
        unlink("vet_img/" . $imageName); // delete the image file from server
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

            <a href="vetDashboard.php" class="font">DASHBOARD</a>
            <a href="../logout.php" class="font">LOG OUT </a>
        </div>
    </div><br><br>

    <div class="center">
        <div class="bodycontent">


            <center>
                <table class="styled-table1" cellspacing=0px cellpadding=5px>
                    <?php
      $rows = mysqli_query($con, "SELECT * FROM vetimage");
      foreach ($rows as $row) :
        ?>
                    <td>
                        <img src="vet_img/<?php echo $row["image"]; ?>" width=100 height=150
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
                <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <label class="txt" for="name">Image Description: </label>
                    <input class="input_box" type="text" name="name" id="name" required value="">
                    <br><br>
                    <label class="txt" for="image">Select Image : </label>
                    <input class="input_box" type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="">
                    <br><br>
                    <button class="btn2" type="submit" name="submit">Insert Image</button>
                </form>
            </center>





        </div>

    </div>





    <center>
        <form action="" method="post">
            <div class="form-container">
                <h2>Update Profile</h2>
                <input name="spid" type="hidden" maxlength="10" value="<?php echo $spid; ?>" />

                <input name="nic" type="hidden" maxlength="10" value="<?php echo $nic; ?>" />

                <div class="form-group">
                    <div class="form-label">Name</div>
                    <input type="text" name="fname" value="<?php echo $fname; ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <div class="form-label">Mobile Number:</div>
                    <input type="text" name="mobile" value="<?php echo $mobile; ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <div class="form-label">Address:</div>
                    <input type="text" name="district" value="<?php echo $district; ?>" class="form-input">
                </div>
                <div class="form-group">
                    <div class="form-label">Email:</div>
                    <input type="text" name="email" value="<?php echo $email; ?>" required class="form-input">
                </div>
                <div class="form-group">
                    <div class="form-label">User Name:</div>
                    <input type="text" name="uname" value="<?php echo $uname; ?>" required class="form-input">
                </div>

               

                <div class="form-group">
                    <button type="submit" name="update" class="btn">Update Profile</button>
                </div>
            </div>
        </form>
    </center>


    <div class="footerr">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>

</html>