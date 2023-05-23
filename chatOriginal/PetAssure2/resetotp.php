<?php

session_start();

if(isset($_POST['but_submit'])){
    if($_POST['otp'] == $_SESSION['token']){
        header('Location:resetpw.php');
    }else{
        echo "Incorrect OTP";
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
                    <form method="POST" action="#">

                        <h2>RESET PASSWORD</h2>

                        <div class="formcontent">
                            <!-- <div class="formlabel">OTP </div> -->

                        </div>

                        <br>

                        <div class="formcontent">
                            <div class="formlabel"> Enter OTP: </div>
                            <div class="formin"><input class="input_box" type="text" name="otp" required></div>
                        </div>

                        <br>


                        <div class="formcontent">
                            <div class="formin">

                                <input class="button" type="submit" name="but_submit" id="but_submit" value="Verify" />

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