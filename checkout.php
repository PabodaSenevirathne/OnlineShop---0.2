<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>PBerlino</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="images/logo2.svg" alt="Your Logo" width="100" height="100">
        </div>
        <div class="title">
            <h1>Welcome to Our Online Store</h1>
            <p>Your One-Stop Shop for Quality Products</p>
        </div>
        <script>
    </script>

    </header>

    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="#">Products</a>
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
    <?php include 'php/form.php'; ?>
    <h2>Checkout Details</h2>
    <form method="post" action="">
    <input type="hidden" id="action" value="checkout">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"></br>
        <br><br>

        <label for="phone">Phone:</label>
        <input type="phone" id="phone" name="phone"><br>
        <br><br>

        <label for="postcode">Postcode:</label>
        <input type="text" id="postcode" name="postcode"><br>
        <br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address"><br>
        <br><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city"><br>
        <br><br>

        <label for="province">Province:</label>
        <input type="text" id="province" name="province"><br>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <br><br>

        <h2>Payment Details</h2><br>
        <div class="row">
            <div class="col-50">
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cname"><br>
                <br><br>
            </div>
            <div class="col-50">
                <label for="ccnum">Credit Card Number</label>
                <input type="text" id="ccnum" name="ccnum" placeholder="1111-2222-3333-4444"><br>
                <br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="MAR"><br>
                <br><br>
            </div>
            <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2022"><br>
                <br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352"><br>
            </div>
            <div class="col-50">
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-50">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <br><br>
            </div>
            <div class="col-50">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword">
                <br><br>
            </div>
        </div>
        <br><br>
        <button type="button" id="checkoutButton" onclick="saveFormData()">Proceed to Checkout</button>
        <button id="printReceipt" onclick="openPopupWindow()">Print</button> <br><br>

    </form>
    <?php require 'script.php'; ?>
    <p id="demo"></p>

    <br><br>
    <div class="clear"></div>
    <footer>
        <p>
            &copy; 2023-2024 by Paboda Senervirathne. All Rights Reserved
        </p>
    </footer>

</body>

</html>