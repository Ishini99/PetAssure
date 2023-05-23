

<?php 

session_start();
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP   ;
require './vendor/PHPMailerAutoload.php';

if (!isset($_POST['but_submit'])) {
    
}
else{

    $_SESSION['email_reset'] = $_POST['email'];


    $num_str = sprintf("%06d", mt_rand(1, 999999));
    $_SESSION['token'] = $num_str;

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

    $mail->IsSMTP();  // telling the class to use SMTP
    // $mail->SMTPDebug = 2;
    $mail->Mailer = "smtp";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'petassureteam@gmail.com';
    $mail->Password = 'tcggksxlzwqpbzei';
    //From email address and name
    $mail->From = "teampetassure@gmail.com";
    $mail->FromName = "Pet assure";

    //To address and name
    $mail->addAddress($_POST['email']); //Recipient name is optional                                                                                         

    //Address to which recipient will reply
    $mail->addReplyTo("noreply@petassure.com", "Life Line");


    //Send HTML or Plain Text email
    $mail->isHTML(true);

    $mail->Subject = "Reset Password";
    $mail->Body = "<p>Reset Your Password With Provided OTP:$num_str </p>";
    $mail->AltBody = "This is the plain text version of the email content";


    try {
        $mail->send();
        header('Location: resetotp.php');
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
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
                            <div class="formlabel"> Please enter your email below to reset the password </div>

                        </div>

                        <br>

                        <div class="formcontent">
                            <div class="formlabel"> Email: </div>
                            <div class="formin"><input class="input_box" type="text" name="email" required></div>
                        </div>

                        <br>


                        <div class="formcontent">
                            <div class="formin">

                                <input class="button" type="submit" name="but_submit" id="but_submit"
                                    value="Reset Password" />

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