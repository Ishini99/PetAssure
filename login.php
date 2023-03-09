<?php

include_once("config/db.php");
session_start();
$adminErr="";
if (isset($_POST['but_submit'])) {
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE `uname`='$uname' AND `password`='$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) >0) {
        $row1 = mysqli_fetch_assoc($result);
       

        if ($row1['uname'] == $uname && $row1['password'] == $password) {
         
           $_SESSION['userid'] = $row1['userid'];
        if( $row1['role']=='admin'){        
            header("Location:Admin/Admin/AdminClientDash.php");
        }
        else if( $row1['role']=='client'){
            header("Location:client/services1.php");
        }
        else if( $row1['role']=='petgrooming'){
            header("Location:groomer/groomerDashboard.php");
        }
        else if( $row1['role']=='veterinarian '){
            header("Location:vet/vetDashboard.php");
        }
        else if( $row1['role']=='petsitter'){
            header("Location:petsiter/petsitterDashboard.php");
        }
        else if( $row1['role']=='petboarding'){
            header("Location:pet_boarding/petboarding-Dashboard.php");
        }
       
        }
        
    
      
    } 

    else {
        $adminErr="Incorrect Username or Password";
  
       
    }
       
        } 
       

    


?>


<html>

<head>
    <link rel="stylesheet" href="css/styles_login.css">

    <title>Login</title>


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
                    <form method="Post" action="">

                        <h2>LOGIN</h2>
                        <div class="alertinfo">
                            <?php echo $adminErr?>
                        </div>

                        <div class="formcontent">
                            <div class="formlabel"> User Name: </div>
                            <div class="formin"><input class="input_box" type="text" name="uname" required></div>
                        </div>

                        <br>

                        <div class="formcontent">
                            <div class="formlabel"> Password: </div>
                            <div class="formin">
                                <input class="input_box" type="password" name="password" required>
                            </div>
                        </div>

                        <br>


                        <div class="formcontent">
                            <div class="formin">

                                <input class="button" type="submit" name="but_submit" id="but_submit" value="Sign In" />

                            </div>
                        </div>

                        <br>
                        <div class="formlabel">Forgot Password? <a class="createlink"
                                href="resetemail.php"><strong>Change
                                    Password</strong></a></div>
                        <br>


                        <div class="formlabel">New User? <a class="createlink" href="signup.php">
                                <strong?>Sign Up now</strong>
                            </a><br>


                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>
</body>

</html>