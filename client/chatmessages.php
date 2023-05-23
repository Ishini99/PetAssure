<?php
include "ChatHeader.php";

$userid = "";
if (isset($_SESSION["userid"]) && $_SESSION["uname"]) {
    $userid = $_SESSION["userid"];
} else {
    //header("location:login.php");
}

$message_obj = new Message($con, $userLoggedIn);

if (isset($_GET['u']) && isset($_GET['f']) && isset($_GET['l'])) {
    $user_to = $_GET['u'];
    $fname = $_GET['f'];
    $lname = $_GET['l'];

} else {
    $user_to = $message_obj->getMostRecentUser();
    if ($user_to == false) {
        $user_to = 'new';
    }
}

if ($user_to != "new") {
    $user_to_obj = new User($con, $user_to);
}

if (isset($_POST['post_message'])) {
    if (isset($_POST['message_body'])) {
        //        $body = mysqli_real_escape_string($con, $_POST['message_body']);
        $body = $_POST['message_body'];
        $date = date("Y-m-d H:i:s");
        $message_obj->sendMessage($user_to, $body, $date);

        header("Location: chatmessages.php?$user_to");
        exit();
    }
}

?>



<html>

<head>
<link rel="stylesheet" type="text/css" href="../css/chatstyle.css">
</head>

<body style="background-image: url('../images/bg.PNG');
    height: 100%;
    margin :0;
    padding: 0;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


    <br><br>
    <div class="main_column column chat_message">
        <?php
        if ($user_to != "new") {

            echo "<h5>" . $user_to_obj->getFirstAndLastName() . " </h5><hr><br>";

            echo "<div class='loaded_messages' id='scroll_messages'>";
            echo $message_obj->getMessages($user_to);
            echo "</div>";
        }
        ?>

        <div class="message_post">
            <form action="" method="post">
                <?php {
                    echo "<textarea name='message_body' id='message_textarea' placeholder='Write your message....'></textarea>";
                    echo "<input type='submit' name='post_message' class='info' id='message_submit' value='Send'>";
                }

                ?>
            </form>

            <?php
            echo "<div class='results'></div>";
            ?>
        </div>
        <script>
            $(document).ready(function () {
                if (document.getElementById("scroll_messages")) {
                    let div = document.getElementById("scroll_messages");
                    div.scrollTop = div.scrollHeight;
                }
            });

        </script>


    </div>

    <form action="" method="post">
        <div class="user_details column" id="">
            <h6>Search your Veterinarian here</h6>
            <hr>





            <div class="userDetails ">
                <?php
                // Assuming $veterinarian holds the value for the veterinarian role
                $veterinarian = "veterinarian";

                $sql = "SELECT * FROM user WHERE uname != '$_SESSION[uname]' AND role = '$veterinarian'";
                $result = mysqli_query($con, $sql);

                if (!$result) {
                    die('Error in query: ' . mysqli_error($con));
                }

                // Fetch all the rows into an array
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                ?>

                <ul>
                    <?php foreach ($rows as $row): ?>
                        <li>

                            <a
                                href="chatmessages.php?f=<?php echo $row['fname'] ?>&l=<?php echo $row['lname'] ?>&u=<?php echo $row['uname'] ?>">
                                <?php echo "Dr." . $row["fname"] . " " . $row["lname"]; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </form>




    </div>

</body>

</html>