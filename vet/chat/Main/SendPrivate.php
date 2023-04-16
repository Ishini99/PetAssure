<?php


session_start();
 
$_POST = json_decode(file_get_contents('php://input'), true);
if(!isset($_POST)){
    $array['Status']= "Post not set";
    echo json_encode($array);
    die();
}

$con = new mysqli('localhost', 'root', '', 'petassure');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$message = $_POST['message'];
$user = $_SESSION['fname'];
$roomId = $_POST['roomId'];

$sql = "INSERT INTO personalchatrecord (Connection, SentBy, Message) VALUES ('$roomId', '$user', '$message')";

if ($con->query($sql) === TRUE) {
    $array['Status']= "Message sent";
    echo json_encode($array);
} else {
    $array['Status']= "Message not sent: " . $con->error;
    echo json_encode($array);
}

$con->close();
?>