<?php
session_start();

// Check whether the form data is present in the session
if (!isset($_SESSION['formData'])) {
    // Redirect to the form page if data is not available
    header("Location: form.php");
    exit();
}

// Access form data from the session
$formData = $_SESSION['formData'];

// Access cart details from the session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

unset($_SESSION['formData']);

// Calculate the total amount
$total = 0;
foreach ($cart as $product) {
    $total += ($product['quantity'] * $product['price']);
}

// Check whether the total amount is $10 or more
if ($total < 10) {
    echo "Error: Minimum purchase should be $10 or more.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reciept.css">
    <script type="text/javascript" src="js/receipt.js"></script>
    <title>Receipt</title>
</head>

<body>
    <!-- user details -->
    <h2>Receipt</h2>
    <p>Name: <?php echo $formData['name']; ?></p>
    <p>Phone: <?php echo $formData['phone']; ?></p>
    <p>Postcode: <?php echo $formData['postcode']; ?></p>
    <p>Address: <?php echo $formData['address']; ?></p>
    <p>City: <?php echo $formData['city']; ?></p>
    <p>Province: <?php echo $formData['province']; ?></p>
    <p>Email: <?php echo $formData['email']; ?></p>
    <p>Name On Card: <?php echo $formData['cname']; ?></p>
    <p>Credit Card Number : <?php echo $formData['ccnum']; ?></p>
    <p>Exp Month: <?php echo $formData['expmonth']; ?></p>
    <p>Exp Year: <?php echo $formData['expyear']; ?></p>
    <!-- Cart details -->
    <h2>Cart Details</h2>
    <ul>
    <?php
        $total = 0;
        $taxRate = getSalesTaxRate($formData['province']); 
        
        // Function to get tax rate based on the province
        foreach ($cart as $product) {
            $tax = $product['price'] * $taxRate;
            echo "<li>{$product['name']} - Quantity: {$product['quantity']} - Unit Price: \${$product['price']} - Tax: \${$tax}</li>";
            $total += ($product['quantity'] * $product['price']) + $tax;
        }
        ?>
    </ul>

    <!-- Display total -->
    <p>Total: $<?php echo number_format($total, 2); ?></p>
    <div class="button-container">
        <button id="okButton" onclick="Ok()">OK</button>
    </div>

</body>

</html>

<?php
function getSalesTaxRate($province)
{
    // Tax rates for each province
    $taxRates = [
        'Alberta' => 0.05,
        'British Columbia' => 0.07,
        'Manitoba' => 0.08,
        'New Brunswick' => 0.10,
        'Newfoundland and Labrador' => 0.08,
        'Nova Scotia' => 0.10,
        'Ontario' => 0.13,
        'Prince Edward Island' => 0.09,
        'Quebec' => 0.09975,
        'Saskatchewan' => 0.06
    ];

    return isset($taxRates[$province]) ? $taxRates[$province] : 0;
}
?>
