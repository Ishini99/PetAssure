<?php
 $spid = $_GET['spid'];
    $nic = $_GET['nic'];
    $fname = $_GET['fname'];
    $mobile = $_GET['mobile'];
    $uname = $_GET['uname'];
    $district = $_GET['district'];
    $email = $_GET['email'];
    $details = $_GET['details'];
    
    
    
require '../config/db.php';
if (isset($_GET['submit'])) {
 $spid = $_GET['spid'];

    $nic = $_GET['nic'];
    $fname = $_GET['fname'];
    $mobile = $_GET['mobile'];
    $district = $_GET['district'];
    $email = $_GET['email'];
    $uname = $_GET['uname'];
    $details = $_GET['details'];

$query =  "update serviceprovider set fname='$fname', district='$district', email='$email', mobile='$mobile',uname='$uname',details='$details', where spid = '$spid'";
    $data = mysqli_query($con, $query);
    if ($data) {
        echo "<script>alert('Record update successfully')</script>";
        header("Location:candidateProfile.php");
    } else {
        echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
    }
}
?>

<html>

<head>
    <link rel="stylesheet" href="../css/updateProfile_i.css">

    <title>Update Profile</title>
    <style>
    .nav {
        height: 70px;
        opacity: 95%;
        background-color: #A6A6A6;
        display: flex;
        flex-direction: row;
        z-index: 1;

    }

    a.font:before {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        right: 0;
        background-color: #FFF;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
    }

    a.font:hover:before {
        visibility: visible;
        width: 100%;
    }

    a.font {
        font-size: 20px;
        color: white;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        text-decoration: none;
        position: relative;
    }

    .left {
        flex: 0.5;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        margin-left: 30px;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 48px;
        color: #ffffff;

    }

    .right {
        flex: 0.5;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
        margin-right: 30px;
    }

    #font {
        font-size: 20px;
        color: white;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        text-decoration: none;
    }
    </style>



</head>

<body class="profile-page">
    <div class="nav" style="width: 100%;">
        <div class="left">
            <img src="../Images/logo.png" width="100px" height="100px">
            <p style="margin-left: 20px;">PetAssure</p>
        </div>

        <a href="../index.php" class="font">HOME</a>
        <a href="userProfile.php" class="font">PROFILE</a>

        <a href="..groomerDashboard.php" class="font">DASHBOARD</a>
        <a href="../logout.php" class="font">LOG OUT </a>
    </div>
    </div>


    <center>
        <form action="" method="get">
            <div>
                <h2>Update Profile</h2>

                <input name="nic" type="hidden" maxlength="10" value="<?php echo $nic; ?>" />



                <div style="margin-top: 50px">
                    <div class="labels">
                        Name
                    </div>
                    <div style="margin-left: 150px; margin-top: -20px;">
                        <input type="text" name="fname" value="<?php echo $fname; ?>" required>
                    </div>
                </div>

                <div style="margin-top: 50px">
                    <div class="labels">
                        Mobile Number:
                    </div>
                    <div style="margin-left: 150px; margin-top: -20px;">
                        <input type="text" name="mobile" value="<?php echo $mobile; ?>" required>
                    </div>
                </div>

                <div style="margin-top: 50px">
                    <div class="labels">
                        Address:
                    </div>
                    <div style="margin-left: 150px; margin-top: -20px;">
                        <input type="text" name="district" value="<?php echo $district; ?>">
                    </div>
                </div>
                <div style="margin-top: 50px">
                    <div class="labels">
                        Email :
                    </div>
                    <div style="margin-left: 150px; margin-top: -20px;">
                        <input type="text" name="email" value="<?php echo $email; ?>" required>
                    </div>
                </div>
                <div style="margin-top: 50px">
                    <div class="labels">
                        User Name :
                    </div>
                    <div style="margin-left: 150px; margin-top: -20px;">
                        <input type="text" name="uname" value="<?php echo $uname; ?>" required>
                    </div>
                </div>



                <div style="margin-top: 50px">

                    <div class="labels">
                        Description:
                    </div>

                    <div style="margin-left: 150px; margin-top: -20px;">
                        <input type="text" name="details" value="<?php echo $details; ?>" required>
                    </div>
                </div>

                <div style="margin-top:30px;">
                    <button type="submit" name="submit" class="btn">Update Profile</button>
                </div>
        </form>
        </div>
    </center>


    <div class="footerr">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>

</html>