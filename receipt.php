<!-- <?php
//require 'connection.php';
//if(isset($_SESSION["id"])){
 // $id = $_SESSION["id"];
  //$order = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM orders WHERE id = $id"));
//}
//else{
 // header("Location: login.php");
//}
?> -->

<?php
require 'connection.php';

// Start or resume the session
// session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Retrieve the user ID from the session
$userID = $_SESSION['id'];

// Fetch the order details associated with the user
$query = "SELECT * FROM orders WHERE userId = $userID";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $order = mysqli_fetch_assoc($result);
} else {
    // No order found for the user
    // You can redirect or handle this case as per your requirement
    header("Location: login.php");
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
    <p>Name: <?php echo $order['name']; ?></p>
    <p>Phone: <?php echo $order['phone']; ?></p>
    <p>Postcode: <?php echo $order['postcode']; ?></p>
    <p>Address: <?php echo $order['address']; ?></p>
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
