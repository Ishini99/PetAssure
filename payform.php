<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Payment Invoice </title>
    <link rel="stylesheet" href="css/updateprofile.css">
   </head>

 

  <div class="wrapper">
    <h2>Invoice</h2>
    <form name="addpost" action="checkout.php" method="post">
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
        <input type="text" name='mobile' placeholder='Mobile' required>
        </div>
     
        <div class="input-box button">
          <input type="Submit" value="Pay Now">
        </div>
    </form>
    </div>
    <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="sk_test_51LzkPbDpKSoGJDlNyPd3q0RxHPT8NeFR11STcftkSRiMTHaTBJM6JppmN7wHs8m2V4TjbIkYb33DejADUpR7Qael00rVte3b3g"
                data-amount=<?php echo str_replace(",","",$_POST["amount"]) * 100?>
                data-name="<?php echo $_POST["fname"]?>"
                data-description="<?php echo $_POST["description"]?>"
                data-currency="lkr"
                data-locale="auto">
                </script>


</body>
</html>