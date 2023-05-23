<?php
include "ChatHeader.php";
$userid = "";
if (isset($_SESSION["userid"]) && isset($_SESSION["uname"])) {
    $userid = $_SESSION["userid"];
} else {
    // header("location:.php");
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

    <img src="../images/freecon1.jpeg"
        style="width:298px; height:281px; border-radius: 50%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">







    <!--        main column comment and others-->
    <div class="main_column column">


        <center>
            <h4>Free Consultation Service</h4>
        </center>
        <p>
            At PetAssure, we are dedicated to providing top-quality healthcare services to pets, and that's why we offer
            a free consultation service through our chat system. Our chat service is designed to ensure that your pet's
            privacy is protected, while also providing a personalized and professional consultation experience. Our team
            of experienced professionals is available to provide expert guidance and advice on any pet-related questions
            or concerns you may have. We understand the importance of your pet's health and wellbeing, and we strive to
            provide the best possible service to help keep your furry friends happy and healthy.Our chat system is
            available 24/7, so you can connect with us at any time of day or night. We understand that pet-related
            concerns can arise at any time, and we're here to help whenever you need us. Our team of professionals is
            highly knowledgeable in all areas of pet healthcare, from nutrition and exercise to illness and injury. We
            take the time to listen to your concerns, ask the right questions, and provide tailored advice to help you
            make the best decisions for your pet's health. And rest assured that your privacy and confidentiality are
            always a top priority for us. So whether you have questions about your pet's diet, need advice on behavior
            issues, or simply want to chat with a friendly and knowledgeable professional about your furry friend, our
            chat system is here to help. So why not start a chat with us today and experience the PetAssure difference?
        </p>


    </div>


    </div>



</body>

</html>