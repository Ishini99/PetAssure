<?php
require '../../config/db.php';
session_start();
$spid ="";
$userid="";
if(isset($_SESSION["userid"]) ){
   $userid =$_SESSION["userid"];
}else{
   //header("location:login.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $notifications_name = $_POST["notifications_name"];
    $message = $_POST["message"];
  
    // Perform validation and sanitization on the input values
  
    // Insert data into the database
    $insert_query = "INSERT INTO inf (notifications_name, message, active) VALUES ('$notifications_name', '$message', '1')";
    $result = mysqli_query($con, $insert_query);
  
    if ($result) {
        // Return success response
        echo json_encode(array("status" => "success"));
        exit;
    } else {
        // Return error response
        echo json_encode(array("status" => "error"));
        exit;
    }}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifications</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="./assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/ideleteAccount.css">
    <style>

    </style>
</head>

<body>
    <div class="nav" style="width: 100%;">
        <div class=" left">
            <img src="../../Images/logo.png" width="100px" height="100px">
            <p style="margin-left: 20px;">PetAssure</p>
        </div>

        <div class="right">
            <a href="../../index.php" class="font">HOME</a>
            <a href="../userProfile.php" class="font">PROFILE</a>

            <a href="../vetDashboard.php" class="font">DASHBOARD</a>
            <a href="../../logout.php" class="font">LOG OUT </a>
        </div>
    </div><br><br>

    <div class="container">
        <h3>Delete Account</h3>

        <form class="form-horizontal" id="frm_data">
            <div class="form-group row">

                <div class="col-md-6">
                    <input type="text" name="notifications_name" id="notifications_name" class="form-control"
                        placeholder="Enter your Name" required />
                </div>
            </div>
            <div class="form-group row">

                <div class="col-md-6">
                    <textarea style="resize:none !important;" name="message" id="message" rows="4" cols="10"
                        class='form-control' placeholder="Any message.."></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10 col-offset-2" style="text-align:center;">
                    <input type="submit" id="notify" name="submit" class="btn " value="Send Request" />
                </div>
            </div>
        </form>
    </div>


    <div class="footerr">
        <p> Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com​</p>
    </div>
</body>
<script>
$(document).ready(function() {
    var ids = new Array();
    $('#over').on('click', function() {
        $('#list').toggle();
    });

    //Message with Ellipsis
    $('div.msg').each(function() {
        var len = $(this).text().trim(" ").split(" ");
        if (len.length > 12) {
            var add_elip = $(this).text().trim().substring(0, 65) + "…";
            $(this).text(add_elip);
        }

    });


    $("#bell-count").on('click', function(e) {
        e.preventDefault();

        let belvalue = $('#bell-count').attr('data-value');

        if (belvalue == '') {

            console.log("inactive");
        } else {
            $(".round").css('display', 'none');
            $("#list").css('display', 'block');

            // $('.message').each(function(){
            // var i = $(this).attr("data-id");
            // ids.push(i);

            // });
            //Ajax
            $('.message').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: './connection/deactive.php',
                    type: 'POST',
                    data: {
                        "id": $(this).attr('data-id')
                    },
                    success: function(data) {

                        console.log(data);
                        location.reload();
                    }
                });
            });
        }
    });

    $('#notify').on('click', function(e) {
        e.preventDefault();
        var name = $('#notifications_name').val();
        var ins_msg = $('#message').val();
        if ($.trim(name).length > 0 && $.trim(ins_msg).length > 0) {
            var form_data = $('#frm_data').serialize();
            $.ajax({
                url: './connection/insert.php',
                type: 'POST',
                data: form_data,
                success: function(data) {
                    location.reload();
                }
            });
        } else {
            alert("Please Fill All the fields");
        }


    });
});
</script>

</html>