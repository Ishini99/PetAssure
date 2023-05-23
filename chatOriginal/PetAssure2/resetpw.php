<?php 

session_start();
include_once("config/db.php");

if(isset($_POST['but_submit'])){
    if($_POST['pwd'] == $_POST['con-pwd']){
        $pwd =$_POST['pwd'];
        $mail = $_SESSION['email_reset'];
        $sql = "UPDATE client SET password = '$pwd 'where emailClient = '$mail' ";
        if (mysqli_query($con, $sql))
        {
             print_r("Password Updated Go Back To Login Page And Login With username And New Password");die();
        } else {
            print(mysqli_query($con, $sql));
        }
        header('Location: /GroupProject/petassure/resetpw.php');
    }else{
        echo "Passwords don't match";
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
                            <div class="formin"><input class="input_box" type="text" name="pwd" required></div>
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