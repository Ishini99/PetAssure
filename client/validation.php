<?php
// Define variables and initialize with empty values
$phone_number = $price = "";
$phone_number_err = $price_err = "";

// Validate form inputs when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate phone number
    if (empty($_POST["phone_number"])) {
        $phone_number_err = "Please enter a phone number.";
    } else {
        $phone_number = test_input($_POST["phone_number"]);
        $phone_number = preg_replace('/[^0-9]/', '', $phone_number); // Remove non-digit characters from phone number
        if (!preg_match("/^\d{10}$/", $phone_number)) {
            $phone_number_err = "Please enter a valid 10-digit phone number.";
        }
    }
    
    // Validate price
    if (empty($_POST["price"])) {
        $price_err = "Please enter a price.";
    } else {
        $price = test_input($_POST["price"]);
        if (!preg_match("/^\d+(\.\d{1,2})?$/", $price)) {
            $price_err = "Please enter a valid price in the format xx.xx.";
        }
    }

    // If inputs are valid, process form data
    if (empty($phone_number_err) && empty($price_err)) {
        // Process form data here
        echo "Phone number and price are valid.";
    }
}

// Helper function to test and sanitize form input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Phone Number and Price Form</title>
</head>
<body>
    <h2>Phone Number and Price Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" id="phone_number" value="<?php echo $phone_number; ?>">
        <span class="error"><?php echo $phone_number_err; ?></span>
        <br><br>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="<?php echo $price; ?>">
        <span class="error"><?php echo $price_err; ?></span>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
