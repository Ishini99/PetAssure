

<?php

include_once("db.php");
session_start();
$adminErr="";
if (isset($_POST['but_submit'])) {
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];

    $sql = "SELECT * FROM `user` WHERE `uname`='$uname' AND `pword`='$pword'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row1 = mysqli_fetch_assoc($result);
       

        if ($row1['uname'] == $uname && $row1['pword'] == $pword) {
            $usname=$row1['fname'];
            $_SESSION['nic'] = $row1['nic'];
            $_SESSION['user'] = $usname;
        if( $row1['role']=='admin'){        
            header("Location:adminclientdash.php");
        }
        else if( $row1['role']=='client'){
            header("Location:services.php");
        }
        else if( $row1['role']=='serviceprovider'){
            header("Location:servicespro.html");
        }
        else{
           
            $adminErr = "You are not an Admin";        }
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
    a{
 text-decoration: none;
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
                                <input class="input_box" type="password" name="pword" required></div>
                        </div>
                        <!-- <div class="formcontent">
                        <select
              style="
                margin-left: 0px;
                margin-top: 10px;
                width: 200px;
                height: 30px;
                border: 1px dashed #000000;
                outline:0;
                background: #f2f2f2;
                color: #333;
              "
              name="role"
              id="role"
            >
              <option value="admin">Admin</option>
              <option value="client">Client</option>
              <option value="serviceprovider">Service Provider</option>
             
            </select>
</div> -->

                        <br>


                        <div class="formcontent">
                        <div class="formin">

                                <input class="button" type="submit" name="but_submit" id="but_submit" value="Sign In" />

                            </div>
                        </div>

                        <br>
                        <div class="formlabel">Forgot Password? <a class="createlink" href="forgotPassword.php"><strong>Change
                                Password</strong></a></div>
                        <br>


                        <div class="formlabel">New User? <a class="createlink" href="signup.php"><strong?>Sign Up now</strong></a><br>


                               </div>

                    </form>



                </div>
            </div>
        </div>
    </div>
</body>

</html>
