<?php
if (isset($_POST['update_details'])){
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];

    // prepare first name
    $firstName = strip_tags($firstName);
    $firstName = str_replace(' ', '', $firstName);
    $firstName = ucfirst(strtolower($firstName));

    // prepare last name
    $lastName = strip_tags($lastName);
    $lastName = str_replace(' ', '', $lastName);
    $lastName = ucfirst(strtolower($lastName));

    // prepare email
    $email = strip_tags($email);
    $email = str_replace(' ', '', $email);


    $email_check = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    $row = mysqli_fetch_array($email_check);
    $matched_user = $row['username'];

    if(!$firstName != '' || !$lastName != '' || !$email != ''){
        $message = "empty fields not allowed<br>";
        return;
    }

    if ($matched_user == "" || $matched_user == $userLoggedIn){

        $message = "Details updated!<br><br>";

        $query = mysqli_query($con, "UPDATE users SET first_name='$firstName', last_name='$lastName', email='$email' WHERE username='$userLoggedIn'");
    }else{
        $message = "That email is already in user! <br><br>";
    }
}else{
    $message = "";
}












