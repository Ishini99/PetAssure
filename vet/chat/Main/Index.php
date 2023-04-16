<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
    <link rel="stylesheet" href="chatindex.css">

    <!-- 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

</head>

<body>


    <div class="container">
        <h1>WebSocket with ChatRoom</h1>
        <?php
      
        session_start();
        if (isset($result['fname']))
         {
            $_SESSION['fname'] = $result['fname'];
        }
        if (isset($result['userid'])) 
        {
            $_SESSION['userid'] = $result['userid'];
        }
        if (isset($_SESSION['userid'])) {
            echo "Logged in as " . $_SESSION['userid'];
            echo " <a href='Logout.php'>Logout</a>";
        } else {
          
        }
        echo "<div class='container mt-4'>
                <div class='row'>
                    <div class='col-6'>";
        require '../../../config/db.php';
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        $sql = "SELECT * FROM user";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['userid'] != $_SESSION['userid'] && ($row['role'] == 'client' || $row['role'] == 'vet')) {
                    echo "<button onclick='window.location.href = \"chatroom.php?id=" . $row['userid'] . "\"'>" . $row['fname'] . "</button>";
                }
            }
        } else {
            echo "No users";
        }
        echo "</div> </div> </div>";
        ?>






    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>