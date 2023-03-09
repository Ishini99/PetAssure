<?php
require '../config/db.php';

session_start();
$nic ="";
if(isset($_SESSION["userid"]) ){
   $userid =$_SESSION["userid"];
}else{
   //header("location:login.php");
}

$sql = "SELECT * FROM user WHERE userid =1" ;
  ($result = mysqli_query($con, $sql));
?>




<html>

<head>
    <link rel="stylesheet" href="../css/Userprofile.css">

    <title>User Profile</title>
    <script>
    function adminRequest() {
        var adminText = "Your account has been requested to be deleted.";
        alert(adminText);
    }
    </script>

    <style>

    </style>

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
                <a href="vetDashboard.php" class="font">DASHBOARD</a>

                <a href="../logout.php" class="font">LOG OUT </a>
            </div>
        </div>
        <div>
            <div class="center">
                <div class="bodycontent">


                    <center>
                        <table class="styled-table" cellspacing="0" cellpadding="30">
                            <?php
    $rows = mysqli_query($con, "SELECT * FROM vetimage");
    foreach ($rows as $row) :
    ?>
                            <td>
                                <img src="../vet_img/<?php echo $row['image']; ?>" width="100" height="150"
                                    title="<?php echo $row['image']; ?>">
                            </td>
                            <?php endforeach; ?>
                        </table>
                    </center>

                    <?php
        while ($rows = $result->fetch_assoc()) {
          ?>

                    <center>
                        <table class="styled-table">
                            <tbody>
                                <tr>
                                    <td>NIC</td>
                                    <td><?php echo $rows['nic']; ?></td>
                                </tr>
                                <tr>
                                    <td>Fullname</td>
                                    <td><?php echo $rows['fname']; ?></td>
                                </tr>
                                <tr>
                                    <td>Mobile Number</td>
                                    <td><?php echo $rows['mobile']; ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><?php echo $rows['district']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $rows['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>UserName</td>
                                    <td><?php echo $rows['uname']; ?></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><?php echo $rows['password']; ?></td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td><?php echo $rows['details']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </center>

                    <center>
                        <button class="form_btn2"
                            onclick="location.href='updateProfile.php?details=<?php echo $rows['details']; ?> &fname=<?php echo $rows['fname']; ?> &userid=<?php echo $rows['userid']; ?> &nic=<?php echo $rows['nic']; ?> &district=<?php echo $rows['district']; ?> &email=<?php echo $rows['email']; ?> &uname=<?php echo $rows['uname']; ?> &mobile=<?php echo $rows['mobile']; ?>'">Update</button>
                        <button class="form_btn2" type="button" onclick="adminRequest()" id="btnEnable">Request to
                            Delete</button>
                    </center>


                    <?php
           }
          ?>
                    <br><br>
                    <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
                        <p> Telephone No: +94 11 233 5632
                            Fax: +94 11 233 5632
                            Email: petAssure@hotmail.com​</p>
                    </div>
    </body>

</html>