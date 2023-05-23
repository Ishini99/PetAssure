<?php
include ("header.php");

$message_obj = new Message($con, $userLoggedIn);

if (isset($_GET['u'])){
    $user_to = $_GET['u'];
}else{
    $user_to = $message_obj->getMostRecentUser();
    if ($user_to == false){
        $user_to = 'new';
    }
}

if ($user_to != "new"){
    $user_to_obj = new User($con, $user_to);
}

if (isset($_POST['post_message'])){
    if (isset($_POST['message_body'])){
//        $body = mysqli_real_escape_string($con, $_POST['message_body']);
        $body = $_POST['message_body'];
        $date = date("Y-m-d H:i:s");
        $message_obj->sendMessage($user_to, $body, $date);

        header("Location: messages.php?$user_to");
        exit();
    }
}

?>

    


    <div class="main_column column chat_message">
        <?php
        if ($user_to != "new"){
            echo "<h4>" . $user_to_obj->getFirstAndLastName() . ".</h4><hr> <br>";

            echo "<div class='loaded_messages' id='scroll_messages'>";
                echo $message_obj->getMessages($user_to);
            echo "</div>";
        }else{
            echo "<h4>New Message</h4>";
        }
        ?>

        <div class="message_post">
            <form action="" method="post">
                <?php

               
                    echo "<textarea name='message_body' id='message_textarea' placeholder='Write your message....'></textarea>";
                    echo "<input type='submit' name='post_message' class='info' id='message_submit' value='Send'>";
                

                ?>
            </form>

            <?php
            echo "<div class='results'></div>";
            ?>
        </div>
        <script>
            $(document).ready(function (){
                if (document.getElementById("scroll_messages")) {
                    let div = document.getElementById("scroll_messages");
                    div.scrollTop = div.scrollHeight;
                }
            });

        </script>
        

    </div>


    <div class="user_details column" id="conversations">
        <h4>Conversations</h4>

        <div class="load_conversations">
            <?php  echo $message_obj->getConvos();?>
        </div>
       
    </div>




</div>

</body>

</html>


















