<?php
  if(!empty($_GET['tid'] && !empty($_GET['product']))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $tid = $GET['tid'];
    $product = $GET['product'];
  } else {
    header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Thank You</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      color: #333;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    h2 {
      margin-top: 0;
    }

    hr {
      margin-top: 10px;
      margin-bottom: 20px;
      border: none;
      border-top: 1px solid #ddd;
    }

    p {
      margin-bottom: 10px;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      border: 1px solid #333;
      border-radius: 5px;
      background-color: #eee;
      color: #333;
      text-decoration: none;
      font-size: 16px;
      transition: background-color 0.2s ease;
    }

    .btn:hover {
      background-color: #333;
      color: #fff;
    }
  </style>

</head>
<body>
  <div class="container mt-4">
    <h2>Thank you for purchasing <?php echo $product; ?></h2>
    <hr>
    <p>Your transaction ID is <?php echo $tid; ?></p>
    <p>Check your email for more info</p>
    <p><a href="../client/services1.php" class="btn btn-light mt-2">Go Back</a></p>
  </div>
</body>
</html>







