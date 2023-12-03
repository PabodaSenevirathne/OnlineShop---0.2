<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get cart data from the POST request
    $requestData = json_decode(file_get_contents('php://input'), true);
    $cart = $requestData['cart'];

    // Update the session with the new cart data
    $_SESSION['cart'] = $cart;

    echo "Cart updated successfully!";
} else {

    http_response_code(400);
   // echo "Invalid request.";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="js/shopping-cart.js"></script>
    <title>Berlino</title>
</head>

<body>
    <header class>
        <div class="logo">
            <img src="images/logo2.svg" alt="Your Logo" width="100" height="100">
        </div>
        <div class="title">
            <h1>Welcome to Our Online Store</h1>
            <p>Your One-Stop Shop for Quality Products</p>
        </div>
    </header>
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="#">Proucts</a>
            </li>
            <li>
                <a href="#">Locations</a>
            </li>
            <li>
                <a href="#">Packages</a>
            </li>
            <li>
                <a href="#">Training</a>
            </li>
            <li>
                <a href="#">About</a>
                <ul class="sub_menu">
                    <li>
                        <a href="#">Mission</a>
                        <ul class="sub_sub_menu">
                            <li>
                                <a href="#">Mission</a>
                            </li>
                            <li>
                                <a href="#">Vision</a>
                            </li>
                            <li>
                                <a href="#">Team</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Vision</a>
                    </li>
                    <li>
                        <a href="#">Team</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="shopping-cart.php">Cart</a>
            </li>
        </ul>
    </nav>
    <h1>Shopping Cart</h1>

    <ul id="cartItems"></ul>
    <p>Total: $<span id="cartTotal">0.00</span></p>
    <button class="cart-Button" onclick="updateCartAndNavigateToCheckout()">Checkout</button>
    <p id="demo"></p>

    <br><br>
    <div class="clear"></div>
    <footer>
        <p>
            &copy; 2023-2024 by Paboda Senervirathne . All Rights Reserved
        </p>
    </footer>

</body>

</html>