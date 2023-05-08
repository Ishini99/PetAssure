<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petassure";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        echo "Connection Failed";
    }