<?php include('../config/constants.php') ?>
<?php include('../login_access.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>ADMIN</title>
    <script src="https://kit.fontawesome.com/ca1b4f4960.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../index.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
            <img src="../images/admin-user.jpg" alt="user" class="imgframe">
            <ul>
                <li><a href="admin_home.php"><div class="highlighttext">Home</div></a></li>
                <li><a href="admin-session.php">Sessions</a></li>
                <li><a href="#">View Patient</a></li>
                <li><a href="#">View Orders</a></li>
                <li><a href="#">View Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="admin-system-users.php">System Users</a></li>
                <li><a href="admin_viewprofile.php">View Profile</a></li>
            </ul>
            <div class="signouttext"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </a></div>
        </div>
        <div class="main_content"> 
            <div class="info">
            <span>
                <?php
            //select
            $sql="SELECT column1, column2, ...
             FROM table_name
             WHERE condition";             // select with where condition

             $sql="SELECT * FROM Products
              WHERE Price > 30";
              
              $sql="SELECT * FROM Products
              WHERE Price != 18";       //not equal
               
               $sql="SELECT * FROM Products
               WHERE Price BETWEEN 50 AND 60";

               $sql="SELECT * FROM Customers
               WHERE City LIKE 's%'";       //Search for a pattern


                  $sql="SELECT * FROM Customers
                  WHERE City IN ('Paris','London')";   //To specify multiple possible values for a column

                   
                  $sql="SELECT column1, column2, ...
                  FROM table_name
                  WHERE condition1 AND condition2 AND condition3 ...";  //select and 
 

                    $sql="SELECT * FROM Customers
                    WHERE Country='Germany' AND City='Berlin'";

                       $sql="SELECT * FROM Customers
                       WHERE City='Berlin' OR City='München'";

                     $sql="SELECT * FROM Customers
                      WHERE NOT Country='Germany'";


                    $sql="SELECT * FROM Customers
                   WHERE Country='Germany' AND (City='Berlin' OR City='München')";

                   $sql="SELECT * FROM Customers
                   WHERE NOT Country='Germany' AND NOT Country='USA'";


                      //insert
                      $sql="INSERT INTO table_name (column1, column2, column3, ...)
                      VALUES (value1, value2, value3, ...)";

                      $sql="INSERT INTO Customers (CustomerName, City, Country)
                      VALUES ('Cardinal', 'Stavanger', 'Norway')";  //Insert Data Only in Specified Columns

                          
                     //update
                         $sql="UPDATE Customers
                         SET ContactName='Juan'";   

                         $sql="UPDATE Customers
                         SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
                         WHERE CustomerID = 1";

                  
                      //delete
                     $sql="DELETE FROM table_name WHERE condition";

                     $sql="DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste'";




                     $sql="SELECT MAX(column_name)
                     FROM table_name
                     WHERE condition";


?>

// page1.php
session_start();
$_SESSION['name'] = "John";
$_SESSION['age'] = 25;
header("Location: page2.php");
exit;

// page2.php
session_start();
$name = $_SESSION['name'];
$age = $_SESSION['age'];
echo "Name: " . $name . "<br>";
echo "Age: " . $age;



$sql = "SELECT *
        FROM appointment
        INNER JOIN serviceprovider
        ON appointment.spid = serviceprovider.spid
        AND serviceprovider.spid = '$spid'
        WHERE appointment.appoDate >= CURDATE()
        AND appointment.appoDate <= DATE_ADD(CURDATE(), INTERVAL 7 DAY)
        ORDER BY appointment.appoDate ASC";










        //chat
        <div class="userDetails">
    <?php
    $client = "client";

    // Check if the search form has been submitted
    if (isset($_POST['search'])) {
        $searchTerm = mysqli_real_escape_string($con, $_POST['searchTerm']);
        $sql = "SELECT * FROM user WHERE uname != '$_SESSION[uname]' AND role = '$client' AND (fname LIKE '%$searchTerm%' OR lname LIKE '%$searchTerm%' OR uname LIKE '%$searchTerm%')";
    } else {
        $sql = "SELECT * FROM user WHERE uname != '$_SESSION[uname]' AND role = '$client'";
    }

    $result = mysqli_query($con, $sql);

    if (!$result) {
        die('Error in query: ' . mysqli_error($con));
    }

    // Fetch all the rows into an array
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <form method="POST" action="">
        <input type="text" name="searchTerm" placeholder="Search clients">
        <button type="submit" name="search">Search</button>
    </form>

    <ul>
        <?php foreach ($rows as $row): ?>
            <li>
                <a href="chatmessages.php?f=<?php echo $row['fname'] ?>&l=<?php echo $row['lname'] ?>&u=<?php echo $row['uname'] ?>">
                    <?php echo $row["fname"] . " " . $row["lname"]; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>



            </span>
            </div>
        </div>
    </div>
</body>
</html>