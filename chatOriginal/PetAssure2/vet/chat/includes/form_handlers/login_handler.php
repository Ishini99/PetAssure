<?php
session_start();
$userid ="";
if(isset($_SESSION["userid"]) ){
    $userid =$_SESSION["userid"];
}else{
   //header("location:login.php");
}

if(isset($_POST['login_button'])){
    $email = filter_var($_POST['log_email'], FILTER_VALIDATE_EMAIL);

    $_SESSION['log_email'] = $email;


    $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' ");
    $check_login_query = mysqli_num_rows($check_database_query);

    if ($check_login_query == 1){
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];

        $user_closed_query  = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND user_closed='yes'");
        if(mysqli_num_rows($user_closed_query)) {
            $reopen_account = mysqli_query($con, "UPDATE users SET user_closed='no' WHERE email='$email'");
        }

        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    }else{
        array_push($error_array, "Email or password was incorrect");
    }
}