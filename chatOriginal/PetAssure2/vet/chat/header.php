<?php
require '../../config/db.php';
include("includes/classes/User.php");
// include("includes/classes/Post.php");
include("includes/classes/Message.php");
// include("includes/classes/Notification.php");

$userid ="";
if(isset($_SESSION["userid"]) ){
    $userid =$_SESSION["userid"];
}else{
   //header("location:login.php");
}


if (isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}else{
    // header("Location: register.php");
}

?>

<html lang="en">
<head>
    <title>PetAssure</title>


    <!-- Javascript -->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootbox.min.js"></script>
    <script src="assets/js/jquery.Jcrop.js"></script>
    <script src="assets/js/jcrop_bits.js"></script>
    <!-- <script src="assets/js/zychat.js"></script> -->
    <script src="assets/js/petassure.js"></script>

    <!-- CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/jquery.Jcrop.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <style>
      /* Sets smooth scrolling behavior on the page */
:root {
  scroll-behavior: smooth;
}

/* Applies box-sizing to all elements on the page */
*, ::after, ::before {
  box-sizing: border-box;
}

/* Removes transitions on all elements */
* {
  transition: all 0s ease-in-out 0s;
}
.dropdwon_data_window {
  height:0;
  font-family: 'Bellota-LI', sans-serif;
  background-color: #fff;
  border: none;
  border-radius: 18px;
  width: 278px;
  position: absolute;
  right: 34px;
  top: 70px;
  box-shadow: 0 5px 20px #A6A6A6;
  overflow-y: scroll;
  transition: height .5s;
}
/* Defines various CSS variables */
:root {
  --bs-white: #fff;
  --bs-gray: #6c757d;
  --bs-gray-dark: #343a40;
  --bs-gray-100: #f8f9fa;
  --bs-gray-200: #e9ecef;
  --bs-gray-300: #dee2e6;
  --bs-gray-400: #ced4da;
  --bs-gray-500: #adb5bd;
  --bs-gray-600: #6c757d;
  --bs-gray-700: #495057;
  --bs-gray-800: #343a40;
  --bs-gray-900: #212529;
  --bs-light: #f8f9fa;
  --bs-dark: #212529;
  --bs-primary-rgb: 13,110,253;
  --bs-secondary-rgb: 108,117,125;
  --bs-success-rgb: 25,135,84;
  --bs-info-rgb: 13,202,240;
  --bs-warning-rgb: 255,193,7;
  --bs-danger-rgb: 220,53,69;
  --bs-light-rgb: 248,249,250;
  --bs-dark-rgb: 33,37,41;
  --bs-white-rgb: 255,255,255;
  --bs-black-rgb: 0,0,0;
  --bs-body-color-rgb: 33,37,41;
  --bs-body-bg-rgb: 255,255,255;
  --bs-font-sans-serif: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans","Liberation Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  --bs-font-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
  --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
  --bs-body-font-family: var(--bs-font-sans-serif);
  --bs-body-font-size: 1rem;
  --bs-body-font-weight: 400;
  --bs-body-line-height: 1.5;
  --bs-body-color: #212529;
  --bs-body-bg: #fff;
}

/* Applies the defined variables to the body element */
body {
  font-family: var(--bs-body-font-family);
  font-size: var(--bs-body-font-size);
  font-weight: var(--bs-body-font-weight);
  line-height: var(--bs-body-line-height);
  color: var(--bs-body-color);
  background-color: var(--bs-body-bg);
  text-align: var(--bs-body-text-align);
  -webkit-text-size-adjust: 100%;
}

/* Applies box-sizing to all elements on the page (again) */
* {
  transition: all 0s ease-in-out 0s;
}
*, ::after, ::before {
  box-sizing: border-box;
}
.h1, h1 {
  font-size: 2.5rem;
}

.h2, h2 {
  font-size: calc(1.325rem + 0.9vw);
}

@media (min-width: 1200px) {
  .h2, h2 {
    font-size: 2rem;
  }
}

.h3, h3 {
  font-size: calc(1.3rem + 0.6vw);
}

@media (min-width: 1200px) {
  .h3, h3 {
    font-size: 1.75rem;
  }
}

.h4, h4 {
  font-size: calc(1.275rem + 0.3vw);
}

@media (min-width: 1200px) {
  .h4, h4 {
    font-size: 1.5rem;
  }
}

.h5, h5 {
  font-size: 1.25rem;
  font-weight: 200px;
}

.h6, h6 {
  font-size: 1rem;
}

p {
  margin-top: 0;
  margin-bottom: 1rem;
}

abbr[data-bs-original-title], abbr[title] {
  -webkit-text-decoration: underline dotted;
  text-decoration: underline dotted;
  cursor: help;
  -webkit-text-decoration-skip-ink: none;
  text-decoration-skip-ink: none;
}

address {
  margin-bottom: 1rem;
  font-style: normal;
  line-height: inherit;
}

ol, ul {
  padding-left: 2rem;
}

dl, ol, ul {
  margin-top: 0;
  margin-bottom: 1rem;
}

ol ol, ol ul, ul ol, ul ul {
  margin-bottom: 0;
}

dt {
  font-weight: 700;
}

dd {
  margin-bottom: 0.5rem;
  margin-left: 0;
}

blockquote {
  margin: 0 0 1rem;
}

b, strong {
  font-weight: bolder;
}

.small, small {
  font-size: 0.875em;
}

.mark, mark {
  padding: 0.2em;
  background-color: #fcf8e3;
}

sub, sup {
  position: relative;
  font-size: 0.75em;
  line-height: 0;
  vertical-align: baseline;
}



a {
  color: gray;
  text-decoration: none;
  transition: color 0.3s ease;
}

a:hover {
  color: black;
}


a:not([href]):not([class]),
a:not([href]):not([class]):hover {
  color: inherit;
  text-decoration: none;
}




    </style>
</head>

<body>

<div class="top_bar">
        <div>
        <img src="assets/images/icons/magnifying_glass.png" width="100px" height="100px">        
        
        </div>
        <h2> PetAssure</h2>
        <div class="search">
            <form action="search.php" method="get" name="search_form" id="search_form_submit">
                <input type="text" onkeyup="getLiveSearchUsers(this.value, '<?php echo $userLoggedIn;?>')" name="q" placeholder="Search..." autocomplete="off" id="search_text_input">

                <div class="button_holder">
                    <img src="assets/images/icons/magnifying_glass.png" alt="">
                </div>
            </form>

            <div class="search_result">

            </div>

            <div class="search_result_footer_empty">

            </div>
            
        </div>
        
        <nav class="menu_show">
            <?php
            // un read messages
            $messages = new Message($con, $userLoggedIn);
            $num_messages = $messages->getUnreadNumber();

          
            ?>
          <?php echo $user['first_name']."  " . $user['last_name']; ?></b>
            
            
            <a href="javascript:void(0)" onclick="getDropdownData('<?php echo $userLoggedIn;?>', 'message')">
                <i class="fa fa-envelope fa-lg"></i>
                <?php
                if ($num_messages > 0){
                    echo '<span class="notification_badge" id="unread_message">'.$num_messages.'</span>';
                }
                ?>
            </a>
            </h6>
         
            <a href="includes/handlers/logout.php">
                <i class="fa fa-sign-out fa-lg"></i>
            </a>



        </nav>

        <!-- Menu -->
        <!-- <div class="menu" onclick="showHideMenu()">
            <div class="line line-1"></div>
            <div class="line line-2"></div>
            <div class="line line-3"></div>
             
        </div> -->
        <!-- End of Menu -->

        <div class="dropdwon_data_window"></div>
        <input type="hidden" id="dropdown_data_type">

    </div>
              


    <script>
        var b = true;
        function showHideMenu(){
            if (b){
                $('.menu_show').css({'display': 'flex', 'flex-direction':'column'});
                b=false;
            }else{
                $('.menu_show').css({'display': 'none'});
                b=true;
            }
        }

        var userLoggedIn = '<?php echo $userLoggedIn;?>';

        $(document).ready(function (){

            $('.dropdwon_data_window').scroll(function (){
                var inner_height = $('.dropdwon_data_window').innerHeight();
                var scroll_top = $('.dropdwon_data_window').scrollTop();
                var page = $('.dropdwon_data_window').find('.nextPageDropDownData').val();
                var noMoreData = $('.dropdwon_data_window').find('.noMoreDropdownData').val();

                if((scroll_top + inner_height >= $('.dropdwon_data_window')[0].scrollHeight) && noMoreData === 'false'){

                    var pageName; // holds name of page to send ajax request to
                    var type = $('#dropdown_data_type').val();

                    if (type === 'notifications')
                        pageName = "ajax_load_notifications.php";
                    else if(type === 'message')
                        pageName = "ajax_load_messages.php";

                    var ajaxReq = $.ajax({
                        url: "includes/handlers/"+pageName,
                        type: "POST",
                        data: "page="+page+"&user="+userLoggedIn,
                        cache: false,

                        success: function (data){
                            $('.dropdwon_data_window').find('.nextPageDropDownData').remove();
                            $('.dropdwon_data_window').find('.noMoreDropdownData').remove();

                            $('.dropdwon_data_window').append(data);
                        }
                    });
                }

                return false;
            });


        });
    </script>

    <div class="wrapper">




    </body>
    </html>