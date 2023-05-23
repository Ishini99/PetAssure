<?php
require '../config/db.php';
session_start();
$userid = "";
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
} else {
    //header("location:login.php");
}

$sql = "SELECT * FROM user WHERE userid = '$userid'";
$result = mysqli_query($con, $sql);
?>

<html>

<head>
<link rel="stylesheet" href="../css/Userprofile_2.css">
<link rel="stylesheet" href="../css/styleDashboard.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>User Profile</title>


</head>

<body>

    <body class="profile-page">
        <div class="nav" style="width: 100%;">
            <div class="left">
                <img src="../Images/logo.png" width="100px" height="100px">
                <p style="margin-left: 20px;">PetAssure</p>
            </div>

            <div class="right">
                <a href="../index.php" class="font">HOME</a>
                <a href="services1.php" class="font">SERVICES</a>
                <a href="../logout.php" class="font">LOG OUT </a>
            </div>
        </div>

        <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../Images/logo.png" alt="">
            </div>

           
            <span class="logo_name">PetAssure</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="services1.php">
                        <i class="uil uil-apps"></i>
                        <span class="link-name">Services</span>
                    </a></li>
                <li><a href="userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
                <li><a href="notifications.php">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">Notifications</span>
                    </a></li>
                <li><a href="history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">Added Posts</span>
                    </a></li>
                <li><a href="./clientappointments.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">My Appointments</span>
                    </a></li>
                
                    



            </ul>

            <ul class="logout-mode">
                <li><a href="../login.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>



            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>
        <div style="padding-bottom: 20px;"></div>
      
        </div>
        </div>



       
        <script src="../js/dashboard_script.js"></script>

    </section>







        <div>
            <div class="center">
                <div class="bodycontent">


                    <center>
                        <table class="styled-table1">
                            <?php
                            $rows = mysqli_query($con, "SELECT * FROM user_images WHERE uid ='$userid'");
                            foreach ($rows as $row):
                                ?>
                                <td>
                                    <img src="user_img/<?php echo $row['image']; ?>" width="100" height="150"
                                        title="<?php echo $row['image']; ?>">

                                </td>
                            <?php endforeach; ?>
                        </table>
                    </center>

                    <?php
                    while ($rows = $result->fetch_assoc()) {
                        ?>
                        <div class="profile-container">
                            <div class="profile-card">
                                <table class="profile-table">
                                    <tbody> 
                                        <tr>
                                            <td class="profile-label">Full Name:</td>
                                            <td class="profile-data">
                                                <?php echo $rows['fname']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="profile-label">User Name:</td>
                                            <td class="profile-data">
                                                <?php echo $rows['uname']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="profile-label">NIC:</td>
                                            <td class="profile-data">
                                                <?php echo $rows['nic']; ?>
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                            <td class="profile-label">Mobile Number:</td>
                                            <td class="profile-data">
                                                <?php echo $rows['mobile']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="profile-label">Address:</td>
                                            <td class="profile-data">
                                                <?php echo $rows['district']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="profile-label">Email:</td>
                                            <td class="profile-data">
                                                <?php echo $rows['email']; ?>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <center>
                            <form action="updateProfile.php" method="post">

                                <input type="hidden" name="fname" value="<?php echo $rows['fname']; ?>">
                                <input type="hidden" name="spid" value="<?php echo $rows['userid']; ?>">
                                <input type="hidden" name="nic" value="<?php echo $rows['nic']; ?>">
                                <input type="hidden" name="district" value="<?php echo $rows['district']; ?>">
                                <input type="hidden" name="email" value="<?php echo $rows['email']; ?>">
                                <input type="hidden" name="uname" value="<?php echo $rows['uname']; ?>">
                                <input type="hidden" name="mobile" value="<?php echo $rows['mobile']; ?>">
                                <br><br>
                                <button class="form_btn2" type="submit">Update</button>
                                <a href="deleteAccount.php?userid=<?= $_SESSION['userid'] ?>"><button class="form_btn2" type="button">Delete Account</button></a>



                            </form>
                        </center>

                        <?php
                    }
                    ?>
                    <br><br>
                    <div class="footerr">
                        <p> Telephone No: +94 11 233 5632 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             Email: petAssure@hotmail.com &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          Fax: +94 11 233 5632  ​</p>
                    </div>
    </body>

</html>