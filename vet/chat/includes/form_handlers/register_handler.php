<?php
// declaring variables
$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = "";
$error_array = array();

if(isset($_POST['register_button'])){
    // register form values

    // first name
    $fname = strip_tags($_POST['reg_fname']); // remove html tags
    $fname = str_replace(' ', '', $fname); // remove spaces
    $fname = ucfirst(strtolower($fname)); // uppercase first letter
    $_SESSION['reg_fname'] = $fname;

    // last name
    $lname = strip_tags($_POST['reg_lname']); // remove html tags
    $lname = str_replace(' ', '', $lname); // remove spaces
    $lname = ucfirst(strtolower($lname)); // uppercase first letterd
    $_SESSION['reg_lname'] = $lname;

    // email
    $em = strip_tags($_POST['reg_email']); // remove html tags
    $em = str_replace(' ', '', $em); // remove spaces
    //$em = ucfirst(strtolower($em)); // uppercase first letterd
    $_SESSION['reg_email'] = $em;

   

  

    // date
    $date = date("Y-m-d"); // current date

   
            

    // check first name
    if(strlen($fname) > 25 || strlen($fname) < 2){
        array_push($error_array, "Your first name must be between 2 and 25 characters");
    }

    // check last name
    if(strlen($lname) > 25 || strlen($lname) < 2){
        array_push($error_array, "Your last name must be between 2 and 25 characters");
    }

   


    // send info to database
    if(empty($error_array)){
        $password = md5($password); // Encrypt password before sending to database

        // Generate username by concatenating first name and last name
        $username = strtolower($fname."_".$lname);
        $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        $i = 0;

        // if username exists add number to username
        $usernameNew = '';
        if (mysqli_num_rows($check_username_query) != 0) {
            while (mysqli_num_rows($check_username_query) != 0) {
                $i++;
                $usernameNew = $username . "_" . $i;
                $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$usernameNew'");
            }
        }else{
            $usernameNew = $username;
        }

        // choose profile picture for the account
        $rand = rand(1, 16);
        for ($i=1;$i<17;$i++){
            if($rand == $i){
                $profile_pic = "assets/images/profile_pics/defaults/$i.png";
            }
        }

        // insert data to the database
        $query = mysqli_query($con, "INSERT INTO users (id, first_name, last_name, username, email, password, signup_date, profile_pic, num_posts, num_likes, user_closed, friend_array) VALUES ('', '$fname', '$lname', '$usernameNew', '$em','$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

        array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span>");

        // clear session variables
        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_email'] = "";
        $_SESSION['reg_email2'] = "";
    }

}