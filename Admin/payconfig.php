<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51LzkPbDpKSoGJDlNyPd3q0RxHPT8NeFR11STcftkSRiMTHaTBJM6JppmN7wHs8m2V4TjbIkYb33DejADUpR7Qael00rVte3b3g",
        "publishableKey" => "pk_test_51LzkPbDpKSoGJDlNvX2utfKYXdWZzVRzwy6Ol8PM9jEchBoMvoGZgyxFAQVlE91aVHwW0wybzpTjyC9kBCK09zmE00Hd7DoEPM"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>