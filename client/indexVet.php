<?php
require '../config/db.php';
session_start();
$spid ="";
$userid="";


if(isset($_SESSION["userid"]) ){
   $userid =$_SESSION["userid"];
}else{
   //header("location:login.php");
}?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PetAssure</title>
    <link href="../css/vet_Reviews.css" rel="stylesheet" type="text/css">
    <link href="../css/vet_Reviews2.css" rel="stylesheet" type="text/css">
</head>

<body class="profile-page">
        <div class="nav" style="width: 100%;">
            <div class="left">
                <img src="../Images/logo.png" width="100px" height="100px">
                <p style="margin-left: 20px;">PetAssure</p>
            </div>

            <div class="right">
                <a href="../index.php" class="font">HOME</a>
                <a href="vetDashboard.php" class="font">DASHBOARD</a>

                <a href="../logout.php" class="font">LOG OUT </a>
            </div>
        </div>

    <div class="content home">
        <h2>Reviews</h2>

        <div class="reviews">

        </div>
</div>
    <div class="footerr">
        <p> Telephone No: +94 11 233 5632 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            Fax: +94 11 233 5632 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            Email: petAssure@hotmail.com​</p>
    </div>


        <script>
        const reviews_page_id = 1;
        fetch("reviewsVet.php?page_id=" + reviews_page_id).then(response => response.text()).then(data => {
            document.querySelector(".reviews").innerHTML = data;
            document.querySelector(".reviews .write_review_btn").onclick = event => {
                event.preventDefault();
                document.querySelector(".reviews .write_review").style.display = 'block';
                document.querySelector(".reviews .write_review input[name='name']").focus();
            };
            document.querySelector(".reviews .write_review form").onsubmit = event => {
                event.preventDefault();
                fetch("reviewsVet.php?page_id=" + reviews_page_id, {
                    method: 'POST',
                    body: new FormData(document.querySelector(".reviews .write_review form"))
                }).then(response => response.text()).then(data => {
                    document.querySelector(".reviews .write_review").innerHTML = data;
                });
            };
        });
        </script>
    </div>
</body>

</html>