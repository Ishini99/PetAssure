<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "psfinal";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if(!$con){
        echo "Connection Failed";
    }
    ?>