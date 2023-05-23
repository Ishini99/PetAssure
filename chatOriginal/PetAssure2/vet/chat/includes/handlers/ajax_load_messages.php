<?php
include "./../../../../config/db.php";
include "../classes/User.php";
include "../classes/Message.php";

$userid ="";
if(isset($_SESSION["userid"]) ){
    $userid =$_SESSION["userid"];
}else{
   //header("location:login.php");
}

$limit = 5;

$message = new Message($con, $_REQUEST['user']);
echo $message->getConvosDropdown($_REQUEST, $limit);