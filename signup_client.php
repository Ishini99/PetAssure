<?php
require_once('config/db.php');
session_start();

$fname = "";
$lname = "";
$nic = "";
$mobile = "";
$email = "";
$address = "";
$district = "";
$uname = "";
$password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $nic = $_POST['nic'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $district = $_POST['district'];
    $uname = $_POST['uname'];
    $password = $_POST['password'];
   
    $confirm_password = $_POST['confirm_password'];

    // Chat registration
    $date = date("Y-m-d");
    // choose profile picture for the chat
    $rand = rand(1, 16);
    for ($i = 1; $i < 17; $i++) {
        if ($rand == $i) {
            $profile_pic = "assets/images/profile_pics/defaults/$i.png";
        }
    }

    // Insert data into user table
    $sql_user = "INSERT INTO user (fname,nic, mobile, email, address,uname,password,district,role,signup_date, user_closed) VALUES ('$fname' ,'$nic','$mobile','$email','$address','$uname','$password','$district','client','$date',  '0')";


    if (mysqli_query($con, $sql_user)) {
        if ($password !== $confirm_password) {
            echo '<script type="text/javascript"> alert("Password do not match,Resubmit.")</script>';
        } else {
            // Get the id of the newly inserted record in the user table
            $userid = mysqli_insert_id($con);



            if (mysqli_query($con, $sql_user)) {
                echo '<script type="text/javascript"> alert("Congratulations. Your account was created.")</script>';
                header("Location: login.php");
                exit();
            } else {
                echo '<script type="text/javascript"> alert("Your account was not created. Please try again.")</script>';
            }
        }

    }
}

mysqli_close($con);



?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/signup2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript code -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function checkUsername() {

            jQuery.ajax({
                url: "check_availability.php",
                data: 'uname=' + $("#uname").val(),
                type: "POST",
                success: function (data) {
                    $("#check-username").html(data);
                },
                error: function () { }
            });
        }
    </script>

</head>
<div class="input-box">
    <div style=margin-top:-440px;margin-left:-620px>

        <img src="Images/logo.png" height="160">
    </div>
</div>
<div class="input-box">
    <div style=margin-top:-380px;margin-left:-480px>
        <img src="Images/PetAssure.png" height="35">

    </div>
</div>
<div class="input-box">
    <div style=margin-top:25px;margin-left:-690px>

        <img src="Images/g3.png" height="400">
    </div>
</div>
<div class="input-box">
    <div style=margin-top:85px;margin-left:-390px>

        <img src="Images/g4.png" height="160">
    </div>
</div>

<body>
    <script type="text/javascript">
        var nic = document.getElementById("nic");
        nic.addEventListener('input', () => {
            nic.setCustomValidity('');
            nic.checkValidity();
        });


        nic.addEventListener('invalid', () => {
            if (nic.value == '') {
                nic.setCustomValidity('Enter  NIC');
            }
            else {
                nic.setCustomValidity('Enter NIC in123456789V or 200256789123 format')
            }
        });

    </script>



    <div class="content">
        <form action="" method="post">
            <h2>Sign Up</h2>

            <div class="user-details">
                <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" name="fname" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" name="lname" placeholder="Enter your last name" required>
                </div>
                <div class="input-box">
                    <span class="details">NIC</span>
                    <input type="text" name="nic" placeholder="Enter your NIC number" required>
                </div>
                <div class="input-box">
                    <span class="details">Mobile Number*</span>
                    <input type="text" name="mobile" placeholder="Enter your Mobile Number" required>
                </div>
                <div class="input-box">
                    <span class="details">Email Address*</span>
                    <input type="email" name="email" placeholder="Enter your E-mail Address" required>
                </div>
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" name="address" placeholder="Enter your Address" required>

                </div>

                <div class="input-box">
                    <span class="details">Districts</span>
                    <div class="box">

                        <select name='district'>
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
                </div>
            </div>
            <br><br>
            <div class="user-details">




                <div class="input-box">

                    <span class="details">User name</span>
                    <input type="text" name="uname" id="uname" placeholder="Enter your user name"
                        onInput="checkUsername()" required>
                    <br><br><span id="check-username"></span>
                </div>

            </div>
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Password*</span>
                    <input type="password" name="password" placeholder="Enter your password"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm password</span>
                    <input type="password" name="confirm_password" placeholder="Re-enter your password" required>
                </div>
                <div>

                    <p style="font-size: 12px;"><b>Password must contain:</b>
                        A <b>lowercase</b> letter ,a <b>capital (uppercase)</b> letter ,a <b>number</b> and minimum <b>8
                            characters</b></p>
                </div>
                <input type="submit" class="button" value="Register" name="submit" id="submit">

                <p><br>**Terms and conditions <a href=terms&conditions.php>Terms and conditions.</a></p>

            </div>
            <p><br>Already have an account? <a href=login.php>Sign in</a></p>
    </div>
    <div class="footerr" style=" z-index: -1; width: 100%;  margin-top: 810px;">
        <p> Telephone No: +94 11 233 5632&nbsp;&nbsp;&nbsp;&nbsp;
            Fax: +94 11 233 5632 &nbsp;&nbsp;&nbsp;&nbsp;Email: petAssure@hotmail.com​</p>
    </div>

    </div>



    </div>


</body>

</html>