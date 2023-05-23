<?php
include("header.php");

$userid ="";
if(isset($_SESSION["userid"]) ){
    $userid =$_SESSION["userid"];
}else{
   //header("location:login.php");
}


?>

<html>
    <head>
    </head>
    <body style="background-image: url('bg.png');
    height: 100%;
    margin :0;
    padding: 0;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

        

    <br><br>
   
    <img src="freecon1.jpg" style="width:298px; height:281px; border-radius: 50%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">


            

            
       

<!--        main column comment and others-->
        <div class="main_column column">
          

       <center>     <h4>Free Consultation Service</h4></center>
            <p>
At PetAssure, we are dedicated to providing top-quality healthcare services to pets, and that's why we offer a free consultation service through our chat system. Our chat service is designed to ensure that your pet's privacy is protected, while also providing a personalized and professional consultation experience. Our team of experienced professionals is available to provide expert guidance and advice on any pet-related questions or concerns you may have. We understand the importance of your pet's health and wellbeing, and we strive to provide the best possible service to help keep your furry friends happy and healthy.Our chat system is available 24/7, so you can connect with us at any time of day or night. We understand that pet-related concerns can arise at any time, and we're here to help whenever you need us. Our team of professionals is highly knowledgeable in all areas of pet healthcare, from nutrition and exercise to illness and injury. We take the time to listen to your concerns, ask the right questions, and provide tailored advice to help you make the best decisions for your pet's health. And rest assured that your privacy and confidentiality are always a top priority for us. So whether you have questions about your pet's diet, need advice on behavior issues, or simply want to chat with a friendly and knowledgeable professional about your furry friend, our chat system is here to help. So why not start a chat with us today and experience the PetAssure difference?</p>


        </div>

        <script>
            var userLoggedIn = '<?php echo $userLoggedIn;?>';

            $(document).ready(function (){
               $("#loading").show();

               // original ajax request for loading first posts
                $.ajax({
                    url: "includes/handlers/ajax_load_posts.php",
                    type: "POST",
                    data: "page=1&userLoggedIn="+userLoggedIn,
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
                          url: "includes/handlers/ajax_load_posts.php",
                          type: "POST",
                          data: "page="+page+"&userLoggedIn="+userLoggedIn,
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
