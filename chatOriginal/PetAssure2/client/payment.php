

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link rel="stylesheet" href="style_payment.css">
    <script src="https://kit.fontawesome.com/ffeda24502.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PetAssure</title>



</head>

<body class="body-scroller">

    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../Images/logo.png" alt="">
            </div>

           
            <span class="logo_name">PetAssure</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="./Dashboard.php">
                        <i class="uil uil-dashboard"></i>
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li><a href="./userProfile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">User Profile</span>
                    </a></li>
                <li><a href="./notifications.php">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">Notifications</span>
                    </a></li>
                <li><a href="./history.php">
                        <i class="uil uil-history"></i>
                        <span class="link-name">Added Posts</span>
                    </a></li>
                <li><a href="./appointments.php">
                        <i class="uil uil-calender"></i>
                        <span class="link-name">Appointments</span>
                    </a></li>
                
                    <li><a href="./payment.php">
                        <i class="uil uil-cash"></i>
                        <span class="link-name">Payment</span>
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

        <center>
            <h2> Payment Details</h2>
            <br><br>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Service Type</th>
                        <th>Date</th>
                       

                        <th>Amount Rs.</th>

                    </tr>
                </thead>
                <tbody>
                  
                    <tr class="active-row">
                        <td>Veterinarian Service</td>
                        <td>2020.1.23</td>
                        



                        <td>3000.00</td>



                    </tr>
                    <tr class="active-row">
                        <td>Veterinarian Service</td>
                        <td>2020.1.25</td>
                        



                        <td>3000.00</td>



                    </tr>
                    <tr class="active-row">
                        <td>Veterinarian Service</td>
                        <td>2020.1.29</td>
                        



                        <td>3000.00</td>



                    </tr>


                    
            


                </tbody>
            </table>
        </center>



        </div>
        </div>




        <script src="../js/script.js"></script>

    </section>

    <div class="footerr" style="position:absolute; z-index: -1; width: 99%;">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>


</html>