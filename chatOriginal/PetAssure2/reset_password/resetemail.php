<?php 

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require './vendor/autoload.php';

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
        header('Location: /GroupProject/petassure/resetotp.php');
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}



?>
<html>

<head>


    <title>Forget Password</title>


    <style>
        .navigation-bar {
            width: 100%;
            height: 80px;
            background-color: #737373;
            opacity: 50%;
        }

        .logo {
            display: inline-block;
            vertical-align: top;
            width: 80px;
            height: 80px;
            margin-right: 20px;
            margin-top: 0px;
            margin-left: 30px;

        }


        .navigation-bar>a {
            vertical-align: top;
            line-height: 50px;
            float: right;
            color: white;
            text-align: center;
            padding: 15px 22px;
            text-decoration: none;
            list-style-type: none;
            overflow: hidden;
            background-color: #737373;
            font-size: large;
        }

        .navigation-bar>p {
            display: inline-block;
            vertical-align: top;
            width: 50px;
            height: 50px;
            margin-right: 20px;
            margin-top: 15px;
            margin-left: 30px;
            font-family: 'Lucida Sans';
            font-size: 36px;
            color: azure;
        }

        .navigation-bar>a:hover {
            background-color: #111;
        }

        body,
        html {
            height: 100%;
            margin: 0;

        }

        body {
            background-image: url("Images/bg2.png");

            height: 100%;


            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .center {
            margin: auto;
            width: 60%;
            border: 3px;
            padding: 10px;
        }

        .bodycontent {
            background-color: #737373;
            width: 60%;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            align-items: center;
            border-radius: 10px;
            margin-top: 100px;
            margin-left: 185px;
        }

        .bodycontent h2 {
            color: white;
            font-family: 'Roboto', sans-serif;
        }

        .formlabel {
            color: white;
            font-family: 'Roboto', sans-serif;
        }


        .input_box {
            width: 18rem;
            border-radius: 15px;
            height: 28px;
        }

        .formremember {
            font-size: small;
        }

        .button {
            margin-top: 10px;
            text-align: center;
            font-weight: bold;
            background-color: #f8f0e8;
            border-radius: 25px;
            border: 2px solid#f8f0e8;
            padding: 8px;
            width: 200px;
            height: 35px;
        }

        .createlink {
            color: white;
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
            font-style: none;
        }

        a {
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