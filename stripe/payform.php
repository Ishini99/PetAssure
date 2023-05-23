<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Payment Invoice </title>
    <link rel="stylesheet" href="css/updateprofile.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

   </head>

<body>
   <div class="wrapper">
    <h2>Invoice</h2>
    <form action="./charge.php" method="post" id="payment-form">
        <div class="input-box">
          <input type="text" name='fname' placeholder='Full Name' required>
        </div>
        <div class="input-box">
          <input type="text" name='amount' placeholder='Amount' required>
        </div>
        <div class="input-box">
        <input type="text" name='description' placeholder='Payment Description' required>
        </div>
        <div class="input-box">
        <input type="text" name='email' placeholder='Email' required>
        </div>
        <div class="input-box">
        <!-- <input type="text" name='mobile' placeholder='Mobile' required> -->
       
        <div id="card-element" class="form-control">
          <!-- a Stripe Element will be inserted here. -->
        </div>
        
        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
        </div>
        <div class="input-box button">
          <input type="Submit" value="Pay Now">
        </div>
    </form>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/charge.js"></script>
</body>
</html>