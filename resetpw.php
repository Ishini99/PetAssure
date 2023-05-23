<?php 

session_start();
include_once("config/db.php");

if(isset($_POST['but_submit'])){
    if($_POST['password'] == $_POST['con-pwd']){
        $password =$_POST['password'];
        $email = $_SESSION['email_reset'];
        $sql = "UPDATE user SET password = '$password 'where email = '$email' ";
        if (mysqli_query($con, $sql)) {
            echo "Password Updated. Please go back to the login page and login with your username and new password.";
            // You can redirect the user to the login page if needed
             header('Location: login.php');
        } else {
            echo "Error updating password: " . mysqli_error($con);
        }
    } else {
        // Passwords don't match
        echo "<script>alert('Passwords don\'t match');</script>";
    }

}


?>

<html>

<head>

<link rel="stylesheet" href="css/styles_login.css">

    <title>Forget Password</title>


     <style>
         body {
            background-image: url("Images/bg2.png");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    
    </style> 

</head>

<body>

    <nav class="navigation-bar">
        <img class="logo" src="Images/logo.png">
        <p style="margin-left: 20px;">PetAssure</p>


    </nav>
    <div>
        <div class="center">
            <div class="bodycontent">
                <div class="form">
                    <form method="Post" action="#">

                        <h2>RESET PASSWORD</h2>

                        <div class="formcontent">
                            <!-- <div class="formlabel"> Please enter your email below to reset the password </div> -->

                        </div>

                        <br>

                        <div class="formcontent">
                            <div class="formlabel"> New Password: </div>
                            <div class="formin"><input class="input_box" type="text" name="password" required></div>
                        </div><br><br>
                        <div class="formlabel"> Cofirm Password: </div>
                        <div class="formin"><input class="input_box" type="text" name="con-pwd" required></div>
                </div>

                <br>


                <div class="formcontent">
                    <div class="formin">

                        <input class="button" type="submit" name="but_submit" id="but_submit" value="Reset Password" />

                    </div>
                </div>

                <br>

                <br>


                <div class="formlabel"><a class="createlink" href="login.php">Back to login</a></div>

                </form>



            </div>
        </div>
    </div>
    </div>
</body>

</html>