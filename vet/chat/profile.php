<?php
include ("header.php");



if(isset($_GET['profile_username'])){
    $username = $_GET['profile_username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    $user_array = mysqli_fetch_array($user_details_query);

    $num_friends = (substr_count($user_array['friend_array'], ',')) - 1;
}

$user = new User($con, $userLoggedIn);

if (isset($_POST['add_friend'])){
    $user->sendRequest($username);
}


if (isset($_POST['rm_request'])){
    $user->rmFriendRequest($username);
}

$message_obj = new Message($con, $userLoggedIn);

if (isset($_POST['post_message'])){
    if (isset($_POST['message_body'])){
        $body = mysqli_real_escape_string($con, $_POST['message_body']);
        $date = date("Y-m-d H:i:s");
        $message_obj->sendMessage($username, $body, $date);
    }


}

?>


<style>
    .wrapper{
        margin-left: 0;
        padding-left: 0;
    }
</style>

<!--        profile left side info-->

        <div class="profile_left">
        <br><br>
            <img src="<?php echo $user_array['profile_pic']?>" alt="">
            <p class="title"><?php echo $user_array['first_name']." ".$user_array['last_name'];?></p>

            
            <form action="<?php echo $username; ?>" method="post">
                <?php

                $profile_user_obj = new User($con, $userLoggedIn);
                if ($profile_user_obj->isClosed()){
                    header("Location: user_closed.php");
                }
                ?>

            </form>



            
        </div>
        <br><br>

<!--        main column comment and others-->
<div class="main_column column">


<div class="tab-content">
  
    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab" tabindex="0">

        <?php


        // echo "<h4> ".$profile_user_obj->getFirstAndLastName()." </h4><hr><br>";
        echo "<div class='loaded_messages' id='scroll_messages'>";
        echo $message_obj->getMessages($username);
        echo "</div>";

        ?>

        <div class="message_post">
            <form action="" method="post">
                <textarea name='message_body' id='message_textarea' placeholder='Write your message....'></textarea>
                <input type='submit' name='post_message' class='info' id='message_submit' value='Send'>
            </form>
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
</div>

<script>
    const firstTabEl = document.querySelector('#myTab li:last-child button')
    const firstTab = new bootstrap.Tab(firstTabEl)

    firstTab.show()
</script>


</div>




<script>
var element = document.getElementById("popup_post");
function hideShow() {
if (element.style.display === "block") {
element.style.display = "none";
} else {
element.style.display = "block";
}

}
function closePopupPost(){
element.style.display = "none";
}
</script>


<script>
var userLoggedIn = '<?php echo $userLoggedIn;?>';
var profileUsername = '<?php echo $username;?>'

$(document).ready(function (){
$("#loading").show();

// original ajax request for loading first posts
$.ajax({
url: "includes/handlers/ajax_load_profile_posts.php",
type: "POST",
data: "page=1&userLoggedIn="+userLoggedIn+"&profileUsername="+profileUsername,
cache: false,

success: function (data){
    $('#loading').hide();
    $('.posts_area').html(data);
}
});

$(window).scroll(function (){
var height = $('.posts_area').height();
var scroll_top = $(this).scrollTop();
var page = $('.posts_area').find('.nextPage').val();
var noMorePosts = $('.posts_area').find('.noMorePosts').val();

if((document.body.scrollHeight === document.body.scrollTop + window.innerHeight) && noMorePosts === 'false'){
    $('#loading').show();

    var ajaxReq = $.ajax({
        url: "includes/handlers/ajax_load_profile_posts.php",
        type: "POST",
        data: "page="+page+"&userLoggedIn="+userLoggedIn+"&profileUsername="+profileUsername,
        cache: false,

        success: function (data){
            $('.posts_area').find('.nextPage').remove();
            $('.posts_area').find('.noMorePosts').remove();

            $('#loading').hide();
            $('.posts_area').append(data);
        }
    });
}

return false;
});


});
</script>

</div>
</body>
</html>

