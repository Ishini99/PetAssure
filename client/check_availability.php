<?php
# create database connection
$connect = mysqli_connect("localhost","root","","petassure2");

if(!empty($_POST["uname"])) {
  $query = "SELECT * FROM user WHERE uname='" . $_POST["uname"] . "'";
  $result = mysqli_query($connect,$query);
  $count = mysqli_num_rows($result);
  if($count>0) {
    echo "<div class='error-message'>Sorry, this username is taken.</div>";    echo "<script>$('#submit').prop('disabled',true);</script>";
  }else{
    echo "<div class='available-message'>Username is available.</div>";     echo "<script>$('#submit').prop('disabled',false);</script>";

    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<style>
  .error-message {
    background-color: #ffe2e2;
    border: 1px solid #ffa0a0;
    color: #ff0000;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
  }

  .available-message {
    background-color:#abf7b1 ;
    border: 1px solid green;
    color: green;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
  }
</style>