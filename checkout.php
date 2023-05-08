<?php
    include("payconfig.php");

    $token = $_POST["stripeToken"];
    $contact_name = $_POST["fname"];
    $token_card_type = $_POST["stripeTokenType"];
    $phone           = $_POST["mobile"];
    $email           = $_POST["email"];
    $amount          = $_POST["amount"]; 
    $desc            = $_POST["description"];
    $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","",$amount) * 100,
      "currency" => 'inr',
      "description"=>$desc,
      "source"=> $token,
    ]);

    if($charge){
      header("Location:paysuccess.php?amount=$amount");
    }
?>