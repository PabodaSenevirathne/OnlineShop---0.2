<?php
require 'connection.php';

// Check if the user logged in or not
if (!isset($_SESSION['id'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Check if the logged-in user is an admin or shop manager
if ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'manager') {
    // If not an admin or shop manager, log out and redirect to login page
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

// Fetch all orders
$query = "SELECT * FROM orders";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {

    $orders = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Orders</title>
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

        <?php
            // Display user's name and role
            if (isset($user['name']) && isset($user['role'])) {
                echo "<p>Welcome, {$user['name']}! ({$user['role']})</p>";
            }
            ?>
    </header>
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="checkout.php">Buy Now</a>
            </li>
            <li>
                <a href="orders.php">Orders</a>
            </li>
            <li>
            <a href="create_shop_managers.php">Create</a>
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
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    <h2>Orders</h2>

    <?php if (!empty($orders)): ?>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Postcode</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Province</th>
                    <th colspan="3">Products(Qty)</th>
                    <th>SalesTax($)</th>
                    <th>Total($)</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Sneakers</th>
                    <th>Hiking boot</th>
                    <th>High Heels</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['name']; ?></td>
                        <td><?php echo $order['phone']; ?></td>
                        <td><?php echo $order['postcode']; ?></td>
                        <td><?php echo $order['address']; ?></td>
                        <td><?php echo $order['city']; ?></td>
                        <td><?php echo $order['province']; ?></td>
                        <td><?php echo $order['product1Qty']; ?></td>
                        <td><?php echo $order['product1Qty']; ?></td>
                        <td><?php echo $order['product1Qty']; ?></td>
                        <td><?php echo $order['salesTax']; ?></td>
                        <td><?php echo $order['total']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
    <?php else: ?>
        <p>No orders available.</p>
    <?php endif; ?>
    
</body>
</html>

