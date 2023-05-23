<?php
require '../../config/db.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

$userid = "";
$email = "";
$password = "";

if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    
    // Query the database to get the email and password of the user
    $query = "SELECT email, password FROM users WHERE userid = $userid";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $password = $row['password'];
    }
}

?>

<html>

<head>
    <title>PetAssure</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="nav" style="width: 100%;">
            <div class="left">
                <img src="../../Images/logo.png" width="100px" height="100px">
                <p style="margin-left: 20px;">PetAssure</p>
            </div>

            <div class="right">
                <a href="../../index.php" class="font">HOME</a>
                <a href="../vetDashboard.php" class="font">DASHBOARD</a>

                <a href="../../index.php" class="font">LOG OUT </a>
            </div>
        </div>

        <form action="register.php" method="post">
            <input type="email" name="log_email" placeholder="Email Address" value="<?php echo $email; ?>" required>
            <br>
            <input type="password" name="log_password" placeholder="Password" value="<?php echo $password; ?>">
            <br>
            <input type="submit" name="login_button" value="Login">
        </form>

    </div>
</body>

</html>
