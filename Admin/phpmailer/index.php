<?php
session_start();
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
$randompw=generateRandomString();
$spemail = $_SESSION['spemail'];
//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
	require 'vendor/autoload.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "petassure.testphp@gmail.com";
//Set gmail password
	$mail->Password = "kybvdppjlzehbntx";
//Email subject
	$mail->Subject = "We value your feedback";
//Set sender email
	$mail->setFrom('petassure.testphp@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	$mail->addAttachment('img/logo.png');
//Email body
// $randompw=$_SESSION['randompw'];
	$mail->Body = "Thank you for registering with PetAssure...! Your Account is active. Your Password is '$randompw'";
//Add recipient
	$mail->addAddress('nippikcdrd@gmail.com');

//Finally send email
	if ( $mail->send() ) {
	echo "Email sent Successfully..!";
	}
	else{
		echo "Message could not be sent. Mailer Error";
	}
//Closing smtp connection
	$mail->smtpClose();
?>
