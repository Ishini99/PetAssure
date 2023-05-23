
<?php
require_once('../config/db.php');
session_start();


$sql = "SELECT * FROM serviceprovider";
$result = mysqli_query($con, $sql);
?> ;




<html>

<head>
    <link rel="stylesheet" href="../css/userprofile.css">

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
                <a href="./Dashboard.php" class="font">DASHBOARD</a>

                <a href="../logout.php" class="font">LOG OUT </a>
            </div>
        </div>
        <div>
            <div class="center">
                <div class="bodycontent">


                    <center>
                        <table class="styled-table" cellspacing="0" cellpadding="30">
                           
                            <td>
                                <img src="../Images/7e95efa255ef46943605ee83f5910f16.jpg" width="200" height="150">
                                   
                            </td>
                    </center>

                
    

                    <center>
                        <table class="styled-table">
                            <tbody>
                                <tr>
                                    <td>NIC</td>
                                    <td>995574845V</td>
                                </tr>
                                <tr>
                                    <td>Fullname</td>
                                    <td>A.M.N.Rathnayake</td>
                                </tr>
                                <tr>
                                    <td>Mobile Number</td>
                                    <td>01127487895</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>Kandy</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>abc@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>UserName</td>
                                    <td>amalR</td>
                                </tr>
                               
                                <tr>
                                    <td>Description</td>
                                    <td>dfghjjhgfd</td>
                                </tr>
                            </tbody>
                        </table>
                    </center>

                    <center>
                        <button class="form_btn2"
                            onclick="location.href='updateProfile.php?details=<?php echo $rows['details']; ?> &fname=<?php echo $rows['fname']; ?> &spid=<?php echo $rows['spid']; ?> &nic=<?php echo $rows['nic']; ?> &district=<?php echo $rows['district']; ?> &email=<?php echo $rows['email']; ?> &uname=<?php echo $rows['uname']; ?> &mobile=<?php echo $rows['mobile']; ?>'">Update</button>
                        <button class="form_btn2" type="button" onclick="adminRequest()" id="btnEnable">Request to
                            Delete</button>
                    </center>


                 
                    <br><br>
                    <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
                        <p> Telephone No: +94 11 233 5632
                            Fax: +94 11 233 5632
                            Email: petAssure@hotmail.com​</p>
                    </div>
    </body>

</html>