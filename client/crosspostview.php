
<?php
require_once('../config/db.php');

session_start();

$sql = "SELECT * FROM pet_selling";
$result = mysqli_query($con, $sql);


    
         
 
 
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/postview2.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <title>post</title>
</head>
<style>
    body {
        background-image: url("images/bg2.png");
    }
</style>

<body>

    <div class="page">

        <div class="nav" style="width: 100%;">
            <div class="left">
                <img src=".../images/logo.png" width="100px" height="100px">
                <p style="margin-left: 20px;">PetAssure</p>
            </div>

            <div class="right">
                <a href="#" class="font">HOME</a>
                <a href="#" class="font">PROFILE</a>
                <a href="#" class="font">SERVICES</a>
                <a href="signIn.php" class="font">LOG OUT</a>
            </div>
        </div>

    </div>
    <div class="container">
        <img src="../images/bg-1.png" alt="">

        <?php
    
    echo '
        <div class="Banner">
            <img src="../images/'.$_GET['image'].'" alt="">

        </div>
        <div class="p_1">
            <p>Name :'.$_GET['name'].' </p>
            <p>Type of Animal: '.$_GET['variety'].'</p>
        <div class=loca>
            <p>Location :</p>
            <p class="word">'.$_GET['district'].'</p>
        </DIV>
        </div>
        <div class="p_2">
            <img src="../images/call.png" alt="">
            <p class="p_3">Contact</p>
            <p class="p_4">'.$_GET['phone_number'].'</p>
        </div>

        <div class="des">
            <p>Description</p>
            <div class="descript">
                <p>'.$_GET['description'].'</p>
            </div>
        </div> ';

        ?>

    </div>
    <div class="footerr">
        <p> Telephone No: +94 11 233 5632&nbsp;&nbsp;&nbsp;&nbsp; Fax: +94 11 233 5632 &nbsp;&nbsp;&nbsp;&nbsp;Email:
            petAssure@hotmail.com</p>
    </div>
    </div>
</body>

</html>