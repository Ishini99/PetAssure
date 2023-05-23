<?php
require_once('config/db.php');
session_start();
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/signup2.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- JavaScript code -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .user-details {
  margin-bottom: 20px;
}

.user-details p {
  margin-bottom: 10px;
  font-size: 12px;
  line-height: 1.5;
}

.user-details b {
  font-weight: bold;
}

@media screen and (max-width: 600px) {
  .user-details p {
    font-size: 10px;
  }
}

</style>

</head>
<body>

<div class ="input-box" >
    <div style=margin-top:-440px;margin-left:-620px>

<img src="Images/logo.png" height="160">
</div>
</div>
<div class ="input-box" >
    <div style=margin-top:-380px;margin-left:-480px>
    <img src="Images/PetAssure.png" height="35">

</div>
</div>
<div class ="input-box" >
    <div style=margin-top:25px;margin-left:-690px>

<img src="Images/g3.png" height="400">
</div>
</div>
<div class ="input-box" >
    <div style=margin-top:85px;margin-left:-390px>

<img src="Images/g4.png" height="160">
</div>
</div>

<div class="footerr" style=" z-index: -1; width: 100%;">
    <p> Telephone No: +94 11 233 5632&nbsp;&nbsp;&nbsp;&nbsp;
        Fax: +94 11 233 5632 &nbsp;&nbsp;&nbsp;&nbsp;Email: petAssure@hotmail.com​</p>
</div>


  
<div class="content">
    <form action="" method="post">
        <h2>Terms And Conditions</h2>
        
<div class="user-details">

<p><b>
Pet Boarding Service:</b> Pet Assure Pet Care System provides pet boarding services to pet owners. We ensure the well-being and care of your pet during their stay with us.
</p>
<p><b>
Notification of Extended Stay:</b> If a pet owner is unable to take their pet back within the agreed-upon time period, it is the responsibility of the pet owner to inform truogh email or telephone Pet Assure Pet Care System. This notification should be given as soon as possible to make appropriate arrangements for the pet's continued care.
</p><p><b>
Failure to Notify:</b> In the event that a pet owner fails to inform or contact Pet Assure Pet Care System about an extended stay within one week of the agreed-upon time period, Pet Assure Pet Care System reserves the right to take necessary actions.
</p>
<p><b>
Adoption or Sale:</b> If the pet owner fails to notify Pet Assure Pet Care System about an extended stay within one week, Pet Assure Pet Care System reserves the right to give the adoption or sale process of the pet.
</p><p><b>
Pet's Well-being:</b> Throughout the process, the well-being and best interests of the pet will be the top priority for Pet Assure Pet Care System. All actions taken regarding adoption or sale will be conducted responsibly and in accordance with applicable laws and regulations.
</p><p><b>
Owner's Responsibility:</b> It is the pet owner's responsibility to ensure timely communication with Pet Assure Pet Care System regarding the duration of their pet's stay and any changes in the pickup plans.
</p><p><b>
<label for="checkbox">
    <input type="checkbox" id="checkbox" name="agree">
    I agree to the terms and conditions
  </label>
  <p><b>Please read and understand these terms and conditions carefully before using our pet boarding service. If you have any questions or concerns, feel free to contact us for clarification.</b></p>
</div>



<button type="button" class="button" onclick="window.location.href = 'signup_client.php';">Submit</button>
    <button type="button" class="button" onclick="window.location.href = 'index.php';">Back</button>
    
      
</div>


</div>


</body>
</html>
